var url;
	function newalternatifkriteria(){
		$('#dlgalternatifkriteria').dialog('open').dialog('setTitle','New Alternatif-Kriteria');
		$('#fmalternatifkriteria').form('clear');
		url = 'pages/alternatifkriteria/alternatifkriteriaaction.php?act=create';
	}
	
	function editalternatifkriteria(){
		var row = $('#dgalternatifkriteria').datagrid('getSelected');
			if (row){
				$('#dlgalternatifkriteria').dialog('open').dialog('setTitle','Edit Alternatif-Kriteria');
				$('#fmalternatifkriteria').form('load',row);
				url = 'pages/alternatifkriteria/alternatifkriteriaaction.php?act=update&id='+row.id_alternatif_kriteria;
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
 function savealternatifkriteria(){
			$('#fmalternatifkriteria').form('submit',{
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
						$('#dlgalternatifkriteria').dialog('close');		// close the dialog
						$('#dgalternatifkriteria').datagrid('reload');	// reload the user data
					}
				}
			});
}

function destroyalternatifkriteria(){
	var row = $('#dgalternatifkriteria').datagrid('getSelected');
	if (row){
		$.messager.confirm('Confirm','Are you sure you want to Delete this Alternatif-Kriteria?',function(r){
			if (r){
				$.post('pages/alternatifkriteria/alternatifkriteriaaction.php?act=delete',{id:row.id_alternatif_kriteria},function(result){
					if (result.success){
						$('#dgalternatifkriteria').datagrid('reload'); // reload the user data
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

$(function(){
    $('#cc').combo();
    $('#cc2').combo();
    changeAnimation('show');
});
$('#sp').appendTo($('#cc').combo('panel'));