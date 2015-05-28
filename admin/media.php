<?php 
if ($_GET['page'] == 'home') : 
	include_once "pages/home.php";

elseif ($_GET['page'] == 'intro') :
    include_once "pages/info/intro.php";

endif; 
?>