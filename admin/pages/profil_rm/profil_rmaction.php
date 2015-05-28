<?php
	include '../../config/koneksi.php';

if ($_GET['act'] == 'list'){
	$page = isset($_POST['page']) ? intval($_POST['page']) : 0;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'nama_rm';
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$offset = ($page-1)*$rows;

	$result = array();
	
  
    $rs = mysql_query("select count(*) from profil_rm  ");
    $row = mysql_fetch_row($rs);
    $result["total"] = $row[0];
     
     $rs = mysql_query("select * from profil_rm order by $sort $order limit $offset,$rows");
     
   $items = array();
    while($row = mysql_fetch_object($rs)){
    array_push($items, $row);
    }
    $result["rows"] = $items;
     
    echo json_encode($result);
	}
else if ($_GET['act'] == 'create'){

$nama_rm = htmlspecialchars($_REQUEST['nama_rm']);
$profile = $_REQUEST['profile'];
$alamat = htmlspecialchars($_REQUEST['alamat']);
$no_tlp = htmlspecialchars($_REQUEST['no_tlp']);
$latitude2 = htmlspecialchars($_REQUEST['latitude2']);
$longtitude2 = htmlspecialchars($_REQUEST['longtitude2']);
$folder = "../../foto/"; 
	$folder = $folder . basename( $_FILES['file']['name']); 
	$gambar        =($_FILES['file']['name']); 
		//Insert record into database
		 if(move_uploaded_file($_FILES['file']['tmp_name'], $folder))
	 { 
$result = mysql_query("INSERT INTO profil_rm(nama_rm,profile,gambar,alamat,no_tlp,latitude2,longtitude2) 
								   VALUES('$nama_rm','$profile','$gambar','$alamat','$no_tlp','$latitude2','$longtitude2')");

	 }
else {
	$result = mysql_query("INSERT INTO profil_rm(nama_rm,profile,alamat,no_tlp,latitude2,longtitude2) 
								   VALUES('$nama_rm','$profile','$alamat','$no_tlp','$latitude2','$longtitude2')");

}	
if ($result){
	echo json_encode(array(
		'id_profil_rm' => mysql_insert_id(),
		'nama_rm' => $nama_rm,
		'profile' => $profile,
		'gambar' => $gambar,
		'alamat' => $alamat,
		'no_tlp' => $no_tlp,
		'latitude2' => $latitude2,
		'longtitude2' => $longtitude2
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}								   
}
else if ($_GET['act'] == 'delete'){
	$id = intval($_REQUEST['id']);
$result = mysql_query("delete from profil_rm where id_profil_rm='".$id."'");

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

}

else if ($_GET['act'] == 'update'){
$id = intval($_REQUEST['id']);
$nama_rm = htmlspecialchars($_REQUEST['nama_rm']);
$profile =  htmlspecialchars_decode($_REQUEST['profile']);
$alamat = htmlspecialchars($_REQUEST['alamat']);
$no_tlp = htmlspecialchars($_REQUEST['no_tlp']);
$latitude2 = htmlspecialchars($_REQUEST['latitude2']);
$longtitude2 = htmlspecialchars($_REQUEST['longtitude2']);
$folder = "../../foto/"; 
	$folder = $folder . basename( $_FILES['file']['name']); 
	$gambar        =($_FILES['file']['name']); 
		//Insert record into database
		 if(move_uploaded_file($_FILES['file']['tmp_name'], $folder))
	 { 

$sql = "update profil_rm set nama_rm='$nama_rm', profile='$profile', gambar='$gambar', alamat='$alamat', no_tlp='$no_tlp', latitude2='$latitude2',longtitude2='$longtitude2' where id_profil_rm='$id'";
	 }
	 else {
		 $sql = "update profil_rm set nama_rm='$nama_rm',  profile='$profile', alamat='$alamat', no_tlp='$no_tlp', latitude2='$latitude2',longtitude2='$longtitude2' where id_profil_rm='$id'";

	 }

$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id_profil_rm' => $id,
		'nama_rm' => $nama_rm,
		'gambar' => $gambar,
		'profile' => $profile,
		'alamat' => $alamat,
		'no_tlp' => $no_tlp,
		'latitude2' => $latitude2,
		'longtitude2' => $longtitude2	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
}