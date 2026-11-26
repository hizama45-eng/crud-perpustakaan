<?php

include "auth.php";
cek_login();
include "koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

if (!$data) {
    die("Data buku tidak ditemukan!");
}

if (isset($_POST['update'])) {

    $kode = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $stok = $_POST['stok'];
    $sinopsis = $_POST['sinopsis'];
    $status = $_POST['status_pinjam'];
    $kategori_buku = $_POST['kategori'];

    $sql = "UPDATE buku SET
    kode_buku = '$kode',
    judul_buku = '$judul',
    stok = '$stok',
    sinopsis = '$sinopsis',
    status_pinjam = '$status',
    kategori = '$kategori_buku'
    WHERE id = '$id'";

    $ubah = mysqli_query($koneksi, $sql);

    if ($ubah) {
        header("Location: index.php?pesan=Data berhasil diubah");
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Edit Data Buku</h2>

<form method="POST">

    Kode Buku:<br>
    <input type="text" name="kode_buku" value="<?php echo htmlspecialchars($data['kode_buku']); ?>" required>
    <br><br>

    Judul Buku:<br>
    <input type="text" name="judul_buku" value="<?php echo htmlspecialchars($data['judul_buku']); ?>" required>
    <br><br>

    Stok:<br>
    <input type="number" name="stok" value="<?php echo $data['stok']; ?>" required>
    <br><br>

    Sinopsis:<br>
    <textarea name="sinopsis" required><?php echo htmlspecialchars($data['sinopsis']); ?></textarea>
    <br><br>

    Status Pinjam:<br>

    <input type="radio" name="status_pinjam" value="Tersedia"
    <?php if ($data['status_pinjam'] == 'Tersedia') echo 'checked'; ?> required>
    Tersedia

    <input type="radio" name="status_pinjam" value="Dipinjam"
    <?php if ($data['status_pinjam'] == 'Dipinjam') echo 'checked'; ?>>
    Dipinjam

    <br><br>

    Kategori:<br>
    <select name="kategori" required>

        <option value="">-- Pilih Kategori --</option>

        <?php while ($k = mysqli_fetch_assoc($kategori)) { ?>

            <option value="<?php echo htmlspecialchars($k['nama_kategori']); ?>"
            <?php if ($data['kategori'] == $k['nama_kategori']) echo 'selected'; ?>>

                <?php echo htmlspecialchars($k['nama_kategori']); ?>

            </option>

        <?php } ?>

    </select>

    <br><br>

    <button type="submit" name="update">Update</button>

</form>

<br>
<a href="index.php">Kembali</a>

</body>
</html>