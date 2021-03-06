<?php
/* 	echo '<pre>'; #for debuging view
	foreach ($this->tracer_study() as $key => $value) { #for debuging view
		if ( $value->child_count == '0' ) { #for debuging view
			echo strip_tags(json_encode($value)).'<br>'; #for debuging view
			foreach($this->tracer_study_detail($value->tracer_study_id) as $keyd => $valued) { #for debuging view
				echo '&nbsp;&nbsp;&nbsp;&nbsp;'.strip_tags(json_encode( $valued )).'<br>'; #for debuging view
			} #for debuging view
		} else { #for debuging view
			echo strip_tags(json_encode($value)).'<br>'; #for debuging view
			foreach ( $this->tracer_study($value->tracer_study_id) as $key_rows_child => $value_rows_child) { #for debuging view
				echo '&nbsp;&nbsp;&nbsp;&nbsp;'.strip_tags(json_encode($value_rows_child)).'<br>'; #for debuging view
				foreach($this->tracer_study_detail($value_rows_child->tracer_study_id) as $keyd => $valued) { #for debuging view
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.strip_tags(json_encode( $valued )).'<br>'; #for debuging view
				} #for debuging view
			} #for debuging view
		} #for debuging view
	} #for debuging view
	echo '</pre>'; #for debuging view */

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
					<form id="formKuesioner" action="store-kuesioner.html" method="POST">
						<div class="panel-group" id="accordion">';

							# loop rows tracer_study without parent
							foreach ($this->tracer_study() as $key => $value) {
								$sub_html = strip_tags($value->tracer_study_desc) === NULL ? NULL : strip_tags($value->tracer_study_desc).'<br>';
								if ( $value->child_count == '0' ) { # if this row have not a childs
									$sub_html .= $this->{$value->tracer_study_form_type}( $this->tracer_study_detail($value->tracer_study_id) );

								} else { # if this row have a childs
									foreach ( $this->tracer_study($value->tracer_study_id) as $key_rows_child => $value_rows_child) {
										$rows_sub_child_html = strip_tags($value_rows_child->tracer_study_desc) === NULL ? NULL : strip_tags($value_rows_child->tracer_study_desc).'<br>';
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
							echo '</pre>';

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
			/* start set data name input type expect other class */
			function setName(d)
			{
				if ( d ) {
					j.each(d,function(a,b){
						j(b).prop({ 'name' : j(b).data('name') , 'required' : !0 })
					});
				} else {
					j.each(j('#formKuesioner input').not('.other'),function(a,b){
						j(b).prop({ 'name' : j(b).data('name') , 'required' : !0 })
					});
				}
			}
			setName();
			/* end set data name input type expect other class */

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

			
			if ( j('.tracer-detail-event').length > 0) {
				function displayWrapperBlock(d){
					switch(d.type) {
						case 'radio':
							var tempActive;
							j.each(d.block.find('input[type=radio]'),function(a,b){
								var target = getAttrDetailEvent(j(this)).target;
								if ( j(b).is(':checked') ) {
									hideWrapperBlock( target );
									tempActive = target;
								}else{
									showWrapperBlock( target );
								}
							});
							hideWrapperBlock( tempActive );

							break;
						default :
							break;
					}
				};

				/* start show and hide wrapper block */
				function showWrapperBlock(d)
				{
					if ( d ) {
						j.each(d,function(a,b){
							var w = j('.wrap-tracer-block[data-id='+b+']');
							
							/* display block this element */
							w.css('display','block');
							/* set name from data name and required is true */
							setName( j(w).find('input').not('.other') );

						})
					}
				}
				function hideWrapperBlock(d)
				{
					if ( d ) {
						j.each(d,function(a,b){
							j('.wrap-tracer-block[data-id='+b+']')
								.css('display','none')
								.find('input').prop({ 'name' : '' , 'required' : !1 });
						})
					}
				}
				/* start show and hide wrapper block */


				function getAttrDetailEvent(row)
				{
					return {
						'event'		: row.data('event'),
						'name'		: row.data('name'), 
						'type'		: row.prop('type'), 
						'action'	: row.data('action'), 
						'target'	: row.data('target-' + row.data('action')) 
					};
				}

				function getWrapperBlockId()
				{
					var temp= [];
					j.each(j('.tracer-detail-event'),function(a,b){
						var id = j(this).closest('.wrap-tracer-block').data('id');
						if ( temp.indexOf( id ) == -1 ) {
							temp.push( id );
						}
					});
					return temp;
				};
				
				j.each(getWrapperBlockId(),function(a,b){
					var wrapBlock= j(document).find('.wrap-tracer-block[data-id='+b+']');
					wrapBlock.find('input').on('click',function(){
						switch( j(this).prop('tagName') ) {
							case 'INPUT':
								switch( j(this).prop('type') ) {
									case 'radio':
										displayWrapperBlock({
											'type' : j(this).prop('type'),
											'block' : wrapBlock 
										});
										break;

									default:
										console.log('belum terdefinisi, silahkan hubungi www.jogjasite.com');
										break;
								}
								break;

							default:
								console.log('belum terdefinisi, silahkan hubungi www.jogjasite.com');
								break;
						}
					})
				})
			};

		});
		
	</script>
	");

	echo $html;