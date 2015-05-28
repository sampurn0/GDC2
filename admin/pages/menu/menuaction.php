<?php
	include '../../config/koneksi.php';

if ($_GET['act'] == 'list'){
	$page = isset($_POST['page']) ? intval($_POST['page']) : 0;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_menu';
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$offset = ($page-1)*$rows;

	$result = array();
	
    $rs = mysql_query("select count(*) from profil_rm a left join menu b on a.id_profil_rm = b.id_profil_rm inner join jenis_menu c on b.id_jenis_menu = c.id_jenis_menu where a.id_profil_rm=b.id_profil_rm");
    $row = mysql_fetch_row($rs);
    $result["total"] = $row[0];
     
    $rs = mysql_query("select * from profil_rm a left join menu b on a.id_profil_rm = b.id_profil_rm inner join jenis_menu c on b.id_jenis_menu = c.id_jenis_menu where a.id_profil_rm=b.id_profil_rm order by $sort $order limit $offset,$rows");
	$items = array();
    while($row = mysql_fetch_object($rs)){
    array_push($items, $row);
    }
    $result["rows"] = $items;
     
    echo json_encode($result);
	}
else if ($_GET['act'] == 'create'){

$menu = htmlspecialchars($_REQUEST['menu']);
$harga = htmlspecialchars($_REQUEST['harga']);
$ket_menu = htmlspecialchars($_REQUEST['ket_menu']);
$id_jenis_menu = htmlspecialchars($_REQUEST['id_jenis_menu']);
$id_profil_rm = htmlspecialchars($_REQUEST['id_profil_rm']);


$folder = "../../gambar_menu/"; 
	$folder = $folder . basename( $_FILES['file']['name']); 
	$gambar        =($_FILES['file']['name']); 
		//Insert record into database
		 if(move_uploaded_file($_FILES['file']['tmp_name'], $folder))
	 { 
$result = mysql_query("INSERT INTO menu(id_profil_rm,id_jenis_menu,gambar_menu,menu,harga,ket_menu) 
								   VALUES('$id_profil_rm','$id_jenis_menu','$gambar','$menu','$harga','$ket_menu')");
	 }
	 else {
		 $result = mysql_query("INSERT INTO menu(id_profil_rm,id_jenis_menu,menu,harga,ket_menu) 
								   VALUES('$id_profil_rm','$id_jenis_menu','$menu','$harga','$ket_menu')");

	 }
if ($result){
	echo json_encode(array(
		'id_menu' => mysql_insert_id(),
		'id_profil_rm' => $id_profil_rm,
		'id_jenis_menu' => $id_jenis_menu,
		'menu' => $menu,
		'harga' => $harga,
		'ket_menu' => $ket_menu
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}								   
}
else if ($_GET['act'] == 'jnismnu'){
	
	 
    $rs = mysql_query("SELECT id_jenis_menu, nama_produk FROM jenis_menu
ORDER BY id_jenis_menu ASC ");
     
	$items = array();
		while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
		}
		
	$result= $items;
	
	
		echo json_encode($result);
			
	}	
else if ($_GET['act'] == 'profil_rm'){
	
	 
    $rs = mysql_query("SELECT id_profil_rm,  nama_rm FROM profil_rm
ORDER BY nama_rm ASC ");
     
	$items = array();
		while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
		}
		
	$result= $items;
	
	
		echo json_encode($result);
			
	}		
else if ($_GET['act'] == 'delete'){
	$id = intval($_REQUEST['id']);
$result = mysql_query("delete from menu where id_menu='".$id."'");

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}

}

else if ($_GET['act'] == 'update'){
$id = intval($_REQUEST['id']);
$menu = htmlspecialchars($_REQUEST['menu']);
$harga = htmlspecialchars($_REQUEST['harga']);
$ket_menu = htmlspecialchars($_REQUEST['ket_menu']);
$id_jenis_menu = htmlspecialchars($_REQUEST['id_jenis_menu']);
$id_profil_rm = htmlspecialchars($_REQUEST['id_profil_rm']);
$folder = "../../gambar_menu/"; 
	$folder = $folder . basename( $_FILES['file']['name']); 
	$gambar        =($_FILES['file']['name']); 
		//Insert record into database
		 if(move_uploaded_file($_FILES['file']['tmp_name'], $folder))
	 { 
$sql = "update menu set id_profil_rm='$id_profil_rm',gambar_menu='$gambar',id_jenis_menu='$id_jenis_menu',menu='$menu',harga='$harga',ket_menu='$ket_menu'  where id_menu='$id'";
	 }else {
		 $sql = "update menu set id_profil_rm='$id_profil_rm',id_jenis_menu='$id_jenis_menu',menu='$menu',harga='$harga',ket_menu='$ket_menu'  where id_menu='$id'";
	 }

$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id_menu' => $id,
		'id_profil_rm' => $id_profil_rm,
		'id_jenis_menu' => $id_jenis_menu,
		'menu' => $menu,
		'harga' => $harga,
		'ket_menu' => $ket_menu
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
}