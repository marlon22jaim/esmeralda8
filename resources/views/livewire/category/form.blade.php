@include('common.modalHead')





<div class="row">
    <div class="col-sm-12">
        <div class="input-group">

            <input type="text" wire:model="name" class="form-control"
                placeholder="  {{ $name != null ? $name : 'Ej: categoria nueva' }}" />
            <span class="input-group-text input-gp">
                <i class="ri ri-edit-box-line"></i>
            </span>
        </div>
        @error('name')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-sm-12 mt-3">
        <div class="form-group custom-file">
            <input type="file" class="custom-file-input form-control" wire:model="image"
                accept="image/x-png, image/x-gif, image/x-jpg,image/x-jpeg">
            <label class="custom-file-label">Imágen {{ $image }}</label>
            @error('image')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>

@include('common.modalFooter')
