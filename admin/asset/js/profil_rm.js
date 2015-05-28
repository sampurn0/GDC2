
var url;
function newprofil_rm(){

$('#dlgprofil_rm').dialog('open').dialog('setTitle','New Rumah Makan');
$('#fmprofil_rm').form('clear');
url = 'mod/profil_rm/profil_rmaction.php?act=create';
$('#dgmenu').datagrid({
		url:'mod/profil_rm/menuaction.php?act=list'
		});

}
function editprofil_rm(){
var row = $('#dgprofil_rm').datagrid('getSelected');
if (row){
$('#dlgprofil_rm').dialog('open').dialog('setTitle','Edit Position');
$('#fmprofil_rm').form('load',row);
url = 'mod/profil_rm/profil_rmaction.php?act=update&id='+row.id_profil_rm;
$('#dgmenu').datagrid({
		url:'mod/profil_rm/menuaction.php?act=list&id='+row.id_profil_rm
		});

//$('#fmprofil_rm').form('load');
//CKEDITOR.instances.profile.setData(row.profile);
if(row.gambar != ""){
document.getElementById('images').innerHTML = "<img style='width:128px;height:130px;' src='foto/"+ row.gambar +"' />";
}
else {
	document.getElementById('images').innerHTML = "<img style='width:128px;height:130px;' src='foto/angry-bird-icon.png' />";

}
/*
CKEDITOR.replace('profile'); 

$('#fmprofil_rm').form({
    ajax:false,
    onLoadSuccess:function(data){
        CKEDITOR.instances.profile.setData(data.profile);
    }
});
$('#fmprofil_rm').form('load',{"profile":+data.profile})
*/
}
}
/*
$('#dgprofil_rm').form({
    ajax:false,
    onLoadSuccess:function(data){
        CKEDITOR.instances.profile.setData(data.profile);
    }
});
*/
 function saveprofil_rm(){
			$('#fmprofil_rm').form('submit',{
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
						$('#dlgprofil_rm').dialog('close');		// close the dialog
						$('#dgprofil_rm').datagrid('reload');	// reload the user data
					}
				}
			});
}

function destroyprofil_rm(){
var row = $('#dgprofil_rm').datagrid('getSelected');
if (row){
$.messager.confirm('Confirm','Are you sure you want to Delete this Rumah Makan?',function(r){
if (r){
$.post('mod/profil_rm/profil_rmaction.php?act=delete',{id:row.id_profil_rm},function(result){
if (result.success){
$('#dgprofil_rm').datagrid('reload'); // reload the user data
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