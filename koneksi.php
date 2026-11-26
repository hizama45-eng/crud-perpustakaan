<?php
if ($_SERVER['SERVER_NAME'] == "localhost") {
    // Pengaturan di Laragon (komputer sendiri)
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "perpustakaan";
} else {
    // Pengaturan di InfinityFree (hosting)
    $host = "sql210.infinityfree.com";
    $user = "if0_43519474";
    $pass = "hEtEC60YKIx70oA";
    $db   = "if0_43519474_hizam_perpustakaan";
}

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>