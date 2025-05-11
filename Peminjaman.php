<?php
require_once("Model.php");

$data = getAllPeminjaman();
echo "<a href='FormPeminjaman.php'>Tambah Peminjaman</a><br><br>";
echo "<table border='1'>
<tr><th>Nama Member</th><th>Judul Buku</th><th>Tgl Pinjam</th><th>Tgl Kembali</th><th>Aksi</th></tr>";

while ($row = $data->fetch_assoc()) {
    echo "<tr>
        <td>{$row['nama_member']}</td>
        <td>{$row['judul_buku']}</td>
        <td>{$row['tgl_pinjam']}</td>
        <td>{$row['tgl_kembali']}</td>
        <td>
            <a href='FormPeminjaman.php?id={$row['id_peminjaman']}'>Edit</a> |
            <a href='Peminjaman.php?delete={$row['id_peminjaman']}'>Hapus</a>
        </td>
    </tr>";
}
echo "</table>";

if (isset($_GET['delete'])) {
    deletePeminjaman($_GET['delete']);
    header("Location: Peminjaman.php");
}
?>

<a href="index.php" class="button">Kembali ke menu utama</a>