<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dash extends Component
{
    public $year;
    public function render()
    {
        session(['title' => 'Home']);
        return view('livewire.dashboard.component')->extends('layouts.theme.app')->section('content');
    }
}
