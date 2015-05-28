	function aktif(val,row){
		if (val == 1){
			return '<img src="images/stat_active.png">';
			} 
			else {
				return '<img src="images/dead_active.png">';
			}
		}


		
		
			
$(function(){

	for( i = 1; i < 4; ++i){  
	var o = i;
	$("#country"+o).combobox({
			url:'config/control.php?act=country',
				valueField:'id_country',
					textField:'name_country'
			
			});
	
	$('#provincy'+o).combobox({
			url:'config/control.php?act=provincy',
				valueField:'id_provinsi',
					textField:'name_provinsi'
			
			});
		$('#city'+o).combobox({
			url:'config/control.php?act=city',
				valueField:'id_city',
					textField:'name_city'
			
			});
	
	}	
$('#div').combobox({
			url:'config/control.php?act=divisi',
				valueField:'id_divisi',
					textField:'name_divisi',
			onSelect : function(getpos){
				var vurl ='config/control.php?act=getposisi&id_divisi='+getpos.id_divisi;
				$('#pos').combobox('reload',vurl);}
			});	
		$('#pos').combobox({
			//url:'config/view.php?act=posisi',
				valueField:'id_position',
					textField:'name_position',
			onSelect : function(getpos){
				var vurl ='config/control.php?act=getroles&id_position='+getpos.id_position;
				$('#rol').combobox('reload',vurl);}		
			});	
		$('#rol').combobox({
			//url:'config/view.php?act=roles',
				valueField:'id_roles',
					textField:'name_roles'
			});
		$('#poslist').combobox({
			url:'config/control.php?act=posisi',
				valueField:'id_position',
					textField:'name_position'
			
			});
		$('#divlist').combobox({
			url:'config/control.php?act=divisi',
				valueField:'id_divisi',
					textField:'name_divisi'
			
			});	
		
	
		
		
	
	});
