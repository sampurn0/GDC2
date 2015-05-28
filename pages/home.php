<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("db_gdc")
?>
<div class="banner">
    <div class="header">
        <?php include "menu.php"; ?>
    </div>
    <?php include "banner.php"; ?>
</div>
    <div class="duis">
    <div class="down">
        <a href="#contact" class="scroll" "=""><img src="images/dwnar.png" class="img-responsive" alt="" /></a>
    </div>
    <div class="container">
        <h2><center>GRAND DEPOK CITY</center></h2>
        <div class="elites">
            <?php
				$query = mysql_query("SELECT * FROM `alternatif`");
				while ($r=mysql_fetch_array($query)) { ?>
					<div class="col-md-4 elite-grid" style="padding-bottom: 40px">
						<a href="single.html"><img src="images/e1.jpg" alt=""/></a>
						<h3><a href="single.html"><?php echo strtoupper($r['nama_alternatif']); ?></a></h3>
						<p>Quisque volutpat odio sit amet mi volutpat, a bibendum ante vulputate. Praesent bibendum lorem
							non sem cursus, eu tempus leo condimentum. Sed nec ullamcorper massa.</p>
						<a href="single.html" class="more">[ Read More..]</a>
					</div>
			<?php
				}
			?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="clearfix"></div>
    </div>
</div>