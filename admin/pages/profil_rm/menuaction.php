<?php
	include '../../config/koneksi.php';

if ($_GET['act'] == 'list'){
	$page = isset($_POST['page']) ? intval($_POST['page']) : 0;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_menu';
	$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	$offset = ($page-1)*$rows;

	$result = array();
	$id = intval($_REQUEST['id']);
	if(isset($id)){
		$rs = mysql_query("select count(*) FROM  profil_rm a left join menu b on a.id_profil_rm = b.id_profil_rm inner join jenis_menu c on b.id_jenis_menu = c.id_jenis_menu where a.id_profil_rm='$id'");
    $row = mysql_fetch_row($rs);
    $result["total"] = $row[0];
     
    $rs = mysql_query("SELECT * FROM  profil_rm a left join menu b on a.id_profil_rm = b.id_profil_rm inner join jenis_menu c on b.id_jenis_menu = c.id_jenis_menu where a.id_profil_rm='$id' order by $sort $order limit $offset,$rows");
    
	 }
	else {
	$getedit = mysql_query("SHOW TABLE STATUS LIKE 'profil_rm'");
		$bioedit = mysql_fetch_array($getedit);
		$id_profil_rm = $bioedit['Auto_increment'];	
    $rs = mysql_query("select count(*) profil_rm a left join menu b on a.id_profil_rm = b.id_profil_rm inner join jenis_menu c on b.id_jenis_menu = c.id_jenis_menu where a.id_profil_rm='$id_profil_rm'");
    $row = mysql_fetch_row($rs);
    $result["total"] = $row[0];
     
    $rs = mysql_query("select * from profil_rm a left join menu b on a.id_profil_rm = b.id_profil_rm inner join jenis_menu c on b.id_jenis_menu = c.id_jenis_menu where a.id_profil_rm='$id_profil_rm' order by $sort $order limit $offset,$rows");
   
	}
    $items = array();
    while($row = mysql_fetch_object($rs)){
    array_push($items, $row);
    }
    $result["rows"] = $items;
     
    echo json_encode($result);
	}
else if ($_GET['act'] == 'createx'){

$menu = htmlspecialchars($_REQUEST['menu']);
$harga = htmlspecialchars($_REQUEST['harga']);
$ket_menu = htmlspecialchars($_REQUEST['ket_menu']);
$id_jenis_menu = htmlspecialchars($_REQUEST['id_jenis_menu']);


$id = intval($_REQUEST['id']);
	if(isset($id)){
		$id_profil_rm = $id;	
	
	}
	else{
	$getedit = mysql_query("SHOW TABLE STATUS LIKE 'profil_rm'");
		$bioedit = mysql_fetch_array($getedit);
		$id_profil_rm = $bioedit['Auto_increment'];
	
	}
$result = mysql_query("INSERT INTO menu(id_profil_rm,id_jenis_menu,menu,harga,ket_menu) 
								   VALUES('$id_profil_rm','$id_jenis_menu','$menu','$harga','$ket_menu')");
if ($result){
	echo json_encode(array(
		'id_menu' => mysql_insert_id(),
		'id_profil_rm' => $id,
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
$menu_name = htmlspecialchars($_REQUEST['menu_name']);
$writing = htmlspecialchars($_REQUEST['writing']);
$listening = htmlspecialchars($_REQUEST['listening']);
$reading = htmlspecialchars($_REQUEST['reading']);


$sql = "update menu set menu_name='$menu_name',writing='$writing',listening='$listening',reading='$reading' where id_menu='$id'";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id_menu' => $id,
		'menu_name' => $menu_name,
		'writing' => $writing,
		'listening' => $listening,
		'reading' => $reading
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
}