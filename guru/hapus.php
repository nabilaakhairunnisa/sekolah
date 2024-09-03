<?php
session_start();
include("../db.php");

if (isset($_GET['nip'])) {
    $db = new db();
    $nip = $_GET['nip'];
    
    if ($db->deleteGuru($nip)) {
        $_SESSION['message'] = "Data berhasil dihapus!";
    } else {
        $_SESSION['message'] = "Gagal menghapus data: " . $db->koneksi->error;
    }
}

header("Location: tampil.php");
exit;