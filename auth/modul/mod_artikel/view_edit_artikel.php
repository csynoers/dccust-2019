<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <H4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Artikel</H4>
                    </div>
                    <div class='panel-body'>
                        <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <label for='judul'>Judul :</label>
                                    <input name='nama_artikel' type='text' value='{$value->nama_artikel}' class='form-control'>
                                </div>
                                <div class='form-group'>
                                    <label for='deskripsi'>Deskripsi :</label>
                                    <textarea name='isi_artikel' id='jogmce' class='form-control'>{$value->isi_artikel}</textarea>
                                </div>
                                <div class='form-group'>
                                    <label for='thumbnail'>Thumbnail :</label>
                                    <img class='img-responsive' src='../joimg/artikel/{$value->gambar}'>
                                </div>
                                <div class='form-group'>
                                    <label for='change_thumbnail'>Change Thumbnail :</label>
                                    <input type='file' name='gambar'>
                                </div>
                                <div class='form-group'>
                                    <div class='alert alert-info'>
                                        <strong>Info! </strong> File Type: *.jpg File Size: max-width: 1024 px.
                                    </div>
                                </div>
                            </div>

                            <input type='hidden' name='id_artikel' value='{$value->id_artikel}'>
                            <input type='hidden' name='operation' value='update'>
                            <button type='submit' class='btn btn-primary'>Update</button>
                            <button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }