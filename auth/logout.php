<?php
  session_start();
  session_destroy();
  echo "<script>alert('Proses logout sukses!!'); window.location = '../index.php'</script>";
?>
