<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Sambutan</h4>
                    </div>

                    <div class='panel-body'>
                        <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                            <div class='form-group'>
                                <textarea class='form-control' name='static_content_ina' rows='13'>{$value->static_content_ina}</textarea>
                            </div>
                            <div class='form-group'>
                                <input type='hidden' name='id_modul' value='{$value->id_modul}'>
                                <input type='hidden' name='operation' value='update'>
                                <button type='submit' class='btn btn-primary'>Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ";
    }