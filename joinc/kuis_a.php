<?php
  require_once('form_helper.php');
  // check last kuis
  // get id alumni
  $id_alumni= $_SESSION['idnya'];

  // cek data from last fill kuisioner
  $rows= $db->get_select("SELECT id_alumni FROM tb_a WHERE id_alumni='{$id_alumni}' ");

  if ( count($rows['data']) > 0) {
    # code...
    header('Location:kuis_b.html');

  }
?>
<section id="featured">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="row" style="margin-bottom: 46px;">
					<div class="bawah">
						<center><h3><span style="color: #009a54;;" data-mce-mark="1">Kuesioner</span></h3></center>
					</div>
				</div>

				<div class="panel-group" id="accordion">
					<?php
						$rows= $db->get_select("SELECT * FROM tracer_studies WHERE tracer_study_parent=0")['data'];
						foreach ($rows as $key => $value) {
							$rows_sub= $db->get_select("SELECT * FROM tracer_studies_title WHERE tracer_study_id='{$value->tracer_study_id}' ")['data'];
							print_r($rows_sub);
							// $sub_html= '';
							// foreach ($rows_sub as $key_sub => $value_sub) {
							// 	$sub_html .= $value_sub->tarcer_study_detail_title;
							// }

							if ( $key==0 ) {
								echo '
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title" style="color: #009a54;">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$value->tracer_study_id.'">'.strip_tags($value->tracer_study_title).'</a>
											</h4>
										</div>
										<div id="collapse'.$value->tracer_study_id.'" class="panel-collapse collapse in">
											<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
											minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
											commodo consequat.</div>
										</div>
									</div>
								';
								
							} else {
								echo '
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title" style="color: #009a54;">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$value->tracer_study_id.'">'.strip_tags($value->tracer_study_title).'</a>
											</h4>
										</div>
										<div id="collapse'.$value->tracer_study_id.'" class="panel-collapse collapse">
											<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
											sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
											minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
											commodo consequat.</div>
										</div>
									</div>
								
								';
								
							}
							
						}
					?>
				</div>
				<!-- /.panel-group -->

			</div>
		</div>
	</div>
</section>