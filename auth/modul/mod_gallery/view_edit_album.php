<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <H4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Galeri Album Foto</H4>
                    </div>
                    <div class='panel-body'>
                        <form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&data={$this->url->data}&act=store'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <label for='judul'>Nama Album :</label>
                                    <input value='{$value->nama}' placeholder='Masukan nama album ...' name='nama' type='text' class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <label>Thumbnail</label>
                                    <div class='row'>
                                        <div class='col-sm-4'>
                                            <img class='img-responsive' src='../joimg/album/{$value->gambar}'>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>Ganti Thumbnail</label>
                                    <input type='file' name='gambar' >
                                </div>
                                <div class='alert alert-info'>
                                    <strong>Info!</strong> *) Image size minimal 280 x 200px.
                                </div>
                            </div>

                            <input type='hidden' name='id' value='{$value->id_album}'>
                            <input type='hidden' name='operation' value='update'>
                            <button type='submit' class='btn btn-primary'>Update</button>
                            <button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }