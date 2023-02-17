<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\SaleDetails;
use DateTime;
use Livewire\Component;
use DB;

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
                DB::raw("p.name as product', sum(sale_details.quantity * sale_details.price) as total")
            )->whereYear("sale_details.created_at", $this->year)
            ->groupBy('p.name')
            ->orderBy(DB::raw("sum(sale_details.quantity * sale_details.price)"), 'desc')
            ->get()->take(5)->toArray();

        $countDif = (5 - count($this->top5Data));
        if ($countDif > 0) {
            for ($i = 1; $i <= $countDif; $i++) {
                array_push($this->top5Data, ["product" => '-', "total" => 0]);
            }
        }
    }

    public function getWeekSales()
    {
        $dt = new DateTime();
        $startDate = null;
        $finishDate = null;

        for ($d = 1; $d <= 7; $d++) {
            // norma iso 8601
            $dt->setISODate($dt->format('o'), $dt->format('W'), $d);
            $startDate = $dt->format('Y-m-d') . ' 00:00:00';
            $finishDate = $dt->format('Y-m-d') . ' 23:59:59';
            $wsale = Sale::whereBetween('created_at', [$startDate, $finishDate])->sum('total');

            array_push($this->weekSales_Data, $wsale);
        }
    }
}
