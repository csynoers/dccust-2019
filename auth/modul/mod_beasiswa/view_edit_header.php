<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Header Beasiswa</h4>
                    </div>
                    <div class='panel-body'>
                        <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store_header'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <label for='judul'>Judul</label>
                                    <input class='form-control' name='nama_header_ina' type='text' value='{$value->nama_header_ina}'>
                                </div>
                                <div class='form-group'>
                                    <label for='deskripsi'>Deskripsi :</label>
                                    <textarea name='isi_header_ina' id='jogmce' class='form-control'>{$value->isi_header_ina}</textarea>
                                </div>
                                <div class='form-group'>
                                    <label for='thumbnail'>Thumbnail :</label>
                                    <img src='../joimg/header_image/{$value->gambar}' class='img-responsive'>
                                </div>
                                <div class='form-group'>
                                    <label for='change_thumbnail'>Change Thumbnail :</label>
                                    <input type='file' name='gambar'>
                                </div>
                                <div class='form-group'>
                                    <div class='alert alert-info'>
                                        <strong>Info! </strong>File Type: *.jpg File Size: 1300x481 px.
                                    </div>
                                </div>
                                
                            </div>

                            <input type='hidden' name='id_header' value='{$value->id_header}'>
                            <button type='submit' class='btn btn-primary'>Update</button>
                            <button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }