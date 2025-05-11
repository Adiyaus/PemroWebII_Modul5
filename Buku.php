<?php
require_once("Model.php");

$data = getAllBuku();
echo "<a href='FormBuku.php'>Tambah Buku</a><br><br>";
echo "<table border='1'>
<tr><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun</th><th>Aksi</th></tr>";

while ($row = $data->fetch_assoc()) {
    echo "<tr>
        <td>{$row['judul_buku']}</td>
        <td>{$row['penulis']}</td>
        <td>{$row['penerbit']}</td>
        <td>{$row['tahun_terbit']}</td>
        <td>
            <a href='FormBuku.php?id={$row['id_buku']}'>Edit</a> |
            <a href='Buku.php?delete={$row['id_buku']}'>Hapus</a>
        </td>
    </tr>";
}
echo "</table>";

if (isset($_GET['delete'])) {
    deleteBuku($_GET['delete']);
    header("Location: Buku.php");
}
?>

<a href="index.php" class="button">Kembali ke menu utama</a>