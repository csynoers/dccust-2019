<?php
    /* START generate TR table body */
    $trBody = [];
    foreach ($rows as $key => $value) {
        $trBody[] = "
            <tr>
                <td>{$value->fakultas}</td>
                <td>{$value->respone_rate_text}</td>
            </tr>
        ";
    }
    $trBody = implode('',$trBody);
    /* END generate TR table body */

    echo '
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Respone Rate TSUST Tahun '.$_GET['tahun'].'</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th align="center">Fakultas</th>
                                <th align="center">TSUST Tahun '.$_GET['tahun'].'</th>
                            </tr>
                        </thead>
                        <tbody>
                            '.$trBody.'
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    ';