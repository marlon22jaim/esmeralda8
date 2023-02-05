<div wire:ignore.self class="modal fade" tabindex="-1" id="modalDetails" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">
                    <b>Detalle de Venta #{{ $saleId }}</b>
                </h5>
                <h6 class="text-center text-warning" wire:loading>Por favor espere</h6>
            </div>
            <div class="modal-body">

                <table class="table datatable display table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th style="color: #3b3f5c">FOLIO</th>
                            <th class="text-center" style="color: #3b3f5c">PRODUCTO</th>
                            <th class="text-center" style="color: #3b3f5c">PRECIO</th>
                            <th class="text-center" style="color: #3b3f5c">CANT</th>
                            <th class="text-center" style="color: #3b3f5c">IMPORTE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $d)
                            <tr>
                                <td>
                                    <h6>{{ $d->id }}</h6>
                                </td>
                                <td>
                                    <h6>{{ $d->product }}</h6>
                                </td>
                                <td>
                                    <h6>${{ number_format($d->price, 2) }}</h6>
                                </td>
                                <td>
                                    <h6>{{ number_format($d->quantity, 0) }}</h6>
                                </td>
                                <td>
                                    <h6>{{ number_format($d->price * $d->quantity, 2) }}</h6>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <h5 class="text-center font-weight-bold">Totales</h5>
                            </td>
                            <td>
                                <h5 class="text-center">{{ $countDetails }}</h5>
                            </td>
                            <td>
                                <h5 class="text-center">$ {{ number_format($sumDetails, 2) }}</h5>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-dark close-btn text-info" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>
