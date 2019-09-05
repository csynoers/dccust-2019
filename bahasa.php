<?php
	session_start();
	if ($_GET['bahasa']!=''){
	$_SESSION['bahasa']= $_GET['bahasa'];
	}
?>
<script>
  window.history.back()
</script>
