<?php
	error_reporting(0);
	include "config/koneksi.php";
		$c = $_GET['destroy'];

		$h = date('Y-m-d G:i:s');
			mysql_query("update log_activity set last_login ='$h' where  sessionid like '%$c%'");

	  session_start();
	  session_destroy();

	  echo "<script>alert('Anda telah keluar dari halaman administrator'); window.location = '../'</script>";
?>
