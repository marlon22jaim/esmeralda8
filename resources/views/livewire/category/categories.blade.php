<div class="row sales layout-top spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tab-pills">
                    @can('Categoria_Crear')
                        <li>
                            <a href="javascript:void(0)" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#theModal"
                                style="background: #3b3f5c">Agregar</a>
                        </li>
                    @endcan
                </ul>
            </div>
            @can('Categoria_Buscar')
                @include('common.searchbox')
            @endcan

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table display table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th style="color: #3b3f5c">Descripción</th>
                                <th class="text-center" style="color: #3b3f5c">Imagen</th>
                                <th class="text-center" style="color: #3b3f5c">Acción</th>
                            </tr>
                        </thead>

                        {{-- table anterior sin el data table --}}

                        {{-- <table class="table table-bordered table-borderless">
                            <thead class="text-white" style="background: #3b3f5c">
                                <tr>
                                    <th class="table-th text-white">Descripción</th>
                                    <th class="table-th text-white">Imagen</th>
                                    <th class="table-th text-white">Acción</th>
                                </tr>
                            </thead> --}}

                        {{-- end table sin el data table anterior --}}


                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <h6>{{ $category->name }}</h6>
                                    </td>
                                    <td class="text-center">
                                        @if ($category->image != null)
                                            <span><img src="{{ asset('storage/categories/' . $category->imagen) }}"
                                                    alt="imagen de ejemplo" height="70" width="80"
                                                    class="rounded"></span>
                                        @endif

                                        @if ($category->image == null or ($category->image = ''))
                                            <span><img src="{{ asset('storage/categories/noimg.jpg') }}"
                                                    alt="imagen de ejemplo" height="70" width="80"
                                                    class="rounded"></span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @can('Categoria_Actualizar')
                                            <a href="javascript:void(0)" wire:click="Edit({{ $category->id }})"
                                                class="btn btn-dark mtmobile" title="Edit">
                                                <i class="ri ri-edit-box-line"></i>
                                            </a>
                                        @endcan
                                        {{-- Cantidad de productos que tiene cada categoria
                                        El software no dejará eliminar categorías que tengan productos asociados --}}

                                        {{-- @if ($category->products->count() < 1) --}}
                                        @can('Categoria_Eliminar')
                                            <a href="javascript:void(0)"
                                                onclick="Confirm('{{ $category->id }}',
                                        '{{ $category->products->count() }}')"
                                                class="btn btn-dark" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        @endcan
                                        {{-- @endif --}}
                                        {{-- {{ $category->imagen }} --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Paginacion --}}
                    {{ $categories->links() }}
                    {{-- END Paginacion --}}
                </div>
            </div>

        </div>
    </div>
    @include('livewire.category.form')
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        window.livewire.on('category-added', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        })
        window.livewire.on('category-updated', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        })
        window.livewire.on('category-deleted', msg => {
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
        $('#theModal').on('hidden.bs.modal', function(e) {
            $('.er').css('display', 'none');
        })

    })

    function Confirm(id, products) {
        if (products > 0) {
            swal('No se puede eliminar esta categoría porque tiene productos asociados a esta, cantidad de productos: ',
                products)
            return;
        }
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
