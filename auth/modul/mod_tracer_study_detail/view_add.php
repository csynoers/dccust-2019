<?php
    $option_kategori= '';
    $no= 1;
    foreach ($kategori as $key => $value) {
        $option_kategori .= "<option value='{$value->tracer_study_id}'>{$no}. {$value->tracer_study_title}</option>";
        $no++;
    }

echo "
    <div class='col-sm-12'>
        <div class='panel panel-primary'>
            <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                <div class='panel-heading bg-primary'>
                    <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Add New Informasi Detail Tracer Studi</h4>
                </div>
                <!-- /.panel-heading -->

                <div class='panel-body'>
                    <div class='container-fluid'>
                        <div class='form-group'>
                            <label for='judul'>Title :</label>
                            <textarea name='tracer_study_detail_title' class='form-control'></textarea>
                        </div>
                        <div class='form-group'>
                            <label for='deskripsi'>Kategori :</label>
                            <select name='tracer_study_id' class='form-control' required>
                                {$option_kategori};
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->

                <div class='panel-footer'>
                    <input type='hidden' name='operation' value='insert'>
                    <button type='submit' class='btn btn-primary'><i class='fa fa-floppy-o' aria-hidden='true'></i> Publish</button>
                    <button type='button' onclick='self.history.back()' class='btn btn-info'><i class='fa fa-backward' aria-hidden='true'></i> Back</button>
                </div>
                <!-- /.panel-footer -->
            </form>
            <!-- /form -->
        </div>
        <!-- /.panel panel-primary -->
    </div>
    <!-- /.col -->
";