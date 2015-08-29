jQuery.noConflict();

jQuery(document).ready(function() {

    // Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    });

    // Build the chart
    jQuery.each(graphData, function(idx, obj) {
        jQuery('#container-' + obj.id).highcharts({
            chart: {
                polar: true,
                type: 'line'
            },
            title: {
                text: obj.title,
                x: 0,
                style: {
                    fontSize: "15px"
                }

            },
            pane: {
                size: '100%'
            },
            xAxis: {
                categories:obj.categories,
                labels: {
                    formatter: function() {
                        return '<a href="' + obj.categoryLinks[this.value] + '">' + this.value + '</a>';
                    }
                },
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                tickInterval: 20,
                min: 0,
                max: 100
            },
            tooltip: {
                shared: true,
                pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}%</b><br/>'
            },
            legend: {
                align: 'right',
                verticalAlign: 'top',
                y: 70,
                layout: 'vertical'
            },
            series: [{
                    name: 'Target',
                    data: obj.Target,
                    pointPlacement: 'on'
                }, {
                    name: 'Actual',
                    data: obj.Actual,
                    pointPlacement: 'on'
                }]

        });
        
        /*start second*/
      
    jQuery('#container-sec-'+ obj.id).highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Average score of each dimension'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category',
            categories:obj.categoriesSecond
        },
        yAxis: {
            title: {
                text: ''
            },
            tickInterval: 10,
                min: 0,
                max: 100,
            labels: {
                formatter: function () {
                    return this.value + '%';
                }
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '',
            pointFormat: '<span style="color:{point.color}"><b>{point.y:.1f}%</b><br/>'
        },

        series: [{
            name: "plan",
            colorByPoint: true,
            data: obj.ActualSecond
        }]
    });
        /* end second graphs*/
    });
    
});

