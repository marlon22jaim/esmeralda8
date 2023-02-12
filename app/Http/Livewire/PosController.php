<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetails;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;
use DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class PosController extends Component
{
    public $total, $itemsQuantity, $efectivo, $change;

    public function mout()
    {
        $this->efectivo = 0;
        $this->change = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
    }


    public function render()
    {
        session(['title' => 'Ventas']);
        return view('livewire.pos.component', [
            'denominations' => Denomination::orderBy('value', 'desc')->get(),
            'cart' => Cart::getContent()->sortBy('name')
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }
    public function ACash($value)
    {
        $this->efectivo += ($value == 0 ? $this->total : $value);
        $this->change = ($this->efectivo - $this->total);
    }

    protected $listeners = [
        'scan-code' => 'ScanCode',
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale',
    ];

    public function ScanCode($barcode, $cant = 1)
    {
        //dd($barcode);
        $product = Product::where('barcode', $barcode)->first();
        if ($product == null || empty($product)) {
            $this->emit('scan-notfound', 'El producto no está registrado');
        } else {
            if ($this->InCart($product->id)) {
                $this->increaseQty($product->id);
                return;
            }
            if ($product->stock < 1) {
                $this->emit('no-stock', 'Stock insuficiente!');
                return;
            }
            Cart::add($product->id, $product->name, $product->price, $cant, $product->image);
            $this->total = Cart::getTotal();

            $this->emit('scan-ok', 'Producto Agregado');
        }
    }

    public function InCart($productId)
    {
        $exist = Cart::get($productId);
        if ($exist) {
            return true;
        } else {
            return false;
        }
    }

    public function increaseQty($productId, $cant = 1)
    {
        $title = '';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist)
            $title = "Cantidad Actualizada";
        else
            $title = "Producto Agregado";


        if ($exist) {
            if ($product->stock < ($cant + $exist->quantity)) {
                $this->emit('no-stock', 'Stock insuficiente :c');
                return;
            }
        }

        Cart::add($product->id, $product->name, $product->price, $cant, $product->image);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', $title);
    }

    public function updateQty($productId, $cant = 1)
    {
        $title = '';
        $product = Product::find($productId);
        $exist = Cart::get($productId);

        if ($exist)
            $title = "Cantidad Actualizada";
        else
            $title = "Producto Agregado";

        if ($exist) {
            if ($product->stock < $cant) {
                $this->emit('no-stock', 'Stock insuficiente :c');
                return;
            }
        }

        $this->removeItem($productId);
        if ($cant > 0) {
            Cart::add($product->id, $product->name, $product->price, $cant, $product->image);
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('scan-ok', $title);
        }
    }

    public function removeItem($productId)
    {
        Cart::remove($productId);
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Producto eliminado del carrito');
    }

    public function decreaseQty($productId)
    {
        $item = Cart::get($productId);
        Cart::remove($productId);

        $newQty = ($item->quantity) - 1;
        if ($newQty > 0)
            Cart::add($item->id, $item->name, $item->price, $newQty, $item->attributes[0]);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Cantidad Actualizada');
    }

    public function clearCart()
    {
        Cart::clear();
        $this->efectivo = 0;
        $this->change = 0;

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Carrito vacío');
    }

    public function saveSale()
    {
        if ($this->total <= 0) {
            $this->emit('sale-error', 'Agrega productos a la venta');
            return;
        }
        if ($this->efectivo <= 0) {
            $this->emit('sale-error', 'Ingresa el efectivo');
            return;
        }
        if ($this->total > $this->efectivo) {
            $this->emit('sale-error', 'El efectivo debe ser mayor o igual al total');
            return;
        }

        DB::beginTransaction();

        try {
            $sale = Sale::create([
                'total' => $this->total,
                'items' => $this->itemsQuantity,
                'cash' => $this->efectivo,
                'change' => $this->change,
                'user_id' => Auth()->user()->id

            ]);

            if ($sale) {
                $items = Cart::getContent();
                foreach ($items as $item) {
                    SaleDetails::create([
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'product_id' => $item->id,
                        'sale_id' => $sale->id,
                    ]);

                    $product = Product::find($item->id);
                    $product->stock = $product->stock - $item->quantity;
                    $product->save();
                }
            }

            DB::commit();
            Cart::clear();
            $this->efectivo = 0;
            $this->change = 0;
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('sale-ok', 'Venta Registrada con Éxito');
            $this->printSaleToThermalPrinter($sale->id); // Imprimir venta con id 1 en una impresora térmica

            // $this->emit('print-ticket', $sale->id);
        } catch (Exception $e) {
            DB::rollback();
            $this->emit('sale-error', $e->getMessage());
        }
    }


    // public function printTicket($sale)
    // {
    //     return Redirect::to("print://$sale->id");
    // }

    public function printSaleToThermalPrinter($saleId)
    {
        $saleDetails = DB::select("SELECT p.name AS product, sd.quantity, sd.price 
                                   FROM sale_details AS sd 
                                   JOIN products AS p ON p.id = sd.product_id 
                                   WHERE sd.sale_id = ?", [$saleId]);
        $sale = DB::select("SELECT s.total, s.items, s.cash, s.change, s.created_at, u.name AS seller 
                            FROM sales AS s 
                            JOIN users AS u ON u.id = s.user_id 
                            WHERE s.id = ?", [$saleId])[0];
        $company = DB::select("SELECT name, address, taxpayer_id, phone FROM companies")[0];

        $ticket = "<br>";
        $ticket .= "<br>";
        $ticket .= "<br>";
        $ticket .= "<h2 style='text-align-center'>" . $company->name . "</h2>";
        $ticket .= "<p>" . $company->address . "</p>";
        $ticket .= "<p>NIT: " . $company->taxpayer_id . "</p>";
        $ticket .= "<p>TELEFONO: " . $company->phone . "</p>";
        $ticket .= "<h3>TICKET #" . $saleId . "</h3>";
        $ticket .= "<p>FECHA: " . $sale->created_at . "</p>";
        $ticket .= "<p>VENDEDOR: " . $sale->seller . "</p>";
        $ticket .= "<hr>";

        foreach ($saleDetails as $detail) {
            $line = "<p>" . $detail->product . " Cant:" . intval($detail->quantity) . " Subt: " . number_format($detail->quantity * $detail->price, 2) . "</p>";
            $ticket .= $line;
        }

        $ticket .= "<p><hr></p>";
        $ticket .= "<p>TOTAL: " . number_format($sale->total, 2) . "</p>";
        $ticket .= "<p>EFECTIVO: " . number_format($sale->cash, 2) . "</p>";
        $ticket .= "<p>CAMBIO: " . number_format($sale->change, 2) . "</p>";
        $ticket .= "<p>!Gracias por su compra</p>";
        $ticket .= "<p>en nuestro supermercado! </p>";
        $ticket .= "<p>Esperamos verlo pronto.</p>";
        $ticket .= "<br>";
        $ticket .= "<br>";
        $ticket .= "<br>";
        $ticket .= "<br>";
        $ticket .= "<br>";

        // Asigna el valor de $ticket a la propiedad
        $this->emit('print-ticket2', $ticket);
    }
}
