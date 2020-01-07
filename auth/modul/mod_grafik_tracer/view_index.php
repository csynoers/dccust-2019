<?php
    echo "
        <div class='col-sm-12'>
            <div class='panel panel-primary'>
                <div class='panel-heading'>
                    <h4><i class='fa fa-info-circle' aria-hidden='true'></i> Informasi Grafik Tracer ( {$_GET['title']} )</h4>
                </div>

                <div class='panel-body'>
                    <form>
                        <div class='input-group'>
                            <span class='input-group-addon'>Jenis Grafik</span>
                            <select class='form-control' id='selectChart'>
                                <option selected disabled> -- Pilih Jenis Grafik -- </option>
                                <option value='bar-chart'> Bar Chart </option>
                                <option value='column-chart'> Column Chart </option>
                                <option value='donut-chart'> Donut Chart </option>
                                <option value='pie-chart'> Pie Chart </option>
                                <option value='table'> Table </option>
                            </select>
                        </div>
                    </form>
                    <hr>
                    <div id='chartDiv'></div>
                </div>
            </div>
        </div>
        ";
?>
<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
<script type='text/javascript'>
    google.charts.load('current', {'packages':['bar','table','corechart']});
    google.charts.setOnLoadCallback(drawTable);
    (function(j){
        j('#selectChart').change(function(){
            j('#chartDiv').removeAttr('style');
            switch ( j(this).val() ) {
                case 'bar-chart':
                    google.charts.setOnLoadCallback(drawChartBar);
                    j('#chartDiv').css({
                        "width"     : "900px",
                        "height"    : "500px",
                        // "padding"   : "0% 22%"
                    });
                    break;
                case 'column-chart':
                    google.charts.setOnLoadCallback(drawChartColumn);
                    j('#chartDiv').css({
                        "width"     : "900px",
                        "height"    : "500px",
                        // "padding"   : "0% 22%"
                    });
                    break;
                case 'pie-chart':
                    google.charts.setOnLoadCallback(drawChartPie);
                    j('#chartDiv').css({
                        "width"     : "900px",
                        "height"    : "500px",
                        // "padding"   : "0% 22%"
                    });
                    break;
                case 'donut-chart':
                    google.charts.setOnLoadCallback(drawChartDonut);
                    j('#chartDiv').css({
                        "width"     : "900px",
                        "height"    : "500px",
                        // "padding"   : "0% 22%"
                    });
                    break;
                case 'table':
                    google.charts.setOnLoadCallback(drawTable);
                    break;
            
                default:
                    drawTable();
                    break;
            }
            console.log(j(this).val())
        });
    })(jQuery)

    function drawChartBar() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          ['2014', 1000],
          ['2015', 1170],
          ['2016', 660],
          ['2017', 1030]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal'
        };

        var chart = new google.charts.Bar(document.getElementById('chartDiv'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    function drawChartColumn() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('chartDiv'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'Salary');
        data.addColumn('boolean', 'Full Time Employee');
        data.addRows([
        ['Mike',  {v: 10000, f: '$10,000'}, true],
        ['Jim',   {v:8000,   f: '$8,000'},  false],
        ['Alice', {v: 12500, f: '$12,500'}, true],
        ['Bob',   {v: 7000,  f: '$7,000'},  true]
        ]);

        var table = new google.visualization.Table(document.getElementById('chartDiv'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
    }
    function drawChartPie() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
        chart.draw(data, options);
    }
    function drawChartDonut() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
        //   is3D: true,
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
        chart.draw(data, options);
      }
</script>