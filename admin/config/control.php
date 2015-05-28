<?php 
include 'koneksi.php';
include 'class.php';
$manage = new Job();
$address = new Address();

	if($_GET['act'] == "divisi"){
		$getdivisi = $manage->DivisiList();
					foreach ($getdivisi as $key => $data){
							$result = array('id_divisi' => $data['id_divisi'],
											'name_divisi' => $data['name_divisi']);
							$jsonData[] = $result;		
					}
				print json_encode($jsonData);
		}
		
	else if($_GET['act'] == "getposisi"){
		$getposisi = $manage->GetPosisiList();
			if(is_array($getposisi)){
				foreach ($getposisi as $data){
					$result = array('id_position' => $data['id_position'],
										'name_position' => $data['name_position'],
											'id_divisi' => $data['id_divisi']
									);
						$jsonData[] = $result;		
					}
				}
				else if ($result == null){	
							$result = array('errorMsg'=>'Some errors occured.');
						$jsonData[] = $result;		
							}
				print json_encode($jsonData);
		}
		
	else if($_GET['act'] == "posisi"){
		$getposisi = $manage->PosisiList();
					foreach ($getposisi as $key => $data){
							$result = array('id_position' => $data['id_position'],
											'name_position' => $data['name_position']);
							$jsonData[] = $result;		
					}
				print json_encode($jsonData);
		}	
		
	else if($_GET['act'] == "getroles"){
		$getroles = $manage->GetRolesList();
			if(is_array($getroles)){
				foreach ($getroles as $data){
					$result = array('id_roles' => $data['id_roles'],
										'name_roles' => $data['name_roles'],
											'id_position' => $data['id_position']
									);
						$jsonData[] = $result;		
					}
				}
				else if ($result == null){	
							$result = array('errorMsg'=>'Some errors occured.');
						$jsonData[] = $result;		
							}
				print json_encode($jsonData);
		}	
	else if($_GET['act'] == "roles"){
		$getroles = $manage->RolesList();
					foreach ($getroles as $key => $data){
							$result = array('id_roles' => $data['id_roles'],
											'name_roles' => $data['name_roles']);
							$jsonData[] = $result;		
					}
				print json_encode($jsonData);
		}
	
	else if($_GET['act'] == "country"){
		$getcountry = $address->CountryList();
					foreach ($getcountry as $key => $data){
							$result = array('id_country' => $data['id_country'],
											'name_country' => $data['name_country']);
							$jsonData[] = $result;		
					}
				print json_encode($jsonData);
		}
	else if($_GET['act'] == "city"){
		$getcity = $address->CityList();
					foreach ($getcity as $key => $data){
							$result = array('id_city' => $data['id_city'],
											'name_city' => $data['name_city']);
							$jsonData[] = $result;		
					}
				print json_encode($jsonData);
		}
	else if($_GET['act'] == "provincy"){
		$getprovincy = $address->ProvincyList();
					foreach ($getprovincy as $key => $data){
							$result = array('id_provinsi' => $data['id_provinsi'],
											'name_provinsi' => $data['name_provinsi']);
							$jsonData[] = $result;		
					}
				print json_encode($jsonData);
		}
	else if($_GET['act'] == "category"){
		$getcategory = $manage->CategoryList();
					foreach ($getcategory as $key => $data){
							$result = array('id_cat_test' => $data['id_cat_test'],
											'name_cat_test' => $data['name_cat_test']);
							$jsonData[] = $result;		
					}
				print json_encode($jsonData);
		}
	else if($_GET['act'] == "roles"){
		$roles = $manage->RolesList();
					foreach ($roles as $key => $data){
							$result = array('id_roles' => $data['id_roles'],
											'name_roles' => $data['name_roles']);
							$jsonData[] = $result;		
					}
				print json_encode($jsonData);
		}		
?>
