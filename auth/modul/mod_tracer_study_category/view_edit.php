<?php
    function options_form_type($selectedvalue)
    {
        $rows= [
            'none'=> '-- Please select one --',
            'single_radio_button'=> 'Radio button',
            'multiple_radio_button'=> 'Multiple radio button',
            'checkbox'=> 'Checkbox',
            'input_number'=> 'Input number'
        ];
        $options = '';
        foreach ($rows as $key => $value) {
            $active_selected= ($key==$selectedvalue) ? 'selected' : NULL ;
            $options .= "<option value='{$key}' {$active_selected}> {$value} </option>";
        }
        return $options;
    }

    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store'>
                        <div class='panel-heading bg-primary'>
                            <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Informasi Kategori Tracer Studi Tahun {$value->tracer_study_date}</h4>
                        </div>
                        <!-- /.panel-heading -->

                        <div class='panel-body'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <label for='sort'>Sort :</label>
                                    <input type='number' step='any' value='{$value->tracer_study_sort}' name='tracer_study_sort' class='form-control' placeholder='Digunakan untuk mengurutkan bisa number(0-9) atau decimal' required>
                                </div>
                                <div class='form-group'>
                                    <label for='judul'>Title :</label>
                                    <textarea name='tracer_study_title' required='' class='form-control myTextareaXXX'>{$value->tracer_study_title}</textarea>
                                </div>
                                <div class='form-group'>
                                    <label for='deskripsi'>Deskripsi <small>(optional)</small> :</label>
                                    <textarea name='tracer_study_desc' class='form-control myTextareaXXX'>{$value->tracer_study_desc}</textarea>
                                </div>
                                <div class='form-group'>
                                    <label for='tracerStudyFormType'>Form Type <small>(optional)</small> :</label>
                                    <select name='tracer_study_form_type' class='form-control'>
                                        ".options_form_type($value->tracer_study_form_type)."
                                    </select>
                                </div>

                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class='panel-footer'>
                            <input type='hidden' name='tracer_study_id' value='{$value->tracer_study_id}'>
                            <input type='hidden' name='tracer_study_parent' value='{$this->parent}'>
                            <input type='hidden' name='operation' value='update'>
                            <button style='margin-right:1rem' type='submit' class='btn btn-primary'><i class='fa fa-floppy-o' aria-hidden='true'></i> Publish</button>
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