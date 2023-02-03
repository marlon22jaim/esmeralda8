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
                                <th style="color: #3b3f5c">Usuario</th>
                                <th class="text-center" style="color: #3b3f5c">Teléfono</th>
                                <th class="text-center" style="color: #3b3f5c">Email</th>
                                <th class="text-center" style="color: #3b3f5c">Perfíl</th>
                                <th class="text-center" style="color: #3b3f5c">Estado</th>
                                <th class="text-center" style="color: #3b3f5c">Imágen</th>
                                <th class="text-center" style="color: #3b3f5c">Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $r)
                                <tr>
                                    <td>
                                        <h6>{{ $r->name }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $r->phone }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $r->email }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <h6>{{ $r->profile }}</h6>
                                    </td>

                                    <td class="text-center">
                                        <span
                                            class="badge {{ $r->status == 'Active' ? 'badge-success' : 'badge-danger' }} text-uppercase">{{ $r->status }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if ($r->image != null)
                                            <img src="{{ asset('storage/users/' . $r->image) }}" alt="imagen"
                                                class="card-img-top img-fluid" style="height: 120px; width: 100px">
                                        @endif
                                        @if ($r->image == null or ($r->image = ''))
                                            <img src="{{ asset('storage/users/noimg.jpg') }}" alt="imagen"
                                                class="card-img-top img-fluid" style="height: 60px; width: 70px">
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" wire:click="edit({{ $r->id }})"
                                            class="btn btn-dark mtmobile" title="Edit">
                                            <i class="ri ri-edit-box-line"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="Confirm('{{ $r->id }}')"
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
    @include('livewire.users.form')
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        window.livewire.on('user-added', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        })
        window.livewire.on('user-updated', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        })
        window.livewire.on('user-deleted', msg => {
            noty(msg)
        })
        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide');
        })
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show');
        })
        window.livewire.on('user-withsales', msg => {
            noty(msg)
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
