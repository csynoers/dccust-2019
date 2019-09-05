	<?php
		
		$aksi="modul/mod_user/aksi_user.php";
			$user = mysql_query("SELECT * FROM users WHERE username='admin'");
				$g=mysql_fetch_array($user);
		
		if(isset($_POST['submit'])=="Change"){
				$old = trim($_POST['old']);
				$baru = trim($_POST['baru']);
				$passold=md5($_POST['old']);
				$pass=md5($_POST['baru']);
				if($passold=="$g[password]") {
					include('josys/koneksi.php');
					mysql_query("UPDATE users SET 	password = '$pass'
                            WHERE username  = 'admin'");
							
					echo '<h4 class="alert_success">Password changed</h4><br/>';
					
				}
				else {
					echo '<h4 class="alert_error">Sorry wrong !!</h4><br/>';
				}
		}
	?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Change Password</h4>
			</div>
			<div class="panel-body">
				<form method='POST' enctype='multipart/form-data' action='?module=user'>
					<input type="hidden" name="username" value="<?php echo"$g[username]" ?>">
					<div class="form-group">
						<label>Old Password</label>
						<input class="form-control" name="old" type="text">
					</div>
					<div class="form-group">
						<label>New Password</label>
						<input class="form-control" name="baru" type="text">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Change</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>