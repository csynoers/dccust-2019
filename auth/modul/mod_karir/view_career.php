<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready( function () {
     var oTable = $('#lowongan').dataTable( {
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
				  <a class="navbar-brand" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Lowongan Kerja</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<!-- <li>
						<a href="#" onclick="location.href='?module=<?php //echo $module;?>&act=update_header'">
							<button type="button" class="btn btn-primary">Update Header</button>
						</a>
					</li> -->
					<li>
						<a href="?module=karir&act=insert">
							<button type="button" class="btn btn-primary">
								<i class="fa fa-plus" aria-hidden="true"></i>
								Insert New

							</button>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="panel-body">
			<table class='display' id='lowongan'> 
				<thead> 
					<tr>  
	    				<th>No</th> 
	    				<th>Thumbnail</th> 
	    				<th>Tittle</th>
	    				<th>Spesialisasi kerja</th>
	    				<th>Perusahaan</th>  
	    				<th width="80px">Deadline</th> 
	    				<th width="130px">Action</th> 
					</tr> 
				</thead> 
				
				<tbody> 
				<?php 	
					$no=1;
					foreach ($career as $key => $value){
					$tanggal = tanggal_indo($tanggal=date('Y-m-d',strtotime($value->deadline)), $cetak_hari = true);
					
					?>
					<tr>  
	    				<td align="center"><?php echo"$no" ?></td> 
	    				<td align="center"><img height="70px" src="../joimg/karir/<?php echo"$value->gambar" ?>"></td> 
	    				<td><?php echo"$value->judul_karir" ?></td>
	    				<td><?php echo"$value->nama_spes" ?></td>
	    				<td><?php echo"$value->perusahaan_karir" ?></td>
	    				<td width="90px"><?php echo $tanggal; ?></td> 
	    				<td align="center">
	    					<a href="<?php echo"?module=karir&act=edit&id=$value->id_karir&saving=0";?>">
	    						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	    					</a> &nbsp;&nbsp;&nbsp;&nbsp;
	    					<a href="<?php echo"$aksi?module=karir&act=delete&id=$value->id_karir";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');">
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
