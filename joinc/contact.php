<!-- end header -->
	<section id="featured">
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
				<?php
					$album=mysql_query("SELECT * FROM modul WHERE id_modul='7'");
					$g=mysql_fetch_array($album);
				?>
                <img src="joimg/statik/<?php echo "$g[gambar]"; ?>" alt="" />
                <div class="flex-caption">
                    <h3 style="margin-top:-36px;">Kontak kami</h3> 
					<p>Untuk informasi lebih lanjut mengenai detail program kami dan event-event program lainnya, silahkan menghubungi kami di:</p> <hr>		
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
			<div class="col-lg-12 col-md-12">		
				<div class="col-lg-6 col-md-6">
				<?php
				$sql2 					= mysql_query("SELECT * FROM modul WHERE id_modul='7'");
				$m						= mysql_fetch_array($sql2);
				$time_in_12_hour_format = date("l, d/m/Y ||H:i:s" , strtotime($m['tanggal']));
				$jam					= strtoupper($time_in_12_hour_format);
				$nama_modul	 			= "nama_modul_ina";
				$statik	 				= "static_content_ina";
				?>
				<div class="bawah">
					<center><h5><span style="color: #009a54;" data-mce-mark="1">Alamat</span></h3></center>
				</div>
				<div class="art-sheet clearfix">
					<div class="art-layout-wrapper clearfix">
						<div class="art-content-layout">
							<div class="art-content-layout-row">
								<div class="art-layout-cell art-content clearfix">

									<article>
										<div class="art-postcontent clearfix">
											<div class="wpb_row vc_row-fluid">
												<div class="vc_span12 home_accordion1 wpb_column column_container">
													<div class="wpb_wrapper">
														<div class="wpb_accordion wpb_content_element  not-column-inherit" data-collapsible=no data-active-tab="1">
															<div class="wpb_wrapper wpb_accordion_wrapper ui-accordion">
															<div class="wpb_accordion_section group">
																<h3 class="wpb_accordion_header ui-accordion-header"><a href="#consultation"><?php echo"$m[$nama_modul]"; ?></a></h3>
																<div class="wpb_accordion_content ui-accordion-content clearfix">
																<?php echo"$m[$statik]"; ?>
																</div>
															</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</article>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="bawah">
					<center><h5><span style="color: #009a54;;" data-mce-mark="1">Maps</span></h3></center>
				</div>
				<div class="art-sheet clearfix">
					<div class="art-layout-wrapper clearfix">
						<div class="art-content-layout">
							<div class="art-content-layout-row">
								<div class="art-layout-cell art-content clearfix">

									<article>
										<div class="art-postcontent clearfix">
											<div class="wpb_row vc_row-fluid">
												<div class="vc_span12 home_accordion1 wpb_column column_container">
													<div class="wpb_wrapper">
														<div class="wpb_accordion wpb_content_element  not-column-inherit" data-collapsible=no data-active-tab="1">
															<div class="wpb_wrapper wpb_accordion_wrapper ui-accordion">
															<div class="wpb_accordion_section group">
																<h3 class="wpb_accordion_header ui-accordion-header"><a href="#consultation">Maps</a></h3>
																<div class="wpb_accordion_content ui-accordion-content clearfix">
																<?php echo"$m[extra]"; ?>
																</div>
															</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</article>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div class="col-lg-12 col-md-12">
			  <div class="row" style="margin-bottom: 46px;">
				<div class="bawah">
					<center><h5><span style="color: #009a54;;" data-mce-mark="1">Kontak Kami</span></h3></center>
				</div>
				  <form method="post" action="simpancontactus" id="contactfrm" role="form">

                    <div class="col-sm-6 col-lg-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" required="" name="nama" id="name" placeholder="Enter name" title="Please enter your name (at least 2 characters)">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" required="" name="email" id="email" placeholder="Enter email" title="Please enter a valid email address">
                        </div>
						 <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" class="form-control" required="" name="phone" id="name" placeholder="Enter phone" title="Please enter your phone)">
                        </div>
                    </div>
                    <div class="col-sm-6">
						<div class="form-group">
                            <label for="email">Subjek</label>
                            <input type="text" class="form-control" required="" name="subject" id="name" placeholder="Enter subjek" title="Please enter subjek">
                        </div>
                        <div class="form-group">
                            <label for="comments">Comments</label>
                            <textarea name="message" class="form-control" required="" id="comments" cols="3" rows="5" placeholder="Enter your message…" title="Please enter your message (at least 10 characters)"></textarea>
                        </div>
	
						
                        <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">Submit</button>
                        <div class="result"></div>
                    </div>
                </form>	
			  </div>
			</div>
			</div>
			
	</div>
	</section>