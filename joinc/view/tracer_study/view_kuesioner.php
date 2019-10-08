<?php

	// $array= [1,2,3,4,5,6,7];
	// echo '<pre>';
	// echo json_encode($array);
	// print_r($array);
	// echo '</pre>';
	// var_dump(array_key_exists('add_text',$array));

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

							# loop rows tracer_study without parent
							foreach ($this->tracer_study() as $key => $value) {
								$sub_html = strip_tags($value->tracer_study_desc).'<br>';
								if ( $value->child_count == 0 ) { # if this row have not a childs
									$sub_html .= $this->{$value->tracer_study_form_type}( $this->tracer_study_detail($value->tracer_study_id) );

								} else { # if this row have a childs
									foreach ( $this->tracer_study($value->tracer_study_id) as $key_rows_child => $value_rows_child) {
										$rows_sub_child_html = strip_tags($value_rows_child->tracer_study_desc).'<br>';
										$rows_sub_child_html .= $this->{$value_rows_child->tracer_study_form_type}( $this->tracer_study_detail($value_rows_child->tracer_study_id) );
										$sub_html .= '
										<div class="wrap-tracer-block" data-id="'.$value_rows_child->tracer_study_id.'">
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
										</div>
										';

									}

								}
								

								$html .= '
								<div class="wrap-tracer-block" data-id="'.$value->tracer_study_id.'">
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
				'checkbox' 	: j('.wrap_checkbox input[type=checkbox]').prop('required',!0),
				'radio'		: j('.wrap_single_radio input[type=radio]').prop('required',!0)
			};

			j('.wrap_checkbox input[type=checkbox]').on('change',function(){
				var wrap= {
					'checkbox' : j(this).closest('.wrap_checkbox'),
					'other' : j(this).closest('.wrap_other')
				},
				input= {
					'checkbox' : 'input[type=checkbox]',
					'checkboxChecked' : 'input[type=checkbox]:checked',
					'other' : '.other',
				};
	
				if ( j(this).is(':checked') ) {
					if ( wrap.other.length > 0 ) {
						wrap.other.find(input.other).attr({'required' : !0, 'name' : wrap.other.find(input.other).data('name') })
					}
					/* set name */
					j(this).attr('name',j(this).data('name'));
	
					/* set false all required input checkbox */
					wrap.checkbox.find(input.checkbox).prop('required',!1)
	
				}else {
					if( wrap.checkbox.find(input.checkboxChecked).length == 0 ){
						wrap.checkbox.find(input.checkbox).prop('required',!0);
					}
					/* set false require name and value input other */
					if ( wrap.other.length > 0 ) {
						wrap.other.find(input.other).prop({'required' : !1, 'name' : ''}).val('');
					}
					j(this).prop('name','');
				}
			});
	
			j('.wrap_single_radio input[type=radio]').on('change',function(){
				var wrap= {
					'radio' : j(this).closest('.wrap_single_radio'),
					'other' : j(this).closest('.wrap_other'),
				},
				input= {
					'radio' : 'input[type=radio]',
					'other' : '.other',
				};
	
				/* set required input other */
				if ( wrap.other.length > 0 ) {
					var data_name= wrap.other.find(input.other).data('name');
					j.each(wrap.radio.find(input.other),function(i,item){
						if( j(item).data('name') == data_name ) {
							wrap.other.find(input.other).attr({'required' : !0, 'name' : wrap.other.find(input.other).data('name') });
						}else{
							j(item).attr({'required' : !1, 'name' : ''}).val('');
						}
					});
					
				}else {
					wrap.radio.find(input.other).attr({'required' : !1, 'name' : ''}).val('');
				}
	
			});

			
			// if ( j('.tracer-detail-event').length > 0) {
				j.each(j('.tracer-detail-event'),function(i,item){
					console.log(this)
				});
			// }
		})
	</script>
	");

	echo $html;