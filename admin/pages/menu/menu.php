<table id="dgbiji" title="Menu" class="easyui-datagrid" style="width:100%;height:250px" url="mod/menu/menuaction.php?act=list"
toolbar="#toolbarmenu" pagination="true" collapsible="true" closable="true" maximizable="true"  
rownumbers="true" fitColumns="true" singleSelect="true"   idField="id_menu" sortName="menu" sortOrder="asc">
<thead>
<tr>

<th data-options="field:'id_menu',width:80,sortable:true,hidden:true">ID Menu</th>
<th data-options="field:'id_profil_rm',width:80,sortable:true,hidden:true">ID Profil</th>
<th data-options="field:'id_jenis_menu',width:80,sortable:true,hidden:true">ID Jenis Menu</th>
<th data-options="field:'nama_rm',width:100,sortable:true">Rumah Makan</th>
<th data-options="field:'nama_produk',width:100,sortable:true">Jenis Menu</th>
<th data-options="field:'menu',width:100,sortable:true">Menu</th>
<th data-options="field:'harga',width:100,sortable:true">Harga</th>
<th data-options="field:'ket_menu',width:100,sortable:true,hidden:true">Ket</th>
</tr>
</thead>
</table>
<div id="toolbarmenu">
<?php //if ($_SESSION['id_level'] == "2" OR $_SESSION['id_level'] == "3"){ } else { ?>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newbiji()">New Menu</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editmenu()">Edit Menu</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroymenu()">Remove Menu</a>
<?php //} ?>
</div>
<div id="dlgbiji" class="easyui-dialog" style="width:100%;height:100%;padding:10px 20px" closed="true" buttons="#dlgbiji-buttons">

		<form id="fmbiji" method="post" enctype="multipart/form-data" novalidate>
		  <table cellpadding="5">
		<tr>
		<td>Rumah Makan</td>
		<td>:    <input  class="easyui-combobox" name="id_profil_rm"
					data-options="valueField:'id_profil_rm',textField:'nama_rm',url:'mod/menu/menuaction.php?act=profil_rm'"></td>
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
		<td>Jenis Menu</td>
		<td>:    <input  class="easyui-combobox" name="id_jenis_menu"
					data-options="valueField:'id_jenis_menu',textField:'nama_produk',url:'mod/menu/menuaction.php?act=jnismnu'"></td>
		</tr>
		<tr>
		<td>Menu</td>
		<td>: <input name="menu" class="easyui-textbox" required="true"></td>
		</tr>
		<tr>
		<td>Harga</td>
		<td>: <input name="harga" class="easyui-textbox" required="true"></td>
		</tr>
		<tr>
		<td>Ket</td>
		<td>: <input name="ket_menu" class="easyui-textbox" required="true"></td>
		</tr>
		</table>
	
		</form>
</div>
<div id="dlgbiji-buttons">
<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="savebiji()" style="width:90px">Save</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgbiji').dialog('close')" style="width:90px">Cancel</a>
</div>
 <script type="text/javascript">

</script>
