var url;
	function newkriteria(){
		$('#dlgkriteria').dialog('open').dialog('setTitle','New Kriteria');
		$('#fmkriteria').form('clear');
		url = 'pages/kriteria/kriteriaction.php?act=create';
	}
	
	function editkriteria(){
		var row = $('#dgkriteria').datagrid('getSelected');
		if (row){
			$('#dlgkriteria').dialog('open').dialog('setTitle','Edit kriteria');
			$('#fmkriteria').form('load',row);
			url = 'pages/kriteria/kriteriaction.php?act=update&id='+row.id_kriteria;
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
					$.post('pages/kriteria/kriteriaction.php?act=delete',{id:row.id_kriteria},function(result){
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