<?php 
include "config/koneksi.php";
// include "config/class.php";
// $grafik = new Backend();   

// $showdat2 = $grafik->index_visitor();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Grand Depok City</title>
			<link rel="stylesheet" type="text/css" href="asset/themes/default/easyui.css">
			<link rel="stylesheet" type="text/css" href="asset/themes/icon.css">
				
			<script type="text/javascript" src="asset/js/jquery.min.js"></script>
			<script type="text/javascript" src="asset/js/jquery.easyui.min.js"></script>
			<script type="text/javascript" src="asset/js/modify.js"></script>
			
			<script type="text/javascript" src="asset/src/jquery.combobox.js"></script>
			<script type="text/javascript" src="asset/js/proses/kriteria.js"></script>
			<script type="text/javascript" src="asset/js/proses/alternatif.js"></script>
			<script type="text/javascript" src="asset/js/proses/alternatifkriteria.js"></script>
			<script type="text/javascript" src="asset/js/proses/cluster.js"></script>
			<script type="text/javascript" src="asset/js/proses/banner.js"></script>
			<script type="text/javascript" src="asset/js/menu.js"></script>
			<script src="asset/editor/ckeditor.js" type="text/javascript"></script>
			<script src="asset/editor/adapters/jquery.js" type="text/javascript"></script>
		
	<style>
		.panel-tool-close
			{
				display:none !important;
			} 
	</style>
	
	</head>
<?php
	if ($_GET['act']== 'kriteria'){
		include 'pages/kriteria/kriteria.php';
	}
    else if ($_GET['act']== 'alternatif'){
        include 'pages/alternatif/alternatif.php';
    }
    else if ($_GET['act']== 'cluster'){
        include 'pages/cluster/cluster.php';
    }
    else if ($_GET['act']== 'alternatifkriteria'){
        include 'pages/alternatifkriteria/alternatifkriteria.php';
    }
	/* else if ($_GET['act']== 'menu'){
		include 'pages/menu/menu.php';
	}

	else if ($_GET['act']== 'banner'){
		include 'pages/banner/banner.php';
		
	}else if ($_GET['act']== 'address'){
		include 'pages/address/address.php';
	} */


	 else {
?> 


		<div title="Help" data-options="iconCls:'icon-help',closable:true" style="padding:10px">
			Selamat data di halaman admin Sistem Pengambilan Keputusan Pemilihan Rumah Grand Depok City
		</div>
	</div>
	<?php } ?>
	
	<script src="js/highcharts.js"></script>
	<script src="js/highcharts-more.js"></script>
</html>