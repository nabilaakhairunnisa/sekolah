<?php
session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $nm_guru = $_POST['nm_guru'];
    $tmp_lahir_guru = $_POST['tmp_lahir_guru']; 
    $tgl_lahir_guru = $_POST['tgl_lahir_guru']; 
    $jkel_guru = $_POST['jkel_guru']; 
    $alamat = $_POST['alamat']; 
    $telp = $_POST['telp']; 
    $kd_matpel = $_POST['kd_matpel']; 
    $nm_matpel = $_POST['nm_matpel'];

    $database = new db();
    if ($database->addGuru($nip, $nm_guru, $tmp_lahir_guru, $tgl_lahir_guru, $jkel_guru, $alamat, $telp, $kd_matpel, $nm_matpel)) {
        $_SESSION['message'] = "Data guru berhasil disimpan!";
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
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Guru</h1>
    <form method="post" action="">

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" required>
        </div>

        <div class="form-group">
            <label for="nm_guru">Nama Guru</label>
            <input type="text" class="form-control" id="nm_guru" name="nm_guru" placeholder="Masukkan Nama Guru" required>
        </div>

        <div class="form-group">
            <label for="tmp_lahir_guru">Tempat Lahir</label>
            <input type="text" class="form-control" id="tmp_lahir_guru" name="tmp_lahir_guru" placeholder="Masukkan Tempat Lahir" required>
        </div>

        <div class="form-group">
            <label for="tgl_lahir_guru">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir_guru" name="tgl_lahir_guru" placeholder="Masukkan Tanggal Lahir" required>
        </div>

        <div class="form-group">
            <label for="jkel_guru">Jenis Kelamin</label>
            <select class="form-control" id="jkel_guru" name="jkel_guru" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required></textarea>
        </div>

        <div class="form-group">
            <label for="telp">Telepon</label>
            <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan Telepon" required>
        </div>

        <div class="form-group">
            <label for="kd_matpel">Kode Mata Pelajaran</label>
            <input type="text" class="form-control" id="kd_matpel" name="kd_matpel" placeholder="Masukkan Kode Mata Pelajaran" required>
        </div>

        <div class="form-group">
            <label for="nm_matpel">Nama Mata Pelajaran</label>
            <input type="text" class="form-control" id="nm_matpel" name="nm_matpel" placeholder="Masukkan Nama Mata Pelajaran" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="tampil.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<?php
include "../templates/footer.php";
?>
