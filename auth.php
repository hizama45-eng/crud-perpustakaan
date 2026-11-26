<?php
session_start();

// cegah halaman disimpan di cache browser
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

function cek_login($path = "") {
    if (!isset($_SESSION['login'])) {
        header("Location: " . $path . "login.php");
        exit;
    }
}

// otomatis dicek setiap kali auth.php di-include
$folder = basename(dirname($_SERVER['SCRIPT_NAME']));
cek_login($folder == "kategori" ? "../" : "");
?>