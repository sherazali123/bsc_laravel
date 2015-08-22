jQuery.noConflict();

jQuery(document).ready(function() {
    jQuery('tr.obj_row a').on('click', function() {
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
            name: 'Per Objective',
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
            },
            point: {
                    events: {
                        'click': function () {
                            if (this.series.data.length > 1) {
                              
                                location.href=graphData.links[this.options.name];
                            }
                        }                        
                    }
                }
        }/*,
          {
            name: 'Total Objectives',
            type: 'line',
            data: graphData.Totaldata,
            tooltip: {
                valueSuffix:''
            }
        }*/
       ]
});
    }



});
