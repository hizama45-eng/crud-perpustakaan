<?php
include "../auth.php";
cek_login("../");
include "../koneksi.php";

if (isset($_POST['simpan'])) {

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);

    if ($_FILES['gambar']['error'] == 0) {

        $tmp = $_FILES['gambar']['tmp_name'];

        $info = getimagesize($tmp);

        if ($info === false) {
            die("File harus berupa gambar!");
        }

        $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

        // hanya izinkan ekstensi gambar
        $boleh = ["jpg", "jpeg", "jpe", "png", "gif", "webp"];
        if (!in_array($ext, $boleh)) {
            die("Format gambar harus jpg, jpeg, png, gif, atau webp!");
        }

        $gambar = uniqid() . "." . $ext;

        if (move_uploaded_file($tmp, "../gambar/" . $gambar)) {

            mysqli_query($koneksi, "INSERT INTO kategori
            (nama_kategori, gambar)
            VALUES ('$nama', '$gambar')");

            header("Location: index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
</head>
<body>

<h2>Tambah Kategori</h2>

<form method="POST" enctype="multipart/form-data">

    Nama Kategori:
    <input type="text" name="nama_kategori" required>
    <br><br>

    Gambar:
    <input type="file" name="gambar" accept="image/*" required>
    <br><br>

    <button type="submit" name="simpan">Simpan</button>

</form>

<br>
<a href="index.php">Kembali</a>

</body>
</html>