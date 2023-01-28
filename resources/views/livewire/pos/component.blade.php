<div>
    <style></style>
    <div class="row layout-top-spacing">

        <div class="col-sm-12 col-md-8">

            {{-- Detalles --}}
            @include('livewire.pos.partials.details')
        </div>

        <div class="col-sm-12 col-md-4">

            {{-- Total --}}
            @include('livewire.pos.partials.total')


            {{-- Denominaciones o coins --}}
            @include('livewire.pos.partials.coins')
        </div>
    </div>
</div>
<script src="{{ asset('js/keypress.js') }}"></script>
<script src="{{ asset('js/onscan.js') }}"></script>
@include('livewire.pos.scripts.shortcuts')
@include('livewire.pos.scripts.general')
@include('livewire.pos.scripts.scan')
@include('livewire.pos.scripts.events')
