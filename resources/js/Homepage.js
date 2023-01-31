const chartHomeEnergy = document.getElementById('chartHomeEnergy');
const chartEnergyHome = Highcharts.chart(chartHomeEnergy, {
    chart: {
        zoomType: 'x'
    },
    title: {
        text: 'asds'
    },

    subtitle: {
        text: ''
    },

    yAxis: {
        title: {
            text: 'Energy Consumption Value / day'
        }
    },

    xAxis: {

        // type:'datetime',
        categories: [],
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },

    series: [{
        name: '',
        data: [],
    }, {
        name: '',
        data: [],
    }, {
        name: '',
        data: [],
    }, ],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
