<br>
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Banner</h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='modul/mod_banner/aksi_banner.php?module=banner&act=update'>
				<input type='hidden' name='id' value='<?php echo"$g[id]" ?>'>
				<div class="form-group">
					<label for="judul">Judul :</label>
					<input name="judul" type="text" value="<?php echo"$g[judul]" ?>" class="form-control" id="judul" placeholder="Judul Slideshow">
				</div>
				<div class="form-group">
					<label for="link">Link :</label>
					<input name="link" type="text" value="<?php echo"$g[link]" ?>" class="form-control" id="link" placeholder="Link Slideshow jika ada jika tidak cukup masukan tanda #">
				</div>
				<div class="form-group">
					<label>Thumbnail :</label>
					<img class="img-responsive" src="../joimg/banner/<?php echo"$g[gambar]" ?>">
				</div>
				<div class="form-group">
					<label>Change Thumbnail :</label>
					<input type="file" name="fupload">
				</div>
				<div class="form-group">
					<div class="alert alert-info">
						<strong>Info!</strong> images max-width: 512px.
					</div>
				</div>
				<button type="submit" class="btn btn-default">Publish</button>
				<button type="button" onclick='self.history.back()' class="btn btn-default">Back</button>
			</form>
		</div>
	</div>
</div>