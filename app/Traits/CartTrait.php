<?php

namespace App\Traits;

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

trait CartTrait
{
    public function ScanearCode($barcode)
    {
        $product = Product::where('barcode', $barcode)->first();
        if ($product == null || empty($product)) {
            $this->emit('scan-notfound', 'El producto no está registrado*');
        } else {
            $quantity = $this->GetQuantity($product->id);
            if ($product->stock < $quantity + 1) {
                $this->emit('no-stock', 'Stock insuficiente *');
                return;
            }
            if ($quantity > 0) {
                $this->IncreaseQuantity($product->id);
            } else {
                Cart::add($product->id, $product->name, $product->price, 1, $product->imagen);
            }
            $this->total = Cart::getTotal();
            $this->emit('scan-ok', 'Producto Agregado *');
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

    public function IncreaseQuantity($productId, $cant = 1)
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

    public function updateQuantity($product, $cant = 1)
    {
        $title = '';
        $exist = Cart::get($product->id);

        if ($exist)
            $title = "Cantidad Actualizada *";
        else
            $title = "Producto Agregado *";

        if ($exist) {
            if ($product->stock < $cant) {
                $this->emit('no-stock', 'Stock insuficiente *');
                return;
            }
        }

        $this->removeItem($product->id);
        if ($cant > 0) {
            Cart::add($product->id, $product->name, $product->price, $cant, $product->imagen);
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
        $this->emit('scan-ok', 'Producto eliminado del carrito *');
    }
    public function decreaseQuantity($productId)
    {
        $item = Cart::get($productId);
        Cart::remove($productId);

        $img = (count($item->attributes) > 0 ? $item->attributes[0] : Product::find($productId)->imagen);

        $newQty = ($item->quantity) - 1;
        if ($newQty > 0)
            Cart::add($item->id, $item->name, $item->price, $newQty, $img);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Cantidad Actualizada *');
    }
    public function trashCart()
    {
        Cart::clear();
        $this->efectivo = 0;
        $this->change = 0;

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Carrito vacío *');
    }
    public function printSaleToThermalPrinterTrait($saleId)
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

        $ticket = "<p>--------------------------------</p>";
        $ticket .= "<p>--------------------------------</p>";
        $ticket .= "<h2 style='text-align-center'>" . $company->name . "</h2>";
        $ticket .= "<p>" . $company->address . "</p>";
        $ticket .= "<p>NIT: " . $company->taxpayer_id . "</p>";
        $ticket .= "<p>TELEFONO: " . $company->phone . "</p>";
        $ticket .= "<h3>TICKET #" . $saleId . "</h3>";
        $ticket .= "<p>FECHA: " . $sale->created_at . "</p>";
        $ticket .= "<p>VENDEDOR: " . $sale->seller . "</p>";
        $ticket .= "<p>--------------------------------</p>";

        foreach ($saleDetails as $detail) {
            $line = "<p>- " . $detail->product . "</p>";
            $line .= "<p> Cant:" . intval($detail->quantity) . " Subt: " . number_format($detail->quantity * $detail->price, 2) . "</p>";
            $ticket .= $line;
        }

        $ticket .= "<p>--------------------------------</p>";
        $ticket .= "<p>TOTAL: " . number_format($sale->total, 2) . "</p>";
        $ticket .= "<p>EFECTIVO: " . number_format($sale->cash, 2) . "</p>";
        $ticket .= "<p>CAMBIO: " . number_format($sale->change, 2) . "</p>";
        $ticket .= "<p>!Gracias por su compra</p>";
        $ticket .= "<p>en nuestro supermercado! </p>";
        $ticket .= "<p>Esperamos verlo pronto.</p>";
        $ticket .= "<p>--------------------------------</p>";
        $ticket .= "<p>--------------------------------</p>";


        // Asigna el valor de $ticket a la propiedad
        $this->emit('print-ticket2', $ticket);
    }
}
