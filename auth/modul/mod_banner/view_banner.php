	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	    var oTable = $('#banner').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
<br>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4><i class="fa fa-info-circle" aria-hidden="true"></i> Banner</h4>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover" id="banner" width="100%">
							<tr>
								<th>No</th>
			    				<th>Tittle</th> 
			    				<th>Link</th> 
			    				<th>Thumbnail</th> 
			    				<th>Actions</th> 
							</tr>
							<?php
								$no=1;
								foreach ($banner as $key => $value) {
									?>
									<tr>  
					    				<th width="4%"><?php echo"$no" ?></th>
					    				<td width="24%"><?php echo"$value[judul]" ?></td> 
					    				<td width="24%"><?php echo"$value[link]" ?></td> 
					    				<td width="24%"><img class="img-responsive" src="../joimg/banner/<?php echo"$value[gambar]" ?>"></td> 
					    				<td width="24%" style="text-align:center"><a href="<?php echo"?module=banner&act=edit&id=$value[id]";?>"><input type="image" src="images/icn_edit.png" title="Edit">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo"$aksi?module=banner&act=hapus&id=$value[id]";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash">delete</a></td> 
									</tr> 

									<?php
								$no++;
								}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4> <i class="fa fa-plus"></i> Post New Banner</h4>
				</div>
				<div class="panel-body">
					<form method='POST' enctype='multipart/form-data' action='modul/mod_banner/aksi_banner.php?module=banner&act=insertnew'>
						<div class="form-group">
							<label for="judul">Judul :</label>
							<input type="text" name="judul" placeholder="Judul Banner" class="form-control" required="">
						</div>
						<div class="form-group">
							<label for="link">Link :</label>
							<input type="text" name="link" placeholder="Link Banner jika ada" class="form-control">
						</div>
						<div class="form-group">
							<label for="thumbnail">Thumbail :</label>
							<input type="file" name="fupload" required="">
						</div>
						<div class="form-group">
							<div class="alert alert-info">
								<strong>Info!</strong> images max-width: 512px.
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Publish</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>