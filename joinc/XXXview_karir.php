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
					$slide=mysql_query("SELECT * FROM header where id_header='7'");
					$s=mysql_fetch_array($slide);
					
				?>
                <img src="joimg/header_image/<?php echo"$s[gambar]"; ?>" alt="" />
                <div class="flex-caption">
					
                    <h3><?php echo"$s[nama_header_ina]"; ?></h3> 
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
			<div class="col-lg-9 col-md-9">
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
						<div style="margin-left: 0px;ma">
								<ul class="nav nav-tabs" style="background-color: #009a54">
									<li>
										<a href="#">
											Tingkat Jabatan
											<i class="fa fa-chevron-down"></i>
										</a>
									</li>

									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">
											Spesialisasi
											<i class="fa fa-chevron-down"></i>
										</a>
										<ul class="dropdown-menu container-fluid">
											<li><a href="#">Submenu 1-1</a></li>
											<li><a href="#">Submenu 1-2</a></li>
											<li><a href="#">Submenu 1-3</a></li>                        
										</ul>
									</li>

									<li>
										<a href="#">
											Jenis Lowongan
											<i class="fa fa-chevron-down"></i>
										</a>
									</li>

									<li>
										<a href="#">
											Penempatan
											<i class="fa fa-chevron-down"></i>
										</a>
									</li>

								</ul>
							<!-- <ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
								<li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
								<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
								<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
							</ul>

							<div class="tab-content">
								<div id="home" class="tab-pane fade in active">
									<h3>HOME</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
								<div id="menu1" class="tab-pane fade">
									<h3>Menu 1</h3>
									<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								</div>
								<div id="menu2" class="tab-pane fade">
									<h3>Menu 2</h3>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
								</div>
								<div id="menu3" class="tab-pane fade">
									<h3>Menu 3</h3>
									<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
								</div>
							</div> -->
						</div>
					</div>
					<!-- end filter search career -->

					<div class="bawah">
						<center>
						<form name="fillform" method="POST" action="karir-dccustjogja.html"">
							<div class="form-group">
								<div class="col-lg-3">
									<input type="text" class="form-control" name="fil1" placeholder="Ketikan subyek pencarian/perusahaan/Jenis Pekerjaan">
								</div>
								<div class="col-lg-3">
									<select name="fil2" class="form-control">
									<option value="">--Spesialis Pekerjaan--</option>
									<?php
									$spes = mysql_query("SELECT * FROM spesialis");
									while ($dspes = mysql_fetch_array($spes)) {
										?>
										<option value="<?php echo $dspes['id_spes'] ?>"><?php echo $dspes['nama_spes'] ?></option>
										<?php
									}
									?>
									</select>

								</div>
								<div class="col-lg-3">
									<select name="fil3" class="form-control">
									<option value="">--Kota Penempatan--</option>
									<?php
									$penempatan = mysql_query("SELECT * FROM propinsi");
									while ($dpenem = mysql_fetch_array($penempatan)) {
										?>
										<option value="<?php echo $dpenem['propinsi_name'] ?>"><?php echo $dpenem['propinsi_name'] ?></option>
										<?php
									}
									?>
									</select>
								</div>
								<div class="col-lg-3">
									<input type="submit" class="btn btn-success modal-login-btn" name="fillButtom" value="Cari">
								</div>
							</div>
						</form>
						</center>
					</div>
					<?php
						if(isset($_POST['fillButtom'])):
		                	$_SESSION['fillButtom']=$_POST;
		           		endif;
		           		//print_r($_SESSION['fillButtom']);exit();
						$dataPerPage = 15;
			            if(isset($_GET['halaman']))
			            {
			              $noPage = $_GET['halaman'];
			            }
			              else $noPage = 1;
			              $offset = ($noPage - 1) * $dataPerPage;
			              $query   = "SELECT COUNT(*) as jumData FROM karir WHERE  id_karir > 0";
			              	if(!empty($_SESSION['fillButtom']['fil1']))
							$query .= " AND judul_karir LIKE '%".$_SESSION['fillButtom']['fil1']."%'";
						    if(!empty($_SESSION['fillButtom']['fil2']))
							$query .= " AND id_spes LIKE '%".$_SESSION['fillButtom']['fil2']."%'";
							if(!empty($_SESSION['fillButtom']['fil3']))
							$query .= " AND lokasi LIKE '%".$_SESSION['fillButtom']['fil3']."%' ";

							$query .= " ORDER BY id_karir DESC";
			              
			              $hasil  = mysql_query($query);
			              $data     = mysql_fetch_array($hasil);
			              $jumData = $data['jumData'];
					
						$karirfil  ="SELECT * FROM karir WHERE  id_karir  >0 ";
					    
					    if(!empty($_SESSION['fillButtom']['fil1']))
						$karirfil .= " AND judul_karir LIKE '%".$_SESSION['fillButtom']['fil1']."%'";
					    if(!empty($_SESSION['fillButtom']['fil2']))
						$karirfil .= " AND id_spes LIKE '%".$_SESSION['fillButtom']['fil2']."%'";
						if(!empty($_SESSION['fillButtom']['fil3']))
						$karirfil .= " AND lokasi LIKE '%".$_SESSION['fillButtom']['fil3']."%' ";

						$karirfil .= " ORDER BY id_karir DESC LIMIT $offset, $dataPerPage";
						//echo $karirfil;exit();
		        		$datafil = mysql_query($karirfil);
					if (mysql_num_rows($datafil)>0) {
						while($k=mysql_fetch_array($datafil)){
					?>
					<div class="bawah" style="padding-bottom: 20px;">
						<article class="">
						<h4 style="font-weight: 200;"><a href="detailkarir-<?php echo $k['id_karir'] ?>.html" rel="" title="<?php echo"$k[judul_karir]"; ?>"><?php echo"$k[judul_karir]"; ?></a></h4>              
						<div style="margin-top: -15px;">
						<span class="">
							<span class="date">Published</span> 
							<span class="entry-date" title="7:21 am"><?php echo"$k[tanggal]"; ?></span>
						</span> |
						<span class="">
							<span class="">By</span> 
							<span class="">
							<a class="" href="#" title="">admin</a></span>
						</span>
						</div> 
						<div class="">
							
							<p><img class="" alt="executive_development_program_thumb" src="joimg/karir/<?php echo"$k[gambar]"; ?>" style="max-width:300px;height: 200px" /></p>
							<p>&nbsp;</p>
							<ul class="margin">
							<li><strong>Perusahaan 	:  	</strong><?php echo"$k[perusahaan_karir]"; ?></li>
							<li><strong>Batas Ashir : 	</strong><?php echo"$k[deadline]"; ?></li>
							<li><strong>Penempatan 	:	</strong> <?php echo"$k[lokasi]"; ?></li>
							</ul>
							<!--<p style="  margin-left: 326px; margin-top: 30px;"> <a href="#">Read More <span class="meta-nav">...</span></a></p>-->
						</div>
						</article>
					</div>
					<?php } 
					}else{
						?>
						<div class="bawah">
						<br>
						<br>
							<h6><span style="color: #009a54;   font-size: 18px;" data-mce-mark="1">Mohon maaf, lowongan kerja belum tersedia</span></h6>
						</div>
						<?php
					}
					?>
				</div>
				<div class="aa-product-catg-pagination">
              <nav>
            <ul class="pagination">
          <?php
          $jumPage = ceil($jumData/$dataPerPage);
          //echo "<div id=''>";
          //echo "Pages (".$jumPage.") : ";
          if ($noPage > 1) echo  "<li><a aria-label='Previous' class='' href='media2.php?mod=karir&halaman=".($noPage-1)."'>Prev</a></li>";
          $showPage=0;
          for($page = 1; $page <= $jumPage; $page++)
          {
              if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
              {   
                  if (($showPage == 1) && ($page != 2))
                      echo "..."; 
                  
                  if (($showPage != ($jumPage - 1)) && ($page == $jumPage))
                      echo "...";
                  
                  if ($page == $noPage)
                      echo " <li><a><strong>".$page."</strong></a></li> ";
                  else 
                      echo " <li><a class='' aria-label='Next' href='media2.php?mod=karir&halaman=".$page."'>".$page."</a></li> ";
                  $showPage = $page;          
              }
          }
          if ($noPage < $jumPage) echo "<li><a class='' href='media2.php?mod=karir&halaman=".($noPage+1)."'>Next</a></li>";
          ?>
                </ul>
              </nav>
            </div>
			</div>
			
			<div class="col-lg-3 col-md-3">
				<?php include "sidebar.php" ; ?>
			</div>
			
		</div>
	</div>
	</section>