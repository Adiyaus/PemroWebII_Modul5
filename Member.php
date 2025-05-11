<?php
require_once("Model.php");

$data = getAllMember();
echo "<a href='FormMember.php'>Tambah Member</a><br><br>";
echo "<table border='1'>
<tr><th>Nama</th><th>Nomor</th><th>Alamat</th><th>Tgl Daftar</th><th>Tgl Bayar</th><th>Aksi</th></tr>";

while ($row = $data->fetch_assoc()) {
    echo "<tr>
        <td>{$row['nama_member']}</td>
        <td>{$row['nomor_member']}</td>
        <td>{$row['alamat']}</td>
        <td>{$row['tgl_mendaftar']}</td>
        <td>{$row['tgl_terakhir_bayar']}</td>
        <td>
            <a href='FormMember.php?id={$row['id_member']}'>Edit</a> | 
            <a href='Member.php?delete={$row['id_member']}'>Hapus</a>
        </td>
    </tr>";
}
echo "</table>";

if (isset($_GET['delete'])) {
    deleteMember($_GET['delete']);
    header("Location: Member.php");
}
?>
 <a href="index.php" class="button">Kembali ke menu utama</a>