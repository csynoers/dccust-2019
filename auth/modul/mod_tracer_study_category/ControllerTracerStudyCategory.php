<?php
    class ControllerTracerStudyCategory extends ModelTracerStudyCategory
    {
        public function __construct($db_config){
			parent::__construct($db_config);
		}
	}
	
	$load= new ControllerTracerStudyCategory($db_config);
    
?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
					  <a class="navbar-brand" href="#">Daftar Informasi Kategori Tracer Studi</a>
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
            <!-- /.panel-body -->
		</div>
	</div>