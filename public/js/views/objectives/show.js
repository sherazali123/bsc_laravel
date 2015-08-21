jQuery.noConflict();

jQuery(document).ready(function() {


    if(graphData.data.length > 0){
    jQuery("#graph1").css('height', '400px');
    jQuery('#graph1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: graphData.title
        },
        subtitle: {
            text: graphData.subtitle
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Percentage (%)'
            }
        },
        legend: {
            enabled: true
        },
        tooltip: {
            pointFormat: 'Percentage: <b>{point.y:.1f} %</b>'
        },
        series: [{
            name: 'Intiatives',
            data: graphData.data,
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
});
    }



});
