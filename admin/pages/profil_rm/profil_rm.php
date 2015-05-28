<table id="dgprofil_rm" title="Rumah Makan" class="easyui-datagrid" style="width:100%;height:250px" url="mod/profil_rm/profil_rmaction.php?act=list"
toolbar="#toolbarprofil_rm" pagination="true" collapsible="true" closable="true" maximizable="true"  
rownumbers="true" fitColumns="true" singleSelect="true"   idField="id_profil_rm" sortName="nama_rm" sortOrder="asc">
<thead>
<tr>

<th data-options="field:'id_profil_rm',width:80,sortable:true,hidden:true">ID Rumah Makan</th>
<th data-options="field:'gambar',width:80,sortable:true">Gambar</th>
<th data-options="field:'nama_rm',width:80,sortable:true">Rumah Makan</th>
<th data-options="field:'profile',width:100,sortable:true">Profile</th>
<th data-options="field:'alamat',width:100,sortable:true">Alamat</th>
<th data-options="field:'no_tlp',width:100,sortable:true">No TLP</th>
<th data-options="field:'hits',width:100,sortable:true">Hits</th>
</tr>
</thead>
</table>
<div id="toolbarprofil_rm">
<?php //if ($_SESSION['id_level'] == "2" OR $_SESSION['id_level'] == "3"){ } else { ?>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newprofil_rm()">New Rumah Makan</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editprofil_rm()">Edit Rumah Makan</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyprofil_rm()">Remove Rumah Makan</a>
<?php //} ?>
</div>
<div id="dlgprofil_rm" class="easyui-dialog" style="width:800px;height:580px;padding:10px 20px" maximizable="true"   closed="true" buttons="#dlgprofil_rm-buttons">
		
		<form id="fmprofil_rm" method="post"  enctype="multipart/form-data" novalidate>
		  <table cellpadding="5">
		<tr>
		<td>Rumah makan:</td>
		<td><input name="nama_rm" class="easyui-textbox" required="true"></td>
		</tr>
		<tr>
		<td><td>
		<div id="images" ></div>
		</td>
		</td>
		</tr>
		<tr>
		<td>Picture</td>
		<td>: <input name="file" style="width:140px;"class="f1 easyui-filebox" id="gambar"></input></td></tr>
		
		<tr>
		<td>Profile:</td>
		<td><input name="profile" class="easyui-textbox" data-options="multiline:true"  style="height:80px;width:250px;"></td>
		</tr>
		<tr>
		<td>Alamat:</td>
		<td><input name="alamat" class="easyui-textbox" data-options="multiline:true"  style="height:80px;width:250px;"></td>
		</tr>
		<tr>
		<td>NO TLP:</td>
		<td><input name="no_tlp" class="easyui-textbox" required="true"></td>
		</tr>
		<tr>
		<td>Latitude:</td>
		<td><input name="latitude2" class="easyui-textbox" ></td>
		</tr>
		<tr>
		<td>Longtitude:</td>
		<td><input name="longtitude2" class="easyui-textbox" ></td>
		</tr>
		</table>
		
		</form>
		</div>
		

<div id="dlgprofil_rm-buttons">
<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveprofil_rm()" style="width:90px">Save</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgprofil_rm').dialog('close')" style="width:90px">Cancel</a>
</div>
