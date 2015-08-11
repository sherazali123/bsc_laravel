jQuery.noConflict();

jQuery(document).ready(function(){

    // Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
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
      
    jQuery('#container-'+obj.id).highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: obj.title
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.AVERAGE:.1f}'+obj.columnValueSuffix+'</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.AVERAGE:.1f} '+obj.columnValueSuffix,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    },
                    connectorColor: 'silver'
                }
                ,
                size:130
            }
            ,
             series: {
                point: {
                    events: {
                        'click': function () {
                            if (this.series.data.length > 1) {
                                 location.href=this.link;
                            }
                        },
                        'mouseOver':function () {
                            if (this.series.data.length > 1) {
                              if(this.link==='#')
                              {
                                  this.series.name="Remaining percentage";
                              }
                            
                            }
                        }
                    }
                }
            }
        },
        series: [{
            name: obj.SeriesName,
            data: obj.columnData
        }]
    });
    });
});
