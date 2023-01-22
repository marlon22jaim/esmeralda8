<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use Livewire\Component;

class CoinsController extends Component
{
    public $componentName, $pageTitle, $selected_id, $image, $search;
    public function render()
    {
        session(['title' => 'Monedas']);
        return view(
            'livewire.denominations.component',
            [
                'data' => Denomination::paginate(5)
                // 'data' => Denomination::all()
            ]
        )
            ->extends('layouts.theme.app')->section('content');
    }
    public function mount()
    {
        $this->componentName  = 'Denominaciones';
        $this->pageTitle = 'Listado';
        $this->selected_id = 0;
    }
}
