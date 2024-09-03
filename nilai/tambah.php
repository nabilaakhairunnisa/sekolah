<?php
session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_nilai = $_POST['kd_nilai']; 
    $nis = $_POST['nis'];
    $nm_siswa = $_POST['nm_siswa'];
    $kd_matpel = $_POST['kd_matpel']; 
    $nm_matpel = $_POST['nm_matpel']; 
    $uts_sem_ganjil = $_POST['uts_sem_ganjil']; 
    $uas_sem_ganjil = $_POST['uas_sem_ganjil']; 
    $uts_sem_genap = $_POST['uts_sem_genap']; 
    $uas_sem_genap = $_POST['uas_sem_genap']; 

    $database = new db();
    if ($database->addNilai($kd_nilai, $nis, $nm_siswa, $kd_matpel, $nm_matpel, $uts_sem_ganjil, $uas_sem_ganjil, $uts_sem_genap, $uas_sem_genap)) {
        $_SESSION['message'] = "Data Nilai berhasil disimpan!";
    } else {
        $_SESSION['message'] = "Gagal menyimpan data: " . $database->koneksi->error;
    }

    header("Location: tampil.php");
    exit; 
}
?>
<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Nilai</h1>
    <form method="post" action="tambah.php">

        <div class="form-group">
            <label for="kd_nilai">Kode Nilai</label>
            <input type="text" class="form-control" id="kd_nilai" name="kd_nilai" placeholder="Masukkan Kode Nilai" required>
        </div>

        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" required>
        </div>

        <div class="form-group">
            <label for="nm_siswa">Nama Siswa</label>
            <input type="text" class="form-control" id="nm_siswa" name="nm_siswa" placeholder="Masukkan Nama Siswa" required>
        </div>

        <div class="form-group">
            <label for="kd_matpel">Kode Mata Pelajaran</label>
            <input type="text" class="form-control" id="kd_matpel" name="kd_matpel" placeholder="Masukkan Kode Mata Pelajaran" required>
        </div>

        <div class="form-group">
            <label for="nm_matpel">Nama Mata Pelajaran</label>
            <input type="text" class="form-control" id="nm_matpel" name="nm_matpel" placeholder="Masukkan Nama Mata Pelajaran" required>
        </div>

        <div class="form-group">
            <label for="uts_sem_ganjil">UTS Semester Ganjil</label>
            <input type="number" step="0.01" class="form-control" id="uts_sem_ganjil" name="uts_sem_ganjil" placeholder="Masukkan Nilai UTS Semester Ganjil">
        </div>

        <div class="form-group">
            <label for="uas_sem_ganjil">UAS Semester Ganjil</label>
            <input type="number" step="0.01" class="form-control" id="uas_sem_ganjil" name="uas_sem_ganjil" placeholder="Masukkan Nilai UAS Semester Ganjil">
        </div>

        <div class="form-group">
            <label for="uts_sem_genap">UTS Semester Genap</label>
            <input type="number" step="0.01" class="form-control" id="uts_sem_genap" name="uts_sem_genap" placeholder="Masukkan Nilai UTS Semester Genap">
        </div>

        <div class="form-group">
            <label for="uas_sem_genap">UAS Semester Genap</label>
            <input type="number" step="0.01" class="form-control" id="uas_sem_genap" name="uas_sem_genap" placeholder="Masukkan Nilai UAS Semester Genap">
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="tampil.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<?php
include "../templates/footer.php";
?>
