<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\SaleDetails;
use DateTime;
use Livewire\Component;
use DB;

class Dash extends Component
{
    public $year, $salesByMonth_Data = [], $top5Data = [], $weekSales_Data = [];

    public function mount()
    {
        # code...
        $this->year = date('Y');
    }
    public function render()
    {
        $this->getTop5();
        $this->getSalesMonth();
        $this->getWeekSales();
        session(['title' => 'Home']);
        return view('livewire.dashboard.component')->extends('layouts.theme.app')->section('content');
    }
    public function getTop5()
    {
        # code...
        $this->top5Data = SaleDetails::join('products as p', 'sale_details.product_id', 'p.id')
            ->select(
                DB::raw("p.name as product, sum(sale_details.quantity * sale_details.price) as total")
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
        // dd($this->top5Data);
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
        //dd($this->weekSales_Data);
    }
    public function getSalesMonth()
    {
        $salesByMonth = DB::select(
            DB::raw("SELECT COALESCE(total, 0) AS total
                FROM (
                    SELECT 'january' AS month
                    UNION SELECT 'february' AS month
                    UNION SELECT 'march' AS month
                    UNION SELECT 'april' AS month
                    UNION SELECT 'may' AS month
                    UNION SELECT 'june' AS month
                    UNION SELECT 'july' AS month
                    UNION SELECT 'august' AS month
                    UNION SELECT 'september' AS month
                    UNION SELECT 'october' AS month
                    UNION SELECT 'november' AS month
                    UNION SELECT 'december' AS month
                ) m
                LEFT JOIN (SELECT MONTHNAME(created_at) as MONTH, COUNT(*) as orders, SUM(total) as total
                FROM sales WHERE year(created_at)= $this->year
                GROUP BY MONTHNAME(created_at),MONTH(created_at)
                ORDER BY MONTH(created_at)) c ON m.MONTH = c.MONTH;")
        );

        foreach ($salesByMonth as $sale) {
            array_push($this->salesByMonth_Data, $sale->total);
        }
       // dd($this->salesByMonth_Data);
    }
}
