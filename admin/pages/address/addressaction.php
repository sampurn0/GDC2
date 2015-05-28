<?php
	include '../../koneksi.php';

if ($_GET['act'] == 'updetail'){


$nama_pt = htmlspecialchars($_REQUEST['nama_pt']);
$alamat = htmlspecialchars($_REQUEST['alamat']);
$email = htmlspecialchars($_REQUEST['email']);
$phone = htmlspecialchars($_REQUEST['phone']);
$fax = htmlspecialchars($_REQUEST['fax']);


	$folder = "../../images/"; 
	$folder = $folder . basename( $_FILES['file']['name']); 
	$gambar        =($_FILES['file']['name']); 
		//Insert record into database
		 if(move_uploaded_file($_FILES['file']['tmp_name'], $folder))
	{ 
	$sql = "update alamat  set  gambar='$gambar', nama_pt='$nama_pt' , email='$email', alamat='$alamat' ,phone='$phone' ,fax='$fax' ";
	}
	else
	{ 
	
	$sql = "update alamat  set nama_pt='$nama_pt' ,email='$email', alamat='$alamat' ,phone='$phone' ,fax='$fax'";
	} 
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'nama_pt' => $nama_pt,
		'email' => $email,
		'alamat' => $alamat,
		'phone' => $phone,
		'fax' => $fax
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
	}	