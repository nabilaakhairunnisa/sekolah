<?php
session_start();
include("../db.php");

$database = new db();
$nilai = $database->getNilaiByKdNilai($_GET['kd_nilai'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database->updateNilai(
        $_POST['kd_nilai'],
        $_POST['nis'],
        $_POST['nm_siswa'],
        $_POST['kd_matpel'],
        $_POST['nm_matpel'],
        $_POST['uts_sem_ganjil'],
        $_POST['uas_sem_ganjil'],
        $_POST['uts_sem_genap'],
        $_POST['uas_sem_genap']
    );
    $_SESSION['message'] = "Data nilai berhasil diubah!";
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
    <h1 class="h3 mb-4 text-gray-800">Edit Data Nilai</h1>
    <form method="post" action="">

        <div class="form-group">
            <label for="">Kode Nilai</label>
            <input type="text" class="form-control" id="kd_nilai" name="kd_nilai" value="<?= htmlspecialchars($nilai['kd_nilai']); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" value="<?= htmlspecialchars($nilai['nis']); ?>">
        </div>

        <div class="form-group">
            <label for="">Nama Siswa</label>
            <input type="text" class="form-control" id="nm_siswa" name="nm_siswa" value="<?= htmlspecialchars($nilai['nm_siswa']); ?>">
        </div>

        <div class="form-group">
            <label for="">Kode Mata Pelajaran</label>
            <input type="text" class="form-control" id="kd_matpel" name="kd_matpel" value="<?= htmlspecialchars($nilai['kd_matpel']); ?>">
        </div>

        <div class="form-group">
            <label for="">Nama Mata Pelajaran</label>
            <input type="text" class="form-control" id="nm_matpel" name="nm_matpel" value="<?= htmlspecialchars($nilai['nm_matpel']); ?>">
        </div>

        <div class="form-group">
            <label for="">UTS Semester Ganjil</label>
            <input type="number" step="0.01" class="form-control" id="uts_sem_ganjil" name="uts_sem_ganjil" value="<?= htmlspecialchars($nilai['uts_sem_ganjil']); ?>">
        </div>

        <div class="form-group">
            <label for="">UAS Semester Ganjil</label>
            <input type="number" step="0.01" class="form-control" id="uas_sem_ganjil" name="uas_sem_ganjil" value="<?= htmlspecialchars($nilai['uas_sem_ganjil']); ?>">
        </div>

        <div class="form-group">
            <label for="">UTS Semester Genap</label>
            <input type="number" step="0.01" class="form-control" id="uts_sem_genap" name="uts_sem_genap" value="<?= htmlspecialchars($nilai['uts_sem_genap']); ?>">
        </div>

        <div class="form-group">
            <label for="">UAS Semester Genap</label>
            <input type="number" step="0.01" class="form-control" id="uas_sem_genap" name="uas_sem_genap" value="<?= htmlspecialchars($nilai['uas_sem_genap']); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="tampil.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>
</div>

<?php
include "../templates/footer.php";
?>
