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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
        </div>

        <div class="card-body">
            <a href="tambah.php" class="btn btn-primary mb-3">Tambah Guru</a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Kode Mata Pelajaran</th>
                            <th scope="col">Nama Mata Pelajaran</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../db.php");
                        $database = new db();
                        $Guru = $database->getGuru(); 
                        $count = 1;
                        while ($data = $Guru->fetch_assoc()) {
                            echo "<tr class='text-center'>";
                            echo "<th scope='row'>" . $count . ".</th>";
                            echo "<td>" . $data['nip'] . "</td>";
                            echo "<td>" . $data['nm_guru'] . "</td>";
                            echo "<td>" . $data['tmp_lahir_guru'] . "</td>";
                            echo "<td>" . $data['tgl_lahir_guru'] . "</td>";
                            echo "<td>" . $data['jkel_guru'] . "</td>";
                            echo "<td>" . $data['alamat'] . "</td>";
                            echo "<td>" . $data['telp'] . "</td>";
                            echo "<td>" . $data['kd_matpel'] . "</td>";
                            echo "<td>" . $data['nm_matpel'] . "</td>";

                            echo "<td>
                                    <a href='edit.php?nip=" . $data['nip'] . "' class='btn btn-warning'>Edit</a>
                                    <a href='hapus.php?nip=" . $data['nip'] . "' class='btn btn-danger' onclick='return confirm(\"Hapus data?\")'>Hapus</a>
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
