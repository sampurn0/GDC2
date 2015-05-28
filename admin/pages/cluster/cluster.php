<table id="dgpcluster" title="Cluster" class="easyui-datagrid" style="width:100%;height:250px" url="pages/cluster/clusteraction.php?act=list"
	toolbar="#toolbarcluster" pagination="true" collapsible="true" closable="true" maximizable="true"  
	rownumbers="true" fitColumns="true" singleSelect="true"   idField="id_cluster" sortName="nama_cluster" sortOrder="asc">
		<thead>
			<tr>
				<th data-options="field:'id_cluster',width:80,sortable:true,hidden:true">ID Cluster</th>
				<th data-options="field:'gambar',width:80,sortable:true">Gambar</th>
				<th data-options="field:'nama_cluster',width:80,sortable:true">Nama Cluster</th>
				<th data-options="field:'keterangan',width:100,sortable:true">Keterangan</th>
			</tr>
		</thead>
</table>

	<div id="toolbarcluster">
		<?php //if ($_SESSION['id_level'] == "2" OR $_SESSION['id_level'] == "3"){ } else { ?>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newcluster()">New Cluster</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editcluster()">Edit Cluster</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroycluster()">Remove Cluster</a>
		<?php //} ?>
	</div>
	
	<div id="dlgcluster" class="easyui-dialog" style="width:800px;height:580px;padding:10px 20px" maximizable="true"   closed="true" buttons="#dlgcluster-buttons">
		<form id="fmcluster" method="post"  enctype="multipart/form-data" novalidate>
			<table cellpadding="5">
				<tr>
					<td>Cluster:</td>
					<td><input name="nama_cluster" class="easyui-textbox" required="true"></td>
				</tr>
				
				<tr>
					<td><td>
					<div id="images" ></div>
					</td>
					</td>
				</tr>
				
				<tr>
					<td>Gambar</td>
					<td>: <input name="file" style="width:140px;"class="f1 easyui-filebox" id="gambar"></input></td>
				</tr>
				<tr>
					<td>Keterangan:</td>
					<td><input name="keterangan" class="easyui-textbox" data-options="multiline:true"  style="height:80px;width:250px;"></td>
				</tr>
			</table>
		</form>
	</div>
		

	<div id="dlgcluster-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="savecluster()" style="width:90px">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgcluster').dialog('close')" style="width:90px">Cancel</a>
	</div>
