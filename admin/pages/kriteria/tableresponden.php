<?php 
	mysql_connect('localhost', 'root', '');
	mysql_select_db('db_gdc');
?>
<link rel="stylesheet" type="text/css" href="../../asset/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="../../asset/themes/icon.css">

<script type="text/javascript" src="../../asset/js/jquery.min.js"></script>
<script type="text/javascript" src="../../asset/js/jquery.easyui.min.js"></script>
<script src="jquery-1.4.3.js"></script>

<table id="dgresponden" title="Responden" class="easyui-datagrid" style="width:100%;height:380px" url="../../pages/kriteria/respondenaction.php?act=list"
       toolbar="#toolbarresponden" pagination="true" collapsible="true" closable="true" maximizable="true"
       rownumbers="true" fitColumns="true" singleSelect="true"   idField="id" sortName="id" sortOrder="asc">
    <thead>
    <tr>
        <th data-options="field:'id',width:80,sortable:true,hidden:true">ID Kriteria</th>
        <th data-options="field:'responden',width:100,sortable:true">Responden</th>
        <th data-options="field:'idkriteria',width:100,sortable:true">Id Kriteria</th>
        <th data-options="field:'subkriteria',width:100,sortable:true">Sub Kriteria</th>
        <th data-options="field:'nilaikriteria',width:100,sortable:true">Nilai</th>
    </tr>
    </thead>
</table>

<div id="toolbarresponden">
    <?php //if ($_SESSION['id_level'] == "2" OR $_SESSION['id_level'] == "3"){ } else { ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newresponden()">New Responden</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editresponden()">Edit Responden</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyresponden()">Remove Responden</a>
    <?php //} ?>
</div>

<?php
if(!empty($_POST['lname'])) {
    $valueOfInput = $_POST['lname'];
	echo $valueOfInput;
}

?>
<form method="POST">
<input id="dSuggest" name="lname" type="text" />
</form>
  <div id="output"></div>



<div id="dlgresponden" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px" closed="true" buttons="#dlgresponden-buttons" ng-controller="Ctrl">
    <form id="fmresponden" method="post" novalidate>
        <table cellpadding="5">
            <tr>
                <td>Responden:</td>
                <td><input name="responden" id="lolz" class="easyui-textbox" required="true"></td>
            </tr>

            <tr>
                <td>Kriteria:</td>
                <td>
					<select class="easyui-combobox" name="idkriteria" style="width:200px;">
                        <?php
                            $sql = mysql_query("SELECT * FROM `kriteria`");
                            while($r = mysql_fetch_array($sql)) { 
								$sql2 = mysql_query("SELECT count(*) as jum FROM `nilaikriteria` WHERE responden='R1' AND idkriteria='$r[id_kriteria]'");
								$s = mysql_fetch_array($sql2);
								if ($s['jum']==$r['sub']) {
									
								} else {
									echo '<option value="'.$r['id_kriteria'].'">'.$r['nama_kriteria'].'</option>';
								}
							?>
                        <?php
                            } ?>
                    </select>
				</td>
            </tr>
			
			<tr>
                <td>Nilai:</td>
                <td><input name="nilaikriteria" class="easyui-textbox" required="true"><input type="button" value="click" OnClick="kk()"/></td>
            </tr>
        </table>
    </form>
</div>

 <script type="text/javascript">
	$('#dSuggest').on("input", function() {
	  var dInput = this.value;
	  // console.log(dInput);
	  $('#output').text(dInput);
		 // delay to have the key value inserted into input, and affect value param
			$.post(document.location.href, { lname: dInput }, function(data) { // sending ajax post request
				console.log(data);
			});
	});
</script> 

<div id="dlgresponden-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveresponden()" style="width:90px">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgresponden').dialog('close')" style="width:90px">Cancel</a>
</div>

<script type="text/javascript">
	$(document).ready(function(){
        var bla = $("#aaaaaa").val();
		
		$( "p" ).html( "<b>Single:</b> " + bla +
		" <b>Multiple:</b> ");
    });

	var app = angular.module("test", []); 
	
	app.controller("Ctrl", function($scope) {
		$scope.sub_kriteria = 0;
	});
	
	var url;
	function newresponden(){
		$('#dlgresponden').dialog('open').dialog('setTitle','New Kriteria');
		$('#fmresponden').form('clear');
		url = '../../pages/kriteria/respondenaction.php?act=create';
	}
	
	function editresponden(){
		var row = $('#dgresponden').datagrid('getSelected');
		if (row){
			$('#dlgresponden').dialog('open').dialog('setTitle','Edit responden');
			$('#fmresponden').form('load',row);
			url = '../../pages/kriteria/respondenaction.php?act=update&id='+row.id;
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
					$.post('../../pages/kriteria/respondenaction.php?act=delete',{id:row.id},function(result){
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
</script>
<script>
	
</script>




<?php 
	error_reporting(0);
	
	$sql = "SELECT * FROM kriteria WHERE aktif='Y'";
	$query = mysql_query($sql);
	$query2 = mysql_query($sql);
?>


<br>
<br>
<div id="toolbarcluster">
		<a href="javascript:void(0)" id="addScnt" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newcluster()">Tambah Data</a>
	</div>
<form id="form1" method="POST" action="">
	<table id="p_scents" border=1>
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2" style="width: 220px">Responden / Pertanyaan</th>
			<?php 
				$no=1;
				while($r = mysql_fetch_array($query)) { ?>
					<th style="width: 100px" colspan='<?php echo $r['sub'] ?>'><?php echo $r['nama_kriteria'] ?></th>
			<?php
					$no++;
				} ?>
		</tr>
		<tr>
		<?php 
			$no1 = 1;
			while($r2 = mysql_fetch_array($query2)) { ?>
				<?php
					$no2 = 1;
					for($i=0; $i<$r2['sub']; $i++) { ?>
						<td style="width: 40px; font-weight: bold" align="center"><?php echo $no1.".".$no2; ?></td>
				<?php	
					$no2++;
					} ?>
		<?php
			$no1++;
			} ?>
		</tr>
		<?php 
			$sql = "SELECT * FROM nilaikriteria WHERE subkriteria='1.1'";
			$query = mysql_query($sql);
			
			$no1=1;
			$no=1;
			while($r2 = mysql_fetch_array($query)) { ?>
				<tr>
					<td>
						<?php 
							echo $no; 
						?>
					</td>
					<td>
						<?php 
							echo $r2[1]; 
						?>
					</td>
					<?php 
						$sql3 = "SELECT * FROM nilaikriteria WHERE responden='$r2[1]'";
						$query3 = mysql_query($sql3);
						while($r3 = mysql_fetch_array($query3)) { ?>
							<td>
								<?php 
									echo $r3[3]; 
								?>
							</td>
					<?php
						} ?>
				</tr>
		<?php
			$no++;
			} ?>
	</table>
</form>
<?php
		
		$sql = "SELECT sum(sub) as jumsub FROM kriteria WHERE aktif='Y'";
		$query = mysql_query($sql);
		$r = mysql_fetch_array($query);
		$count = $r['jumsub'];
		$jum = $_POST['jum'];
		$hit = $_POST['hit'];
		

		$sql2 = "SELECT * FROM kriteria WHERE aktif='Y'";
		$query2 = mysql_query($sql2);
		
		$no1 = 1;
		for($j=1; $j<=$jum; $j++) { 
			$no2 = 1;
			for($i=1; $i<=$count; $i++) {
				
				for($h=0; $h<1; $h++) {
					$resp = $_POST['p'.$jum.'0'];
				}
				$no3 = 1;
				$no5 = 1;
				while($r2 = mysql_fetch_array($query2)) {
					$no4 = 1;
					$nilai = 'p'.$j.$no5;
					for($k=1; $k<=$r2['sub']; $k++) {
						$subkrit = $no3.".".$no4; 
						$idkrit = $no3;
						$no4++;
						echo '<br>';
						
						insert($resp, $idkrit, $subkrit);
					}
					$no3++;
					$no5++;
				}
				$no2++;
			}
		}

		// $sql3 = "SELECT * FROM `nilaikriteria` WHERE `nilaikriteria`='0'";
		// $query3 = mysql_query($sql3);
		// $no1 = 1;
		
		// while ($r = mysql_fetch_array($query3)) {
			// for($j=1; $j<=$hit; $j++) { 
				// $no2 = 0;
				// for($i=1; $i<=$count; $i++) {
					// $nilai = $_POST['p'.$j.$i];
					// update($nilai, $r['id']);
				// }
			// }		
		// }
			
	?>
	<?php 
		$sql3 = "SELECT max(respondent) FROM nilaikriteria";
		$compare = mysql_fetch_array(mysql_query($sql3));
		$a = explode("R", $compare[0]);
		if($compare[0]==NULL) {
			$a[1]=0;
		}
		
		echo $a[1];
	?>
	<br>
<br>
<br>
	<script>
		$(function() {
			var scntDiv = $('#p_scents');
			var i = $('#p_scents tr').size() + -1;

			$('#addScnt').live('click', function() {
				$('<tr>'+
					'<td align="center"><input type="hidden" name="jum" value="'+i+'"/></td>'+
					'<td align="center"><input type="text" id="p['+i+'][0]" size="20" name="p'+i+'0" value="R'+i+'" placeholder="" /></td>'+
					<?php 
					$no = 1;
					for($i=0; $i<$count; $i++) { ?>
						'<td align="center"><input type="hidden" name="hit" value="<?php echo $i; ?>"/><input type="text" id="p['+i+'][<?php echo $no; ?>]" size="1" name="p'+i+'<?php echo $no; ?>" value="p['+i+'][<?php echo $no; ?>]" placeholder="" /></td>'+
					<?php 
					$no++;
					} ?>
					'<td><a href="#" id="saveScnt">Save </a><a href="#" id="remScnt">Remove</a></td>'+
				'</tr>').appendTo(scntDiv);
				i++;
				return false;
			});

			$('#remScnt').live('click', function() { 
				if( i > 1 ) {
					$(this).parents('tr').remove();
					i--;
				}
				return false;
			});
			
			$('#saveScnt').live('click', function() {
				$("#form1").submit();
			});
		});
	</script>