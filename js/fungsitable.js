	function tampiltabel($arr) {
		echo '<table class="table table-bordered">';
			for ($i=0;$i<count($arr);$i++) {
				echo '<tr>';
					for ($j=0;$j<count($arr[$i]);$j++) {
						echo '<td bgcolor="#FFFFFF">'.$arr[$i][$j].'</td>';
					}
				echo '</tr>';
			}
		echo '</table>';
	}

	function tampilbaris($arr) {
		echo '<table width="500" border="0" cellspacing="1" cellpadding="3" bgcolor="#000099">';
		echo '<tr>';
			for ($i=0;$i<count($arr);$i++) {
				echo '<td bgcolor="#FFFFFF">'.$arr[$i].'</td>';
			}
		echo "</tr>";
		echo '</table>';
	}

	function tampilkolom($arr) {
		echo '<table width="500" border="0" cellspacing="1" cellpadding="3" bgcolor="#000099">';
			for ($i=0;$i<count($arr);$i++) {
				echo '<tr>';
					echo '<td bgcolor="#FFFFFF">'.$arr[$i].'</td>';
				echo "</tr>";
			}
		echo '</table>';
	}