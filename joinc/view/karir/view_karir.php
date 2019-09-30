<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<section id="featured">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Slider -->
			    <div id="main-slider" class="flexslider">
			        <ul class="slides">
						<li>
							<img src="joimg/header_image/<?php echo $slide->img_src ?>" alt="" />
							<div class="flex-caption">
							    <h3><?php echo $slide->name_header_ina; ?></h3> 
							</div>
						</li>
			        </ul>
			    </div>
				<!-- end slider -->
			</div>
		</div>
	</div>	
</section>

<section id="featured">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="col-lg-12">
					<!-- title page -->
					<div class="bawah">
						<center>
							<h3>
								<span style="color: #009a54;   font-size: 26px;" data-mce-mark="1">Lowongan Kerja</span>
							</h3>
						</center>
					</div>
					<!-- end title page -->

					<!-- filter search career -->
					<br>
					<div class="bawah">
						<div style="margin-left: 0px">
							<ul class="nav nav-tabs" style="background-color: #009a54">
								<li class="cs-li">
									<a data-toggle="tab" href="#home">
										Tingkat Jabatan
										<i class="fa fa-chevron-down"></i>
									</a>
								</li>

								<li class="cs-li">
									<a data-toggle="tab" href="#menu1">
										Spesialisasi
										<i class="fa fa-chevron-down"></i>
									</a>
								</li>

								<li class="cs-li">
									<a data-toggle="tab" href="#menu2">
										Jenis Lowongan
										<i class="fa fa-chevron-down"></i>
									</a>
								</li>

								<li class="cs-li">
									<a data-toggle="tab" href="#menu3">
										Penempatan
										<i class="fa fa-chevron-down"></i>
									</a>
								</li>
							</ul>

							<div class="tab-content">
								<!-- tingkat jabatan -->
								<div id="home" class="tab-pane fade">
									<?php 
									foreach ($jabatan as $key) {
										?>
											<div class="col-lg-4">
												<label class="checkbox-inline" data-toggle="tooltip" data-placement="bottom" title="<?php echo $key->name ?>">
													<input class="jb" type="checkbox" value="<?php echo $key->id ?>" name="jabatan">
													<?php echo substr($key->name,0,32); echo strlen($key->name) > 32 ? '...':'' ?>
												</label>
											</div>
										<?php
									}
									?>
									<p class="clear-fix"></p>
									<br>
									<div class="cs-footer">
										<button type="button" class="btn btn-success" id="jabatan">
											<i class="fa fa-check-square-o" aria-hidden="true"></i>
											Pilih
										</button>
										<button type="button" class="btn btn-success check" style="float: left;">
											<i class="fa fa-check-square-o" aria-hidden="true"></i>
											Check All
										</button>
									</div>
								</div>
								<!-- end tingkat jabatan -->

								<!-- spesialisasi pekerjaan -->
								<div id="menu1" class="tab-pane fade">
									<?php 
									foreach ($spesialis as $key) {
										?>
											<div class="col-lg-4">
												<div class="form-group">
													<label class="radio-inline" data-toggle="tooltip" data-placement="bottom" title="<?php echo $key->nama_spes ?>">
														<input type="radio" name="spesialis" value="<?php echo $key->id_spes ?>">
														<?php echo $key->nama_spes ?>
													</label>
												</div>
											</div>
										<?php
									}
									?>
									<p class="clear-fix"></p>
									<br>
									<div class="cs-footer">
										<button type="button" class="btn btn-success" id="spesialis">
											<i class="fa fa-check-square-o" aria-hidden="true"></i>
											Pilih
										</button>
									</div>
								</div>
								<!-- end spesialisasi pekerjaan -->

								<!-- jenis lowongan -->
								<div id="menu2" class="tab-pane fade">
											<div class="col-lg-3">
												<div class="form-group">
													<label class="radio-inline">
														<input type="radio" name="jenis" value="zero">
														Semua Jenis Lowongan
													</label>
												</div>
											</div>
									<?php 
									foreach ($jenis as $key) {
										?>
											<div class="col-lg-3">
												<div class="form-group">
													<label class="radio-inline">
														<input data-jenis="<?php echo $key->name ?>" type="radio" name="jenis" value="<?php echo $key->id ?>">
														<?php echo $key->name ?>
													</label>
												</div>
											</div>
										<?php
									}
									?>
									<p class="clear-fix"></p>
									<br>	
									<div class="cs-footer">
										<button type="button" class="btn btn-success" id="jenis">
											<i class="fa fa-check-square-o" aria-hidden="true"></i>
											Pilih
										</button>
									</div>
								</div>
								<!-- end jenis lowongan -->

								<!-- penempatan -->
								<div id="menu3" class="tab-pane fade">
									
									<div class="form-group">
										<label>Pilih Kota</label>
										<select class="form-control" id="penempatan">
											<option value="zero"> -- Pilih Kota -- </option>
											<option value="00"> Semua Kota </option>
											<?php
											foreach ($penempatan as $key) {
												?>
													<option data-penempatan="<?php echo $key->propinsi_name ?>" value="<?php echo $key->propinsi_id ?>"><?php echo $key->propinsi_name ?></option>
												<?php
											}
											?>
										</select>	
									</div>
									<div class="cs-footer">
										<button type="button" class="btn btn-success" id="penempatan">
											<i class="fa fa-check-square-o" aria-hidden="true"></i>
											Pilih
										</button>
									</div>
								</div>
								<!-- end penempatan -->

							</div>
						</div>
					</div>
					<!-- end filter search career -->

					<!-- content lowongan -->
					<div class="cs-content">
						<div class="bawah cs-cp" style="margin-top:20px; border-top: 1px solid #ddd;">
							<h3 style="padding-bottom: 20px; color: #009a54; border-bottom: 1px solid #ddd"><i class="fa fa-bars" aria-hidden="true"></i> Semua Lowongan ( <?php echo count($karir) ?> )</h3>
							<p class="clear-fix"></p>
							<?php
								foreach ($karir as $key) {
									?>
										<div class="col-lg-12" style="border: 1px solid #ddd">
											<a href="detailkarir-<?php echo $key->id_karir.'-'.$key->seo_ina ?>.html">
												<h3 style="color: #009a54"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $key->judul_karir ?></h3>
											</a>
											<div class="col-lg-2">
												<img class="img-responsive" src="joimg/karir/<?php echo $key->gambar ?>">
											</div>

											<div class="col-lg-10">
												<?php echo substr(strip_tags($key->isi_karir), 0,400) ?>
												<a class="data-page" data-page="<?php echo $key->id_karir ?>" href="detailkarir-<?php echo $key->id_karir.'-'.$key->seo_ina ?>.html">... Read More</a>

												<div class="alert alert-info">
												<strong>Deadline :</strong> <?php echo $key->deadline_mod ?>
												</div>
												
											</div>
										</div>
										<p class="clear-fix"></p>
									<?php
									$data_paging= ($key->id_karir); 
								}
							?>
						</div>
					</div>
					<!-- end content lowongan -->

				</div>

				<!-- paging -->
				<div class="col-lg-12">
					<div style="margin-left: -25px;margin-right: -1px;" class="page">
						<ul class="cs-pagination">
							 <li data-paging="<?php echo $data_paging ?>">Load More...</li> 
							<!-- <li id="load-data">Load More ajax...</li> -->
						</ul>
					</div>
				</div>
				<!-- end paging	 -->

			</div>


			<!-- sidebar -->
			<div class="col-lg-3">
				<?php $this->home_sidebar() ?>
			</div>
			<!-- end side bar -->
		</div>
	</div>
</section>
<script type="text/javascript">
		// check&uncheck all
	$(document).ready(function() {
	    $('.check:button').toggle(function(){
	        $('input:checkbox').attr('checked','checked');
	        $(this).text('uncheck all');
	    },function(){
	        $('input:checkbox').removeAttr('checked');
	        $(this).text('check all');        
	    })
		// end check&uncheck all
		
		// create action pilih jabatan
        $("#jabatan").click(function(){

            var jabatan = [];
            $.each($("input[name='jabatan']:checked"), function(){            
                jabatan.push($(this).val());
            });
            // alert("id jenis tingkat jabatan adalah: " + jabatan.join(", "));

            $.ajax({
				type:"POST",
				cache:false,
				url:"joinc/controller/controller_filter_karir.php",
				data:{id_jabatan:jabatan},    // multiple data sent using ajax
				success: function (html) {
          			$('.cs-content').html(html);
        		}
     		});
 		    if (!$(".jb").is(":checked")) {
		        alert("Silahkan Pilih Tingkat Jabatan terlebih Dahulu !");
		        return false;
		    }
		    return true;
        });

		// create action spesialisasi pekerjaan
		$("#spesialis").click(function(){
            var spesialis = $("input[name='spesialis']:checked").val(),
            	cek = $('input[name=spesialis]:checked');
            if(cek.length<=0){
				alert("Silahkan Pilih Salah Satu Spesialisasi Terlebih Dahulu");

			}else{
	            $.ajax({
					type:"POST",
					cache:false,
					url:"joinc/controller/controller_filter_karir.php",
					data:{id_spesialis:spesialis},    // multiple data sent using ajax
					success: function (html) {
	          			$('.cs-content').html(html);
	        		}
	     		});
	     	}
        });

		// create action jenis lowongan
		$("#jenis").click(function(){
            var jenis 	= $("input[name='jenis']:checked").val(),
            	cek 	= $('input[name=jenis]:checked'),
            	txt 	= $("input[name='jenis']:checked").attr("data-jenis");
            if(cek.length<=0){
				alert("Silahkan Pilih Salah Satu Jenis Lowongan Terlebih Dahulu");

			}else{
	            $.ajax({
					type:"POST",
					cache:false,
					url:"joinc/controller/controller_filter_karir.php",
					data:{id_jenis:jenis,caption:txt},    // multiple data sent using ajax
					success: function (html) {
	          			$('.cs-content').html(html);
	        		}
	     		});
            	
            }

        });

		// create action penempatan
		$("button#penempatan").click(function(){
			var penempatan = $('select#penempatan').find(":selected").val();
			var txt 	   = $('select#penempatan').find(":selected").attr("data-penempatan");
            // alert("id penempatan adalah: " + penempatan);

            if (penempatan=='zero') {
            	alert("Maaf Anda Belum Memilih Kota ");

            }else{
				$.ajax({
					type:"POST",
					cache:false,
					url:"joinc/controller/controller_filter_karir.php",
					data:{id:penempatan,caption:txt},   // multiple data sent using ajax
					success: function (html) {
	          			$('.cs-content').html(html);
	        		}
	     		});
            	
            }
		});

    });

    (function(j){
    	// var parray=[];
    	// j(".data-page").each(function(){
    	// 	var v= j(this).attr("data-page");
    	// 	parray.push(v);
    	// });
    	// var new_parray= parray.sort();
    	// console.log(new_parray[0]);
    	// j(".load-data").append(new_parray[0]);

    	j(".cs-pagination").on("click","li",function(){
    		var i= j(this).attr("data-paging"),
    			k= (i*1)-(5*1);
    		j.ajax({
    			type:"POST",
    			cache:false,
    			url: "joinc/controller/controller_filter_karir.php",
    			data:{id_page:k},
    			success: function(html){
    				if (html=='') {
	    				j(".cs-pagination li").remove();
	    				j(".cs-pagination").wrapInner("<li class='end-page' data-paging='end'>Sorry No More Post !</li>");

    				}else{
	    				j(".cs-pagination li").remove();
	    				j(".cs-pagination").wrapInner("<li data-paging="+k+">Load More ...</li>");
	    				j(".cs-cp").append(html);
    				}
    			},

    		});
    	});

    	j(".cs-content").on("change",function(){
    		console.log("data baru");
    	});

    })(jQuery);
</script>