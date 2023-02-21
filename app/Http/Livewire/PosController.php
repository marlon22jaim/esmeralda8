<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetails;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;
use DB;
use App\Traits\CartTrait;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class PosController extends Component
{
    use CartTrait;
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
        'print-last' => 'printLast',
        'scan-code-byid' => 'ScanCodeById',
    ];

    public function ScanCodeById($productId)
    {
        $this->IncreaseQuantity($productId);
    }

    public function ScanCode($barcode)
    {
        $this->ScanearCode($barcode);
    }


    public function increaseQty($productId, $cant = 1)
    {
        $this->IncreaseQuantity($productId, $cant);
    }

    public function updateQty(Product $product, $cant = 1)
    {
        if ($cant <= 0) {
            $this->removeItem($product->id);
        } else
            $this->updateQuantity($product, $cant);
    }

    public function getQuantity($productId)
    {
        $exist = Cart::get($productId);
        if ($exist) {
            return $exist->quantity;
        } else {
            return 0;
        }
    }


    public function decreaseQty($productId)
    {
        $this->decreaseQuantity($productId);
    }
    public function AddCash($value)
    {
        if ($value > 0)
            $this->efectivo += $value;
        else
            $this->efectivo = $this->total;
    }

    public function updateEfectivo($value)
    {
        if (is_numeric($value))
            $this->change = $this->efectivo - $this->total;
        else
            $this->change = 0 - $this->total;
    }

    public function clearCart()
    {
        $this->trashCart();
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
            if ($this->itemsQuantity == null) {
                $this->itemsQuantity = Cart::getTotalQuantity();
            }

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
            $this->printSaleToThermalPrinter($sale->id); // Imprimir venta con id  en una impresora térmica
        } catch (Exception $e) {
            DB::rollback();
            $this->emit('sale-error', $e->getMessage());
        }
    }

    public function printSaleToThermalPrinter($saleId)
    {
        $this->printSaleToThermalPrinterTrait($saleId);
    }
}
