<?php
    foreach ($rows as $key => $value) {
        echo "
            <div class='col-sm-12'>
                <div class='panel panel-primary'>
                    <div class='panel-heading'>
                        <H4><i class='fa fa-eye' aria-hidden='true'></i> Detail Informasi Pesan</H4>
                    </div>
                    <div class='panel-body'>
                        <div class='container-fluid'>
                            <div class='form-group'>
                                <label>Name</label>
                                <div class='alert alert-info'>
                                    {$value->nama}
                                </div>
                            </div>
        
                            <div class='form-group'>
                                <label>Email</label>
                                <div class='alert alert-info'>
                                    {$value->email}
                                </div>
                            </div>
        
                            <div class='form-group'>
                                <label>Phone</label>
                                <div class='alert alert-info'>
                                    {$value->phone}
                                </div>
                            </div>
        
                            <div class='form-group'>
                                <label>Message</label>
                                <div class='alert alert-info'>
                                    {$value->message}
                                </div>
                            </div>
        
                            <div class='form-group'>
                                <label>Date</label>
                                <div class='alert alert-info'>
                                    {$value->tanggal_mod}
                                </div>
                            </div>
                        </div>

                        <button type='button' class='btn btn-primary btn-lg btn-block' onclick='self.history.back()'>Back</button>
                    </div>
                </div>
            </div>
        ";
    }
