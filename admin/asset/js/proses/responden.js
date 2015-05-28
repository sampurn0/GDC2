var url;
	function newresponden(){
		$('#dlgresponden').dialog('open').dialog('setTitle','New Nilai');
		$('#fmresponden').form('clear');
		url = 'pages/responden/respondenction.php?act=create';
	}
	
	function editresponden(){
		var row = $('#dgresponden').datagrid('getSelected');
		if (row){
			$('#dlgresponden').dialog('open').dialog('setTitle','Edit responden');
			$('#fmresponden').form('load',row);
			url = 'pages/responden/respondenction.php?act=update&id='+row.id_responden;
		}
	}
	
	function saveresponden(){
		$('#fmresponden').form('submit',{
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
					$('#dlgresponden').dialog('close');		// close the dialog
					$('#dgresponden').datagrid('reload');	// reload the user data
				}
			}
		});
	}

	function destroyresponden(){
		var row = $('#dgresponden').datagrid('getSelected');
		if (row){
			$.messager.confirm('Confirm','Are you sure you want to Delete this respondenuon?',function(r){
				if (r){
					$.post('pages/responden/respondenction.php?act=delete',{id:row.id_responden},function(result){
						if (result.success){
							$('#dgresponden').datagrid('reload'); // reload the user data
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