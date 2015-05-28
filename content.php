<?php
	error_reporting(0);
    $page = $_GET['p'];

    if ($page=="home" || $page=="") :
        include "pages/home.php";
    elseif ($page=="about") :
        include "pages/about.php";
    elseif ($page=="analisa") :
        include "pages/analisa.php";
    elseif ($page=="login") :
        include "pages/login.php";
    endif
?>