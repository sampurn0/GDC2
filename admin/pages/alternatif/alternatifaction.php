<?php
include '../../config/koneksi.php';

if ($_GET['act'] == 'list'){
    $page = isset($_POST['page']) ? intval($_POST['page']) : 0;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_alternatif';
    $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
    $offset = ($page-1)*$rows;

    $result = array();


    $rs = mysql_query("select count(*) from alternatif");
    $row = mysql_fetch_row($rs);
    $result["total"] = $row[0];

    $rs = mysql_query("select * from alternatif order by $sort $order limit $offset,$rows");

    $items = array();
    while($row = mysql_fetch_object($rs)){
        array_push($items, $row);
    }
    $result["rows"] = $items;

    echo json_encode($result);
}
else if ($_GET['act'] == 'create'){

    $nama_alternatif = htmlspecialchars($_REQUEST['nama_alternatif']);
    $deskripsi = htmlspecialchars($_REQUEST['deskripsi']);

    $result = mysql_query("INSERT INTO `alternatif`(`id_alternatif`, `nama_alternatif`, `deskripsi`)
                              VALUES ('','$nama_alternatif','$deskripsi')");

    if ($result){
        echo json_encode(array(
            'id_alternatif' => mysql_insert_id(),
            'nama_alternatif' => $nama_alternatif,
            'deskripsi' => $deskripsi,
        ));
    } else {
        echo json_encode(array('errorMsg'=>'Some errors occured.'));
    }
}
else if ($_GET['act'] == 'delete'){
    $id = intval($_REQUEST['id']);
    $result = mysql_query("delete from alternatif where id_alternatif='".$id."'");

    if ($result){
        echo json_encode(array('success'=>true));
    } else {
        echo json_encode(array('errorMsg'=>'Some errors occured.'));
    }

}

else if ($_GET['act'] == 'update'){
    $id = intval($_REQUEST['id']);
    $nama_alternatif = htmlspecialchars($_REQUEST['nama_alternatif']);
    $deskripsi = htmlspecialchars($_REQUEST['deskripsi']);

    $sql = "UPDATE `alternatif` SET `nama_alternatif`='$nama_alternatif',`deskripsi`='$deskripsi' WHERE `id_alternatif`='$id'";

    $result = @mysql_query($sql);
    if ($result){
        echo json_encode(array(
            'id_alternatif' => $id,
            'nama_alternatif' => $nama_alternatif,
            'deskripsi' => $deskripsi	));
    } else {
        echo json_encode(array('errorMsg'=>'Some errors occured.'));
    }
}