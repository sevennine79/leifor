$(function () {
            $('#dcontainer').highcharts({
                data: {
                    table: 'datatable1'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: '羽曦本日销售额图表'
                },
                subtitle: {
                        text: '2017年5月9日销售额图表'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: '单位k',
                        rotation: 0
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' k ' + this.point.name.toLowerCase();
                    }
                }
            });
            //日

            $('#wcontainer').highcharts({
                data: {
                    table: 'datatable2'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: '羽曦本周销售额图表'
                },
                subtitle: {
                        text: '2017年5月1日~2017年5月7日'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: '单位k',
                        rotation: 0
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' k ' + this.point.name.toLowerCase();
                    }
                }
            });
            //周

            $('#mcontainer').highcharts({
                data: {
                    table: 'datatable3'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: '羽曦月销售额图表'
                },
                subtitle: {
                        text: '2017年月销售额图表'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: '单位k',
                        rotation: 0
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' k ' + this.point.name.toLowerCase();
                    }
                }
            });
            //月

            $('#scontainer').highcharts({
                data: {
                    table: 'datatable4'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: '羽曦季销售额图表'
                },
                subtitle: {
                        text: '2017年季销售额图表'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: '单位k',
                        rotation: 0
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' k ' + this.point.name.toLowerCase();
                    }
                }
            });
            //季

            $('#ycontainer').highcharts({
                data: {
                    table: 'datatable5'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: '羽曦年销售额图表'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: '单位k',
                        rotation: 0
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' k ' + this.point.name.toLowerCase();
                    }
                }
            });
            //年

            $('#fwcontainer').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: '2017年平台访问途径'
                },
                tooltip: {
                    headerFormat: '{series.name}<br>',
                    pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: '平台访问途径量占比',
                    data: [
                        ['PC端',   45.0],
                        ['移动端',       26.8],
                        ['微信端',       26.8]
                    ]
                }]
            });
             //访问途径
});
       