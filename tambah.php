<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $kode = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $stok = $_POST['stok'];
    $sinopsis = $_POST['sinopsis'];
    $status = $_POST['status_pinjam'];
    $kategori = $_POST['kategori'];

    $sql = "INSERT INTO buku (kode_buku, judul_buku, stok, sinopsis, status_pinjam, kategori)
    VALUES ('$kode', '$judul', '$stok', '$sinopsis', '$status', '$kategori')";

    $simpan = mysqli_query($koneksi, $sql);

    if ($simpan) {
        header("Location: index.php?pesn=Data berhasil ditambahkan"); exit;
    } else {
        echo "Gagal menyimpan data:". mysqli_error($koneksi); 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>

    <h2>Tambah Data Buku</h2>
        <form method="POST" action="">

        <label>Kode Buku:</label><br>
        <input type="text" name="kode_buku"><br><br>

        <label>Judul Buku:</label><br>
        <input type="teks" name="judul_buku"><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok"><br><br>

        <label>Sinopsis:</label><br>
        <textarea name="sinopsis"></textarea><br><br>

        <label>Status Pinjam:</label><br>
        <input type="radio" name="status_pinjam" value="Tersedia">Tersedia<br>
        <input type="radio" name="status_pinjam" value="Dipinjam">Dipinjam<br>

        <label>Kategori:<br></label><br>

    <select name="kategori">
        <option value="Pelajaran"></option>
        <option value="Novel">Novel</option>
        <option value="Komik">Komik</option>
        <option value="Sains">Sains</option>
        <option value="Sejarah">Sejarah</option>
    </select>
    <br><br>

    <button type="submit" name="simpan">Simpan</button>

</form>
        <br>
    <a href="index.php">Kembali</a>
    
</body>
</html>
