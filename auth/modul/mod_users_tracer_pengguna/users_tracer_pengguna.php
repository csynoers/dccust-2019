<?php
	$aksi="modul/mod_users_tracer_pengguna/aksi_users_tracer_pengguna.php?module=users-tracer-pengguna";
?>
	<style type="text/css" title="currentStyle">
	    @import "media/css/demo_table_jui.css";
	    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
	</script>

	<script>
	$(document).ready( function () {
	     var oTable = $('#biodata').dataTable( {
	                    "bJQueryUI": true,
	                    "sPaginationType": "full_numbers",
					} );		
	} );
	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Create New Users</h4>
			</div>
			<div class="panel-body">
				<form method="POST" action="<?php echo $aksi?>&act=insert">
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<input type="text" name="nama_perusahaan" class="form-control" placeholder="ex: PT Telkom" required="">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Username</label>
								<input type="email" name="email" class="form-control" placeholder="Type Email ex: john@gmail.com" required="">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>Password</label>
								<input type="text" name="password" class="form-control" placeholder="ex: xz4s2d45" required="">
							</div>
						</div>
						<div class="col-lg-2">
							<button type="submit" class="btn btn-primary form-control">Save</button>
						</div>
						<div class="col-lg-2">
							<button type="button" class="btn btn-primary form-control generate-password">Generate Password</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Daftar Users Tracer Pengguna</h4>
			</div>
			<div class="panel-body">
				
			<div id="tab1" class="row">
				<div class="col-lg-12 col-sm-12">
					<table class='display' id='biodata'> 
						<thead> 
							<tr>  
			    				<th>No</th> 
			    				<th>Nama Perusahaan</th> 
			    				<th>Username</th> 
			    				<th>Status Tracer</th> 
			    				<th>Date</th> 
			    				<th>Action</th> 
							</tr>
						</thead> 
						
						<tbody> 
						<?php 	
							$no=1;
							$users = $db->get_select("SELECT * FROM user ORDER BY users_timestamp ASC");
							foreach($users['data'] AS $key => $b){ $users_desc=json_decode($b->users_desc) ?>
							<tr>  
			    				<td align="right"><?php echo "$no" ?></td> 
			    				<td><?php echo $users_desc->nama_perusahaan ?></td> 
			    				<td><?php echo $b->users_email ?></td> 
								<td><?php echo $b->users_status=='true'? '<span class="label label-success">Tracer Success</span>': '<span class="label label-warning">Tracer Pending</span>'; ?></td>
								<td><?php echo tanggal_indo(date('Y-m-d', strtotime($b->users_timestamp)),TRUE) ?></td>
			    				<td align="center">
			    					<!-- <a href="<?php echo $aksi."&act=edit&id={$b->users_id}";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_edit.png" title="Trash"></a> -->
			    					<a class="edit-users" data-id="<?php echo $b->users_id ?>" href="#" data-toggle="modal" data-target="#myModal"><input type="image" src="images/icn_edit.png" title="Trash"></a>
			    					&nbsp &nbsp <a href="<?php echo $aksi."&act=hapus&id={$b->users_id}";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
								</td> 
							</tr>

						<?php $no++; } ?>
							
							
						</tbody> 
					</table>
					<!-- Modal -->
					  <div class="modal fade" id="myModal" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h4 class="modal-title">Edit Users Tracer Pengguna</h4>
					        </div>
					        <div class="modal-body users-content">
					          
					        </div>
					        <div class="modal-footer">
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        </div>
					      </div>
					      
					    </div>
					  </div>
					<!-- End Modal -->
					
				</div>
			</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
(function(j){
	generatePassword();
	function generatePassword(){
		j('.generate-password').on('click',function(){
			randomString();
		});
	}
	function randomString(){
		var randomstring=Math.random().toString(36).slice(-8);
		j('input[name=password]').val(randomstring);
	}

	j('.edit-users').on('click',function(){
		var id_users;
		id_users= j(this).attr('data-id');
		j.ajax({
			// beforeSend: function(){
			// 	// console.log(jsonString);
			// },
			method: 'POST',
			data: {id: id_users},
			cache: false,
	    	url: "./modul/mod_users_tracer_pengguna/edit_users.php",
	    	success: function(result){
	    		j('.users-content').html(result);
				generatePassword();
	    	}
		});
	});
})(jQuery)
</script>