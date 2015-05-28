<table id="dgalternatif" title="Alternatif" class="easyui-datagrid" style="width:100%;height:380px" url="pages/alternatif/alternatifaction.php?act=list"
       toolbar="#toolbaralternatif" pagination="true" collapsible="true" closable="true" maximizable="true"
       rownumbers="true" fitColumns="true" singleSelect="true"   idField="id_alternatif" sortName="id_alternatif" sortOrder="asc">
    <thead>
    <tr>
        <th data-options="field:'id_alternatif',width:80,sortable:true,hidden:true">ID Alternatif</th>
        <th data-options="field:'nama_alternatif',width:80,sortable:true">Nama Alternatif</th>
        <th data-options="field:'deskripsi',width:100,sortable:true">Keterangan</th>
    </tr>
    </thead>
</table>

<div id="toolbaralternatif">
    <?php //if ($_SESSION['id_level'] == "2" OR $_SESSION['id_level'] == "3"){ } else { ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newalternatif()">New Alternatif</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editalternatif()">Edit Alternatif</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyalternatif()">Remove Alternatif</a>
    <?php //} ?>
</div>

<div id="dlgalternatif" class="easyui-dialog" style="width:400px;height:240px;padding:10px 20px" maximizable="true" closed="true" buttons="#dlgalternatif-buttons">
    <form id="fmalternatif" method="post"  enctype="multipart/form-data" novalidate>
        <table cellpadding="5">
            <tr>
                <td>Alternatif:</td>
                <td><input name="nama_alternatif" class="easyui-textbox" required="true"></td>
            </tr>

            <tr>
                <td>Keterangan:</td>
                <td><input name="deskripsi" class="easyui-textbox" data-options="multiline:true"  style="height:80px;width:250px;"></td>
            </tr>
        </table>
    </form>
</div>


<div id="dlgalternatif-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="savealternatif()" style="width:90px">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgalternatif').dialog('close')" style="width:90px">Cancel</a>
</div>
