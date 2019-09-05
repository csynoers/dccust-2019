<br>
<div class="container-fluid">
	<div class="col-sm-12">
		<form method='POST' enctype='multipart/form-data' action='<?php echo $aksi?>?module=prodi&act=input'>
	        <div class="panel panel-default">
				<div class="panel-heading">
					<h3><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> TAMBAHKAN PRODI</b></h3>
				</div>
	            <div class="panel-body">
					<div class="form-group">
			            <label>Pilih Fakultas :</label>
						<select name="fakultas" class="form-control" required>
			            	<option value="">-- Pilih fakultas --</option>
			            		<?php
			                    $fakultas = mysql_query("SELECT * FROM fakultas ORDER BY fakultas ASC");
			                    while ($dne = mysql_fetch_assoc($fakultas)) {
			                      ?>
			                        <option value="<?php echo $dne['id_fakultas'] ?>"><?php echo $dne['fakultas'] ?></option>
			                      <?php
			                    }
			                    ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Prodi :</label>
						<input class="form-control" name='judul' type="text" required="">
					</div>
	            </div>

	            <div class="panel-footer">
	            	<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Publish</button>
					<button type="button" onclick="self.history.back()" class="btn btn-info"><i class="fa fa-backward" aria-hidden="true"></i> Back</button>
	            </div>
	            
	        </div>
		</form>
	</div>
</div>