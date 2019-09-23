<!-- load data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

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
								foreach ($rows as $key => $value) {
									echo "
										<tr>
											<td>{$no}</td>
											<td>{$value->judul}</td>
											<td>{$value->link}</td>
											<td><img style='height:10rem' class='img-responsive' src='{$this->config->img[$this->url->module]['dir']}{$value->gambar}'></td>
											<td>
												<a href='?module={$this->url->module}&act=edit&id={$value->id}'>
													<input type='image' src='images/icn_edit.png' title='Edit'>
												</a> &nbsp;&nbsp;&nbsp;&nbsp;
												<a href='?module={$this->url->module}&act=delete&id={$value->id}' onclick=\"return confirm('Apakah anda yakin menghapus data ini?')\">
													<input type='image' src='images/icn_trash.png' title='Trash'>
												</a>
											</td>
										</tr>
									";
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
					<form method='POST' enctype='multipart/form-data' action='<?php echo "?module={$this->url->module}&act=store" ?>'>
						<div class="form-group">
							<label for="judul">Judul :</label>
							<input type="text" name="judul" placeholder="Judul Banner" class="form-control" required="">
						</div>
						<div class="form-group">
							<label for="link">Link :</label>
							<input value="#" type="text" name="link" placeholder="Link Banner jika ada" class="form-control" required="">
						</div>
						<div class="form-group">
							<label for="thumbnail">Thumbail :</label>
							<input type="file" name="gambar" required="">
						</div>
						<div class="form-group">
							<div class="alert alert-info">
								<strong>Info!</strong> images max-width: 512px.
							</div>
						</div>
						<input type="hidden" name="operation" value="insert">
						<button type="submit" class="btn btn-primary">Publish</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(function() {
        $('table').DataTable()
    })
</script>