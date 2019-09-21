<?php
    echo "
        <div class='col-sm-12'>
            <div class='panel panel-primary'>
                <div class='panel-heading'>
                    <H4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Add Informasi Galeri Album Foto</H4>
                </div>
                <div class='panel-body'>
                    <form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&data={$this->url->data}&act=store'>
                        <div class='container-fluid'>
                            <div class='form-group'>
                                <label>Nama Album</label>
                                <input placeholder='Masukan nama album ...' class='form-control' name='nama' type='text' required>
                            </div>
                            <div class='form-group'>
                                <label>Thumbnail</label>
                                <input type='file' name='gambar' required>
                            </div>
                            <div class='alert alert-info'>
                                <strong>Info!</strong> *) Image size minimal 280 x 200px.
                            </div>
                        </div>

                        <input type='hidden' name='operation' value='insert'>
                        <button type='submit' class='btn btn-primary'>Publish</button>
                        <button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
                    </form>
                </div>
            </div>
        </div>
    ";