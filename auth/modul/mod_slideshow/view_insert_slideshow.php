<br>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4><i class="fa fa-plus" aria-hidden="true"></i> Add Slideshow</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
					<div class="form-group">
						<label for="judul">Judul :</label>
						<input name="judul_ina" type="text" class="form-control" id="judul" placeholder="Judul Slideshow">
					</div>
					<div class="form-group">
						<label for="link">Link :</label>
						<input type="text" name="link" class="form-control" id="link" placeholder="Link Slideshow jika ada jika tidak cukup masukan tanda #">
					</div>
					<div class="form-group">
						<label>Thumbnail :</label>
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