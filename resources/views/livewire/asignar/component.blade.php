<div class="row sales layout-top spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }}</b>
                </h4>
            </div>
            <div class="widget-content">

                <div class="form-inline">
                    <div class="form-group mr-5">
                        <select wire:model="role" class="form-control">
                            <option value="Elegir" selected>Selecciona el Rol</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button wire:click.prevent="SyncAll()" type="button" class="btn btn-dark mbmobile inblock mr-5">
                        Sincronizar todos
                    </button>
                    <button onclick="Revocar()" type="button" class="btn btn-dark mbmobile inblock mr-5">
                        Revocar todos
                    </button>
                </div>



                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table datatable display table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th style="color: #3b3f5c">ID</th>
                                        <th class="text-center" style="color: #3b3f5c">Permiso</th>
                                        <th class="text-center" style="color: #3b3f5c">Roles con el permiso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permisos as $permiso)
                                        <tr>
                                            <td>
                                                <h6 class="text-center">{{ $permiso->id }}</h6>
                                            </td>
                                            <td class="text-center">

                                                <div class="n-check">
                                                    <label for=""
                                                        class="new-control new-checkbox checkbox-primary">
                                                        <input type="checkbox"
                                                            wire:change="SyncPermiso($('#p' +{{ $permiso->id }}).is(':checked'),'{{ $permiso->name }}')"
                                                            id="p{{ $permiso->id }}" value="{{ $permiso->id }}"
                                                            class="new-control-input"
                                                            {{ $permiso->checked == 1 ? 'checked' : '' }}>
                                                        <span class="new-control-indicator">
                                                            <h6>{{ $permiso->name }}</h6>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <h6>{{ \App\Models\User::permission($permiso->name)->count() }}</h6>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $permisos->link() }}
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        window.livewire.on('sync-error', msg => {
            noty(msg)
        })
        window.livewire.on('permi', msg => {
            noty(msg)
        })
        window.livewire.on('syncall', msg => {
            noty(msg)
        })
        window.livewire.on('removeall', msg => {
            noty(msg)
        })

    })



    function Revocar(id) {
        swal({
            title: 'CONFIRMAR',
            text: '¿Confirmas revocar todos los permisos?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3b3f5c'
        }).then(function(result) {
            if (result.value) {
                window.livewire.emit('revokeall')
                swal.close()
            }
        })
    }
</script>
