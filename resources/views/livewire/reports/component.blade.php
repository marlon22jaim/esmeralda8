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
                                    <select class="form-control">
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
                                    <select class="form-control">
                                        <option value="0">Ventas del día</option>
                                        <option value="1">Ventas por Fecha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6>Fecha desde</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateFrom" class="form-control flatpickr"
                                        placeholder="Click Para Elegir">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6>Fecha hasta</h6>
                                <div class="form-group">
                                    <input type="text" wire:model="dateTo" class="form-control flatpickr"
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

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
