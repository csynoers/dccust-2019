<section id="featured">
<!-- start slider -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<!-- Slider -->
			<div id="main-slider" class="flexslider">
			    <ul class="slides">
			      <li>
			        <img src="joimg/header_image/<?php echo $row->gambar ?>" alt="" />
			        <div class="flex-caption">
						
			            <h3><?php echo $row->nama_header_ina ?></h3> 
						<?php echo $row->isi_header_ina ?>
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
					<div class="bawah">
						<center><h5><span style="color: #009a54; font-size: 26px;" data-mce-mark="1">Buku Tamu</span></h3></center>
					</div>
				</div>

				<div class="col-lg-12" style="margin-top: 15px">
				<?php
					foreach ($rows as $key => $value) {
						echo "
							<div class='alert alert-info'>
								<label><i class='fa fa-address-book-o' aria-hidden='true'></i> $value->name</label><br>
								<label><i class='fa fa-calendar' aria-hidden='true'></i> $value->date_send</label><br>
								<span>$value->message_fill</span>
							</div>
							";
					}
				?>
				</div>

				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Form Pengisian Buku Tamu
						</div>
						<div class="panel-body">
							<br>
							<form method="POST" action="send-guest-book.html">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="nama">Nama :</label>
										<input type="text" name="name" class="form-control" placeholder="masukan nama *" required="">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="email">Email :</label>
										<input type="email" name="email" class="form-control" placeholder="masukan email * example@gmail.com" required="">
									</div>
								</div>
								<div class="col-lg-12">
									<label for="pesan">Pesan :</label>
									<textarea name="message_fill" class="form-control" rows="5" placeholder="masukan pesan *" required=""></textarea>
								</div>
								<div class="col-lg-12">
									<div class="checkbox">
								    	<label><input type="checkbox" required=""> Confirm</label>
								  	</div>
								  	<button type="submit" class="btn btn-primary" style="width: 100px">Send</button>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-lg-3">
				<?php $this->home_sidebar() ?>
			</div>
		</div>
	</div>
</section>