<?php
session_start();
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST['nis'];
    $nm_siswa = $_POST['nm_siswa'];
    $tmp_lahir = $_POST['tmp_lahir']; 
    $tgl_lahir = $_POST['tgl_lahir']; 
    $jkel = $_POST['jkel']; 
    $alamat = $_POST['alamat']; 
    $telp = $_POST['telp']; 
    $nm_wali = $_POST['nm_wali']; 
    $kd_kelas = $_POST['kd_kelas']; 
    $username = $_POST['username']; 
    $password = $_POST['password'];

    $database = new db();
    if ($database->addsiswa($nis, $nm_siswa, $tmp_lahir, $tgl_lahir, $jkel, $alamat, $telp, $nm_wali, $kd_kelas, $username, $password)) {
        $_SESSION['message'] = "Data siswa berhasil disimpan!";
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
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Siswa</h1>
    <form method="post" action="">

        <div class="form-group">
            <label for="">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" required>
        </div>

        <div class="form-group">
            <label for="">Nama Siswa</label>
            <input type="text" class="form-control" id="nm_siswa" name="nm_siswa" placeholder="Masukkan Nama Siswa" required>
        </div>

        <div class="form-group">
            <label for="">Tempat Lahir</label>
            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Masukkan Tempat Lahir" required>
        </div>

        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" required>
        </div>

        <div class="form-group">
            <label for="jkel">Jenis Kelamin</label>
            <select class="form-control" id="jkel" name="jkel" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
        </div>

        <div class="form-group">
            <label for="">Telepon</label>
            <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan Telepon" required>
        </div>

        <div class="form-group">
            <label for="">Nama Wali</label>
            <input type="text" class="form-control" id="nm_wali" name="nm_wali" placeholder="Masukkan Nama Wali" required>
        </div>

        <div class="form-group">
            <label for="">Kode Kelas</label>
            <input type="text" class="form-control" id="kd_kelas" name="kd_kelas" placeholder="Masukkan Kode Kelas" required>
        </div>

        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="tampil.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<?php
include "../templates/footer.php";
?>