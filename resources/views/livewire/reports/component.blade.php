<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget">
            <div class="widget-heading">
                <h4 class="card-title text-center"><b>{{ $componentName }}</b></h4>
            </div>
            <div class="widget-content">
                <div class="row">

                    <div class="col-sm-12 col-md-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Elige el Usuario</h6>
                                <div class="form-group">
                                    <select wire:model="userId" class="form-select">
                                        <option value="0">Todos</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6>Elige el tipo de Reporte</h6>
                                <div class="form-group">
                                    <select wire:model="reportType" class="form-select">
                                        <option value="0">Ventas del día</option>
                                        <option value="1">Ventas por Fecha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6>Fecha desde</h6>
                                <div class="form-group">
                                    <input type="date" wire:model="dateFrom" class="form-control flatpickr"
                                        placeholder="Click Para Elegir">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6>Fecha hasta</h6>
                                <div class="form-group">
                                    <input type="date" wire:model="dateTo" class="form-control flatpickr"
                                        placeholder="Click Para Elegir">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button wire:click="$refresh" class="btn btn-dark btn-block">
                                    Consultar
                                </button>
                                <a href="{{ url('report/pdf' . '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo) }}"
                                    class="btn btn-dark btn-block {{ count($data) < 1 ? 'disabled' : '' }}"
                                    target="_blank">Generar PDF</a>
                                <a href="{{ url('report/excel' . '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo) }}"
                                    class="btn btn-dark btn-block {{ count($data) < 1 ? 'disabled' : '' }}"
                                    target="_blank">Exportar a
                                    Excel</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-9">

                        <div class="table-responsive">
                            <table class="table display table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="color: #3b3f5c">FOLIO</th>
                                        <th class="text-center" style="color: #3b3f5c">TOTAL</th>
                                        <th class="text-center" style="color: #3b3f5c">ITEMS</th>
                                        <th class="text-center" style="color: #3b3f5c">ESTADO</th>
                                        <th class="text-center" style="color: #3b3f5c">USUARIO</th>
                                        <th class="text-center" style="color: #3b3f5c">FECHA</th>
                                        <th class="text-center" style="color: #3b3f5c" width="50px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) < 1)
                                        <tr>
                                            <td colspan="7">
                                                <h5>Sin Resultados</h5>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach ($data as $d)
                                        <tr>
                                            <td class="text-center">
                                                <h6>{{ $d->id }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>$ {{ number_format($d->total, 2) }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $d->items }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $d->status }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $d->user }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>
                                                    {{ \Carbon\Carbon::parse($d->created_at)->format('d-m-Y') }}
                                                </h6>
                                            </td>
                                            <td class="text-center" width="50px">
                                                <button wire:click.prevent="getDetails({{ $d->id }})"
                                                    class="btn btn-dark btn-sm">
                                                    <i class="bi bi-card-list"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('livewire.reports.sales-details')
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        // EVENTOS
        window.livewire.on('show-modal', Msg => {
            $('#modalDetails').modal('show')
        })

        flatpickr(document.getElementsByClassName('flatpickr'), {
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: {
                firstDayofWeek: 1,
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                        "Domingo",
                        "Lunes",
                        "Martes",
                        "Miércoles",
                        "Jueves",
                        "Viernes",
                        "Sábado",
                    ],
                },
                months: {
                    shorthand: [
                        "Ene",
                        "Feb",
                        "Mar",
                        "Abr",
                        "May",
                        "Jun",
                        "Jul",
                        "Ago",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dic",
                    ],
                    longhand: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre",
                    ],
                },
            }
        })


    })
</script>
