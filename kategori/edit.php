<?php
include "../auth.php";
cek_login("../");
include "../koneksi.php";

$id = (int) $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Kategori tidak ditemukan!");
}

if (isset($_POST['update'])) {

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
    $gambar = $data['gambar'];

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

        move_uploaded_file($tmp, "../gambar/" . $gambar);
    }

    $hasil = mysqli_query($koneksi, "UPDATE kategori SET
    nama_kategori = '$nama',
    gambar = '$gambar'
    WHERE id = '$id'");

    if ($hasil) {

        if ($gambar != $data['gambar']) {
            if (file_exists("../gambar/" . $data['gambar'])) {
                unlink("../gambar/" . $data['gambar']);
            }
        }

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Edit Kategori</h2>

<form method="POST" enctype="multipart/form-data">

    Nama Kategori:
    <input type="text" name="nama_kategori"
    value="<?php echo htmlspecialchars($data['nama_kategori']); ?>" required>

    <br><br>

    Gambar Lama:
    <br>
    <img src="../gambar/<?php echo htmlspecialchars($data['gambar']); ?>" width="100">

    <br><br>

    Ganti Gambar:
    <input type="file" name="gambar" accept="image/*">

    <br><br>

    <button type="submit" name="update">Update</button>

</form>

<br>
<a href="index.php">Kembali</a>

</body>
</html>