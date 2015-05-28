<?php
include "config/koneksi.php";
include "config/class.php";
$company = new Master();

session_start();
$_SESSION['sessionid']
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Human Resource Database</title>
	<link rel="stylesheet" type="text/css" href="themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="themes/icon.css">


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="js/modify.js"></script>
	<script type="text/javascript" src="js/divisi.js"></script>
	<script type="text/javascript" src="js/roles.js"></script>
	<script type="text/javascript" src="js/posisi.js"></script>
	<script type="text/javascript" src="js/cat_test.js"></script>
	<script type="text/javascript" src="js/cat_doc.js"></script>
	<script type="text/javascript" src="js/noncomp.js"></script>
<script>

function tampilkan(halaman){
   
    $.ajax({
        
        url      : 'http://localhost/hr/content.php',
        type     : 'POST',
        dataType : 'html',
        data     : 'content='+halaman,
        success  : function(jawaban){
            $('#content').html(jawaban);
        },
    })
	 
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
<body onload="tampilkan('home')">

 <div id="cc" class="easyui-layout" style="width:100%;height:630px;">  
  <div data-options="region:'north',split:true"   style="height:105px;background:rgba(0,0,0,0.0);">
  <div style="float:right">					
	            	<div style="float:left;position:absolute;bottom:0;margin-bottom:5px;width:auto;right:20px">Welcome <?php echo $_SESSION['username'];?> | <a href="media.php?module=detuser&id=<?php echo $_SESSION['id_a'];?>">My Account</a> | <a href="logout.php?destroy=<?php echo $_SESSION['sessionid'];?>">LogOut</a></div>
            	</div>
  					<div style="float:left;">
					<div style="margin-left:5px;float:left"><a href="index.php"><img src="images/<?php echo $company->Getadd('gambar');?>" width="150" height="93"/></a></div>
            		<div style="vertical-align:top;margin-left:5px;float:left">
						<div class="title" ><?php echo $company->Getadd('nama_pt');?></div>		
						<div><?php echo $company->Getadd('alamat');?></div>
						<div>Phone : <?php echo $company->Getadd('phone');?></div>		
						<div>Fax : <?php echo $company->Getadd('fax');?></div>
						<div>Email : <?php echo $company->Getadd('email');?></div>															
					</div>
				</div>

  </div>  
  
   <div class="easyui-accordion" data-options="region:'west',title:'Main',split:true" style="width:250px;">

   <div title="Menu" data-options="split:true,iconCls:'icon-ok'" style="overflow:auto;padding:10px;">

 <ul class="easyui-tree">
			<li data-options="plain:true,iconCls:'icon-home'">
			<span>	<a href="javascript:void(0)" onclick="tampilkan('home');" class="easyui" style="text-decoration: none;color: #000;" >Home</a></span>
			<ul>
			<li data-options="state:'closed',iconCls:'icon-setting'">
			<span>Master Data</span>
			<ul>
			<li data-options="iconCls:'icon-dep'">
			<a href="javascript:void(0)" onclick="tampilkan('divisi');" class="easyui" style="text-decoration: none;color: #000;" ><span>Division</span></a>
			</li>
			<li data-options="iconCls:'icon-human'">
			<a href="javascript:void(0)" onclick="tampilkan('position');" class="easyui" style="text-decoration: none;color: #000;" ><span>Position</span></a>
			</li>
		
			<li data-options="iconCls:'icon-human'">
			<a href="javascript:void(0)" onclick="tampilkan('roles');" class="easyui" style="text-decoration: none;color: #000;" ><span>Roles</span></a>
			</li>
			<li data-options="iconCls:'icon-claim'">
			<a href="javascript:void(0)" onclick="tampilkan('cat_test');"  class="easyui" style="text-decoration: none;color: #000;" ><span>Category Test</span></a>
			</li>
			<li data-options="iconCls:'icon-claim'">
				<a href="javascript:void(0)" onclick="tampilkan('cat_doc');"  class="easyui" style="text-decoration: none;color: #000;" ><span>Category Document</span></a>
			</li>

			</ul>
			</li>
			
			<li data-options="state:'closed',iconCls:'icon-user'">
			<span>Employee</span>
			<ul>
			<li data-options="iconCls:'icon-user'">
			<a href='#' onclick="tampilkan('members');" class="easyui" style="text-decoration: none;color: #000;" ><span>User</span></a>
			</li>
			<li  data-options="iconCls:'icon-address'"><span ><a href='media.php?module=address' style="text-decoration:none;color: #000;">Address</a></span></li>
			</ul>
			</li>
		
			</ul>
			</li>
			</ul>

</div>
    <div title="Calendar" data-options="iconCls:'icon-calendar'"  class="easyui-calendar" style="width:250px;height:250px;"></div>
	</div>  
	
	
    <div data-options="region:'center'" style="padding:5px;">
	 <div id="content">

              <?php 
 ?>

</div>  
</div>  
 </div>  

</body>
</html>