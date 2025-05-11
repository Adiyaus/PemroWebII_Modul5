<?php
require_once("Koneksi.php");

// === MEMBER ===
function getAllMember() {
    $conn = getConnection();
    $result = $conn->query("SELECT * FROM member");
    return $result;
}

function insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);
    $stmt->execute();
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE member SET nama_member=?, nomor_member=?, alamat=?, tgl_mendaftar=?, tgl_terakhir_bayar=? WHERE id_member=?");
    $stmt->bind_param("sssssi", $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar, $id);
    $stmt->execute();
}

function deleteMember($id) {
    $conn = getConnection();
    $conn->query("DELETE FROM member WHERE id_member=$id");
}

function getMemberById($id) {
    $conn = getConnection();
    return $conn->query("SELECT * FROM member WHERE id_member=$id")->fetch_assoc();
}

// === BUKU ===
function getAllBuku() {
    $conn = getConnection();
    return $conn->query("SELECT * FROM buku");
}

function insertBuku($judul, $penulis, $penerbit, $tahun) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $judul, $penulis, $penerbit, $tahun);
    $stmt->execute();
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE buku SET judul_buku=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id_buku=?");
    $stmt->bind_param("sssii", $judul, $penulis, $penerbit, $tahun, $id);
    $stmt->execute();
}

function deleteBuku($id) {
    $conn = getConnection();
    $conn->query("DELETE FROM buku WHERE id_buku=$id");
}

function getBukuById($id) {
    $conn = getConnection();
    return $conn->query("SELECT * FROM buku WHERE id_buku=$id")->fetch_assoc();
}

// === PEMINJAMAN ===
function getAllPeminjaman() {
    $conn = getConnection();
    $sql = "SELECT p.*, m.nama_member, b.judul_buku 
            FROM peminjaman p 
            JOIN member m ON p.id_member = m.id_member 
            JOIN buku b ON p.id_buku = b.id_buku";
    return $conn->query($sql);
}

function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    $stmt->execute();
}

function updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE peminjaman SET id_member=?, id_buku=?, tgl_pinjam=?, tgl_kembali=? WHERE id_peminjaman=?");
    $stmt->bind_param("iissi", $id_member, $id_buku, $tgl_pinjam, $tgl_kembali, $id);
    $stmt->execute();
}

function deletePeminjaman($id) {
    $conn = getConnection();
    $conn->query("DELETE FROM peminjaman WHERE id_peminjaman=$id");
}

function getPeminjamanById($id) {
    $conn = getConnection();
    return $conn->query("SELECT * FROM peminjaman WHERE id_peminjaman=$id")->fetch_assoc();
}
?>
