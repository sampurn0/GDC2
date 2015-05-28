
var url;
function newbanner(){

$('#dlgbanner').dialog('open').dialog('setTitle','New  Banner');
$('#fmbanner').form('clear');
url = 'mod/banner/banneraction.php?act=create';
	$('#sort').combobox({
    url:'mod/banner/banneraction.php?act=sort',
    valueField:'id_sort',
	method:'get',
    textField:'sort' });	

}
function editbanner(){
var row = $('#dgbanner').datagrid('getSelected');
if (row){
$('#dlgbanner').dialog('open').dialog('setTitle','Edit Banner');
$('#fmbanner').form('load',row);
url = 'mod/banner/banneraction.php?act=update&id='+row.id_banner;
if(row.banner != ""){
document.getElementById('images').innerHTML = "<img style='width:128px;height:130px;' src='banner/"+ row.banner +"' />";
}
else {
	document.getElementById('images').innerHTML = "<img style='width:128px;height:130px;' src='foto/angry-bird-icon.png' />";

}
	$('#sort').combobox({
    url:'mod/banner/banneraction.php?act=editsort',
    valueField:'id_sort',
	method:'get',
    textField:'sort',
value:+row.sort	});
}
}
 function savebanner(){
			$('#fmbanner').form('submit',{
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
						$('#dlgbanner').dialog('close');		// close the dialog
						$('#dgbanner').datagrid('reload');	// reload the user data
					}
				}
			});
}

function destroybanner(){
var row = $('#dgbanner').datagrid('getSelected');
if (row){
$.messager.confirm('Confirm','Are you sure you want to Delete this Banner?',function(r){
if (r){
$.post('mod/banner/banneraction.php?act=delete',{id:row.id_banner},function(result){
if (result.success){
$('#dgbanner').datagrid('reload'); // reload the user data
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