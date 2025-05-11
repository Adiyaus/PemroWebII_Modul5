<?php
require_once("Model.php");

$id = $_GET['id'] ?? "";
$data = ($id) ? getBukuById($id) : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];

    if ($id) {
        updateBuku($id, $judul, $penulis, $penerbit, $tahun);
    } else {
        insertBuku($judul, $penulis, $penerbit, $tahun);
    }

    header("Location: Buku.php");
}
?>

<form method="post">
    Judul: <input type="text" name="judul" value="<?= $data['judul_buku'] ?? '' ?>"><br>
    Penulis: <input type="text" name="penulis" value="<?= $data['penulis'] ?? '' ?>"><br>
    Penerbit: <input type="text" name="penerbit" value="<?= $data['penerbit'] ?? '' ?>"><br>
    Tahun: <input type="number" name="tahun" value="<?= $data['tahun_terbit'] ?? '' ?>"><br>
    <input type="submit" value="Simpan">
</form>
