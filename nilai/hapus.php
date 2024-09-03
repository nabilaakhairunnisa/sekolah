<?php
session_start();
include("../db.php");

if (isset($_GET['kd_nilai'])) {
    $db = new db();
    $kd_nilai = $_GET['kd_nilai'];
    
    if ($db->deleteNilai($kd_nilai)) {
        $_SESSION['message'] = "Data berhasil dihapus!";
    } else {
        $_SESSION['message'] = "Gagal menghapus data: " . $db->koneksi->error;
    }
}

header("Location: tampil.php");
exit;
