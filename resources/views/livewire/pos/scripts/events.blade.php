<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.livewire.on('scan-ok', Msg => {
            noty(Msg)
        })
        window.livewire.on('scan-notfound', Msg => {
            noty(Msg, 2)
        })
        window.livewire.on('no-stock', Msg => {
            noty(Msg, 2)
        })
        window.livewire.on('sale-error', Msg => {
            noty(Msg)
        })
        window.livewire.on('sale-ok', Msg => {
            noty(Msg)
        })
        window.livewire.on('print-ticket2', Msg => {
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(Msg);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        })

        // window.livewire.on('print-ticket', saleId => {
        //     window.open("print://" + saleId, '_blank')
        // })
    })
</script>
