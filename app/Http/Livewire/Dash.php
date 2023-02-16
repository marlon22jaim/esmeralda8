<?php

namespace App\Http\Livewire;

use App\Models\SaleDetails;
use Livewire\Component;

class Dash extends Component
{
    public $year, $salesBuMonth_Data = [], $top5Data = [], $weekSales_Data = [];

    public function mount()
    {
        # code...
        $this->year = date('Y');
    }
    public function render()
    {
        session(['title' => 'Home']);
        return view('livewire.dashboard.component')->extends('layouts.theme.app')->section('content');
    }
    public function getTop5()
    {
        # code...
        $this->top5Data = SaleDetails::join('products as p', 'sale_details.product_id', 'p.id')
            ->select(
                DB::raw("p.name as product', 'sum(sale_details.quantity *sale_details.price) as total")
            )->whereYear("sale_details.created_at", $this->year);
    }
}
