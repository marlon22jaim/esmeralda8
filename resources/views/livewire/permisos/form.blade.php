<div wire:ignore.self class="modal fade" tabindex="-1" id="theModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">
                    <b>{{ $componentName }}</b> | {{ $selected_id > 0 ? 'Editar' : 'Crear' }}
                </h5>
                <h6 class="text-center text-warning" wire:loading>Por favor espere</h6>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">

                            <input type="text" wire:model="permissionName" class="form-control"
                                placeholder='Ej: categoria_index' maxlength="255" />
                            <span class="input-group-text input-gp">
                                <i class="ri ri-edit-box-line"></i>
                            </span>
                        </div>
                        @error('permissionName')
                            <span class="text-danger er">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="resetUI()" class="btn btn-dark close-btn text-info"
                    data-dismiss="modal">Cerrar</button>

                @if ($selected_id < 1)
                    <button type="button" wire:click.prevent="CreatePermission()"
                        class="btn btn-dark close-modal">Guardar</button>
                @else
                    <button type="button" wire:click.prevent="UpdatePermission()"
                        class="btn btn-dark close-modal">Actualizar</button>
                @endif
            </div>
        </div>
    </div>
</div>
