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
        /*speedometer*/
        var len=obj.categoriesSecond.length;
        var i=len-1;
       
        for(i; i>=0; i--)
        {
            
       
            jQuery('#container-sec-'+ obj.id).after('<div id="container-sp-'+ obj.id+'-'+i+'" style="padding-left: 60px;float:left;margin: 0 auto;width:220px;"></div>');
            
        jQuery('#container-sp-'+obj.id+'-'+i).highcharts({

        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },

        title: {
            text: obj.categoriesSecond[i]
        },

        pane: {
          
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 100,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: '%'
            },
            plotBands: [{
                from: 0,
                to: 50,
                color: '#DF5353' // red 
            }, {
                from: 51,
                to: 80,
                color: '#FF9900' // oragne yellow
            }, {
                from: 81,
                to: 100,
                color: '#55BF3B' // green
            }]
        },

        series: [{
            name: obj.categoriesSecond[i],
            data: [obj.ActualSecond[i]],
            tooltip: {
                valueSuffix: ' %'
            }
        }]

    },
        // Add some life
        function (chart) {
            if (!chart.renderer.forExport) {
               
            }
        });
    }
        /*speedometer*/
        
    });
    
});

