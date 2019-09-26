<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&act=store'>
                        <div class='panel-heading bg-primary'>
                            <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Slideshow</h4>
                        </div>
                        <!-- /.panel-heading -->

                        <div class='panel-body'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <label for='judul'>Judul :</label>
                                    <input value='{$value->judul_ina}' name='judul_ina' type='text' class='form-control' id='judul' placeholder='Masukan judul...' required>
                                </div>
                                <div class='form-group'>
                                    <label for='link'>Link :</label>
                                    <input value='{$value->link}' type='text' name='link' class='form-control' id='link' placeholder='Link Slideshow jika ada jika tidak cukup masukan tanda #' required>
                                </div>
                                <div class='form-group'>
                                    <label>Thumbnail :</label>
                                    <img class='img-responsive' src='{$this->config->img[$this->url->module]['dir']}{$value->gambar}'>
                                </div>
                                <div class='form-group'>
                                    <label>Change Thumbnail :</label>
                                    <input type='file' name='gambar'>
                                </div>
                                <div class='form-group'>
                                    <div class='alert alert-info'>
                                        <strong>Info!</strong> file type: .jpg file size: 1300x481 px.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class='panel-footer'>
                            <input type='hidden' name='id' value='{$value->id}'>
                            <input type='hidden' name='operation' value='update'>
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
    }