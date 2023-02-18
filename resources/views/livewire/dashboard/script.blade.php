<script>
    document.addEventListener('livewire:load', function() {

        // ------------------------------------------------------//
        //                         TOP 7                         //
        // ------------------------------------------------------//
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
                height: 392,
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

        // ------------------------------------------------------//
        //                    VENTAS SEMANALES                   //
        // ------------------------------------------------------//

        let options2 = {
            series: [{
                name: 'Venta del día',
                data: [
                    parseFloat(@this.weekSales_Data[0]),
                    parseFloat(@this.weekSales_Data[1]),
                    parseFloat(@this.weekSales_Data[2]),
                    parseFloat(@this.weekSales_Data[3]),
                    parseFloat(@this.weekSales_Data[4]),
                    parseFloat(@this.weekSales_Data[5]),
                    parseFloat(@this.weekSales_Data[6]),
                ]
            }],
            chart: {
                height: 380,
                type: 'area'
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return '$' + parseFloat(val).toFixed(2)
                },
                offsetY: -5,
                style: {
                    fontSize: '12px',
                    color: ["#304758"]
                }
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        let chart2 = new ApexCharts(document.querySelector("#areaChart"), options2);
        chart2.render();

        // ------------------------------------------------------//
        //                    VENTAS MENSUALES                   //
        // ------------------------------------------------------//

        let options3 = {
            series: [{
                name: 'Ventas del mes',
                data: @this.salesByMonth_Data
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return "$" + parseFloat(val).toFixed(2);
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov",
                    "Dic"
                ],
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                        return "$" + parseFloat(val).toFixed(2);
                    }
                }

            },
            title: {
                text: totalSalesYear(),
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };

        let chart3 = new ApexCharts(document.querySelector("#chartMonth"), options3);
        chart3.render();

        function totalSalesYear() {
            let total = 0
            @this.salesByMonth_Data.forEach(item => {
                total += parseFloat(item)
            })
            return "Total: $" + total.toFixed(2)
        }


    })
</script>
