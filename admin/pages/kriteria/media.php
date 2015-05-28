<?php 
if ($_GET['page'] == 'responden') : 
	include_once "tableresponden.php";
elseif ($_GET['page'] == 'kriteria') : 
	include_once "tablekriteria.php";
endif; 
?>