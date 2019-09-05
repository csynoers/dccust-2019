<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready( function () {
     var oTable = $('#guest_book').dataTable( {
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
				} );		
} );
</script>
<style>.ui-widget-header{background:none;border:none;}</style>
<br>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">Buku Tamu</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#" onclick="location.href='?module=buku_tamu&act=update_header&saving=0'">
								<button type="button" class="btn btn-primary">Update Header</button>
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<div class="panel-body">
				<table class='display' id='guest_book'> 
					<thead> 
						<tr>  
		    				<th width="5%">No</th> 
		    				<th width="19%">Nama</th> 
		    				<th width="40%">Pesan</th>
		    				<th width="15%">Tanggal</th>
		    				<th width="5%">Publish</th>   
		    				<th width="16%">Action</th> 
						</tr> 
					</thead> 
					
					<tbody> 
					<?php 	
						$no=1;
						foreach ($guest_book['data'] as $key => $value){
						// $tanggal = tgl_amerika($key['deadline']);
						
						?>
						<tr>  
		    				<td align="center"><?php echo"$no" ?></td> 
		    				<td align="center"><?php echo $value->name?></td> 
		    				<td><?php echo $value->message_fill ?></td>
		    				<td><?php echo $value->date_send ?></td>
		    				<td align="center"><?php echo $value->status=='1'? 'Y': 'N'; ?></td>
		    				<td align="center">
		    					<a href="<?php echo"?module=buku_tamu&act=edit&id=$value->id&saving=0";?>">
		    						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		    					</a> &nbsp;&nbsp;&nbsp;&nbsp;
		    					<a href="<?php echo"$aksi?module=buku_tamu&act=delete&id=$value->id";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');">
		    						<i class="fa fa-trash-o" aria-hidden="true"></i>
		    					</a>
							</td> 
						</tr> 
					<?php $no++; } ?>
						
					</tbody> 
				</table>
			</div>
		</div>
	</div>