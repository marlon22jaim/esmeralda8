<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Ventas</title>
    <style>
        @page {
            margin-top: 310px;
            margin-bottom: 5px;
        }

        .header h1 {
            margin: 0;
        }

        .footer {
            bottom: 15px;
            font-size: 7pt;
            color: #333333;
            border-top: 1px solid #1f1f1f;
            z-index: 1000;
        }

        footer {
            position: fixed;
            left: 0px;
            right: 0px;
            height: 60px;
            margin-top: -60px;
        }

        .pagenum:before {
            content: counter(page);
        }

        .header,
        .footer {
            width: 100%;
            position: fixed;
        }

        body {
            font-family: 'Helvetica';
            font-size: 9pt;
            color: #111111;
        }

        hr {
            border: 1px solid #dddddd;
            margin-bottom: 0;
        }

        .text-left {
            text-align: left !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-company {
            color: #666666;
            font-size: 9pt;
        }

        .text-primary {
            color: #999999;
            font-weight: bold;
            font-size: 9pt;
        }

        .text-head {
            font-size: 9pt;
        }


        .table-items thead th {
            font-weight: bold;
            padding: 5px 2px;
            text-align: center;
            vertical-align: middle;
            background-color: #515365;
            color: #ffffff;
        }

        .table-items tbody td {
            padding: 3px 2px;
            vertical-align: top;
            border: 1px solid #eeeeee;
        }

        .table-items>tbody>tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table-items tfoot td {
            padding: 3px 2px;
            vertical-align: middle;
            border: 1px solid #eeeeee;
        }

        .table-secundary td {
            background-color: #F6F6F6;
            border: 1px dotted #D6D6D6;
        }

        .table-footer td {
            background-color: #FCFCFC;
            border: 1px dotted #EEEEEE;
        }

        .watermark {
            position: absolute;
            bottom: 540px;
            left: 100px;
            font-size: 50pt;
            font-weight: bold;
            color: #AAAAAA;
            letter-spacing: 6px;
            opacity: 0.3;
            transform: rotate(-45deg);
        }

        .invoice-logo {
            max-height: 120px;
            max-width: 240px;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .col-xs-1,
        .col-xs-2,
        .col-xs-3,
        .col-xs-4,
        .col-xs-5,
        .col-xs-6,
        .col-xs-7,
        .col-xs-8,
        .col-xs-9,
        .col-xs-10,
        .col-xs-11,
        .col-xs-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-1,
        .col-xs-2,
        .col-xs-3,
        .col-xs-4,
        .col-xs-5,
        .col-xs-6,
        .col-xs-7,
        .col-xs-8,
        .col-xs-9,
        .col-xs-10,
        .col-xs-11,
        .col-xs-12 {
            float: left;
        }

        .col-xs-12 {
            width: 100%;
        }

        .col-xs-11 {
            width: 91.66666667%;
        }

        .col-xs-10 {
            width: 83.33333333%;
        }

        .col-xs-9 {
            width: 75%;
        }

        .col-xs-8 {
            width: 66.66666667%;
        }

        .col-xs-7 {
            width: 58.33333333%;
        }

        .col-xs-6 {
            width: 50%;
        }

        .col-xs-5 {
            width: 41.66666667%;
        }

        .col-xs-4 {
            width: 33.33333333%;
        }

        .col-xs-3 {
            width: 25%;
        }

        .col-xs-2 {
            width: 16.66666667%;
        }

        .col-xs-1 {
            width: 8.33333333%;
        }

        .ln_solid {
            border-top: 1px solid #e5e5e5;
            color: #ffffff;
            background-color: #ffffff;
            height: 1px;
            margin: 20px 0
        }

        .x_panel {
            position: relative;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px 17px;
            display: inline-block;
            background: #fff;
            border: 1px solid #E6E9ED;
        }

        .green {
            color: #1ABB9C
        }

        .dark {
            color: #34495E
        }

        .pull-right {
            float: right !important;
        }

        .pull-left {
            float: left !important;
        }

        small {
            font-size: 9pt
        }
    </style>
</head>

<body>

    <section class="header" style="top:-287px">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td colspan="2" class="text-center">
                    <span style="font-size: 25px; font-weight:bold">La Esmeralda</span>
                </td>
            </tr>
            <tr>
                <td width="30%" style="vertical-align: top; padding-top: 10px; position: relative">
                    {{-- <img src="{{ asset('assets/img/LA_ESMERALDA_logo.svg') }}" class="invoice-logo"> --}}
                    <img src="assets/svg/LA_ESMERALDA_logo.svg" alt="iconoesmeralda" style="height: 10"/>
                </td>
                <td width="70%" class="text-left text-company" style="vertical-align: top; padding-top: 10px">
                    @if ($reportType == 0)
                        <span style="font-size:16px">
                            <strong>Reporte de Ventas del Día</strong>
                        </span>
                    @else
                        <span style="font-size:16px">
                            <strong>Reporte de Ventas por Fechas</strong>
                        </span>
                    @endif
                    <br>
                    @if ($reportType != 0)
                        <span style="font-size:16px">
                            <strong>Fecha de consulta: {{ $dateFrom }} al {{ $dateTo }}</strong>
                        </span>
                    @else
                        <span style="font-size:16px">
                            <strong>Fecha de consulta: {{ \Carbon\Carbon::now()->format('d-M-Y') }}</strong>
                        </span>
                    @endif
                    <br>
                    <span style="font-size: 14px">Usuario: {{ $user }}</span>
                </td>
            </tr>

        </table>
    </section>


    <section style="margin-top: -110px">
        <table cellpadding="0" cellspacing="0" width="100%" class="table-items">
            <thead>
                <tr>
                    <th width="10%">FOLIO</th>
                    <th width="12%">IMPORTE</th>
                    <th width="10%">ITEMS</th>
                    <th width="12%">ESTADO</th>
                    <th>USUARIO</th>
                    <th width="18%">FECHA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td align="center">{{ $item->id }}</td>
                        <td align="center">{{ number_format($item->total, 2) }}</td>
                        <td align="center">{{ $item->items }}</td>
                        <td align="center">{{ $item->status }}</td>
                        <td align="center">{{ $item->user }}</td>
                        <td align="center">{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-center">
                        <span><b>TOTALES</b></span>
                    </td>
                    <td colspan="1" class="text-center">
                        <span><strong>${{ number_format($data->sum('total'), 2) }}</strong></span>
                    </td>
                    <td class="text-center">
                        {{ $data->sum('items') }}
                    </td>
                    <td colspan="3"></td>
                </tr>
            </tfoot>
        </table>
    </section>

    <section class="footer">
        <table cellpadding="0" cellspacing="0" width="100%" class="table-items">
            <tr>
                <td width="20%">
                    <span>La Esmeralda V.1.0</span>
                </td>
                <td width="60%" class="text-center">
                    minimarketlaesmeralda.com
                </td>
                <td width="20%" class="text-center">
                    Página <span class="pagenum"></span>
                </td>
            </tr>
        </table>
    </section>
</body>

</html>
