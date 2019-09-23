<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <H4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Fakultas</H4>
                    </div>
                    <div class='panel-body'>
                        <form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&act=store'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <label for='judul'>Nama Fakultas :</label>
                                    <input value='{$value->fakultas}' placeholder='Masukan nama fakultas ...' name='fakultas' type='text' class='form-control' required>
                                </div>
                            </div>

                            <input type='hidden' name='id' value='{$value->id_fakultas}'>
                            <input type='hidden' name='operation' value='update'>
                            <button type='submit' class='btn btn-primary'>Update</button>
                            <button type='button' class='btn btn-primary' onclick='self.history.back()'>Back</button>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }