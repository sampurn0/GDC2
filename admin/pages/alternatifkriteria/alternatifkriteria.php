<table id="dgalternatifkriteria" title="Alternatif" class="easyui-datagrid" style="width:100%;height:380px" url="pages/alternatifkriteria/alternatifkriteriaaction.php?act=list"
       toolbar="#toolbaralternatifkriteria" pagination="true" collapsible="true" closable="true" maximizable="true"
       rownumbers="true" fitColumns="true" singleSelect="true"   idField="id_alternatifkriteria" sortName="id_alternatif_kriteria" sortOrder="asc">
    <thead>
    <tr>
        <th data-options="field:'id_alternatif_kriteria',width:80,sortable:true,hidden:false">ID Alternatif Kriteria</th>
        <th data-options="field:'nama_alternatif',width:80,sortable:true">Nama Alternatif</th>
        <th data-options="field:'nama_kriteria',width:100,sortable:true">Nama Kriteria</th>
        <th data-options="field:'nilai',width:100,sortable:true">Nilai</th>
    </tr>
    </thead>
</table>

<div id="toolbaralternatifkriteria">
    <?php //if ($_SESSION['id_level'] == "2" OR $_SESSION['id_level'] == "3"){ } else { ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newalternatifkriteria()">New Alternatif</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editalternatifkriteria()">Edit Alternatif</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyalternatifkriteria()">Remove Alternatif</a>
    <?php //} ?>
</div>

<div id="dlgalternatifkriteria" class="easyui-dialog" style="width:400px;height:260px;padding:10px 20px" data-options="top:0" maximizable="true" closed="true" buttons="#dlgalternatifkriteria-buttons">
    <form id="fmalternatifkriteria" method="post"  enctype="multipart/form-data" novalidate>
        <table cellpadding="5">
            <tr>
                <td><span>Alternatif :</span></td>
                <td>
                    <select class="easyui-combobox" name="id_alternatif" style="width:200px;">
                        <?php
                            $sql = mysql_query("SELECT * FROM `alternatif`");
                            while($r = mysql_fetch_array($sql)) { ?>
                                <option value="<?php echo $r['id_alternatif'] ?>"><?php echo $r['nama_alternatif'] ?></option>
                        <?php
                            } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td><span>Kriteria :</span></td>
                <td>
                    <select class="easyui-combobox" name="id_kriteria" style="width:200px;">
                        <?php
                        $sql2 = mysql_query("SELECT * FROM `kriteria`");
                        while($r2 = mysql_fetch_array($sql2)) { ?>
                            <option value="<?php echo $r2['id_kriteria'] ?>"><?php echo $r2['nama_kriteria'] ?></option>
                        <?php
                        } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Nilai :</td>
                <td><input name="nilai" class="easyui-textbox" data-options="required:true"  style="width:250px;"></td>
            </tr>
        </table>
    </form>
</div>

<div id="dlgalternatifkriteria-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="savealternatifkriteria()" style="width:90px">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgalternatifkriteria').dialog('close')" style="width:90px">Cancel</a>
</div>

<script type="text/javascript">
    $(function(){
        $('#cc').combo({
            required:true,
            editable:false
        });
        $('#sp').appendTo($('#cc').combo('panel'));
        $('#sp input').click(function(){
            var v = $(this).val();
            var s = $(this).next('span').text();
            $('#cc').combo('setValue', v).combo('setText', s).combo('hidePanel');
        });
    });
</script>