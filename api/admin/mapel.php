<?php
require '../../vendor/autoload.php';
include_once '../util/db.php';

if (isset($_POST['create'])) {
    $nama = $_POST['nama'];
    $jenjang = $_POST['id_jenjang'];
    $sql = "INSERT INTO mapel (id_mapel, id_jenjang, nama) VALUES ('$id_mapel', '$id_jenjang', '$nama')";
    $db->query($sql) or die($db->error);
}
if (isset($_POST['update'])) {
    $id_mapel = $_POST['update'];
    $nama = $_POST['nama'];
    $sql = "UPDATE mapel SET nama = '$nama' WHERE id_mapel = '$id_mapel'";
    $db->query($sql) or die($db->error);
}
if(isset($_POST['delete'])) {
    $id_mapel = escape($_POST['delete']);
    if ($_SESSION['user_id'] !== $id_admin) {
        $sql = "DELETE FROM mapel WHERE id_mapel = '$id_mapel'";
        $db->query($sql) or die($db->error);

        $sql = "DELETE FROM detail_mapel WHERE id_mapel = '$id_mapel'";
        $db->query($sql) or die($db->error);

        $sql = "DELETE FROM jadwal WHERE id_mapel = '$id_mapel'";
        $db->query($sql) or die($db->error);
    }
    redirect("../../client/admin/mapel.php");
}