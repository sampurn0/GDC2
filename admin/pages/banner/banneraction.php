<?php
	include '../../config/koneksi.php';

if ($_GET['act'] == 'list'){
	$page = isset($_POST['page']) ? intval($_POST['page']) : 0;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_banner';
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$offset = ($page-1)*$rows;

	$result = array();
	
  
    $rs = mysql_query("select count(*) from banner");
    $row = mysql_fetch_row($rs);
    $result["total"] = $row[0];
     
     $rs = mysql_query("select * from banner order by $sort $order limit $offset,$rows");
     
    $items = array();
    while($row = mysql_fetch_object($rs)){
    array_push($items, $row);
    }
    $result["rows"] = $items;
     
    echo json_encode($result);
	}
else if ($_GET['act'] == 'sort'){
	
	 
    $rs = mysql_query("SELECT id_sort, sort
FROM banner
UNION ALL SELECT count( id_sort )+1 AS id_sort, count( id_sort )+1 AS sort
FROM banner
ORDER BY sort ASC ");
     
	$items = array();
		while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
		}
		
	$result= $items;
	
	
		echo json_encode($result);
			
	}
else if ($_GET['act'] == 'editsort'){
	
	 
    $rs = mysql_query("SELECT id_sort, sort
FROM banner
ORDER BY sort ASC ");
     
	$items = array();
		while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
		}
		
	$result= $items;
	
	
		echo json_encode($result);
			
	}	
else if ($_GET['act'] == 'create'){

$deskripsi = htmlspecialchars($_REQUEST['deskripsi']);
$aktif = htmlspecialchars($_REQUEST['aktif']);
$sort = htmlspecialchars($_REQUEST['sort']);
		$result2 = mysql_query("SELECT max(sort)+1 as max FROM banner");	
		$asd = mysql_fetch_array($result2);
		$data = $asd['max'];
		
		$kd_sort = mysql_query("SELECT count(id_sort)+1 as max FROM banner");	
		$arr = mysql_fetch_array($kd_sort);
		$isi = $arr['max'];
		if ($isi == '0'){
				$isi = 1;
			}
		else {
		$isi = $sort;
		}
		$results = mysql_query("UPDATE banner SET sort = '$data', id_sort='$data' where sort = '$sort'  ");
			
	$folder = "../../banner/"; 
	$folder = $folder . basename( $_FILES['file']['name']); 
	$gambar        =($_FILES['file']['name']); 
		//Insert record into database
		 if(move_uploaded_file($_FILES['file']['tmp_name'], $folder))
	 { 			
		
		$result = mysql_query("INSERT INTO banner(banner,deskripsi, id_sort,sort, aktif) VALUES('$gambar','$deskripsi','$isi', '$sort', '$aktif')");
	 }
		else {
		$result = mysql_query("INSERT INTO banner(deskripsi, id_sort,sort, aktif) VALUES('$deskripsi','$isi', '$sort', '$aktif')");
	 }		

if ($result){
	echo json_encode(array(
		'id_banner' => mysql_insert_id(),
		'name_banner' => $name_banner
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}								   
}
else if ($_GET['act'] == 'delete'){
	$id = intval($_REQUEST['id']);
$result = mysql_query("delete from banner where id_banner='".$id."'");

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

}

else if ($_GET['act'] == 'update'){
$id = intval($_REQUEST['id']);
$deskripsi = htmlspecialchars($_REQUEST['deskripsi']);
$aktif = htmlspecialchars($_REQUEST['aktif']);
$sort = htmlspecialchars($_REQUEST['sort']);
$id_sort =  htmlspecialchars($_REQUEST['id_sort']);
$result2 = mysql_query("SELECT id_sort,sort FROM banner where id_sort='$id_sort'");	
		$asd = mysql_fetch_array($result2);
		$data = $asd['sort'];
$folder = "../../banner/"; 
	$folder = $folder . basename( $_FILES['file']['name']); 
	$gambar        =($_FILES['file']['name']); 
	$sqls = mysql_query("UPDATE banner SET sort = '$data', id_sort ='$data' WHERE id_sort = '$sort' and id_banner !='$id'  ");
		
		//Insert record into database
	 if(move_uploaded_file($_FILES['file']['tmp_name'], $folder))
	 { 			
		 	
		$sql = mysql_query("UPDATE banner SET sort = '$sort',deskripsi='$deskripsi', banner='$gambar',id_sort ='$sort',aktif='$aktif' WHERE id_banner = '$id' ");
		
		} else {
		
		 	$sql = mysql_query("UPDATE banner SET sort = '$sort',deskripsi='$deskripsi',id_sort ='$sort',aktif='$aktif' WHERE id_banner = '$id' ");
	
	
	}
$result = ($sql);
if ($result){
	
	echo json_encode(array('Update Succsess'));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
}