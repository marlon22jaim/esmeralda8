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
