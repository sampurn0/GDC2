<script>
	function tampil(hal) {  
		var url     = 'pages/kriteria/media.php?page='+hal;
		var content = '<iframe src="'+url+'" width="100%" height="480" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize(iframe1);"></iframe>';  
		$('#content').html(content);
	}  
</script>
<div id="menu" class="easyui-panel" style="width:100%; padding:5px;">
    <a onclick="tampil('responden')" class="easyui-linkbutton" data-options="plain:true">Responden</a>
    <a onclick="tampil('kriteria')" class="easyui-linkbutton" data-options="plain:true">Kriteria</a>
</div>
<br/>

<div id="content"></div>