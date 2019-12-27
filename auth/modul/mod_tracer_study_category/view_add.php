<?php
echo "
    <div class='col-sm-12'>
        <div class='panel panel-primary'>
            <form method='POST' enctype='multipart/form-data' action='?module={$this->module}&act=store&tahun={$_GET['tahun']}'>
                <div class='panel-heading bg-primary'>
                    <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Add New Informasi Kategori Tracer Studi Tahun {$_GET['tahun']}</h4>
                </div>
                <!-- /.panel-heading -->

                <div class='panel-body'>
                    <div class='container-fluid'>
                        <div class='form-group'>
                            <label for='sort'>Sort :</label>
                            <input type='number' step='any' name='tracer_study_sort' class='form-control' placeholder='Digunakan untuk mengurutkan bisa number(0-9) atau decimal ' required>
                        </div>
                        <div class='form-group'>
                            <label for='judul'>Title :</label>
                            <textarea name='tracer_study_title' required='' class='form-control myTextareaXXX'></textarea>
                        </div>
                        <div class='form-group'>
                            <label for='deskripsi'>Deskripsi <small>(optional)</small> :</label>
                            <textarea name='tracer_study_desc' class='form-control myTextareaXXX'></textarea>
                        </div>
                        <div class='form-group'>
                            <label for='tracerStudyFormType'>Form Type <small>(optional)</small> :</label>
                            <select name='tracer_study_form_type' class='form-control'>
                                <option value='none'> -- Please select one -- </option>
                                <option value='single_radio_button'> Radio button </option>
                                <option value='multiple_radio_button'> Multiple radio button </option>
                                <option value='checkbox'> Checkbox </option>
                                <option value='input_number'> Input number </option>
                            </select>
                        </div>

                    </div>
                </div>
                <!-- /.panel-body -->

                <div class='panel-footer'>
                    <input type='hidden' name='operation' value='insert'>
                    <input type='hidden' name='tracer_study_parent' value='{$this->parent}'>
                    <input type='hidden' name='tahun' value='{$_GET['tahun']}'>
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