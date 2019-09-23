<div class="container-fluid">
	<div class="col-sm-12">
		<form method='POST' enctype='multipart/form-data' action="<?php echo  "?module={$this->url->module}&act=store" ?>">
	        <div class="panel panel-primary">
				<div class="panel-heading">
					<h4><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> TAMBAHKAN FAKULTAS</b></h4>
				</div>
	            <div class="panel-body">
					<div class="form-group">
						<label>Nama Fakultas :</label>
						<input placeholder="Masukkan nama fakultas..." class="form-control" name='fakultas' type="text" required="">
					</div>
	            </div>

	            <div class="panel-footer">
					<input type="hidden" name="operation" value="insert">
	            	<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Publish</button>
					<button type="button" onclick="self.history.back()" class="btn btn-info"><i class="fa fa-backward" aria-hidden="true"></i> Back</button>
	            </div>
	            
	        </div>
		</form>
	</div>
</div>