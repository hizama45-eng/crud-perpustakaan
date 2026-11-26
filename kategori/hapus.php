<?php
include "../auth.php";
cek_login("../");
include "../koneksi.php";

$id = (int) $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if ($data) {

    $hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id = '$id'");

if ($hapus) {

if (!empty($data['gambar']) && file_exists("../gambar/" . $data['gambar'])) {
            unlink("../gambar/" . $data['gambar']);
        }
    header("Location: index.php");
        exit;
    }
}

echo "Kategori tidak ditemukan atau gagal dihapus.";
?>