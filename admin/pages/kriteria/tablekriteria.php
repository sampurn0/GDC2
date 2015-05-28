<link rel="stylesheet" type="text/css" href="../../asset/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="../../asset/themes/icon.css">

<script type="text/javascript" src="../../asset/js/jquery.min.js"></script>
<script type="text/javascript" src="../../asset/js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="../../asset/js/proses/kriteria.js"></script>


<table id="dgkriteria" title="Kriteria" class="easyui-datagrid" style="width:100%;height:380px" url="../../pages/kriteria/kriteriaction.php?act=list"
       toolbar="#toolbarkriteria" pagination="true" collapsible="true" closable="true" maximizable="true"
       rownumbers="true" fitColumns="true" singleSelect="true"   idField="id_kriteria" sortName="nama_kriteria" sortOrder="asc">
    <thead>
    <tr>
        <th data-options="field:'id_kriteria',width:80,sortable:true,hidden:true">ID Kriteria</th>
        <th data-options="field:'nama_kriteria',width:100,sortable:true">Nama Kriteria</th>
        <th data-options="field:'sub',width:100,sortable:true">Jumlah Sub Kriteria</th>
        <th data-options="field:'aktif',width:100,sortable:true">Aktif</th>
    </tr>
    </thead>
</table>

<div id="toolbarkriteria">
    <?php //if ($_SESSION['id_level'] == "2" OR $_SESSION['id_level'] == "3"){ } else { ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newkriteria()">New Kriteria</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editkriteria()">Edit Kriteria</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroykriteria()">Remove Kriteria</a>
    <?php //} ?>
</div>

<div id="dlgkriteria" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlgkriteria-buttons">
    <form id="fmkriteria" method="post" novalidate>
        <table cellpadding="5">
            <tr>
                <td>Kriteria:</td>
                <td><input name="nama_kriteria" class="easyui-textbox" required="true"></td>
            </tr>

            <tr>
                <td>Jumlah Sub Kriteria:</td>
                <td><input name="sub" class="easyui-textbox" required="true"></td>
            </tr>
			
			<tr>
                <td>Aktif:</td>
                <td><input type="radio" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox;" name="aktif" value="Y" class="easyui-validatebox" required="true"> Y <input type="radio" style="-webkit-appearance: checkbox; -moz-appearance: checkbox; -ms-appearance: checkbox;" name="aktif" value="N" class="easyui-validatebox" required="true"> N</td>
            </tr>
        </table>
    </form>
</div>

<div id="dlgkriteria-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="savekriteria()" style="width:90px">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgkriteria').dialog('close')" style="width:90px">Cancel</a>
</div>

<script type="text/javascript">
	var url;
	function newkriteria(){
		$('#dlgkriteria').dialog('open').dialog('setTitle','New Kriteria');
		$('#fmkriteria').form('clear');
		url = '../../pages/kriteria/kriteriaction.php?act=create';
	}
	
	function editkriteria(){
		var row = $('#dgkriteria').datagrid('getSelected');
		if (row){
			$('#dlgkriteria').dialog('open').dialog('setTitle','Edit kriteria');
			$('#fmkriteria').form('load',row);
			url = '../../pages/kriteria/kriteriaction.php?act=update&id='+row.id_kriteria;
		}
	}
	
	function savekriteria(){
		$('#fmkriteria').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success: function(result){
				var result = eval('('+result+')');
				if (result.errorMsg){
					$.messager.show({
						title: 'Error',
						msg: result.errorMsg
					});
				} else {
					$('#dlgkriteria').dialog('close');		// close the dialog
					$('#dgkriteria').datagrid('reload');	// reload the user data
				}
			}
		});
	}

	function destroykriteria(){
		var row = $('#dgkriteria').datagrid('getSelected');
		if (row){
			$.messager.confirm('Confirm','Are you sure you want to Delete this kriteriauon?',function(r){
				if (r){
					$.post('../../pages/kriteria/kriteriaction.php?act=delete',{id:row.id_kriteria},function(result){
						if (result.success){
							$('#dgkriteria').datagrid('reload'); // reload the user data
						} else {
							$.messager.show({ // show error message
								title: 'Error',
								msg: result.errorMsg
							});
						}
					},'json');
				}
			});
		}
	}
</script>
