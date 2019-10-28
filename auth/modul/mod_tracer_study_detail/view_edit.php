<?php
    foreach ($rows as $key => $value) {
        print_r(strip_tags(json_encode($value)));

        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                        <div class='panel-heading bg-primary'>
                            <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Detail Tracer Studi</h4>
                        </div>
                        <!-- /.panel-heading -->

                        <div class='panel-body'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <label for='judul'>Title :</label>
                                    <textarea name='tracer_study_detail_title' required='' class='form-control'>{$value->tracer_study_detail_title}</textarea>
                                </div>
                                <div class='form-group'>
                                    <label for='deskripsi'>Kategori :</label>
                                    <select name='tracer_study_id' class='form-control' required>
                                        ".$this->options_category($value->tracer_study_id)."
                                    </select>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-6'>
                                        <div class='form-group'>
                                            <label for='addInputType'>Add Input Type <small>(Optional)</small> :</label>
                                            <select name='method' class='form-control'>".$this->options_input_type($value->method)."</select>
                                        </div>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class='form-group'>
                                            <label for='addEvent'>Add Event <small>(Optional)</small> :</label>
                                            <select name='event' class='form-control'>".$this->options_add_events($value->event)."</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class='panel-footer'>
                            <input type='hidden' name='tracer_study_detail_id' value='{$value->tracer_study_detail_id}'>
                            <input type='hidden' name='operation' value='update'>
                            <button type='submit' class='btn btn-primary' style='margin-right:1rem'><i class='fa fa-floppy-o' aria-hidden='true'></i> Publish</button>
                            <button type='button' onclick='self.history.back()' class='btn btn-info'><i class='fa fa-backward' aria-hidden='true'></i> Back</button>
                        </div>
                        <!-- /.panel-footer -->
                    </form>
                    <!-- /form -->
                </div>
                <!-- /.panel panel-primary -->
            </div>
            <!-- /.col -->
        ";
    }