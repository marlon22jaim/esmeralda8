<div class="row sales layout-top spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <a href="javascript:void(0)" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#theModal" style="background: #3b3f5c">Agregar</a>
                    </li>
                </ul>
            </div>
            Buscar

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table datatable display table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th style="color: #3b3f5c">Descripción</th>
                                <th class="text-center" style="color: #3b3f5c">Imagen</th>
                                <th class="text-center" style="color: #3b3f5c">Acción</th>
                            </tr>
                        </thead>

                        {{-- table anterior --}}

                        {{-- <table class="table table-bordered table-borderless">
                            <thead class="text-white" style="background: #3b3f5c">
                                <tr>
                                    <th class="table-th text-white">Descripción</th>
                                    <th class="table-th text-white">Imagen</th>
                                    <th class="table-th text-white">Acción</th>
                                </tr>
                            </thead> --}}

                        {{-- end table anterior --}}


                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <h6>{{ $category->name }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <span><img src="{{ asset('storage/categories/' . $category->image) }}"
                                                alt="imagen de ejemplo" height="70" width="80"
                                                class="rounded"></span>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" wire:click="Edit({{ $category->id }})"
                                            class="btn btn-dark mtmobile" title="Edit">
                                            <i class="ri ri-edit-box-line"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="Confirm('{{ $category->id }}')"
                                            class="btn btn-dark" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    Paginación
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
