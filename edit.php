<?php
include "koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);
if (isset($_POST['update'])) {
    $kode = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $stok = $_POST['stok'];
    $sinopsis = $_POST['sinopsis'];
    $status = $_POST['status_pinjam'];
    $kategori = $_POST['kategori'];

    $sql = "UPDATE buku SET
    kode_buku = '$kode',
    judul_buku = '$judul',
    stok = '$stok',
    sinopsis = '$sinopsis',
    status_pinjam = '$status',
    kategori ='$kategori' 
    WHERE id = $id";


$ubah = mysqli_query($koneksi,$sql);
if ($ubah){
    header("Location:index.php? pesan=Data berhasil diubah");
    exit;
} else {
    echo "Gagal mengubah data:" . mysqli_error($koneksi);
}
}
?>

<!DOCTYPE html>
<html>
<head>
   
    <title>Edit Buku</title>
</head>
<body>
    <h2>Edit Data Buku</h2>
    <form method="POST" action="">

    <label>Kode Buku:</label><br>
    <input type="text" name="kode_buku" value="<?php echo $data['kode_buku'];?>" required><br><br>

    <label>Judul Buku:</label><br>
    <input type="text" name="judul_buku" value="<?php echo $data['judul_buku'];?>" required><br><br>

      <label>Stok:</label><br>
    <input type="number" name="stok" value="<?php echo $data['stok'];?>" required><br><br>

      <label>Sinopsis:</label><br>
    <textarea name="sinopsis" required><?php echo $data['sinopsis'];?></textarea><br><br>

    <label>Status Pinjam:</label><br>

<input type="radio" name="status_pinjam" value="Tersedia" <?php if ($data['status_pinjam'] == 'Tersedia') echo 'checked'; ?> required>
Tersedia
<br>
<input type="radio" name="status_pinjam" value="Dipinjam" <?php if ($data['status_pinjam'] == 'Dipinjam') echo 'checked'; ?>>
Dipinjam
<br><br>

<label>Kategori:</label><br>
<select name="kategori" required>

<option value="Pelajaran" <?php if ($data['kategori'] == 'Pelajaran') echo 'selected'; ?>>Pelajaran</option>

<option value="Novel" <?php if ($data['kategori'] == 'Novel') echo 'selected'; ?>>Novel</option>

<option value="Komik" <?php if ($data['kategori'] == 'Komik') echo 'selected'; ?>>Komik</option>

<option value="Sains" <?php if ($data['kategori'] == 'Sains') echo 'selected'; ?>>Sains</option>

<option value="Sejarah" <?php if ($data['kategori'] == 'Sejarah') echo 'selected'; ?>>Sejarah</option>

</select>
<br><br>
<button type="submit" name="update">Update</button>
</form>
<br>
<a href="index.php">Kembali</a>
</body>
</html>