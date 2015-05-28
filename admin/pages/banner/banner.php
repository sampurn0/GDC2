<table id="dgbanner" title="Banner" class="easyui-datagrid" style="width:100%;height:250px" url="mod/banner/banneraction.php?act=list"
toolbar="#toolbarbanner" pagination="true" collapsible="true" closable="true" maximizable="true"  
rownumbers="true" fitColumns="true" singleSelect="true"   idField="id_banner" sortName="banner" sortOrder="asc">
<thead>
<tr>

<th data-options="field:'id_banner',width:80,sortable:true,hidden:true">ID Banner</th>
<th data-options="field:'banner',width:100,sortable:true">Banner</th>
<th data-options="field:'deskripsi',width:100,sortable:true">Deskripsi</th>
<th data-options="field:'id_sort',width:100,sortable:true,hidden:true">ID Sort</th>
<th data-options="field:'sort',width:100,sortable:true">Sort</th>
<th data-options="field:'aktif',width:100,sortable:true">Aktif</th>
</tr>
</thead>
</table>
<div id="toolbarbanner">
<?php //if ($_SESSION['id_level'] == "2" OR $_SESSION['id_level'] == "3"){ } else { ?>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newbanner()">New Banner</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editbanner()">Edit Banner</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroybanner()">Remove Banner</a>
<?php //} ?>
</div>
<div id="dlgbanner" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlgbanner-buttons">

		<form id="fmbanner" method="post"  enctype="multipart/form-data" novalidate>
		  <table cellpadding="5">
		  <input type="hidden" name="id_sort">
		<tr>
		<td><td>
		<div id="images" >
		</td>
		</td>
		</tr>
		<tr>
		<td>Picture</td>
		<td>: <input name="file" style="width:140px;"class="f1 easyui-filebox" id="gambar"></input></td></tr>
		<tr>
		<td>Deskripsi</td>
		<td>: <input name="deskripsi" class="easyui-textbox" required="true"></td>
		</tr>
		<tr>
		<td>Sort </td><td>: <input  id="sort"  class="easyui-combobox" name="sort"></td>
		</tr>
		<tr>
		<td>Aktif </td><td>: <select class="easyui-combobox" name="aktif" data-options="prompt:'Select.'">
		<option value='0' selected>Tidak</option>
								<option value='1'>Ya</option></td>
		</tr>
		</table>
	
		</form>
</div>
<div id="dlgbanner-buttons">
<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="savebanner()" style="width:90px">Save</a>
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgbanner').dialog('close')" style="width:90px">Cancel</a>
</div>
 <script type="text/javascript">

</script>
