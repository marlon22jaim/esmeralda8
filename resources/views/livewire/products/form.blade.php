@include('common.modalHead')


<div class="row">
    <div class="col-sm-12 col-md-8">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" wire:model="name" class="form-control" placeholder="ej: cuadernos">
            @error('name')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-4">

        <div class="form-group">
            <label>Código Barras</label>
            <input type="text" wire:model="barcode" class="form-control" placeholder="ej: 1001290">
            @error('barcode')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-4">

        <div class="form-group">
            <label>Costo</label>
            <input type="text" data-type='currency' wire:model="cost" class="form-control" placeholder="ej: 0.00">
            @error('cost')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-4">

        <div class="form-group">
            <label>Precio</label>
            <input type="text" data-type='currency' wire:model="price" class="form-control" placeholder="ej: 0.00">
            @error('price')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">

        <div class="form-group">
            <label>Existencias</label>
            <input type="number" wire:model="stock" class="form-control" placeholder="ej: 1">
            @error('stock')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">

        <div class="form-group">
            <label>Existencia Minima</label>
            <input type="number" wire:model="alerts" class="form-control" placeholder="ej: 10">
            @error('alerts')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Categoría</label>
            <select wire:model='categoryid' class="form-select">
                <option value="Elegir" disabled>Elegir</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categoryid')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-8">
        <div class=" custom-file input-group">
            <input type="file" class="custom-file-input form-control" wire:model="image"
                accept="image/x-png, image/x-gif, image/x-jpg,image/x-jpeg">
            <label class="input-group-text input-gp">Imagen {{ $image }}</label>
            @error('image')
                <span class="text-danger er">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>



@include('common.modalFooter')
