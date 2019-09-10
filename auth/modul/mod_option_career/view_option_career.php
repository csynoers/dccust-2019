<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready(function(){
    $('#example1').DataTable();
    $('#example2').DataTable();
    $('#example3').DataTable();
    $('#example4').DataTable();
});
</script>
<style>.ui-widget-header{background:none;border:none;}</style>
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
									<li><a href="?module=option_career&act=insert&opt=jenis"><button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Insert New</button></a></li>

								</ul>
							</div>
						</nav>

						<div class="panel-body">
							<table class='display' id='example1'> 
								<thead> 
									<tr>  
					    				<th>No</th> 
					    				<th>Description</th>  
					    				<th width="130px">Action</th> 
									</tr> 
								</thead> 
								
								<tbody>
								<?php
									$no= 1; 
									foreach ($jenis_lowongan as $key) {
										?>
										<tr>  
						    				<td align="center"><?php echo $no; ?></td> 
						    				<td align="center"><?php echo $key->name; ?></td>
						    				<td align="center">
						    					<a href="<?php echo"?module=option_career&act=edit&opt=jenis&id=$key->id&saving=0";?>">
						    						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						    					</a> &nbsp;&nbsp;&nbsp;&nbsp;
						    					<a href="<?php echo"$aksi?module=option_career&act=delete&opt=jenis&id=$key->id";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');">
						    						<i class="fa fa-trash-o" aria-hidden="true"></i>
						    					</a>
											</td> 
										</tr>
										<?php
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
									<li><a href="?module=option_career&act=insert&opt=spesialis"><button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Insert New</button></a></li>

								</ul>
							</div>
						</nav>

						<div class="panel-body">
							<table class='display' id='example2'> 
								<thead> 
									<tr>  
					    				<th>No</th> 
					    				<th>Description</th>  
					    				<th width="130px">Action</th> 
									</tr> 
								</thead> 
								
								<tbody>
								<?php
									$no= 1; 
									foreach ($spesialis as $key) {
										?>
										<tr>  
						    				<td align="center"><?php echo $no; ?></td> 
						    				<td align="center"><?php echo $key->nama_spes ?></td>
						    				<td align="center">
						    					<a href="<?php echo"?module=option_career&act=edit&opt=spesialis&id=$key->id_spes&saving=0";?>">
						    						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						    					</a> &nbsp;&nbsp;&nbsp;&nbsp;
						    					<a href="<?php echo"$aksi?module=option_career&act=delete&opt=spesialis&id=$key->id_spes";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');">
						    						<i class="fa fa-trash-o" aria-hidden="true"></i>
						    					</a>
											</td> 
										</tr>
										<?php
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
									<li><a href="?module=option_career&act=insert&opt=jabatan"><button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Insert New</button></a></li>

								</ul>
							</div>
						</nav>

						<div class="panel-body">
							<table class='display' id='example3'> 
								<thead> 
									<tr>  
					    				<th>No</th> 
					    				<th>Description</th>  
					    				<th width="130px">Action</th> 
									</tr> 
								</thead> 
								
								<tbody>
								<?php
									$no= 1; 
									foreach ($jabatan as $key) {
										?>
										<tr>  
						    				<td align="center"><?php echo $no; ?></td> 
						    				<td align="center"><?php echo $key->name ?></td>
						    				<td align="center">
						    					<a href="<?php echo"?module=option_career&act=edit&opt=jabatan&id=$key->id&saving=0";?>">
						    						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						    					</a> &nbsp;&nbsp;&nbsp;&nbsp;
						    					<a href="<?php echo"$aksi?module=option_career&act=delete&opt=jabatan&id=$key->id";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');">
						    						<i class="fa fa-trash-o" aria-hidden="true"></i>
						    					</a>
											</td> 
										</tr>
										<?php
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
									<li><a href="?module=option_career&act=insert&opt=penempatan"><button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Insert New</button></a></li>

								</ul>
							</div>
						</nav>

						<div class="panel-body">
							<table class='display' id='example4'> 
								<thead> 
									<tr>  
					    				<th>No</th> 
					    				<th>Description</th>  
					    				<th width="130px">Action</th> 
									</tr> 
								</thead> 
								
								<tbody>
								<?php
									$no= 1; 
									foreach ($penempatan as $key) {
										?>
										<tr>  
						    				<td align="center"><?php echo $no; ?></td> 
						    				<td align="center"><?php echo $key->propinsi_name ?></td>
						    				<td align="center">
						    					<a href="<?php echo"?module=option_career&act=edit&opt=penempatan&id=$key->propinsi_id&saving=0";?>">
						    						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						    					</a> &nbsp;&nbsp;&nbsp;&nbsp;
						    					<a href="<?php echo"$aksi?module=option_career&act=delete&opt=penempatan&id=$key->propinsi_id";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');">
						    						<i class="fa fa-trash-o" aria-hidden="true"></i>
						    					</a>
											</td> 
										</tr>
										<?php
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