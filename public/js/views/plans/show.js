jQuery.noConflict();

jQuery(document).ready(function() {
 jQuery('tr.obj_row a').on('click', function() {
        if (jQuery(this).hasClass('active'))
        {
            jQuery('tr.ini_row.obj-' + jQuery(this).attr('rel')+' a').html('+');
            jQuery('tr.obj-' + jQuery(this).attr('rel')).hide();
            jQuery(this).html('+');
            jQuery(this).removeClass('active');
        }
        else {
            jQuery('tr.ini_row.obj-' + jQuery(this).attr('rel')).show();
            jQuery(this).html('-');
            jQuery(this).addClass('active');
        }
    });

    jQuery('tr.ini_row a').on('click', function() {
        if (jQuery(this).hasClass('active'))
        {
            jQuery('tr.' + jQuery(this).attr('rel')).hide();
            jQuery(this).html('+');
            jQuery(this).removeClass('active');
        }
        else {
            jQuery('tr.' + jQuery(this).attr('rel')).show();
            jQuery(this).html('-');
            jQuery(this).addClass('active');
        }
    });
    if(graphData){
    jQuery("#graph1").css('height', '400px');
    jQuery('#graph1').highcharts({
         chart: {
            zoomType: 'xy'
        },
        title: {
            text: graphData.title
        },
        subtitle: {
            text: graphData.subtitle
        },
        xAxis: [{
                categories: monthCategories,
                crosshair: true
            }],
        yAxis: [ {// Secondary yAxis
                title: {
                    text: graphData.columnName,
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    format: '{value} ' + graphData.columnValueSuffix,
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                opposite: true
            }],
        tooltip: {
            shared: true
        },
        /*legend: {
         layout: 'vertical',
         align: 'left',
         x: 120,
         verticalAlign: 'top',
         y: 100,
         floating: true,
         backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
         },*/
        series: [{
                name: graphData.columnName,
                type: 'spline',
                // yAxis: 1,
                data: graphData.columnData,
                tooltip: {
                    valueSuffix: graphData.columnValueSuffix
                }

            }, {
                name: graphData.splineName,
                type: 'column',
                data: graphData.splineData,
                tooltip: {
                    valueSuffix: graphData.splineValueSuffix
                }
            }]
      });
    }
});