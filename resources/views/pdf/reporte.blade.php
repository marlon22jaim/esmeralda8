<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="{{ asset('css/custom_pdf.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_page.css') }}">
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
                    <img src="{{ asset('assets/img/LA_ESMERALDA_logo.svg') }}" class="invoice-logo">
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


</body>

</html>
