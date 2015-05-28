<?php 
	mysql_connect('localhost', 'root', '');
	mysql_select_db('db_gdc');

	$sql = "SELECT sum(sub) as jumsub FROM kriteria WHERE aktif='Y'";
	$query = mysql_query($sql);
	$r = mysql_fetch_array($query);
	$count = $r['jumsub'];
	$jum = $_POST['jum'];
	$hit = $_POST['hit'];
	

	$sql2 = "SELECT * FROM kriteria WHERE aktif='Y'";
	$query2 = mysql_query($sql2);
	
	$no1 = 1;
	for($j=1; $j<=$jum; $j++) { 
		$no2 = 1;
		for($i=1; $i<=$count; $i++) {
			
			for($h=0; $h<1; $h++) {
				$resp = $_POST['p'.$jum.'0'];
			}
			$no3 = 1;
			$no5 = 1;
			while($r2 = mysql_fetch_array($query2)) {
				$no4 = 1;
				$nilai = 'p'.$j.$no5;
				for($k=1; $k<=$r2['sub']; $k++) {
					$subkrit = $no3.".".$no4; 
					$idkrit = $no3;
					$no4++;
					echo '<br>';
					
					insert($resp, $idkrit, $subkrit);
				}
				$no3++;
				$no5++;
			}
			$no2++;
		}
	}
	
	
?>