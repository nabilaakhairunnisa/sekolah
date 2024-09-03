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
            <h6 class="m-0 font-weight-bold text-primary">Nilai Siswa</h6>
        </div>

        <div class="card-body">
            <a href="tambah.php" class="btn btn-primary mb-3">Tambah Nilai Siswa</a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Kode Nilai</th>
                            <th scope="col">NIS</th> 
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kode Mata Pelajaran</th>
                            <th scope="col">Nama Mata Pelajaran</th>
                            <th scope="col">UTS Ganjil</th>
                            <th scope="col">UAS Ganjil</th>
                            <th scope="col">UTS Genap</th>
                            <th scope="col">UAS Genap</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../db.php");
                        $database = new db();
                        
                        // Ambil data siswa
                        $siswa = $database->getNilai();
                        $count = 1;
                        
                        while ($data = $siswa->fetch_assoc()) {
                            echo "<tr class='text-center'>";
                            echo "<th scope='row'>" . $count . ".</th>";
                            echo "<td>" . $data['kd_nilai'] . "</td>";
                            echo "<td>" . $data['nis'] . "</td>"; 
                            echo "<td>" . $data['nm_siswa'] . "</td>";
                            echo "<td>" . $data['kd_matpel'] . "</td>";
                            echo "<td>" . $data['nm_matpel'] . "</td>";
                            echo "<td>" . $data['uts_sem_ganjil'] . "</td>";
                            echo "<td>" . $data['uas_sem_ganjil'] . "</td>";
                            echo "<td>" . $data['uts_sem_genap'] . "</td>";
                            echo "<td>" . $data['uas_sem_genap'] . "</td>";

                            echo "<td>
                                    <a href='edit.php?kd_nilai=" . $data['kd_nilai'] . "' class='btn btn-warning'>Edit</a>
                                    <a href='hapus.php?kd_nilai=" . $data['kd_nilai'] . "' class='btn btn-danger' onclick='return confirm(\"Hapus data?\")'>Hapus</a>
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
