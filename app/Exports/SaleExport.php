<?php

namespace App\Exports;

use App\Models\Sale;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class SaleExport implements FromCollection, WithHeadings, Worksheet, WithCustomStartCell, WithTitle, WithStyles
{

    protected $userId, $dateFrom, $dateTo, $reportType;

    function __construct($userId, $reportType, $f1, $f2)
    {
        $this->userId = $userId;
        $this->dateFrom = $f1;
        $this->dateTo = $f2;
        $this->reportType = $reportType;
    }


    public function collection()
    {
        $data = [];
        if ($this->reportType == 1) {
            $from = Carbon::parse($this->dateFrom)->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse($this->dateTo)->format('Y-m-d') . ' 23:59:59';
        } else {
            $from = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 00:00:00';
            $to = Carbon::parse(Carbon::now())->format('Y-m-d') . ' 23:59:59';
        }
        if ($this->userId == 0) {
            $data = Sale::join('users as u', 'u.id', 'sales.user_id')
                ->select('sales.*', 'u.name as user')
                ->whereBetween('sales.created_at', [$from, $to])
                ->get();
        } else {
            $data = Sale::join('users as u', 'u.id', 'sales.user_id')
                ->select('sales.*', 'u.name as user')
                ->whereBetween('sales.created_at', [$from, $to])
                ->where('user_id', $this->userId)
                ->get();
        }
        return $data;
    }
    public function headings(): array
    {
        return ["FOLIO", "IMPORTE", "ITEMS", "ESTADO", "USUARIO", "FECHA"];
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            2 => ['font' => ['bold' => true]],
        ];
    }

    public function title(): string
    {
        return "Reporte de Ventas";
    }
}
