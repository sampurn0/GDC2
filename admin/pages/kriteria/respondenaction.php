<?php
	include '../../config/koneksi.php';

	if ($_GET['act'] == 'list'){
	$page = isset($_POST['page']) ? intval($_POST['page']) : 0;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'idkriteria';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$offset = ($page-1)*$rows;

		$result = array();
		
	  
		$rs = mysql_query("select count(*) from nilaikriteria");
		$row = mysql_fetch_row($rs);
		$result["total"] = $row[0];
		 
		$rs = mysql_query("select * from nilaikriteria order by $sort $order limit $offset,$rows");
		 
		$items = array();
		while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
		}
		$result["rows"] = $items;
		 
		echo json_encode($result);
	}
	
	else if ($_GET['act'] == 'create'){
		$responden = htmlspecialchars($_REQUEST['responden']);
		$idkriteria = htmlspecialchars($_REQUEST['idkriteria']);
		$subkriteria = htmlspecialchars($_REQUEST['subkriteria']);
		$nilaikriteria = htmlspecialchars($_REQUEST['nilaikriteria']);
		$result = mysql_query("INSERT INTO `nilaikriteria`(`id`, `responden`, `idkriteria`, `subkriteria`, `nilaikriteria`)
									VALUES ('','$responden','$idkriteria','$subkriteria','$nilaikriteria')");
		if ($result){
			echo json_encode(array(
				'id' => mysql_insert_id(),
				'responden' => $responden,
				'idkriteria' => $idkriteria,
				'subkriteria' => $subkriteria,
				'nilaikriteria' => $nilaikriteria
			));
		} 
		else {
			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}								   
	}
	
	else if ($_GET['act'] == 'delete'){
		$id = intval($_REQUEST['id']);
		$result = mysql_query("delete from nilaikriteria where id='".$id."'");

		if ($result){
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}
	}

	else if ($_GET['act'] == 'update'){
		$id = intval($_REQUEST['id']);
		$nama_kriteria = htmlspecialchars($_REQUEST['nama_kriteria']);
		$sub = htmlspecialchars($_REQUEST['sub']);
		$aktif = htmlspecialchars($_REQUEST['aktif']);


		$sql = "update kriteria set nama_kriteria='$nama_kriteria', sub ='$sub', aktif ='$aktif' where id_kriteria='$id'";
		$result = @mysql_query($sql);
		if ($result){
			echo json_encode(array(
				'id_kriteria' => mysql_insert_id(),
				'nama_kriteria' => $nama_kriteria,
				'sub' => $sub,
				'sub' => $aktif
			));
		} else {
			echo json_encode(array('errorMsg'=>'Some errors occured.'));
		}
	}
	
	else if ($_GET['act'] == 'tampil_responden'){ 
		
	}
	
	