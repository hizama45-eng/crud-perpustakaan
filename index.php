<?php
include "koneksi.php";

if (isset($_GET['cari'])) {
    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);

    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul_buku LIKE '%$cari%'");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM buku");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>

<h2>Daftar Buku Perpustakaan</h2>

<a href="tambah.php">+ Tambah Buku</a>

<br><br>

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
    <th>Aksi</th>
</tr>

<?php
$no = 1;

while ($data = mysqli_fetch_assoc($query)) {
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $data['kode_buku']; ?></td>
    <td><?php echo $data['judul_buku']; ?></td>
    <td><?php echo $data['stok']; ?></td>
    <td><?php echo $data['sinopsis']; ?></td>
    <td><?php echo $data['status_pinjam']; ?></td>
    <td><?php echo $data['kategori']; ?></td>

    <td>
        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>

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