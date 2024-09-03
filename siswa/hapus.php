<?php
session_start();
include("../db.php");

if (isset($_GET['nis'])) {
    $db = new db();
    $nis = $_GET['nis'];
    
    if ($db->deleteSiswa($nis)) {
        $_SESSION['message'] = "Data berhasil dihapus!";
    } else {
        $_SESSION['message'] = "Gagal menghapus data: " . $db->koneksi->error;
    }
}

header("Location: tampil.php");
exit;