<?php
include "koneksi.php";

$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

if (isset($_POST['simpan'])) {

    $kode = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $stok = $_POST['stok'];
    $sinopsis = $_POST['sinopsis'];
    $status = $_POST['status_pinjam'];
    $kategori_buku = $_POST['kategori'];

    $sql = "INSERT INTO buku
    (kode_buku, judul_buku, stok, sinopsis, status_pinjam, kategori)
    VALUES ('$kode', '$judul', '$stok', '$sinopsis', '$status', '$kategori_buku')";

    $simpan = mysqli_query($koneksi, $sql);

    if ($simpan) {
        header("Location: index.php?pesan=Data berhasil ditambahkan");
        exit;
    } else {
        echo "Gagal menyimpan: " . mysqli_error($koneksi);
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

<form method="POST">

    Kode Buku:<br>
    <input type="text" name="kode_buku" required>
    <br><br>

    Judul Buku:<br>
    <input type="text" name="judul_buku" required>
    <br><br>

    Stok:<br>
    <input type="number" name="stok" required>
    <br><br>

    Sinopsis:<br>
    <textarea name="sinopsis"></textarea>
    <br><br>

    Status Pinjam:<br>
    <input type="radio" name="status_pinjam" value="Tersedia" required> Tersedia
    <input type="radio" name="status_pinjam" value="Dipinjam"> Dipinjam
    <br><br>

    Kategori:<br>
    <select name="kategori" required>
        <option value="">-- Pilih Kategori --</option>

        <?php while ($data = mysqli_fetch_assoc($kategori)) { ?>
            <option value="<?php echo htmlspecialchars($data['nama_kategori']); ?>">
                <?php echo htmlspecialchars($data['nama_kategori']); ?>
            </option>
        <?php } ?>

    </select>

    <br><br>

    <button type="submit" name="simpan">Simpan</button>

</form>

<br>
<a href="index.php">Kembali</a>

</body>
</html>

<?php
include "koneksi.php";

$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

if (isset($_POST['simpan'])) {

    $kode = $_POST['kode_buku'];
    $judul = $_POST['judul_buku'];
    $stok = $_POST['stok'];
    $sinopsis = $_POST['sinopsis'];
    $status = $_POST['status_pinjam'];
    $kategori_buku = $_POST['kategori'];

    $sql = "INSERT INTO buku
    (kode_buku, judul_buku, stok, sinopsis, status_pinjam, kategori)
    VALUES ('$kode', '$judul', '$stok', '$sinopsis', '$status', '$kategori_buku')";

    $simpan = mysqli_query($koneksi, $sql);

    if ($simpan) {
        header("Location: index.php?pesan=Data berhasil ditambahkan");
        exit;
    } else {
        echo "Gagal menyimpan: " . mysqli_error($koneksi);
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

<form method="POST">

    Kode Buku:<br>
    <input type="text" name="kode_buku" required>
    <br><br>

    Judul Buku:<br>
    <input type="text" name="judul_buku" required>
    <br><br>

    Stok:<br>
    <input type="number" name="stok" required>
    <br><br>

    Sinopsis:<br>
    <textarea name="sinopsis"></textarea>
    <br><br>

    Status Pinjam:<br>
    <input type="radio" name="status_pinjam" value="Tersedia" required> Tersedia
    <input type="radio" name="status_pinjam" value="Dipinjam"> Dipinjam
    <br><br>

    Kategori:<br>
    <select name="kategori" required>
        <option value="">-- Pilih Kategori --</option>

        <?php while ($data = mysqli_fetch_assoc($kategori)) { ?>
            <option value="<?php echo htmlspecialchars($data['nama_kategori']); ?>">
                <?php echo htmlspecialchars($data['nama_kategori']); ?>
            </option>
        <?php } ?>

    </select>

    <br><br>

    <button type="submit" name="simpan">Simpan</button>

</form>

<br>
<a href="index.php">Kembali</a>

</body>
</html>