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
                        {{-- <table class="table datatable display table-hover" id="datatable"> --}}
                        <thead>
                            <tr>
                                <th style="color: #3b3f5c">ID</th>
                                <th class="text-center" style="color: #3b3f5c">Descripción</th>
                                <th class="text-center" style="color: #3b3f5c">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($permisos as $permiso)
                                <tr>
                                    <td>
                                        <h6>{{ $permiso->id }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $permiso->name }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" wire:click="Edit({{ $permiso->id }})"
                                            class="btn btn-dark mtmobile" title="Edit">
                                            <i class="ri ri-edit-box-line"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="Confirm('{{ $permiso->id }}')"
                                            class="btn btn-dark" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $permisos->links() }}
                </div>
            </div>

        </div>
    </div>
    @include('livewire.permisos.form')
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        window.livewire.on('permiso-added', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        })
        window.livewire.on('permiso-updated', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        })
        window.livewire.on('permiso-deleted', msg => {
            noty(msg)
        })
        window.livewire.on('permiso-exists', msg => {
            noty(msg)
        })
        window.livewire.on('permiso-error', msg => {
            noty(msg)
        })
        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide');
        })
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show');
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
                window.livewire.emit('destroy', id)
                swal.close()
            }
        })
    }
</script>
