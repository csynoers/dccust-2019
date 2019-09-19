<!-- load data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default">
						<nav class="navbar navbar-default" style="margin-bottom: 0px">
							<div class="container-fluid">
								<div class="navbar-header">
									<a class="navbar-brand" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Jenis Lowongan</a>
								</div>
								<ul class="nav navbar-nav navbar-right">
                                    <li><a href="?module=<?php echo $this->module ?>&act=add"><button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a></li>
								</ul>
							</div>
						</nav>

						<div class="panel-body">
							<table class='display' id='example1'> 
								<thead> 
									<tr>  
					    				<th>No</th> 
					    				<th>Description</th>  
					    				<th>Action</th> 
									</tr> 
								</thead> 
								
								<tbody>
								<?php
                                    $no=1;
                                    foreach ($rows['jenis_lowongan'] as $key => $value) {
                                        echo "
                                            <tr>
                                                <td>{$no}</td>
                                                <td>{$value->name}</td>
                                                <td>
                                                    <a href='?module={$this->module}&act=edit&id={$value->id}'>
                                                        <input type='image' src='images/icn_edit.png' title='Edit'>
                                                    </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href='?module={$this->module}&act=delete&id={$value->id}' onclick=\"return confirm('Apakah anda yakin menghapus data ini?')\">
                                                        <input type='image' src='images/icn_trash.png' title='Trash'>
                                                    </a>
                                                </td>
                                            </tr>
                                        ";
                                        $no++;
                                    }
								?>		
								</tbody> 
							</table>
						</div>

					</div>
				</div>

				<div class="col-sm-6">
					<div class="panel panel-default">
						<nav class="navbar navbar-default" style="margin-bottom: 0px">
							<div class="container-fluid">
								<div class="navbar-header">
									<a class="navbar-brand" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Spesialisasi pekerjaan</a>
								</div>
								<ul class="nav navbar-nav navbar-right">
                                    <li><a href="?module=<?php echo $this->module ?>&act=add"><button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a></li>
								</ul>
							</div>
						</nav>

						<div class="panel-body">
							<table class='display' id='example1'> 
								<thead> 
									<tr>  
					    				<th>No</th> 
					    				<th>Description</th>  
					    				<th>Action</th> 
									</tr> 
								</thead> 
								
								<tbody>
								<?php
                                    $no=1;
                                    foreach ($rows['spesialisasi_pekerjaan'] as $key => $value) {
                                        echo "
                                            <tr>
                                                <td>{$no}</td>
                                                <td>{$value->nama_spes}</td>
                                                <td>
                                                    <a href='?module={$this->module}&act=edit&id={$value->id_spes}'>
                                                        <input type='image' src='images/icn_edit.png' title='Edit'>
                                                    </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href='?module={$this->module}&act=delete&id={$value->id_spes}' onclick=\"return confirm('Apakah anda yakin menghapus data ini?')\">
                                                        <input type='image' src='images/icn_trash.png' title='Trash'>
                                                    </a>
                                                </td>
                                            </tr>
                                        ";
                                        $no++;
                                    }
								?>		
								</tbody> 
							</table>
						</div>

					</div>
				</div>

			</div>
		</div>

		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default">
						<nav class="navbar navbar-default" style="margin-bottom: 0px">
							<div class="container-fluid">
								<div class="navbar-header">
									<a class="navbar-brand" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Tingkat Jabatan</a>
								</div>
								<ul class="nav navbar-nav navbar-right">
                                    <li><a href="?module=<?php echo $this->module ?>&act=add"><button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a></li>
								</ul>
							</div>
						</nav>

						<div class="panel-body">
							<table class='display' id='example1'> 
								<thead> 
									<tr>  
					    				<th>No</th> 
					    				<th>Description</th>  
					    				<th>Action</th> 
									</tr> 
								</thead> 
								
								<tbody>
								<?php
                                    $no=1;
                                    foreach ($rows['tingkat_jabatan'] as $key => $value) {
                                        echo "
                                            <tr>
                                                <td>{$no}</td>
                                                <td>{$value->name}</td>
                                                <td>
                                                    <a href='?module={$this->module}&act=edit&id={$value->id}'>
                                                        <input type='image' src='images/icn_edit.png' title='Edit'>
                                                    </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href='?module={$this->module}&act=delete&id={$value->id}' onclick=\"return confirm('Apakah anda yakin menghapus data ini?')\">
                                                        <input type='image' src='images/icn_trash.png' title='Trash'>
                                                    </a>
                                                </td>
                                            </tr>
                                        ";
                                        $no++;
                                    }
								?>		
								</tbody> 
							</table>
						</div>

					</div>
				</div>

				<div class="col-sm-6">
					<div class="panel panel-default">
						<nav class="navbar navbar-default" style="margin-bottom: 0px">
							<div class="container-fluid">
								<div class="navbar-header">
									<a class="navbar-brand" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Penempatan</a>
								</div>
								<ul class="nav navbar-nav navbar-right">
                                    <li><a href="?module=<?php echo $this->module ?>&act=add"><button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button></a></li>
								</ul>
							</div>
						</nav>

						<div class="panel-body">
							<table class='display' id='example1'> 
								<thead> 
									<tr>  
					    				<th>No</th> 
					    				<th>Description</th>  
					    				<th>Action</th> 
									</tr> 
								</thead> 
								
								<tbody>
								<?php
                                    $no=1;
                                    foreach ($rows['penempatan'] as $key => $value) {
                                        echo "
                                            <tr>
                                                <td>{$no}</td>
                                                <td>{$value->propinsi_name}</td>
                                                <td>
                                                    <a href='?module={$this->module}&act=edit&id={$value->propinsi_id}'>
                                                        <input type='image' src='images/icn_edit.png' title='Edit'>
                                                    </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href='?module={$this->module}&act=delete&id={$value->propinsi_id}' onclick=\"return confirm('Apakah anda yakin menghapus data ini?')\">
                                                        <input type='image' src='images/icn_trash.png' title='Trash'>
                                                    </a>
                                                </td>
                                            </tr>
                                        ";
                                        $no++;
                                    }
								?>		
								</tbody> 
							</table>
						</div>

					</div>
				</div>

			</div>
		</div>

	</div>
</div>

<script>
    $(document).ready(function() {
        $('table').DataTable()
    })
</script>