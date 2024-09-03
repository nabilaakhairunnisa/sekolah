<?php
session_start();
include "../templates/header.php";
include "../templates/sidebar.php";
include "../templates/topbar.php";
?>

<div class="container-fluid">

    <?php
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-success' role='alert'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
    }
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
        </div>

        <div class="card-body">
            <a href="tambah.php" class="btn btn-primary mb-3">Tambah Siswa</a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">NIS</th> 
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Telepon</th> 
                            <th scope="col">Nama Wali</th>
                            <th scope="col">Kode Kelas</th>
                            <th scope="col">Username</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../db.php");
                        $database = new db();
                        $Siswa = $database->getSiswa();
                        $count = 1;
                        while ($data = $Siswa->fetch_assoc()) {
                            echo "<tr class='text-center'>";
                            echo "<th scope='row'>" . $count . ".</th>";
                            echo "<td>" . $data['nis'] . "</td>"; 
                            echo "<td>" . $data['nm_siswa'] . "</td>";
                            echo "<td>" . $data['tmp_lahir'] . "</td>";
                            echo "<td>" . $data['tgl_lahir'] . "</td>"; 
                            echo "<td>" . $data['jkel'] . "</td>";
                            echo "<td>" . $data['alamat'] . "</td>";
                            echo "<td>" . $data['telp'] . "</td>"; 
                            echo "<td>" . $data['nm_wali'] . "</td>";
                            echo "<td>" . $data['kd_kelas'] . "</td>";
                            echo "<td>" . $data['username'] . "</td>";
                            echo "<td>
                                    <a href='edit.php?nis=" . $data['nis'] . "' class='btn btn-warning'>Edit</a>
                                    <a href='hapus.php?nis=" . $data['nis'] . "' class='btn btn-danger' onclick='return confirm(\"Hapus data?\")'>Hapus</a>
                                </td>";
                            echo "</tr>";
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    include "../templates/footer.php";
    ?>