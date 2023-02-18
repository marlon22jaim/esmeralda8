<script>
    document.addEventListener('livewire:load', function() {


        let options = {
            series: [
                parseFloat(@this.top5Data[0]['total']),
                parseFloat(@this.top5Data[1]['total']),
                parseFloat(@this.top5Data[2]['total']),
                parseFloat(@this.top5Data[3]['total']),
                parseFloat(@this.top5Data[4]['total']),
                parseFloat(@this.top5Data[5]['total']),
                parseFloat(@this.top5Data[6]['total']),
            ],
            chart: {
                type: 'donut',
            },
            labels: [
                @this.top5Data[0]['product'],
                @this.top5Data[1]['product'],
                @this.top5Data[2]['product'],
                @this.top5Data[3]['product'],
                @this.top5Data[4]['product'],
                @this.top5Data[5]['product'],
                @this.top5Data[6]['product'],
            ],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        let chart = new ApexCharts(document.querySelector("#chartTop5"), options);
        chart.render();
    })
</script>
