<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=" />
	<title></title>
	
	<link type="text/css" href="./style2.css" rel="stylesheet" />
	<link type="text/css" href="./css/login.css" rel="stylesheet" />
	
	<!-- jquery library -->
	<script type='text/javascript' src='./js/jquery-1.5.2.min.js'></script>
	<!-- iphone like checkboxes -->
	<!-- <script type='text/javascript' src='./js/iphone-style-checkboxes.js'></script> -->

	<script type='text/javascript'>
		// jQuery(document).ready(function() {
		// 	jQuery('.iphone').iphoneStyle();
		// });
	</script>
	<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>
<meta charset="UTF-8"><style type="text/css">
<!--
body {
	background-color: #666666;
}
-->
</style></head>
<body OnLoad="document.login.username.focus();">
	<div id="line"><!-- --></div>
	<div id="background">
		<div id="container">
			<div id="logo"><br>
			  <br>
			  <br>
			  <br>
			</div>
		<div id="box">
		<form name="login" action="cek_login.php" method="POST" onSubmit="return validasi(this)">
			<center><img src="../img/logo.png" style="width:150px;"><img src="../img/logoust.png" style="width:150px;"></center>
			<div class="one_half">
			<p><b>Username</b><input type="text" name="username" class="field" onBlur="if (jQuery(this).val() == &quot;&quot;) { jQuery(this).val(&quot;username&quot;); }" onClick="jQuery(this).val(&quot;&quot;);" /></p>
			</div>
			<div class="one_half last">
			<p><b>Password</b><input type="password" name="password" class="field" onBlur="if (jQuery(this).val() == &quot;&quot;) { jQuery(this).val(&quot;asdf1234&quot;); }" onClick="jQuery(this).val(&quot;&quot;);">	</p>
			<p><input type="submit" value="Login" class="login" /></p>
			</div>
		</form> 
			<p style="margin-bottom: -84px; color: rgb(240, 232, 230);">Copyright @2016-<?php echo date("Y") ?>. Developed by <a href="http://jogjasite.com" target="_blank">Jogjasite.com</p>
		</div>
 		
		</div>
	</div>
</body>
</html>
