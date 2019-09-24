<!-- load data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-primary">
        <nav class="navbar navbar-default" style="margin-bottom: 0px">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Daftar Informasi Pesan Masuk</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?module=<?php echo $this->url->module ?>&data=header&act=edit&id=16"><button type="button" class="btn btn-primary"> Update Header</button></a></li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar .navbar-default -->

        <div class="panel-body">
            <table class="display" cellspacing="0" width="100%">
				<thead> 
					<tr>  
						<th>No</th> 
	    				<th>Date</th> 
	    				<th>Name</th> 
	    				<th>Email</th> 
	    				<th>Read</th> 
	    				<th>Aksi</th> 
					</tr> 
				</thead> 

                <tbody>
                    <?php
                        $no=1;
                        foreach ($rows as $key => $value) {
                            echo "
                                <tr>
                                    <td>{$no}</td>
                                    <td>{$value->tanggal_mod}</td>
                                    <td>{$value->nama_mod}</td>
                                    <td>{$value->email}</td>
                                    <td>{$value->dibaca_mod}</td>
                                    <td>
                                        <a href='?module={$this->url->module}&act=edit&id={$value->id}'>
                                            <i class='fa fa-eye-slash' aria-hidden='true' title='View this message'></i>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href='?module={$this->url->module}&act=delete&id={$value->id}' onclick=\"return confirm('Apakah anda yakin menghapus data ini?')\">
                                        <i class='fa fa-trash' aria-hidden='true' title='Delete this message'></i>
                                        </a>
                                    </td>
                                </tr>
                            ";
                            $no++;
                        }
                    ?>
                </tbody>

                <tfoot>
                    <tr>
						<th>No</th> 
	    				<th>Date</th> 
	    				<th>Name</th> 
	    				<th>Email</th> 
	    				<th>Read</th> 
	    				<th>Aksi</th> 
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel .panel-primary -->
</div>
<!-- /.col -->

<script>
    $(document).ready(function() {
        $('table').DataTable()
    })
</script>