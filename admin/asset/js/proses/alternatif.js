var url;
	function newalternatif(){
		$('#dlgalternatif').dialog('open').dialog('setTitle','New Alternatif');
		$('#fmalternatif').form('clear');
		url = 'pages/alternatif/alternatifaction.php?act=create';
	}
	
	function editalternatif(){
		var row = $('#dgalternatif').datagrid('getSelected');
			if (row){
				$('#dlgalternatif').dialog('open').dialog('setTitle','Edit Alternatif');
				$('#fmalternatif').form('load',row);
				url = 'pages/alternatif/alternatifaction.php?act=update&id='+row.id_alternatif;

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
 function savealternatif(){
			$('#fmalternatif').form('submit',{
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
						$('#dlgalternatif').dialog('close');		// close the dialog
						$('#dgalternatif').datagrid('reload');	// reload the user data
					}
				}
			});
}

function destroyalternatif(){
	var row = $('#dgalternatif').datagrid('getSelected');
	if (row){
		$.messager.confirm('Confirm','Are you sure you want to Delete this Alternatif?',function(r){
			if (r){
				$.post('pages/alternatif/alternatifaction.php?act=delete',{id:row.id_alternatif},function(result){
					if (result.success){
						$('#dgalternatif').datagrid('reload'); // reload the user data
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