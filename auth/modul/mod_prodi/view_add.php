<?php
    echo "
        <div class='col-sm-12'>
            <div class='panel panel-primary'>
                <div class='panel-heading'>
                    <H4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Add New Informasi Program Studi</H4>
                </div>
                <div class='panel-body'>
                    <form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&act=store'>
                        <div class='container-fluid'>
                            <div class='form-group'>
                                <label>Pilih Fakultas :</label>
                                <select name='fakultas' class='form-control' required>
                                    <option value='' selected disabled>-- Pilih fakultas --</option>
                                    ".$this->option_fakultas()."
                                </select>
                            </div>
                            <div class='form-group'>
                                <label>Nama Prodi :</label>
                                <input class='form-control' name='prodi' type='text' placeholder='Masukan nama program studi...' required>
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