<?php
    echo "
        <div class='col-sm-12'>
            <div class='panel panel-primary'>
                <div class='panel-heading'>
                    <H4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Add Informasi Galeri Video</H4>
                </div>
                <div class='panel-body'>
                    <form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&data={$this->url->data}&act=store'>
                        <div class='container-fluid'>
                            <div class='form-group'>
                                <label for='judul'>Title :</label>
                                <input placeholder='Masukan title ...' name='judul' type='text' value='' class='form-control' required>
                            </div>
                            <div class='form-group'>
                                <label>Link</label>
                                <input placeholder='www.youtube.com/embed/WlSTAYVTxkQ' class='form-control' name='video' type='text' required>
                            </div>
                            <div class='alert alert-info'>
                                <strong>Info!</strong> *)Link harus mengunakan <b><i>www.youtube.com</i></b> (contoh : <b><i>www.youtube.com/embed/WlSTAYVTxkQ</i></b>)
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