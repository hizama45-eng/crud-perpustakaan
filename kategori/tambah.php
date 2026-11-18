<?php
include "../koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
</head>
<body>

<h2>Daftar Kategori Buku</h2>

<a href="tambah.php">+ Tambah Kategori</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)) {
    ?>

    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nama_kategori']; ?></td>
        <td>
            <img src="../gambar/<?php echo htmlspecialchars($data['gambar']); ?>" width="100">
        </td>
        <td>
            <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
            <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>

    <?php } ?>

</table>

<br>
<a href="../index.php">Kembali ke Data Buku</a>

</body>
</html>