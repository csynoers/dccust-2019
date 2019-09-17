<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <h4>Edit profile</h4>
                    </div>

                    <div class='panel-body'>
                        <header><h3></h3></header>
                        <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                            <div class='form-group'>
                                <label for='judul'>Judul :</label>
                                <input name='nama_profile_ina' type='text' value='{$value->nama_profile_ina}' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for='deskripsi'>Deskripsi Profile :</label>
                                <textarea name='isi_profile_ina' class='form-control'>{$value->isi_profile_ina}</textarea>
                            </div>
                            <div class='form-group'>
                                <label for='visi'>Visi :</label>
                                <textarea name='visi_profile_ina' class='form-control'>{$value->visi_profile_ina}</textarea>
                            </div>
                            <div class='form-group'>
                                <label for='misi'>Misi :</label>
                                <textarea name='misi_profile_ina' class='form-control'>{$value->misi_profile_ina}</textarea>
                            </div>
                            <div class='form-group'>
                                <label for='thumbnail'>Thumbnail :</label>
                                <img class='img-responsive' src='../joimg/profile/{$value->gambar}'>
                            </div>
                            <div class='form-group'>
                                <label for='change_thumbnail'>Change Thumbnail :</label>
                                <input type='file' name='gambar'>
                            </div>
                            <div class='alert alert-info'>
                                <strong>Info!</strong> File Type: .jpg File Size: 1300x481 px.
                            </div>
                            <input type='hidden' name='id_profile' value='{$value->id_profile}'>
                            <input type='hidden' name='operation' value='update'>
                            <button type='submit' class='btn btn-primary'>Update</button>
                            <button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
                        </form>
                    </div>

                </div>
                
            </div>
        ";
    }