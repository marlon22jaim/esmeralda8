<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use Livewire\Component;

class PosController extends Component
{
    public $total = 10, $cart = [], $itemsQuantity = 2, $denominations = [], $efectivo, $change;
    public function render()
    {
        $this->denominations = Denomination::all();
        session(['title' => 'Ventas']);
        return view('livewire.pos.component')->extends('layouts.theme.app')->section('content');
    }
}
