<link rel="stylesheet" type="text/css" href="../../asset/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="../../asset/themes/icon.css">

<script type="text/javascript" src="../../asset/js/jquery.min.js"></script>
<script type="text/javascript" src="../../asset/js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="../../asset/js/proses/kriteria.js"></script>

<div id="p" class="easyui-panel" title="Introduction" style="width:800px;height:350px;padding:10px;"
	data-options="
        tools:[{
        iconCls:'icon-reload',
        handler:function(){
            $('#p').panel('refresh');
        }
    }]
    ">
	<script src="jquery-1.4.3.js"></script>
	<?php 
		mysql_connect('localhost', 'root', '');
		mysql_select_db('db_gdc');
		
		$sql = "SELECT * FROM kriteria WHERE aktif='Y'";
		$query = mysql_query($sql);
		$query2 = mysql_query($sql);
	?>

	<div id="toolbarcluster">
		<a href="javascript:void(0)" id="addScnt" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newcluster()">Tambah Data</a>
	</div>


	<form id="form1" method="POST" action="">
		<table id="p_scents" border=1>
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2" style="width: 220px">Responden / Pertanyaan</th>
				<?php 
					$no=1;
					while($r = mysql_fetch_array($query)) { ?>
						<th style="width: 100px" colspan='<?php echo $r['sub'] ?>'><?php echo $r['nama_kriteria'] ?></th>
				<?php
						$no++;
					} ?>
			</tr>
			<tr>
			<?php 
				$no1 = 1;
				while($r2 = mysql_fetch_array($query2)) { ?>
					<?php
						$no2 = 1;
						for($i=0; $i<$r2['sub']; $i++) { ?>
							<td style="width: 40px; font-weight: bold" align="center"><?php echo $no1.".".$no2; ?></td>
					<?php	
						$no2++;
						} ?>
			<?php
				$no1++;
				} ?>
			</tr>
			<?php 
				$sql = "SELECT * FROM nilaikriteria WHERE subkriteria='1.1'";
				$query = mysql_query($sql);
				
				$no1=1;
				$no=1;
				while($r2 = mysql_fetch_array($query)) { ?>
					<tr>
						<td>
							<?php 
								echo $no; 
							?>
						</td>
						<td>
							<?php 
								echo $r2[1]; 
							?>
						</td>
						<?php 
							$sql3 = "SELECT * FROM nilaikriteria WHERE respondent='$r2[1]'";
							$query3 = mysql_query($sql3);
							while($r3 = mysql_fetch_array($query3)) { ?>
								<td>
									<?php 
										echo $r3[3]; 
									?>
								</td>
						<?php
							} ?>
					</tr>
			<?php
				$no++;
				} ?>
		</table>
	</form>

	<?php
		
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

		// $sql3 = "SELECT * FROM `nilaikriteria` WHERE `nilaikriteria`='0'";
		// $query3 = mysql_query($sql3);
		// $no1 = 1;
		
		// while ($r = mysql_fetch_array($query3)) {
			// for($j=1; $j<=$hit; $j++) { 
				// $no2 = 0;
				// for($i=1; $i<=$count; $i++) {
					// $nilai = $_POST['p'.$j.$i];
					// update($nilai, $r['id']);
				// }
			// }		
		// }
			
	?>
	<?php 
		$sql3 = "SELECT max(respondent) FROM nilaikriteria";
		$compare = mysql_fetch_array(mysql_query($sql3));
		$a = explode("R", $compare[0]);
		if($compare[0]==NULL) {
			$a[1]=0;
		}
		
		echo $a[1];
	?>
	<script>
		$(function() {
			var scntDiv = $('#p_scents');
			var i = $('#p_scents tr').size() + -1;

			$('#addScnt').live('click', function() {
				$('<tr>'+
					'<td align="center"><input type="hidden" name="jum" value="'+i+'"/></td>'+
					'<td align="center"><input type="text" id="p['+i+'][0]" size="20" name="p'+i+'0" value="R'+i+'" placeholder="" /></td>'+
					<?php 
					$no = 1;
					for($i=0; $i<$count; $i++) { ?>
						'<td align="center"><input type="hidden" name="hit" value="<?php echo $i; ?>"/><input type="text" id="p['+i+'][<?php echo $no; ?>]" size="1" name="p'+i+'<?php echo $no; ?>" value="p['+i+'][<?php echo $no; ?>]" placeholder="" /></td>'+
					<?php 
					$no++;
					} ?>
					'<td><a href="#" id="saveScnt">Save </a><a href="#" id="remScnt">Remove</a></td>'+
				'</tr>').appendTo(scntDiv);
				i++;
				return false;
			});

			$('#remScnt').live('click', function() { 
				if( i > 1 ) {
					$(this).parents('tr').remove();
					i--;
				}
				return false;
			});
			
			$('#saveScnt').live('click', function() {
				$("#form1").submit();
			});
		});
	</script>
</div>
<script type="text/javascript">
    var url;
    $('#p').panel('refresh');
</script>
<?php 
	function insert($resp, $idkrit, $subkrit) {
		if($resp!=NULL) {
			$sql = "INSERT INTO `nilaikriteria`(`id`, `respondent`, `idkriteria`, `subkriteria`) VALUES ('','$resp','$idkrit','$subkrit')";
			$result = mysql_query($sql);
			//echo $sql;
			if ($result) {
				echo "<script type='text/javascript'>
					$('#p').panel('refresh', '../pages/kriteria/tableresponden.php');
				</script>";
			}
		}
	}
	
	function update($nilai, $id) {
		$sql = "UPDATE `nilaikriteria` SET `nilaikriteria`='$nilai' WHERE `id`='$id'";
		$result = mysql_query($sql);
		echo $sql;
		if ($result) {
			echo "<script>window.location.reload();</script>";
		}
	}
?>