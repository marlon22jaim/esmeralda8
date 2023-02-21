    <div wire:ignore.self class="modal fademodal-fullscreen" tabindex="-1" id="modalSearchProduct" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <div class="input-group">
                        <input type="text" wire:model="search" id="modal-search-input"
                            placeholder="Puedes buscar por nombre del producto, código ó categoría..."
                            class="form-control">

                        <span class="input-group-text input-gp">
                            <i class="bi bi-search"></i>
                        </span>

                    </div>

                </div>

                <div class="modal-body">
                    <div class="row p-2">
                        <div class="table-responsive">

                            <table class="table table-hover mt-1">
                                <thead class="text-white bg-dark">
                                    <tr>
                                        <th width="4%"></th>
                                        <th class="table-th text-left text-white">DESCRIPCIÓN</th>
                                        <th width="13%" class="table-th text-center text-white">PRECIO</th>
                                        <th class="table-th text-center text-white">CATEGORÍA</th>
                                        <th class="table-th text-center text-white">
                                            <button wire:click.prevent="addAll" class="btn btn-info"
                                                style="background-color:#007bd3; color: white"
                                                {{ count($products) > 0 ? '' : 'disabled' }}>
                                                <i class="bi bi-check-circle"></i>
                                                TODOS
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td>
                                                <span>
                                                    <img src="{{ asset('storage/products/' . $product->imagen) }}"
                                                        alt="img" height="50" width="50" class="rounded">
                                                </span>
                                            </td>
                                            <td>
                                                <div class="text-left">
                                                    <h6><b>{{ $product->name }}</b></h6>
                                                    <small class="text-info">{{ $product->barcode }}</small>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <h6>${{ number_format($product->price, 2) }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ $product->category }}</h6>
                                            </td>
                                            <td class="text-center">
                                                <button wire:click.prevent="$emit('scan-code-byid',{{ $product->id }})"
                                                    class="btn btn-dark">
                                                    <i class="bi bi-cart-check mr-1"></i>
                                                    AGREGAR
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">SIN RESULTADOS</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" onclick="cerrarModal()"
                        x-on:click="$dispatch('close-modal')">CERRAR VENTANA</button>

                </div>
            </div>
        </div>
    </div>
