<?php 
include 'config/koneksi.php';
$query = mysql_fetch_array(mysql_query("SELECT * FROM alamat"));
?>
<div id="load" class="easyui-panel" title="Address" style="width:100%">
<div style="padding:10px 60px 20px 60px">
<form id="fm" method="post"  enctype="multipart/form-data" action="modul/address/addressaction.php?act=updetail" novalidate>
		 

		 <table  cellpadding="5" >
		
		<tr>
		
		<td rowspan="2" ><img style="width:100px;height:100px;" src="images/<?php echo $query['gambar'];?>" / ></td>
		<td>Change Logo:</td>
		<td><input name="file" id="test" style="width:140px;"class="f1 easyui-filebox"></input></td>
		</tr>
		</table>
		 <table  cellpadding="5" >
		<tr>
		<td>Company Name:</td>
		<td><input  name="nama_pt" class="easyui-textbox" id="textbox" value="<?php echo $query['nama_pt'];?>" data-options="required:true,prompt:'Company Name.'" ></td>
		</tr>
		<tr>
		<td >Address:</td>
		<td ><input  name="alamat" class="easyui-textbox" value="<?php echo $query['alamat'];?>" data-options="required:true,prompt:'Address.'" ></td>
		</tr>
		<tr>
		<td>Email:</td>
		<td><input  name="email" class="easyui-textbox" type="text" style="width:200px;" value="<?php echo $query['email'];?>"  data-options="required:true,validType:'email',prompt:'Email.'"></td>
		</tr>
		<td>Phone Number:</td>
		<td><input  name="phone" class="easyui-textbox" type="text" style="width:200px;" value="<?php echo $query['phone'];?>"  data-options="required:true,prompt:'Phone Number.'"></td>
		</tr>
		<td>Fax Number:</td>
		<td><input  name="fax" class="easyui-textbox" type="text" style="width:200px;" value="<?php echo $query['fax'];?>"  data-options="required:true,prompt:'Fax Number.'"></td>
		</tr>
		</table>
		</form>
 <div style="text-align:left;padding:5px">
<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()">Update</a>
<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()">Clear</a>
</div>
</div>
</div>
 <script>
function submitForm(){
			$('#fm').form('submit',{
				
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
	
				$.messager.alert('Info','info');

					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
							// close the dialog
						//location.reload(); 	// reload the user data
						window.location.href='media.php?module=address'; 	// reload the user data
					}
				}
			});
}
function clearForm(){
$('#fm').form('clear');
}
</script>
