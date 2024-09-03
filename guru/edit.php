<?php
session_start();
include("../db.php");

$database = new db();
$guru = $database->getGuruByNip($_GET['nip'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $success = $database->updateGuru(
        $_POST['nip'],
        $_POST['nm_guru'],
        $_POST['tmp_lahir_guru'], 
        $_POST['tgl_lahir_guru'], 
        $_POST['jkel_guru'], 
        $_POST['alamat'], 
        $_POST['telp'], 
        $_POST['kd_matpel'], 
        $_POST['nm_matpel']
    );

    if ($success) {
        $_SESSION['message'] = "Data guru berhasil diubah!";
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
    <h1 class="h3 mb-4 text-gray-800">Edit Data Guru</h1>
    <form method="post" action="">

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="<?= htmlspecialchars($guru['nip']); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="nm_guru">Nama Guru</label>
            <input type="text" class="form-control" id="nm_guru" name="nm_guru" value="<?= htmlspecialchars($guru['nm_guru']); ?>" required>
        </div>

        <div class="form-group">
            <label for="tmp_lahir_guru">Tempat Lahir</label>
            <input type="text" class="form-control" id="tmp_lahir_guru" name="tmp_lahir_guru" value="<?= htmlspecialchars($guru['tmp_lahir_guru']); ?>" required>
        </div>

        <div class="form-group">
            <label for="tgl_lahir_guru">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir_guru" name="tgl_lahir_guru" value="<?= htmlspecialchars($guru['tgl_lahir_guru']); ?>" required>
        </div>

        <div class="form-group">
            <label for="jkel_guru">Jenis Kelamin</label>
            <select class="form-control" id="jkel_guru" name="jkel_guru" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?= $guru['jkel_guru'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?= $guru['jkel_guru'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required><?= htmlspecialchars($guru['alamat']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="telp">Telepon</label>
            <input type="text" class="form-control" id="telp" name="telp" value="<?= htmlspecialchars($guru['telp']); ?>" required>
        </div>

        <div class="form-group">
            <label for="kd_matpel">Kode Mata Pelajaran</label>
            <input type="text" class="form-control" id="kd_matpel" name="kd_matpel" value="<?= htmlspecialchars($guru['kd_matpel']); ?>" required>
        </div>

        <div class="form-group">
            <label for="nm_matpel">Nama Mata Pelajaran</label>
            <input type="text" class="form-control" id="nm_matpel" name="nm_matpel" value="<?= htmlspecialchars($guru['nm_matpel']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="tampil.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<?php
include "../templates/footer.php";
?>
