<br>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Slideshow</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='modul/mod_slideshow/aksi_slideshow.php?module=slideshow&act=update'>
					<input type='hidden' name='id' value='<?php echo"$g[id]" ?>'>
					<div class="form-group">
						<label for="judul">Judul :</label>
						<input value="<?php echo"$g[judul_ina]" ?>" name="judul_ina" type="text" class="form-control" id="judul" placeholder="Judul Slideshow">
					</div>
					<div class="form-group">
						<label for="link">Link :</label>
						<input value="<?php echo"$g[link]" ?>" type="text" name="link" class="form-control" id="link" placeholder="Link Slideshow jika ada jika tidak cukup masukan tanda #">
					</div>
					<div class="form-group">
						<label>Thumbnail :</label>
						<img class="img-responsive" src="../joimg/slide/<?php echo"$g[gambar]" ?>">
					</div>
					<div class="form-group">
						<label>Change Thumbnail :</label>
						<input type="file" name="fupload">
					</div>
					<div class="form-group">
						<div class="alert alert-info">
							<strong>Info!</strong> file type: .jpg file size: 1300x481 px.
						</div>
					</div>
					<button type="submit" class="btn btn-default">Publish</button>
					<button type="button" onclick='self.history.back()' class="btn btn-default">Back</button>
				</form>
				
			</div>
		</div>
	</div>