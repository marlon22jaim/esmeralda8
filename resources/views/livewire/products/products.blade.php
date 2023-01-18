<div class="row sales layout-top spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <a href="javascript:void(0)" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#theModal"
                            style="background: #3b3f5c">Agregar</a>
                    </li>
                </ul>
            </div>
            @include('common.searchbox')

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table display table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th style="color: #3b3f5c">Descripción</th>
                                <th class="text-center" style="color: #3b3f5c">Código Barras</th>
                                <th class="text-center" style="color: #3b3f5c">Categoría</th>
                                <th class="text-center" style="color: #3b3f5c">Precio</th>
                                <th class="text-center" style="color: #3b3f5c">Costo</th>
                                <th class="text-center" style="color: #3b3f5c">Existencia</th>
                                <th class="text-center" style="color: #3b3f5c">Cant Min</th>
                                <th class="text-center" style="color: #3b3f5c">Image</th>
                                <th class="text-center" style="color: #3b3f5c">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $product)
                                <tr>
                                    <td>
                                        <h6 class="text-left">{{ $product->name }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-center">{{ $product->barcode }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-center">{{ $product->category }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-center">{{ $product->price }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-center">{{ $product->cost }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-center">{{ $product->stock }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="text-center">{{ $product->alerts }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <span><img src="{{ asset('storage/products/' . $product->imagen) }}"
                                                alt="imagen de ejemplo" height="70" width="80"
                                                class="rounded"></span>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" wire:click="Edit({{ $product->id }})"
                                            class="btn btn-dark mtmobile" title="Edit">
                                            <i class="ri ri-edit-box-line"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="Confirm('{{ $product->id }}')"
                                            class="btn btn-dark" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>

        </div>
    </div>
    @include('livewire.products.form')
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        window.livewire.on('product-added', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        })
        window.livewire.on('product-updated', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        })
        window.livewire.on('product-deleted', msg => {
            noty(msg)
        })
        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide');
        })
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show');
        })
        window.livewire.on('hidden.bs.modal', msg => {
            $('.er').css('display', 'none');
        })

    })

    function Confirm(id) {
        swal({
            title: 'CONFIRMAR',
            text: '¿Confirmas eliminar registro?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3b3f5c'
        }).then(function(result) {
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>
