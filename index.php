<?php

include "auth.php";
cek_login();
include "koneksi.php";

if (isset($_GET['cari'])) {
    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);

    $query = mysqli_query($koneksi, "SELECT buku.*, kategori.gambar
    FROM buku
    LEFT JOIN kategori ON buku.kategori = kategori.nama_kategori
    WHERE buku.judul_buku LIKE '%$cari%'");

} else {
    $query = mysqli_query($koneksi, "SELECT buku.*, kategori.gambar
    FROM buku
    LEFT JOIN kategori ON buku.kategori = kategori.nama_kategori");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Daftar Buku Perpustakaan</h2>

<a href="tambah.php">+ Tambah Buku</a>

<br><br>

<a href="kategori/index.php">Kelola Kategori</a>

<br><br>
<a href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>

<form method="GET" action="">
    <input type="text" name="cari" placeholder="Cari judul buku..."
    value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">

    <button type="submit">Cari</button>
    <a href="index.php">Reset</a>
</form>

<br>

<table border="1" cellpadding="5" cellspacing="0">

<tr>
    <th>No</th>
    <th>Kode Buku</th>
    <th>Judul Buku</th>
    <th>Stok</th>
    <th>Sinopsis</th>
    <th>Status Pinjam</th>
    <th>Kategori</th>
    <th>Gambar Kategori</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;

while ($data = mysqli_fetch_assoc($query)) {
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo htmlspecialchars($data['kode_buku']); ?></td>
    <td><?php echo htmlspecialchars($data['judul_buku']); ?></td>
    <td><?php echo $data['stok']; ?></td>
    <td><?php echo htmlspecialchars($data['sinopsis']); ?></td>
    <td><?php echo htmlspecialchars($data['status_pinjam']); ?></td>
    <td><?php echo htmlspecialchars($data['kategori']); ?></td>

    <td>
        <?php if (!empty($data['gambar'])) { ?>
            <img src="gambar/<?php echo htmlspecialchars($data['gambar']); ?>" width="80">
        <?php } else { ?>
            Tidak ada gambar
        <?php } ?>
    </td>

    <td>
        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
        <a href="hapus.php?id=<?php echo $data['id']; ?>"
        onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
    </td>
</tr>

<?php
}
?>

</table>

</body>
</html>