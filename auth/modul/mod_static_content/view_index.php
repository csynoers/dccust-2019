<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit {$value->nama_modul_ina}</h4>
                    </div>
                    <div class='panel-body'>
                        <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                            <div class='form-group'>
                                <label>Judul</label>
                                <input class='form-control' name='nama_modul_ina' type='text' value='{$value->nama_modul_ina}'>
                            </div>
                            <div class='form-group'>
                                <label>Deskripsi</label>
                                <textarea name='static_content_ina' id='jogmce' rows='12'>{$value->static_content_ina}</textarea>
                            </div>
                            ".($_GET['id']=='7' 
                                ? "
                                    <div class='form-group'>
                                        <label>Google Map Iframe</label>
                                        <input class='form-control' name='extra' value='{$value->extra}' style='height:100px;width:100%;'>
                                    </div>
                                " : NULL )."

                            <div class='form-group'>
                                <label>Thumbnail</label>
                                <img class='img-responsive' src='../joimg/statik/{$value->gambar}'>
                            </div>

                            <div class='form-group'>
                                <label>Ganti Thumbnail</label>
                                <input type='file' name='gambar' size=40> 
                            </div>
                            <div class='alert alert-info'>
                                <strong>Info!</strong> File Type: .jpg File Size: 1300x481 px.
                            </div>
                            <input type='hidden' name='id_modul' value='{$value->id_modul}'>
                            <input type='hidden' name='operation' value='update'>
                            <button type='submit' class='btn btn-primary'>Publish</button>

                        </form>
                        
                    </div>
                </div>
            </div>
        ";
    }