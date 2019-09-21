<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <H4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Galeri Video</H4>
                    </div>
                    <div class='panel-body'>
                        <form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&data={$this->url->data}&act=store'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <label for='judul'>Title :</label>
                                    <input value='{$value->judul}' placeholder='Masukan title ...' name='judul' type='text' class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <label>Link</label>
                                    <input value='{$value->video}' placeholder='www.youtube.com/embed/WlSTAYVTxkQ' name='video' class='form-control' type='text' required>
                                </div>
                                <div class='alert alert-info'>
                                    <strong>Info!</strong> *)Link harus mengunakan <b><i>www.youtube.com</i></b> (contoh : <b><i>www.youtube.com/embed/WlSTAYVTxkQ</i></b>)
                                </div>
                            </div>

                            <input type='hidden' name='id' value='{$value->id}'>
                            <input type='hidden' name='operation' value='update'>
                            <button type='submit' class='btn btn-primary'>Update</button>
                            <button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }