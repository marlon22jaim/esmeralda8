<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('.tblscroll').niceScroll({
            cursorcolor: "#515365",
            cursorwidth: "30px",
            background: "rgba(20,20,20,0.3)",
            cursorborder: "0px",
            cursorborderradius: 3
        })

        $('#modalSearchProduct').on('shown.bs.modal', function() {
            $('#modal-search-input').focus()
        })
    })

    function Confirm(id, eventName, text) {

        swal({
            title: 'CONFIRMAR',
            text: text,
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3b3f5c'
        }).then(function(result) {
            if (result.value) {
                window.livewire.emit(eventName, id)
                swal.close()
            }
        })
    }
</script>
