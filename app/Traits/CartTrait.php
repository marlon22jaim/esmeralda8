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
}
