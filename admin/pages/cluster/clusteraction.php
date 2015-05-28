<?php
	include '../../config/koneksi.php';

if ($_GET['act'] == 'list'){
	$page = isset($_POST['page']) ? intval($_POST['page']) : 0;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'nama_cluster';
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$offset = ($page-1)*$rows;

	$result = array();
	
  
    $rs = mysql_query("select count(*) from cluster  ");
    $row = mysql_fetch_row($rs);
    $result["total"] = $row[0];
     
     $rs = mysql_query("select * from cluster order by $sort $order limit $offset,$rows");
     
   $items = array();
    while($row = mysql_fetch_object($rs)){
    array_push($items, $row);
    }
    $result["rows"] = $items;
     
    echo json_encode($result);
	}
else if ($_GET['act'] == 'create'){

$nama_cluster = htmlspecialchars($_REQUEST['nama_cluster']);
$keterangan = htmlspecialchars($_REQUEST['keterangan']);
$folder = "../../foto/"; 
	$folder = $folder . basename( $_FILES['file']['name']); 
	$gambar        =($_FILES['file']['name']); 
		//Insert record into database
		 if(move_uploaded_file($_FILES['file']['tmp_name'], $folder))
	 { 
$result = mysql_query("INSERT INTO cluster(nama_cluster,gambar,keterangan)
								   VALUES('$nama_cluster','$gambar','$keterangan')");

	 }
else {
	$result = mysql_query("INSERT INTO cluster(nama_cluster,keterangan)
								   VALUES('$nama_cluster','$keterangan')");

}	
if ($result){
	echo json_encode(array(
		'id_cluster' => mysql_insert_id(),
		'nama_cluster' => $nama_cluster,
		'gambar' => $gambar,
		'keterangan' => $keterangan,
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}								   
}
else if ($_GET['act'] == 'delete'){
	$id = intval($_REQUEST['id']);
$result = mysql_query("delete from cluster where id_cluster='".$id."'");

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

}

else if ($_GET['act'] == 'update'){
$id = intval($_REQUEST['id']);
$nama_cluster = htmlspecialchars($_REQUEST['nama_cluster']);
$keterangan = htmlspecialchars($_REQUEST['keterangan']);
$folder = "../../foto/"; 
	$folder = $folder . basename( $_FILES['file']['name']); 
	$gambar        =($_FILES['file']['name']); 
		//Insert record into database
		 if(move_uploaded_file($_FILES['file']['tmp_name'], $folder))
	 { 

$sql = "update cluster set nama_cluster='$nama_cluster', gambar='$gambar' where id_cluster='$id'";
	 }
	 else {
		 $sql = "update cluster set nama_cluster='$nama_cluster', keterangan='$keterangan' where id_cluster='$id'";

	 }

$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id_cluster' => $id,
		'nama_cluster' => $nama_cluster,
		'gambar' => $gambar,
		'keterangan' => $keterangan	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
}