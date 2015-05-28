<div class="container">
	<div class="logo">
		<a href="?p=home"><img src="images/logo.png" class="img-responsive" alt="" /></a>
	</div>
	<div class="hader-left">
		<h1><a href="?p=home">GRAND DEPOK CITY</a></h1>
		<h6><a href="?p=home">HOMES</a></h6>
	</div>
	<div class="head-nav">
		<span class="menu"> </span>
		<ul class="cl-effect-3">
			<li <?php if($_GET['p']=="home") { echo 'class="active"'; } ?>><a href="?p=home">Home</a></li>
			<li <?php if($_GET['p']=="about") { echo 'class="active"'; } ?>><a href="?p=about">About</a></li>
            <li <?php if($_GET['p']=="analisa") { echo 'class="active"'; } ?>><a href="?p=analisa">Analisa</a></li>
            <li <?php if($_GET['p']=="login") { echo 'class="active"'; } ?>><a href="admin/login.php">Login</a></li>
            <div class="clearfix"></div>
		</ul>
	</div>
	<div class="clearfix"> </div>
	<!-- script-for-nav -->
		<script>
			$( "span.menu" ).click(function() {
			  $( ".head-nav ul" ).slideToggle(300, function() {
				// Animation complete.
			  });
			});
		</script>
	<!-- script-for-nav --> 	
</div>				