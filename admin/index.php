<?php
include "config/koneksi.php";
// include "config/class.php";
// $company = new Master();

// session_start();
// $_SESSION['sessionid']
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Grand Depok City</title>
			<link rel="stylesheet" type="text/css" href="asset/themes/default/easyui.css">
			<link rel="stylesheet" type="text/css" href="asset/themes/icon.css">


			<script type="text/javascript" src="asset/js/jquery.min.js"></script>
			<script type="text/javascript" src="asset/js/jquery.easyui.min.js"></script>

	<script>

		function tampilkan(halaman){
		   
			$.ajax({
				
				url      : 'http://localhost/kuliner/content.php',
				type     : 'POST',
				dataType : 'html',
				data     : 'content='+halaman,
				success  : function(jawaban){
					$('#content').html(jawaban);
				},
			})
			 
		} 

		function addTab(title, url){  
			if ($('#tt').tabs('exists', title)){  
				$('#tt').tabs('select', title);  
			} else {  
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:600px;"></iframe>';  
				$('#tt').tabs('add',{  
					title:title,  
					content:content,
				
					closable:true	
				});  
			} 
		}  
		
	</script>
	
	<style>
		select option:disabled {
			color: #000;
		}
		.ui-button { margin-left: -1px; }
		.ui-button-icon-only .ui-button-text { padding: 0.35em; } 
		.ui-autocomplete-input { margin: 0; padding: 0.48em 0 0.47em 0.45em; }	 
	</style>
	
	</head>
	
	<body onload="addTab('Home','content.php');">
		<div class="easyui-layout" style="width:100%;height:630px;">  
			<div class="easyui-accordion" data-options="region:'west',title:'Main',split:true" style="width:200px;">
				<div title="Menu" data-options="split:true,iconCls:'icon-ok'" style="overflow:auto;padding:10px;">
					<ul class="easyui-tree">
						<li data-options="plain:true,iconCls:'icon-home'">
							<span><a href="javascript:void(0)" onclick="addTab('Home','content.php');" class="easyui" style="text-decoration: none;color: #000;" >Home</a></span>
								<ul>
									<li data-options="state:'opened',iconCls:'icon-setting'">
										<span>Master Data</span>
										<ul>
										
											<li data-options="iconCls:'icon-dep'">
												<a href="javascript:void(0)" onclick="addTab('Kriteria','content.php?act=kriteria');" class="easyui" style="text-decoration: none;color: #000;" ><span>Kriteria</span></a>
											</li>

                                            <li data-options="iconCls:'icon-human'">
                                                <a href="javascript:void(0)" onclick="addTab('Alternatif','content.php?act=alternatif');" class="easyui" style="text-decoration: none;color: #000;" ><span>Alternatif</span></a>
                                            </li>

                                            <li data-options="iconCls:'icon-human'">
                                                <a href="javascript:void(0)" onclick="addTab('Alternatif - Kriteria','content.php?act=alternatifkriteria');" class="easyui" style="text-decoration: none;color: #000;" ><span>Alternatif - Kriteria</span></a>
                                            </li>

                                            <li data-options="iconCls:'icon-human'">
                                                <a href="javascript:void(0)" onclick="addTab('Cluster','content.php?act=cluster');" class="easyui" style="text-decoration: none;color: #000;" ><span>Cluster</span></a>
                                            </li>

											<!--<li data-options="iconCls:'icon-human'">
												<a href="javascript:void(0)" onclick="addTab('Banner','content.php?act=banner');" class="easyui" style="text-decoration: none;color: #000;" ><span>Banner</span></a>
											</li>
											
											<li data-options="iconCls:'icon-claim'">
												<a href="javascript:void(0)" onclick="addTab('Menu','content.php?act=menu');"  class="easyui" style="text-decoration: none;color: #000;" ><span>Menu</span></a>
											</li>
											
											<li  data-options="iconCls:'icon-address'">
												<a href="javascript:void(0)" onclick="addTab('Address','content.php?act=address');"  class="easyui" style="text-decoration: none;color: #000;" ><span>Address</span></a>
											</li>-->
											
										</ul>
									</li>
								</ul>
							<li data-options="iconCls:'icon-logout2'">
								<a href='logout.php'  class="easyui" style="text-decoration: none;color: #000;" ><span>Keluar</span></a>
							</li>
						</li>
					</ul>

				</div>
				<div title="Calendar" data-options="iconCls:'icon-calendar'"  class="easyui-calendar" style="width:200px;height:250px;"></div>
			</div>  
			<div data-options="region:'center', title:'Admin | Grand Depok City'" style="height:640px;overflow:hidden" >
				<div class="easyui-tabs" style="width:100%;height:640px;overflow:hidden" id="tt"></div>
			</div>  
		</div>  
	</body>
</html>