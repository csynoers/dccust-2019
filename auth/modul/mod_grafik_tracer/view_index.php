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
                                <option value='bar_chart'> Bar Chart </option>
                                <option value='column_chart'> Column Chart </option>
                                <option value='donut_chart'> Donut Chart </option>
                                <option value='pie_chart'> Pie Chart </option>
                                <option value='table'> Table </option>
                            </select>
                        </div>
                    </form>
                    <hr>
                    <h3>Grafik respons TSUST</h3>
                    <hr>
                    <div id='chartDiv' data-form-type='{$tracer_study_form_type}'></div>
                    <hr>
                    <h3>Statik respons TSUST</h3>
                    <hr>
                    <table class='table table-striped table-bordered table-hover'>
                        <tbody>
                            <tr>
                                <td align='center'>Kriteria </td>
                                <td colspan='2' align='center'>Program Studi {$statikRespon->prodi}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Populasi Target </td>
                                <td colspan='2' align='center'>{$statikRespon->jumlah_populasi_target}</td>
                            </tr>
                            <tr>
                                <td>Undelivered</td>
                                <td align='center'>0</td>
                                <td align='center'>0%</td>
                            </tr>
                            <tr>
                                <td>Subjek</td>
                                <td align='center'>{$statikRespon->subjek}</td>
                                <td align='center'>100%</td>
                            </tr>
                            <tr>
                                <td>Responden</td>
                                <td align='center' colspan='2'>{$statikRespon->responden}</td>
                            </tr>
                            <tr>
                                <td>Grass Respone Rate</td>
                                <td align='center'>{$statikRespon->grass_respon_rate_text}</td>
                                <td align='center'>{$statikRespon->grass_respon_rate_value}%</td>
                            </tr>
                            <tr>
                                <td>Nett Respone Rate</td>
                                <td align='center'>$statikRespon->nett_respon_rate_text</td>
                                <td align='center'>{$statikRespon->nett_respon_rate_value}%</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h3>Informasi Pertanyaan TSUST</h3>
                    <hr>
                    <table class='table table-striped'>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Jenis (Form Type)</th>
                            <th>Keterangan Jawaban</th>
                        </tr>
                        </thead>
                        <tbody>{$rows_tr_pertanyaan}</tbody>
                    </table>
                </div>
            </div>
        </div>
        ";
?>
<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
<script type='text/javascript'>
    google.dataJSON = null;
    google.getMethod = {};
    google.charts.load('current', {'packages':['bar','table','corechart']});
    google.charts.setOnLoadCallback(drawTable);

    (function(j){
        j('#selectChart').change(function(){
            j('#chartDiv').removeAttr('style');
            switch ( j(this).val() ) {
                case 'bar_chart':
                    google.charts.setOnLoadCallback(drawChartBar);
                    j('#chartDiv').css({
                        "width"     : "900px",
                        "height"    : "500px",
                        // "padding"   : "0% 22%"
                    });
                    break;
                case 'column_chart':
                    google.charts.setOnLoadCallback(drawChartColumn);
                    j('#chartDiv').css({
                        "width"     : "900px",
                        "height"    : "500px",
                        // "padding"   : "0% 22%"
                    });
                    break;
                case 'pie_chart':
                    google.charts.setOnLoadCallback(drawChartPie);
                    j('#chartDiv').css({
                        "width"     : "900px",
                        "height"    : "500px",
                        // "padding"   : "0% 22%"
                    });
                    break;
                case 'donut_chart':
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
        setParamFromUrl();
        google.getMethod.cart = 'bar_chart';
        let json = getDataJSON(google.getMethod);
        console.log(json);

        var data = google.visualization.arrayToDataTable( json.rows );
        // var data = google.visualization.arrayToDataTable([
        //   ['Year', 'Sales'],
        //   ['2014', 1000],
        //   ['2015', 1170],
        //   ['2016', 660],
        //   ['2017', 1030]
        // ]);

        var options = {
          chart: {
            title: json.title,
            // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal'
        };

        var chart = new google.charts.Bar(document.getElementById('chartDiv'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    function drawChartColumn() {
        setParamFromUrl();
        google.getMethod.cart = 'column_chart';
        let json = getDataJSON(google.getMethod);

        var data = google.visualization.arrayToDataTable( json.rows );
        // var data = google.visualization.arrayToDataTable([
        //   ['Year', 'Sales', 'Expenses', 'Profit'],
        //   ['Mean', 1000, 400, 200],
        //   ['2014', 1000, 400, 200],
        //   ['2015', 1170, 460, 250],
        //   ['2016', 660, 1120, 300],
        //   ['2017', 1030, 540, 350]
        // ]);

        var options = {
          chart: {
            title: json.title,
            // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('chartDiv'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function drawTable() {
        setParamFromUrl();
        google.getMethod.cart = 'table';
        let json = getDataJSON(google.getMethod);

        let data = new google.visualization.DataTable();
        data.addColumn('string', 'Pertanyaan');
        data.addColumn('number', 'Mean');
        data.addRows( json );
        // data.addRows([
        //     ['Mike',  {v: 1, f: '1'}],
        //     ['Jim',   {v: 2, f: '2'}],
        //     ['Alice', {v: 3, f: '3'}],
        //     ['Bob',   {v: 4, f: '4'}]
        // ]);
        let table = new google.visualization.Table(document.getElementById('chartDiv'));
        
        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
    }
    function setParamFromUrl() {
        google.getMethod.module     = getFromUrl('module');
        google.getMethod.tahun      = getFromUrl('tahun');
        google.getMethod.title      = getFromUrl('title');
        google.getMethod.idProdi    = getFromUrl('prodi');
        google.getMethod.idSetting  = getFromUrl('id');
        google.getMethod.formType   = $('#chartDiv').data('form-type');
    }
    function drawChartPie() {
        setParamFromUrl();
        google.getMethod.cart = 'pie_chart';
        let json = getDataJSON(google.getMethod);

        console.log( json );
        var data = google.visualization.arrayToDataTable( json.rows );
        // var data = google.visualization.arrayToDataTable([
        //   ['Task', 'Hours per Day'],
        //   ['Work',     11],
        //   ['Eat',      2],
        //   ['Commute',  2],
        //   ['Watch TV', 2],
        //   ['Sleep',    7]
        // ]);

        var options = {
          title: json.title,
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
        chart.draw(data, options);
    }
    function drawChartDonut() {
        setParamFromUrl();
        google.getMethod.cart = 'donut_chart';
        let json = getDataJSON(google.getMethod);

        var data = google.visualization.arrayToDataTable( json.rows );
        // var data = google.visualization.arrayToDataTable([
        //   ['Task', 'Hours per Day'],
        //   ['Work',     11],
        //   ['Eat',      2],
        //   ['Commute',  2],
        //   ['Watch TV', 2],
        //   ['Sleep',    7]
        // ]);

        var options = {
          title: json.title ,
        //   is3D: true,
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
        chart.draw(data, options);
    }
    function getDataJSON( d ){
        // return $.ajax({type: "GET", url: "modul/mod_grafik_tracer/get_json.php", async: false, data: d }).responseText;
        return JSON.parse( $.ajax({type: "GET", url: "modul/mod_grafik_tracer/get_json.php", async: false, data: d }).responseText );
    }
    function getFromUrl(attr)
    {
        let url = new URL(location.href);
        let c = url.searchParams.get( attr );
        return c;
    }
</script>