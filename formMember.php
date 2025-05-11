<?php
require_once("Model.php");

$id = $_GET['id'] ?? "";
$data = ($id) ? getMemberById($id) : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $daftar = $_POST['daftar'];
    $bayar = $_POST['bayar'];

    if ($id) {
        updateMember($id, $nama, $nomor, $alamat, $daftar, $bayar);
    } else {
        insertMember($nama, $nomor, $alamat, $daftar, $bayar);
    }

    header("Location: Member.php");
}
?>

<form method="post">
    Nama: <input type="text" name="nama" value="<?= $data['nama_member'] ?? '' ?>"><br>
    Nomor: <input type="text" name="nomor" value="<?= $data['nomor_member'] ?? '' ?>"><br>
    Alamat: <textarea name="alamat"><?= $data['alamat'] ?? '' ?></textarea><br>
    Tgl Daftar: <input type="datetime-local" name="daftar" value="<?= isset($data['tgl_mendaftar']) ? date('Y-m-d\TH:i', strtotime($data['tgl_mendaftar'])) : '' ?>"><br>
    Tgl Bayar: <input type="datetime-local" name="bayar" value="<?= isset($data['tgl_terakhir_bayar']) ? date('Y-m-d\TH:i', strtotime($data['tgl_terakhir_bayar'])) : '' ?>"><br>
    <input type="submit" value="Simpan">
</form>
