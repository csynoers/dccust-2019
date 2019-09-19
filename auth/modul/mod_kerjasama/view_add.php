<?php
    echo "
        <div class='col-sm-12'>
            <div class='panel panel-primary'>
                <div class='panel-heading'>
                    <H4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Add Informasi Kerjasama</H4>
                </div>
                <div class='panel-body'>
                    <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                        <div class='container-fluid'>
                            <div class='form-group'>
                                <label for='judul'>Judul :</label>
                                <input placeholder='Masukan Judul ...' name='nama_sajian_ina' type='text' value='' class='form-control' required>
                            </div>
                            <div class='form-group'>
                                <label for='change_thumbnail'>Thumbnail :</label>
                                <input type='file' name='gambar' required>
                            </div>
                            <div class='form-group'>
                                <div class='alert alert-info'>
                                    <strong>Info! </strong> File Type: *.jpg File Size: max-width:200 max-height:150px.
                                </div>
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