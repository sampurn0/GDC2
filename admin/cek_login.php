<?php
	error_reporting(0);
	include "config/koneksi.php";
	function anti_injection($data){
		$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter;
	}
	$username = $_POST['username']; 
	$pass     = anti_injection(md5($_POST['password']));
	if (!ctype_alnum($pass)){ 
?>

<script>
	alert("Sorry Wrong Username Or Password...!");
	window.location="login.php"
</script><?php }
	else{
		$login=mysql_query("SELECT * FROM admin	WHERE username='$username' AND password='$pass' ")or die ("SQL Error:".mysql_error());;
		$ketemu=mysql_num_rows($login);
		$r=mysql_fetch_array($login);
		  function gen_random_string($length=16)
	{
		$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
		$final_rand='';
		for($i=0;$i<$length; $i++)
		{
			$final_rand .= $chars[ rand(0,strlen($chars)-1)];
	 
		}
		return $final_rand;
	}
	 
	// $put = gen_random_string()."\n"; //generates a string
	 // mysql_query("insert INTO log_activity(username,sessionid) VALUES('$r[username]','$put')");
		
		  //mysql_query("update user set sessionid = '$put' where username='$r[username]'");

	// Apabila username dan password ditemukan
	if ($ketemu > 0){
	  session_start();

	  // ADMIN  

	  $_SESSION[username] 	  = $r[username];
	  $_SESSION[sessionid] 	  = $put;

		echo "<script>alert('Anda berhasil masuk'); window.location = 'index.php?content=home'</script>";
	//	header('location:index.php?content=home');	 
	
	}
		else{ ?> 
			<script>
				alert("Maaf, Username & Password Salah!");
				window.location="login.php"
			</script>
		<?php
		}
	}
?>
