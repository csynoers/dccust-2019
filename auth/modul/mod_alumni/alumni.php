	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
	</script>

	<script>
 
	var table;
	 
	$(document).ready(function() {
	 
	    //datatables
	    // table = $('#table').DataTable({ 
	    table = $('#alumni').DataTable({ 
	 
	        "processing": true, //Feature control the processing indicator.
	        "serverSide": true, //Feature control DataTables' server-side processing mode.
	        "order": [], //Initial no order.
	 
	        // Load data for the table's content from an Ajax source
	        "ajax": {
	            "url": "modul/mod_alumni/data_alumni.php",
	            "type": "POST",
	        },
	 
	        //Set column definition initialisation properties.
	        "columnDefs": [
	        { 
	            "targets": [ 5 ], //first column / numbering column
	            "orderable": false, //set not orderable
	        },
	        ],
	 
	    });
	 
	});
 

	</script>
	<style>.ui-widget-header{background:none;border:none;}</style>


		<?php
		$db= new dbHelper();
		$aksi="modul/mod_alumni/aksi_alumni.php";
		$module="alumni";
		$jenjang = isset($_GET['j'])? "S".$_GET['j'] : '';
		isset($_GET['act'])? $act=$_GET['act'] : $act='';

		switch($act){
		default:
		?>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">Daftar alumni</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#" onclick="location.href='?module=<?php echo $module;?>&act=update_header'">
								<button type="button" class="btn btn-primary">Update Header</button>
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<form method="post" enctype="multipart/form-data" action="modul/mod_alumni/aksi_import.php">
							<input type="hidden" name="jenjang" value="<?php echo $_GET['j'] ?>">
							<div class="form-group">
								<label>Import File Excel*:</label>
								<input name="fileexcel" type="file" required="">
							</div>
							<div class="alert alert-info">
							  <strong>Info!</strong> * file yang bisa di import adalah .xls (Excel 1997-2003).
							</div>

							<div class="form-group">
								<label>Pilih Prodi : </label>
								<select class="form-control" name="prodi">

								<?php
									$kelas = $db->get_select("SELECT id_prodi,prodi FROM prodi ORDER BY prodi ASC");
									foreach ($kelas['data'] as $key => $datakel) { ?>
										<option value="<?php echo $datakel->id_prodi ?>"><?php echo $datakel->prodi ?></option>

								<?php }	?>

								</select>
								
							</div>
							<button type="submit" class="btn btn-primary">Import</button>
						</form>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="alert alert-warning">
						  <strong>Berikut contoh format Excle untuk upload data alumni</strong>
						</div>
	                    <a href="modul/mod_alumni/contoh_format.xls"><button type="button" name="button" style="color: #000;">Download di sini</button></a>
					</div>
				</div>
 
				<hr>
				<table id="alumni" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
		    				<th>No</th>
		    				<th>NIM</th>
		    				<th>Nama alumni</th>
		    				<th>Tahun Lulus</th>
		    				<th>Program Studi</th>
		    				<th>Action</th>
						</tr>
					</thead>

					<tbody></tbody>

					<tfoot>
						<tr>
		    				<th>No</th>
		    				<th>NIM</th>
		    				<th>Nama alumni</th>
		    				<th>Tahun Lulus</th>
		    				<th>Program Studi</th>
		    				<th>Action</th>
						</tr>
					</tfoot>
				</table>
				
			</div>
		</div>
	</div>

		<?php break;
		case"edit":
			$alumni = $db->get_select("SELECT * FROM alumni_daftar WHERE id_alumni='$_GET[id]'");
			$r=$alumni['data'][0];
			// print_r($r);
		?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Alumni</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=alumni&act=update'>
					<div class="container-fluid">
						<input type='hidden' name='id_alumni' value='<?php echo $r->id_alumni ?>'>
						<div class="form-group">
							<label for="name">Nim</label>
							<input type="text" name="nim" value="<?php echo $r->nim ?>" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label for="name">Nama Alumni</label>
							<input name="nama" type="text" value="<?php echo $r->nama_alumni ?>" class="form-control">
						</div>
						<div class="form-group">
							<label for="name">Username</label>
							<input type="text" name="email" value="<?php echo $r->email ?>" class="form-control">
						</div>
						<div class="form-group">
							<label for="name">Tahun Lulus</label>
							<input type="text" name="tahun_lulus" value="<?php echo $r->tahun_lulus ?>" placeholder="masukan tahun lulus * example: 2017" class="form-control">
						</div>
						<div class="form-group">
							<label for="sel1">Program Studi</label>
							<select class="form-control" id="sel1" name="prodi">

							<?php								
								echo "<option> -- Pilih Program Studi -- </option>";
								$cs_prodi= $db->get_select("SELECT id_prodi,prodi FROM prodi ORDER BY prodi ASC");
								foreach ($cs_prodi['data'] as $key => $value) {
									if ($value->id_prodi==$r->prodi) {
										echo "<option value='$value->id_prodi' selected>$value->prodi</option>";
									}
									echo "<option value='$value->id_prodi'>$value->prodi</option>";
								}
							?>

							</select>
						</div>
						<div class="form-group">
							<label for="name">No. HP</label>
							<input type="text" name="no_hp" value="<?php echo isset($r->no_hp) ? $r->no_hp : null ; ?>" placeholder="masukan nomer HP * example: 081225306789" class="form-control">
						</div>
						<div class="form-group">
							<label for="name">Alamat Domisli</label>
							<input type="text" name="alamat_domisli" value="<?php echo $r->alamat_domisli ?>" placeholder="masukan alamat_domisli *" class="form-control">
						</div>
						<div class="form-group">
							<label for="name">Alamat KTP</label>
							<input type="text" name="alamat_ktp" value="<?php echo $r->alamat_ktp ?>" placeholder="masukan alamat_ktp *" class="form-control">
						</div>
					</div>
					<footer>
						<div class="submit_link">
							<input type="submit" value="Update" class="alt_btn">
							<input type="button" onclick='self.history.back()' value="Back">
						</div>
					</footer>
				</form>
				
			</div>
		</div>
	</div>

		<?php break;
			case"update_header":
			$header = $db->get_select("SELECT * FROM header WHERE id_header='12' AND aktif='Y'");
			$h= $header['data'][0];

		?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Header Alumni</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=alumni&act=update_header'>
					<div class="container-fluid">
						<input type='hidden' name='id' value='<?php echo"$h->id_header" ?>'>
						<div class="form-group">
							<label for="judul">Judul :</label>
							<input name="nama_header_ina" type="text" value="<?php echo"$h->nama_header_ina" ?>" class="form-control">
						</div>
						<div class="form-group">
							<label for="deskripsi">Deskripsi :</label>
							<textarea name="isi_header_ina" id="jogmce" class="form-control"><?php echo"$h->isi_header_ina" ?></textarea>
						</div>
						<div class="form-group">
							<label for="thumbnail">Thumbnail :</label>
							<img class="img-responsive" src="../joimg/header_image/<?php echo"$h->gambar" ?>">
						</div>
						<div class="form-group">
							<label for="change_thumbnail">Change Thumbnail :</label>
							<input type="file" name="fupload">
						</div>
						<div class="alert alert-info">
							<strong>Info! </strong>File Type: *.jpg File Size: 1300x481 px.
						</div>
					</div>
							
					<footer>
						<div class="submit_link">
							<input type="submit" value="Update" class="alt_btn">
							<input type="button" onclick='self.history.back()' value="Back">
						</div>
					</footer>
				</form>
				
			</div>
		</div>
	</div>


		<?php
			break;
			}
