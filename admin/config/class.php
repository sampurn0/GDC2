<?php

class Job {
		function DivisiList(){
			$query = mysql_query("SELECT * FROM divisi");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}
		function RolesList(){
			$query = mysql_query("SELECT * FROM roles");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}
		function GetRolesList(){
			$id = $_GET['id_position'];
				$query = mysql_query("SELECT * FROM roles where id_position = '$id'");
					while ($row = mysql_fetch_array($query))
						$data[] = $row;
							return $data;
					}			
		function GetPosisiList(){
			$id = $_GET['id_divisi'];
				$query = mysql_query("SELECT * FROM posisi where id_divisi = '$id'");
					while ($row = mysql_fetch_array($query))
						$data[] = $row;
							return $data;
							}			
		function PosisiList(){
			$query = mysql_query("SELECT * FROM posisi ");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
						}
		function CategoryList(){
			$query = mysql_query("SELECT * FROM cat_test_history ");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
						}				
		}
class User { 

		function MembersList() {
			$query = mysql_query("SELECT * FROM members");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}	
		function FamilyList(){
			$query = mysql_query("SELECT * FROM family");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}	

		}		
class Address {
		function CountryList(){
			$query = mysql_query("SELECT * FROM country");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}
		function CityList(){
			$query = mysql_query("SELECT * FROM city");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}
		function ProvincyList(){
			$query = mysql_query("SELECT * FROM provincy");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}

		}

class File { 

		function Language(){
			$query = mysql_query("SELECT * FROM language");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}
				
		function CatdocList(){
			$query = mysql_query("SELECT * FROM cat_document");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}		
		
		function DocList(){
			$query = mysql_query("SELECT * FROM document ");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}
				
		function FormalList(){
			$query = mysql_query("SELECT * FROM formal");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}
		
		function InformalList(){
			$query = mysql_query("SELECT * FROM informal");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}
		
		function TrainingList(){
			$query = mysql_query("SELECT * FROM training");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}
				
		function CatHistoryList(){
			$query = mysql_query("SELECT * FROM cat_test_history");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}
				
		function HistoryList(){
			$query = mysql_query("SELECT * FROM test_history");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}		
		}	
		
class Master {
		function Getadd($field){
			$query = mysql_query("SELECT * FROM alamat");
				$data = mysql_fetch_array($query);
					if ($field == 'nama_pt') return $data['nama_pt'];
						else if ($field == 'email') return $data['email'];
						else if ($field == 'alamat') return $data['alamat'];
						else if ($field == 'gambar') return $data['gambar'];
						else if ($field == 'phone') return $data['phone'];
						else if ($field == 'fax') return $data['fax'];
						}
		function LevelList(){
			$query = mysql_query("SELECT * FROM level");
				while ($row = mysql_fetch_array($query))
					$data[] = $row;
						return $data;
				}		
		}


class Backend {
		function index_visitor(){
			$query = mysql_query ("SELECT DATE_FORMAT( b.tanggal,  '%M' ) AS Bulan,count(b.id) as total
								FROM counter b WHERE b.sub_location = '' and location !='' GROUP BY MONTH (b.tanggal) ");
			while ($row = mysql_fetch_array($query))
			$data[] = $row;
			return $data;
			}
		}
		?>			
