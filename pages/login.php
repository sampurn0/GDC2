<?php 
	mysql_connect("localhost", "root", "");
	mysql_select_db("db_gdc");
	
	if ($_POST['signin']=="Sign in") {
		$user  = $_POST['user'];
		$pass  = $_POST['pass'];
		$sql = mysql_query("SELECT * FROM admin WHERE username='".$user."' AND password='".$pass."'");
		$ketemu = mysql_num_rows($sql);
		$r	    = mysql_fetch_array($sql);
		if ($ketemu > 0){
			$_SESSION['username']    = $r['username'];
			$_SESSION['password']    = $r['password'];
			$_SESSION['nama']        = $r['nama_admin'];
			
			echo "<script>alert('Berhasil Login'); window.location = 'admin'</script>";
			
		}
		else{
			echo "<script>alert('Maaf, Username & Password Salah! Atau ID Anda Sedang Di Blokir Oleh Admin.'); window.location = 'javascript:history.go(-1)'</script>";
		}
	}
?>
<div class="banner1">
    <div class="header">
        <?php include "menu.php"; ?>
    </div>
</div>

<div class="anean"id="contact">
    <div class="container">
        <label></label>
        <div class="anean-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<h1 style="color: white">Login</h1><br>
						<form action="?p=login" method="POST" class="form-signin">
							<input type="text" id="inputEmail" class="form-control" name="user" placeholder="Username" required autofocus>
							<input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
							<input class="btn btn-lg btn-danger btn-block" name="signin" type="submit" value="Sign in" />
						</form>
					</div> 
				</div> 
			</div> 
			<br>
			<br>
			<br>
			<br>
		</div>
        <label></label>
    </div>
</div>
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="clearfix"></div>
    </div>
</div>