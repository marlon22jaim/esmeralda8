<div class="search-bar">
    <form class="search-form d-flex align-items-center" role="search">
        <input id="codebar" type="text" wire:keydown.enter.prevent="$emit('scan-code', $('#codebar').val())"
            title="Escribe lo que buscas" />
        <button title="Buscar">
            <i class="bi bi-search"></i>
        </button>
    </form>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        livewire.on('scan-code', action => {
            $('#codebar').val('')
        })
    })
</script>
