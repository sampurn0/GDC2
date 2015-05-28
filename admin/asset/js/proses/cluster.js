var url;
	function newcluster(){
		$('#dlgcluster').dialog('open').dialog('setTitle','New Cluster');
		$('#fmcluster').form('clear');
		url = 'pages/cluster/clusteraction.php?act=create';
	}
	
	function editcluster(){
		var row = $('#dgcluster').datagrid('getSelected');
			if (row){
				$('#dlgcluster').dialog('open').dialog('setTitle','Edit Cluster');
				$('#fmcluster').form('load',row);
				url = 'pages/cluster/clusteraction.php?act=update&id='+row.id_cluster;

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
 function savecluster(){
			$('#fmcluster').form('submit',{
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
						$('#dlgcluster').dialog('close');		// close the dialog
						$('#dgcluster').datagrid('reload');	// reload the user data
					}
				}
			});
}

function destroycluster(){
	var row = $('#dgcluster').datagrid('getSelected');
	if (row){
		$.messager.confirm('Confirm','Are you sure you want to Delete this Cluster?',function(r){
			if (r){
				$.post('pages/cluster/clusteraction.php?act=delete',{id:row.id_cluster},function(result){
					if (result.success){
						$('#dgcluster').datagrid('reload'); // reload the user data
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