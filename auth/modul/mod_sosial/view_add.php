<?php
echo "
    <div class='col-sm-12'>
        <div class='panel panel-primary'>
            <form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&act=store'>
                <div class='panel-heading bg-primary'>
                    <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Add New Informasi Sosial Media</h4>
                </div>
                <!-- /.panel-heading -->

                <div class='panel-body'>
                    <div class='container-fluid'>
                        <div class='form-group'>
                            <label for='judul'>Judul :</label>
                            <input name='nama' type='text' class='form-control' id='judul' placeholder='Judul Slideshow' required>
                        </div>
                        <div class='form-group'>
                            <label for='link'>Link :</label>
                            <input type='text' name='link' class='form-control' id='link' placeholder='Link sosial media jika ada jika tidak cukup masukan tanda #' required>
                        </div>
                        <div class='form-group'>
                            <label>Thumbnail :</label>
                            <input type='file' name='gambar' required>
                        </div>
                        <div class='form-group'>					
                            <div class='alert alert-info'>
                                <strong>Info!</strong> File Type: *.png File Size: max-width: 128 px.
                            </div>
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