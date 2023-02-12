<script>
    let listener = new window.keypress.Listener();

    listener.simple_combo("f9", function() {
        console.log('f9');
        livewire.emit('saveSale')
    })

    listener.simple_combo("f8", function() {
        document.getElementById('cash').value = ''
        document.getElementById('cash').focus()
    })

    listener.simple_combo("f4", function() {
        let total = parseFloat(document.getElementById('hiddendTotal').value)
        if (total > 0) {
            Confirm(0, 'clearCart', '¿Seguro/a de eliminar el carrito?')
        } else {
            noty('Agrega productos a la venta')
        }
    })
</script>
