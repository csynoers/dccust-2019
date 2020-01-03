<?php

    $option_kategori= '';
    foreach ($kategori as $key => $value) {
        $option_kategori .= "<option value='{$value->tracer_study_id}'>{$value->tracer_study_title}</option>";
    }

echo "
    <div class='col-sm-12'>
        <div class='panel panel-primary'>
            <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store&tahun={$_GET['tahun']}'>
                <div class='panel-heading bg-primary'>
                    <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Tambah Pengaturan Hasil Tracer</h4>
                </div>
                <!-- /.panel-heading -->

                <div class='panel-body' style='height:50rem;overflow:auto'>
                    <div class='container-fluid'>
                        <div class='form-group'>
                            <label for='judul'>Nama :</label>
                            <input type='text' name='title' placeholder='Masukan nama hasil tracer ...' required='' class='form-control'>
                        </div>
                        <div class='row'>
                            <div id='targetEvent' class='col-sm-12'>
                                <label for='addEvent'>Pilih Kategori Tracer :</label>
                                <div class='form-group'>
                                    ".$this->checkbox_category()."
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->

                <div class='panel-footer'>
                    <input type='hidden' name='operation' value='insert'>
                    <input type='hidden' name='tahun' value='{$_GET['tahun']}'>
                    <button type='submit' class='btn btn-primary' style='margin-right:1rem'><i class='fa fa-floppy-o' aria-hidden='true'></i> Publish</button>
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
?>
<script>
    $(document).ready(function(){
        $('form').submit(function(){
            if ( ! $('form').find('[type=checkbox]').is(':checked') ) {
                alert('maaf anda belum memilih salah satu kategori')
                return false;
            }
        })
    });
</script>