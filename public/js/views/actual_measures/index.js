jQuery.noConflict();

jQuery(document).ready(function(){


	// dynamic table
	if(jQuery('#index_1').length > 0) {
		jQuery('#index_1').dataTable({
			"sPaginationType": "full_numbers",
			"aaSortingFixed": [[0,'asc']],
			// "fnDrawCallback": function(oSettings) {
			// 	jQuery.uniform.update();
			// }
		});
	}


	// actual measure graph
	console.log(graphData);  
	 jQuery('#actualMeasureGraph').highcharts({
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
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value} ' + graphData.splineValueSuffix,
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            title: {
                text: graphData.splineName,
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            }
        }, { // Secondary yAxis
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
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: [{
            name: graphData.columnName,
            type: 'column',
            // yAxis: 1,
            data:  graphData.columnData,
            tooltip: {
                valueSuffix: graphData.columnValueSuffix
            }

        }, {
            name: graphData.splineName,
            type: 'spline',
            data: graphData.splineData,
            tooltip: {
                valueSuffix: graphData.splineValueSuffix
            }
        }]
    });



});
