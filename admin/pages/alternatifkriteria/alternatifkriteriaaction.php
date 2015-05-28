<?php
include '../../config/koneksi.php';

if ($_GET['act'] == 'list'){
    $page = isset($_POST['page']) ? intval($_POST['page']) : 0;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_alternatif_kriteria';
    $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
    $offset = ($page-1)*$rows;

    $result = array();


    $rs = mysql_query("select count(*) from alternatif_kriteria");
    $row = mysql_fetch_row($rs);
    $result["total"] = $row[0];

    $rs = mysql_query("SELECT * FROM `alternatif_kriteria` LEFT JOIN `alternatif` ON(`alternatif_kriteria`.`id_alternatif`=`alternatif`.`id_alternatif`) LEFT JOIN `kriteria` ON(`alternatif_kriteria`.`id_kriteria`=`kriteria`.`id_kriteria`) order by $sort $order limit $offset,$rows");

    $items = array();
    while($row = mysql_fetch_object($rs)){
        array_push($items, $row);
    }
    $result["rows"] = $items;

    echo json_encode($result);
}
else if ($_GET['act'] == 'create'){

    $alternatif = htmlspecialchars($_REQUEST['id_alternatif']);
    $kriteria   = htmlspecialchars($_REQUEST['id_kriteria']);
    $nilai       = htmlspecialchars($_REQUEST['nilai']);

    $result = mysql_query("INSERT INTO `alternatif_kriteria`(`id_alternatif_kriteria`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES ('','$alternatif','$kriteria','$nilai')");

    if ($result){
        echo json_encode(array(
            'id_alternatif_kriteria' => mysql_insert_id(),
            'id_alternatif' => $alternatif,
            'id_kriteria' => $kriteria,
            'nilai' => $nilai
        ));
    } else {
        echo json_encode(array('errorMsg'=>'Some errors occured.'));
    }
}
else if ($_GET['act'] == 'delete'){
    $id = intval($_REQUEST['id']);
    $result = mysql_query("delete from alternatif_kriteria where id_alternatif_kriteria='".$id."'");

    if ($result){
        echo json_encode(array('success'=>true));
    } else {
        echo json_encode(array('errorMsg'=>'Some errors occured.'));
    }
}

else if ($_GET['act'] == 'update'){
    $id = intval($_REQUEST['id']);
    $alternatif = htmlspecialchars($_REQUEST['id_alternatif']);
    $kriteria   = htmlspecialchars($_REQUEST['id_kriteria']);
    $nilai      = htmlspecialchars($_REQUEST['nilai']);

    $sql = "UPDATE `alternatif_kriteria` SET `id_alternatif`='$alternatif',`id_kriteria`='$kriteria',`nilai`='$nilai' WHERE `id_alternatif_kriteria`='$id'";

    $result = @mysql_query($sql);
    if ($result){
        echo json_encode(array(
            'id_alternatif_kriteria' => mysql_insert_id(),
            'id_alternatif' => $alternatif,
            'id_kriteria' => $kriteria,
            'nilai' => $nilai
        ));
    } else {
        echo json_encode(array('errorMsg'=>'Some errors occured.'));
    }
}