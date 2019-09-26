<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <form method='POST' enctype='multipart/form-data' action='?module={$this->url->module}&act=store'>
                        <div class='panel-heading bg-primary'>
                            <h4><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Change Password</h4>
                        </div>
                        <!-- /.panel-heading -->

                        <div class='panel-body'>
                            <div class='container-fluid'>
                                <div class='form-group'>
                                    <span id='message'></span>
                                </div>
                                <div class='form-group'>
                                    <label>New Password</label>
                                    <input id='password' placeholder='Masukan password..' class='form-control' name='password' type='password'>
                                </div>
                                <div class='form-group'>
                                    <label>Re-Password</label>
                                    <input id='confirm_password' placeholder='Ulangi password..' class='form-control' name='re_password' type='password'>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class='panel-footer'>
                            <input type='hidden' name='operation' value='update'>
                            <button type='submit' class='btn btn-primary'><i class='fa fa-floppy-o' aria-hidden='true'></i> Change</button>
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
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('OK').css('color', 'green');
        } else {
            $('#message').html('Password Tidak Sama').css('color', 'red');
        }
    })
})
</script>