<?php
session_start();
include("../db.php");

$database = new db();
$siswa = $database->getSiswaByNis($_GET['nis'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $success = $database->updateSiswa(
        $_POST['nis'],
        $_POST['nm_siswa'],
        $_POST['tmp_lahir'], 
        $_POST['tgl_lahir'], 
        $_POST['jkel'], 
        $_POST['alamat'], 
        $_POST['telp'], 
        $_POST['nm_wali'], 
        $_POST['kd_kelas'], 
        $_POST['username'], 
        $_POST['password']
    );

    if ($success) {
        $_SESSION['message'] = "Data siswa berhasil diubah!";
        header("Location: tampil.php");
        exit;
    } else {
        $_SESSION['message'] = "Gagal mengubah data: " . $database->koneksi->error;
    }
}
?>

<?php
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Siswa</h1>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>
    <form method="post" action="">

        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" value="<?= htmlspecialchars($siswa['nis']); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="nm_siswa">Nama Siswa</label>
            <input type="text" class="form-control" id="nm_siswa" name="nm_siswa" value="<?= htmlspecialchars($siswa['nm_siswa']); ?>" required>
        </div>

        <div class="form-group">
            <label for="tmp_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= htmlspecialchars($siswa['tmp_lahir']); ?>" required>
        </div>

        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= htmlspecialchars($siswa['tgl_lahir']); ?>" required>
        </div>

        <div class="form-group">
            <label for="jkel">Jenis Kelamin</label>
            <select class="form-control" id="jkel" name="jkel" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?= $siswa['jkel'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?= $siswa['jkel'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required><?= htmlspecialchars($siswa['alamat']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="telp">Telepon</label>
            <input type="text" class="form-control" id="telp" name="telp" value="<?= htmlspecialchars($siswa['telp']); ?>" required>
        </div>

        <div class="form-group">
            <label for="nm_wali">Nama Wali</label>
            <input type="text" class="form-control" id="nm_wali" name="nm_wali" value="<?= htmlspecialchars($siswa['nm_wali']); ?>" required>
        </div>

        <div class="form-group">
            <label for="kd_kelas">Kode Kelas</label>
            <input type="text" class="form-control" id="kd_kelas" name="kd_kelas" value="<?= htmlspecialchars($siswa['kd_kelas']); ?>" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($siswa['username']); ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= htmlspecialchars($siswa['password']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="tampil.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<?php
include "../templates/footer.php";
?>