
var url;
function newbiji(){
//var row = $('#dgprofil_rm').datagrid('getSelected');
$('#dlgbiji').dialog('open').dialog('setTitle','New Menu');
$('#fmbiji').form('clear');
url = 'mod/menu/menuaction.php?act=create'
document.getElementById('images').innerHTML = "<img style='width:128px;height:130px;' src='foto/angry-bird-icon.png' />";

}
function editmenu(){
var row = $('#dgbiji').datagrid('getSelected');
if (row){
$('#dlgbiji').dialog('open').dialog('setTitle','Edit Menu');
$('#fmbiji').form('load',row);
url = 'mod/menu/menuaction.php?act=update&id='+row.id_menu;
if(row.gambar_menu != ""){
document.getElementById('images').innerHTML = "<img style='width:128px;height:130px;' src='foto/"+ row.gambar_menu +"' />";
}
else {
	document.getElementById('images').innerHTML = "<img style='width:128px;height:130px;' src='foto/angry-bird-icon.png' />";

}
}
}
 function savebiji(){
			$('#fmbiji').form('submit',{
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
						$('#dlgbiji').dialog('close');		// close the dialog
						$('#dgbiji').datagrid('reload');	// reload the user data
					}
				}
			});
}

function destroymenu(){
var row = $('#dgprofil_rm').datagrid('getSelected');
if (row){
$.messager.confirm('Confirm','Are you sure you want to Delete this Menu?',function(r){
if (r){
$.post('mod/menu/menuaction.php?act=delete',{id:row.id_menu},function(result){
if (result.success){
$('#dgbiji').datagrid('reload'); // reload the user data
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