<style>
    @media only screen and (max-width: 767px) {
        .cantidad_producto {
            width: 100px;
        }
    }
</style>

<div class="connect-sorting">
    <div class="connect-sorting-content">
        <div class="card simple-title-task ui-sortable-handle">
            <div class="card-body">

                {{-- @if ($total > 0) --}}
                {{-- <div class="table-responsive tblscroll" style="max-height: 650px;overflow: hidden"> --}}
                <div class="table-responsive" style="max-height: 650px;">
                    <table class="table display table-hover mt-1" id="datatable">
                        <thead class="text-white" style="background: #3b3f5c">
                            <tr>
                                <th width="10%"></th>
                                <th class="table-th text-left text-white">Descripción</th>
                                <th class="table-th text-center text-white">Precio</th>
                                <th width="15%" class="table-th text-center text-white">Cant</th>
                                <th class="table-th text-center text-white">Importe</th>
                                <th class="table-th text-center text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td class="text-center table-th">
                                        @if (count($item->attributes) > 0)
                                            <span>
                                                <img src="{{ asset('storage/products/' . $item->attributes[0]) }}"
                                                    alt="imagen" height="90" width="90" class="rounded">
                                            </span>
                                        @else
                                            <span>
                                                <img src="{{ asset('storage/products/noimg.jpg') }}" alt="imagen"
                                                    height="90" width="90" class="rounded">
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <h6>{{ $item->name }}</h6>
                                    </td>
                                    <td class="text-center">${{ number_format($item->price, 2) }}</td>
                                    <td class="text-center">
                                        <input type="number" id="r{{ $item->id }}"
                                            wire:change="updateQty({{ $item->id }},$('#r' + {{ $item->id }}).val() )"
                                            style="font-size: 1rem!important"
                                            class="cantidad_producto form-control text-center"
                                            value="{{ $item->quantity }}">
                                    </td>
                                    <td class="text-center">
                                        <h6>${{ number_format($item->price * $item->quantity, 2) }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <button
                                            onclick="Confirm('{{ $item->id }}','removeItem','¿CONFIRMAS ELIMINAR EL REGISTRO?')"
                                            class="btn btn-dark mbmobile">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <button wire:click.prevent="decreaseQty({{ $item->id }})"
                                            class="btn btn-dark mbmobile">
                                            <i class="bi bi-file-minus"></i>
                                        </button>
                                        <button wire:click.prevent="increaseQty({{ $item->id }})"
                                            class="btn btn-dark mbmobile">
                                            <i class="bi bi-plus"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- @else
                    <h5 class="text-center text-muted" style="margin-top: 25px">Agrega productos a la venta</h5>
                @endif --}}
                <div wire:loading.inline wire:target="saveSale">
                    <h4 class="text-danger text-center">Guardando venta...</h4>
                </div>
            </div>
        </div>
    </div>
</div>
