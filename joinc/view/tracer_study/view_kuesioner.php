<?php
	// require_once('form_helper.php');
	// check last kuis

	/* function minify_html($html=NULL)
	{
		return preg_replace(
			array(
				'/ {2,}/',
				'/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
			),
			array(
				' ',
				''
			),
			$html
		);
	
	} */

	function multiple_radio_button($rows){
		$html= '';
		$html .= '
		<table class="table table-striped table-condensed table-hover">
			<thead>
				<tr>
					<th colspan="4">Tidak sama sekali</th>
					<th colspan="4">Sangat besar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 45px;padding:1em">No</td>
					<td style="width: 45px;padding:1em 0.5em">1</td>
					<td style="width: 45px;padding:1em 0.5em">2</td>
					<td style="width: 45px;padding:1em 0.5em">3</td>
					<td style="width: 45px;padding:1em 0.5em">4</td>
					<td style="width: 45px;padding:1em 0.5em">5</td>
					<td style="padding:1em 0em">Pertanyaan</td>
				</tr>';

				foreach ($rows as $key => $value) {
					// print_r($value);
					$add_input_text= (empty($value->rules) ? NULL : input_text($value) );
					$html .= '<tr>';
						$html .= '<td style="padding:1em">'.($key+1).'</td>';
							$html .= '<td><div class="radio"><label><input type="radio" name="tracer_study['.$value->tracer_study_id.']['.$value->tracer_study_detail_id.']" value="1" required=""></label></div></td>';
							$html .= '<td><div class="radio"><label><input type="radio" name="tracer_study['.$value->tracer_study_id.']['.$value->tracer_study_detail_id.']" value="2" required=""></label></div></td>';
							$html .= '<td><div class="radio"><label><input type="radio" name="tracer_study['.$value->tracer_study_id.']['.$value->tracer_study_detail_id.']" value="3" required=""></label></div></td>';
							$html .= '<td><div class="radio"><label><input type="radio" name="tracer_study['.$value->tracer_study_id.']['.$value->tracer_study_detail_id.']" value="4" required=""></label></div></td>';
							$html .= '<td><div class="radio"><label><input type="radio" name="tracer_study['.$value->tracer_study_id.']['.$value->tracer_study_detail_id.']" value="5" required=""></label></div></td>';
						$html .= '<td style="padding:1em 0em">'.strip_tags($value->tracer_study_detail_title).$add_input_text.'</td>';
					$html .= '</tr>';
				}

		$html .= '
			</tbody>
		</table>
		';
		return $html;
	}

	function single_radio_button($rows){
		$html= '';
		foreach ($rows as $key => $value) {
			$add_input_text= (empty($value->rules) ? NULL : input_text($value) );
			$html .= '
			<div class="col-sm-12">
				<div class="radio">
					<label>
						<input type="radio" name="tracer_study['.$value->tracer_study_id.']" value="'.$value->tracer_study_detail_id.'" required="">
						'.strip_tags($value->tracer_study_detail_title).'
						'.$add_input_text.'
					</label>
				</div>
			</div>
			';
		}
		return $html;
	}
	function checkbox($rows){
		$html= '
			<div class="col-sm-12">
				<div class="wrap_checkbox">';
		
		foreach ($rows as $key => $value) {
			$add_input_text= (empty($value->rules) ? NULL : input_text($value) );
			$add_wrapper_class= (empty($value->rules) ? NULL : 'wrap_other' );
			$html .= '
				<div class="checkbox '.$add_wrapper_class.'">
					<label>
						<input type="checkbox" name="'.$value->tracer_study_detail_id.'" value="'.$value->tracer_study_detail_id.'" >
						'.strip_tags($value->tracer_study_detail_title).'
						'.$add_input_text.'
					</label>
				</div>';
		}

		$html .= '
				</div>
			</div>';

		return $html;
	}
	function none($rows)
	{
		// return print_r($rows);
		return NULL;
	}
	function input_text($row)
	{
		return '<input type="text" class="other form-control" placeholder="Masukan lainnya ..." >';
	}
	function input_number($rows)
	{
		$html = "";
		foreach ($rows as $key => $value) {
			$html .= '
				<tr class="form-inline">
					<td><input min="1" type="number" name="tracer_study['.$value->tracer_study_id.']['.$value->tracer_study_detail_id.']" class="form-control" placeholder="Masukan angka min 1..." required></td>
					<td>&nbsp;&nbsp;'.strip_tags($value->tracer_study_detail_title).'</td
				</tr>
			';
		}
		return "<table>{$html}</table>";
	}

	$html= "";

	$html .= '
	<section id="featured">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="row" style="margin-bottom: 46px;">
						<div class="bawah">
							<center><h3><span style="color: #009a54;" data-mce-mark="1">Kuesioner</span></h3></center>
						</div>
					</div>
					<form action="store-kuesioner.html" method="POST">
						<div class="panel-group" id="accordion">';

							# get rows from tracer_study without parent
							$rows= $this->Model->db->get_select("SELECT *,(SELECT COUNT(t_mod.tracer_study_id) FROM tracer_studies AS t_mod WHERE t_mod.tracer_study_parent=t.tracer_study_id) AS child_count FROM tracer_studies AS t WHERE t.tracer_study_parent=0")['data'];

							# loop rows tracer_study without parent
							foreach ($rows as $key => $value) {
								$sub_html = strip_tags($value->tracer_study_desc).'<br>';
								if ( $value->child_count == 0 ) { # if this row have not a childs
									$rows_sub= $this->Model->db->get_select("SELECT * FROM tracer_studies_detail WHERE tracer_study_id='{$value->tracer_study_id}' ")['data'];
									$varFunction = $value->tracer_study_form_type;
									$sub_html .= $varFunction($rows_sub);

								} else { # if this row have a childs
									$rows_child= $this->Model->db->get_select("SELECT * FROM tracer_studies WHERE tracer_study_parent='{$value->tracer_study_id}' ")['data'];
									foreach ($rows_child as $key_rows_child => $value_rows_child) {
										$rows_sub_child_html = strip_tags($value_rows_child->tracer_study_desc).'<br>';
										$rows_child_sub = $this->Model->db->get_select("SELECT * FROM tracer_studies_detail WHERE tracer_study_id='{$value_rows_child->tracer_study_id}' ")['data'];
										$varFunction = $value_rows_child->tracer_study_form_type;
										$rows_sub_child_html .= $varFunction($rows_child_sub);
										$sub_html .= '
										<div class="col-sm-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title" style="color: #009a54;">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$value_rows_child->tracer_study_id.'">'.strip_tags($value_rows_child->tracer_study_title).'</a>
													</h4>
												</div>
												<div id="collapse'.$value_rows_child->tracer_study_id.'" class="panel-collapse collapse in">
													<div class="panel-body">
														'.$rows_sub_child_html.'
													</div>
												</div>
											</div>
										</div>
										';

									}
									// $sub_html .=

								}
								

								$html .= '
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title" style="color: #009a54;">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$value->tracer_study_id.'">'.strip_tags($value->tracer_study_title).'</a>
											</h4>
										</div>
										<div id="collapse'.$value->tracer_study_id.'" class="panel-collapse collapse in">
											<div class="panel-body">
												'.$sub_html.'
											</div>
										</div>
									</div>
								
								';
								
							}

						$html .= '
						</div>
						<!-- /.panel-group -->

						<button type="submit" class="btn btn-block btn-large btn-primary">SUBMIT</button>
					</form>

				</div>
			</div>
		</div>
	</section>';

	
	$html .= minify_js("
	<script>
		$(document).ready(function(j){
			var conf= {
				'checkbox' : j('input[type=checkbox]').prop('required',!0)
			};
			$('input[type=checkbox]').on('change',function(){
				var wrap= {
					'checkbox' : j(this).closest('.wrap_checkbox'),
					'other' : j(this).closest('.wrap_other')
				};
				if ( j(this).is(':checked') ) {
					alert('true');
					if ( wrap.other.length > 0 ) {
						wrap.other.find('.other').prop('required',!0)
					}
					/* set false required input checkbox */
					wrap.checkbox.find('input[type=checkbox]').prop('required',!1)

				}else {
					if( wrap.checkbox.find('input[type=checkbox]:checked').length == 0 ){
						wrap.checkbox.find('input[type=checkbox]').prop('required',!0)
					}
					alert('false');
					if ( wrap.other.length > 0 ) {
						wrap.other.find('.other').prop('required',!1)
					}

				}
			})
		})
	</script>
	");

	echo $html;