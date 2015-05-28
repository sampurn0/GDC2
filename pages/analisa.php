<?php 
	mysql_connect("localhost", "root", "");
	mysql_select_db("db_gdc");
	
	function tampiltabel($arr) {
		for ($i=0;$i<count($arr);$i++) {
			echo '<tr>';
				for ($j=0;$j<count($arr[$i]);$j++) {
					echo '<td bgcolor="#FFFFFF">'.round($arr[$i][$j],4).'</td>';
				}
			echo '</tr>';
		}
	}
	
	function tampiltabel2($arr, $arr2) {
		for ($i=0;$i<count($arr);$i++) {
			echo '<tr>';
				for ($j=0;$j<count($arr[$i]);$j++) {
					echo '<td bgcolor="#FFFFFF">'.round($arr[$i][$j],4).'</td>';
				}
				echo '<th width="100" bgcolor="#FFFFFF"><div class="text-center">'.round($arr2[$i],4).'</div></th>';
			echo '</tr>';
		}
	}

	function tampilbaris($arr) {
		echo '<tr>';
			for ($i=0;$i<count($arr);$i++) {
				echo '<td bgcolor="#FFFFFF">'.$arr[$i].'</td>';
			}
		echo "</tr>";
	}
	
	function tampilheader($arr, $a) {
		echo '<tr>';
			for ($i=0;$i<count($arr);$i++) {
				echo '<th width="100" bgcolor="#FFFFFF"><div class="text-center">'.$arr[$i].'</div></th>';
			}
			if ($a!=NULL) {
				echo '<th width="100" bgcolor="#FFFFFF"><div class="text-center">'.$a.'</div></th>';
			}
		echo "</tr>";
	}
	
	function tampiljumlah($arr) {
		echo '<tr>';
			for ($i=0;$i<count($arr);$i++) {
				echo '<th width="100" bgcolor="#FFFFFF"><div class="text-center">'.round($arr[$i],4).'</div></th>';
			}
		echo "</tr>";
	}
	
	function tampilkol($arr) {
			for ($i=0;$i<count($arr);$i++) {
				echo '<tr>';
					echo '<td width="60" bgcolor="#FFFFFF">'.$arr[$i].'</td>';
				echo "</tr>";
			}
	}

	function tampilkolom($arr) {
		echo '<table class="table table-bordered">';
			for ($i=0;$i<count($arr);$i++) {
				echo '<tr>';
					echo '<td width="60" bgcolor="#FFFFFF">'.$arr[$i].'</td>';
				echo "</tr>";
			}
		echo '</table>';
	}
?>
<div class="banner1">
    <div class="header">
        <?php include "menu.php"; ?>
    </div>
	<?php 
		$alternatif = array(); //array("Galaxy", "BB", "iPhone", "Lumia");
	
		$queryalternatif = mysql_query("SELECT * FROM alternatif ORDER BY id_alternatif");
		$i=0;
		while ($dataalternatif = mysql_fetch_array($queryalternatif)) {
			$alternatif[$i] = $dataalternatif['nama_alternatif'];
			$i++;
		}
	
		$kriteria = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
		$querykriteria = mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria");
		
		$i=0;
		while ($datakriteria = mysql_fetch_array($querykriteria)) {
			$kriteria[$i] = $datakriteria['nama_kriteria'];
			$i++;
		}
		
		$jk = array();
		for ($i=0;$i<count($kriteria);$i++) {
			$jk[$i]=0;
			for ($j=0;$j<count($kriteria);$j++) {			
				$jk[$i] += $k[$j][$i];
			}
		}
	?>
</div>

<div class="anean"id="contact">
    <div class="container">
        <label></label>
        <div class="anean-top">
			<?php 
				if (!isset($_POST['button'])) {
			?>
					<h1 style="color: white">Perbandingan Kriteria</h1><br>
					<form action="" method="POST">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th><div class="text-center">Kriteria 1</div></th>
									<th><div class="text-center">Perbandingan</div></th>
									<th><div class="text-center">Kriteria 2</div></th>
								</tr>
							</thead>
							<tbody>
								<?php 
									for ($i=0;$i<count($kriteria);$i++) {
										for ($j=0;$j<count($kriteria);$j++) {
											if ($i < $j) { 
								?>
												<tr>
													<td><?php echo $kriteria[$i]; ?></td>
													<td style="width: 500px">
														<div class="form-group">
															<select name="P<?php echo $i; ?>_<?php echo $j; ?>" id="P<?php echo $i; ?>_<?php echo $j; ?>" class="form-control">
																<option value=""></option>
																<option value="1">Sama Penting Dengan (Nilai=1)</option>
																<option value="3">Sedikit Lebih Penting Dari (Nilai=3)</option>
																<option value="5">Lebih Penting Dari (Nilai=5)</option>
																<option value="7">Lebih Mutlak Penting Dari (Nilai=7)</option>
																<option value="9">Mutlak Penting Dari (Nilai=9)</option>
																<option value="2">Nilai Berdekatan Dengan (Nilai=2)</option>
																<option value="0.333333333333333">Sedikit Lebih Penting Dari (Nilai=1/3)</option>
																<option value="0.2">Lebih Penting Dari (Nilai=1/5)</option>
																<option value="0.142857142857143">Lebih Mutlak Penting Dari (Nilai=1/7)</option>
																<option value="0.111111111111111">Mutlak Penting Dari (Nilai=1/9)</option>
																<option value="0.5">Nilai Berdekatan Dengan (Nilai=1/2)</option>
															</select>
														</div>
													</td>
													<td><?php echo $kriteria[$j]; ?></td>
												</tr>
								<?php 
											}
										}
									}
								?>
								<tr>
									<td colspan=3><button type="submit" name="button" id="button" class="btn btn-default">PROSES</button></td>
								</tr>
							</tbody>
						</table>
					</form>
			<?php 
				} else {
					$queryalternatif = mysql_query("SELECT * FROM alternatif ORDER BY id_alternatif");
					$i=0;
					while ($dataalternatif = mysql_fetch_array($queryalternatif)) {
						$querykriteria = mysql_query("SELECT * FROM kriteria ORDER BY id_kriteria");
						$j=0;
						while ($datakriteria = mysql_fetch_array($querykriteria)) {
							$queryalternatifkriteria = mysql_query("SELECT * FROM alternatif_kriteria WHERE id_alternatif = '$dataalternatif[id_alternatif]' AND id_kriteria = '$datakriteria[id_kriteria]'");
							$dataalternatifkriteria = mysql_fetch_array($queryalternatifkriteria);
							
							$x[$i][$j] = $dataalternatifkriteria['nilai'];
							$j++;
						}
						$i++;
					}
					
					$k = array();
					for ($i=0;$i<count($kriteria);$i++) {
						for ($j=0;$j<count($kriteria);$j++) {
							if ($i < $j) { 
								$k[$i][$j] = $_POST['P'.$i.'_'.$j];
							}
							else if ($i == $j) {
								$k[$i][$j] = 1;
							}
							else {
								$k[$i][$j] = 1 / ($_POST['P'.$j.'_'.$i]);
							}
						}
					}
					
					$jk = array();
					for ($i=0;$i<count($kriteria);$i++) {
						$jk[$i]=0;
						for ($j=0;$j<count($kriteria);$j++) {			
							$jk[$i] += $k[$j][$i];
						}
					}
					
					$nk = array();
					for ($i=0;$i<count($kriteria);$i++) {
						for ($j=0;$j<count($kriteria);$j++) {			
							$nk[$i][$j] = ($k[$i][$j] / $jk[$j]) / count($kriteria);
						}
					}

					$jnk = array();
					for ($i=0;$i<count($kriteria);$i++) {
						$jnk[$i] = 0;
						for ($j=0;$j<count($kriteria);$j++) {			
							$jnk[$i] += $nk[$i][$j]; 
						}
					}
					
					$lamda = array();
					for ($i=0;$i<count($kriteria);$i++) {
							$lamda[$i] = $jk[$i]*$jnk[$i];
							// echo '<table class="table table-bordered">';
							// echo '<tr>';
							// echo '<td>';
							// echo round($jk[$i],4)." x ".round($jnk[$i],4)." = ".round($jk[$i]*$jnk[$i],4);
							// echo '</td>';
							// echo "</tr>";
							// echo '</table>';	 
					}
					
					$lamd=0;
					for ($i=0;$i<count($kriteria);$i++) {
						$lamd += $lamda[$i]; 
					}
					
					echo "<h4 style='color: white'>ALTERNATIF</h4>";
					echo '<table class="table table-bordered">';
					tampilbaris($alternatif);
					echo '</table>';
					
					echo "<h4 style='color: white'>KRITERIA</h4>";
					echo '<table class="table table-bordered">';
					tampilheader($kriteria);
					tampiltabel($k);
					tampiljumlah($jk);
					echo '</table>';
					
					echo "<h4 style='color: white'>NK</h4>";
					echo '<table class="table table-bordered">';
					tampilheader($kriteria,"Vector Eigen");
					tampiltabel2($nk,$jnk);
					echo '</table>';
					
					echo '<table class="table table-bordered">';
					echo '<tr>';
					echo '<td>';
					echo "&lambda;<sub>max</sub> = ".round($lamd,4);
					echo "<br>CI = (&lambda;<sub>max</sub>-n)/(n-1)";
					echo "<br>CI = (".round($lamd,4)."-".count($kriteria).")/(".count($kriteria)."-1)";
					echo "<br>CI = ".(round($lamd,4)-count($kriteria))/(count($kriteria)-1);
					echo "<br>CR = ".((round($lamd,4)-count($kriteria))/(count($kriteria)-1))/1.49;
					echo '</td>';
					echo "</tr>";
					echo '</table>';
					
				}
			?>
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