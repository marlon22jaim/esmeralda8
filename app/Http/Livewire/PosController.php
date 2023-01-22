<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PosController extends Component
{
    public function render()
    {
        session(['title' => 'Ventas']);
        return view('livewire.pos.component')->extends('layouts.theme.app')->section('content');
    }
}
