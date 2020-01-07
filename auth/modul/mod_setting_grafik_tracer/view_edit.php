<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                        <div class='panel-heading bg-primary'>
                            <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Pengaturan Grafik Tracer</h4>
                        </div>
                        <!-- /.panel-heading -->

                        <div class='panel-body' style='height:50rem;overflow:auto'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <label for='judul'>Nama :</label>
                                    <input value='{$value->title}' type='text' name='title' placeholder='Masukan nama hasil tracer ...' required='' class='form-control'>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <label for='addEvent'>Pilih Detail Tracer :</label>
                                        <div class='alert alert-info fade in alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>×</a><strong> !!! IMPORTANT</strong><p>Jika memilih lebih dari satu pastikan jenis(Form Type) kategori tracer harus sama misal => Radio Button,number dll </p></div>
                                        <div class='form-group'>
                                            ".$this->checkbox_category( json_decode($value->options) )."
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class='panel-footer'>
                            <input type='hidden' name='id' value='{$value->id}'>
                            <input type='hidden' name='tahun' value='{$_GET['tahun']}'>
                            <input type='hidden' name='operation' value='update'>
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
    }
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