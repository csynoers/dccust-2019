<aside class="right-sidebar">
	<div class="thum">
		<div style="margin-left:10px;">
			<h5 class="widgetheading">Search DCC UST</h5>
			<form class="form-search" action="pencarian" method="POST">
				<input  name="pencarian" class="form-control" style="  margin-top: -19px; margin-bottom: 9px;" type="text" placeholder="Search..">
			</form>
		</div>
	</div>
	<div class="thum">
		<div style="margin-left:10px;">
    			<?php 
    			if (count($rows['user']) > 0) {
    				?>
    			<h5 class="widgetheading">Menu Alumni</h5>
    				<p>
    					<a href="#">PROFIL</a><br>
    					<a href="kuesioner.html">KUESIONER</a><br>
    					<a href="logout.html">LOGOUT</a>
    				</p>
				<?php
    			}else{
    				?>
    				<h5 class="widgetheading">Login Alumni</h5>
    				<form action="cek_login.html" method="post">
	        			<div class="form-group">
		              		<input name="username" type="email" id="username3" placeholder="Enter your email" value="" class="form-control">
		            	</div>
		            	<div class="form-group">
		            	  	<input name="password" type="password" id="login-pass3" placeholder="Password" value="" class="form-control">
		            	</div>
		            	<button type="submit" name="login" value="login" class="btn btn-success modal-login-btn">Login</button>
		        	</form>
	    			<p>Daftar Alumni?, <a href="daftar-dccustjogja.html">Daftar</a></p>
    				<?php
    			}
    			?>
		</div>
	</div>
	<div class="thum">
		<div style="margin-left:10px;   ">
			<h5 class="widgetheading">Alamat</h5>
            <p style="margin-top: -19px;"><?php echo $rows['alamat']->static_content_ina ?></p>					
		</div>
	</div>
	<div class="thum">
		<div style="margin-left:10px;">
			<h5 class="widgetheading">Banner</h5>
				<?php
					foreach ($rows['banner'] as $key => $value) {
						echo '<a href="'.$value->link.'"><img src="https://via.placeholder.com/300x100.png?text='.$value->judul.'" style="width:100%; margin-top: -19px;" data-src="joimg/banner/'.$value->gambar.'"></a>';
					}
				?>
		</div>
	</div>
	<div class="thum">
		<div style="margin-left:10px;">
			<h5 class="widgetheading">Social media</h5>
			<?php
                foreach ($rows['sosmed'] as $key => $value) {
                    echo '<a href="'.$value->link.'"><img id="left_banner" src="joimg/sosial/'.$value->gambar.'"></a>';
                }
            ?>	
		</div>
	</div>
	<div class="thum">
		<div style="margin-left:10px;">
			<h5 class="widgetheading">Hit counter</h5>
			<?php $this->statistik() ?>
		</div>
	</div>
</aside>