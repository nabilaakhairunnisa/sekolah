<?php

class db
{
    public $koneksi;

    function __construct()
    {
        $this->koneksi = new mysqli("localhost", "root", "", "nabila_khairunnisa");

        if ($this->koneksi->connect_error) {
            die("Koneksi gagal: " . $this->koneksi->connect_error);
        }
    }

    //ADMIN

    public function getAdmin($username, $password) {
        $stmt = $this->koneksi->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        return $stmt->get_result();
    }

    //SISWA

    public function getSiswa() {
        return $this->koneksi->query('SELECT * FROM siswa');
    }

    public function addSiswa($nis, $nm_siswa, $tmp_lahir, $tgl_lahir, $jkel, $alamat, $telp, $nm_wali, $kd_kelas, $username, $password) {
        return $this->koneksi->query("INSERT INTO siswa (nis, nm_siswa, tmp_lahir, tgl_lahir, jkel, alamat, telp, nm_wali, kd_kelas, username, password) 
        VALUES ('$nis', '$nm_siswa', '$tmp_lahir', '$tgl_lahir', '$jkel', '$alamat', '$telp', '$nm_wali', '$kd_kelas', '$username', '$password')");
    }

    public function getSiswaByNis($nis) {
        $nis = $this->koneksi->real_escape_string($nis);
        $result = $this->koneksi->query("SELECT * FROM siswa WHERE nis = '$nis'");
        return $result->fetch_assoc();
    }

    public function updateSiswa($nis, $nm_siswa, $tmp_lahir, $tgl_lahir, $jkel, $alamat, $telp, $nm_wali, $kd_kelas, $username, $password) {
        $stmt = $this->koneksi->prepare("UPDATE siswa SET 
            nm_siswa = ?, 
            tmp_lahir = ?, 
            tgl_lahir = ?, 
            jkel = ?, 
            alamat = ?, 
            telp = ?, 
            nm_wali = ?, 
            kd_kelas = ?, 
            username = ?, 
            password = ? 
            WHERE nis = ?");
        
        $stmt->bind_param("sssssssssss", 
            $nm_siswa, 
            $tmp_lahir, 
            $tgl_lahir, 
            $jkel, 
            $alamat, 
            $telp, 
            $nm_wali, 
            $kd_kelas, 
            $username, 
            $password, 
            $nis
        );
    
        $result = $stmt->execute();
    
        if (!$result) {
            error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
    
        $stmt->close();
    
        return $result;
    }    
    
    public function deleteSiswa($nis)
    {
        return $this->koneksi->query("DELETE FROM siswa WHERE nis = '$nis'");
    }

    //GURU
    public function getGuru() {
        return $this->koneksi->query('SELECT * FROM guru');
    }

    public function addGuru($nip, $nm_guru, $tmp_lahir_guru, $tgl_lahir_guru, $jkel_guru, $alamat, $telp, $kd_matpel, $nm_matpel) {
        return $this->koneksi->query("INSERT INTO guru (nip, nm_guru, tmp_lahir_guru, tgl_lahir_guru, jkel_guru, alamat, telp, kd_matpel, nm_matpel) 
        VALUES ('$nip', '$nm_guru', '$tmp_lahir_guru', '$tgl_lahir_guru', '$jkel_guru', '$alamat', '$telp', '$kd_matpel', '$nm_matpel')");
    }

    public function getGuruByNip($nip) {
        $nis = $this->koneksi->real_escape_string($nip);
        $result = $this->koneksi->query("SELECT * FROM guru WHERE nip = '$nip'");
        return $result->fetch_assoc();
    }

    public function updateGuru($nip, $nm_guru, $tmp_lahir_guru, $tgl_lahir_guru, $jkel_guru, $alamat, $telp, $kd_matpel, $nm_matpel) {
        $stmt = $this->koneksi->prepare("UPDATE guru SET nm_guru=?, tmp_lahir_guru=?, tgl_lahir_guru=?, jkel_guru=?, alamat=?, telp=?, kd_matpel=?, nm_matpel=? WHERE nip=?");
        $stmt->bind_param("sssssssss", $nm_guru, $tmp_lahir_guru, $tgl_lahir_guru, $jkel_guru, $alamat, $telp, $kd_matpel, $nm_matpel, $nip);
        $result = $stmt->execute();
        if ($result === false) {
            die('Execute failed: ' . htmlspecialchars($stmt->error));
        }
        $stmt->close();
        return $result;
    }
    
    public function deleteGuru($nip)
    {
        return $this->koneksi->query("DELETE FROM guru WHERE nip = '$nip'");
    }

    //NILAI

    public function getNilaiByNIS($nis) {
        return $this->koneksi->query("SELECT * FROM nilai WHERE nis = '$nis'");
    }

    public function getNilai() {
        return $this->koneksi->query("SELECT * FROM nilai");
    }

    public function addNilai($kd_nilai, $nis, $nm_siswa, $kd_matpel, $nm_matpel, $uts_sem_ganjil, $uas_sem_ganjil, $uts_sem_genap, $uas_sem_genap) {
        return $this->koneksi->query("INSERT INTO nilai (kd_nilai, nis, nm_siswa, kd_matpel, nm_matpel, uts_sem_ganjil, uas_sem_ganjil, uts_sem_genap, uas_sem_genap) 
        VALUES ('$kd_nilai', '$nis', '$nm_siswa','$kd_matpel', '$nm_matpel', '$uts_sem_ganjil', '$uas_sem_ganjil', '$uts_sem_genap', '$uas_sem_genap')");
    }    

    public function getNilaiByKdNilai($kd_nilai) {
        $stmt = $this->koneksi->prepare("SELECT * FROM nilai WHERE kd_nilai = ?");
        $stmt->bind_param("s", $kd_nilai);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateNilai($kd_nilai, $nis, $nm_siswa, $kd_matpel, $nm_matpel, $uts_sem_ganjil, $uas_sem_ganjil, $uts_sem_genap, $uas_sem_genap) {
        $stmt = $this->koneksi->prepare("UPDATE nilai SET nis = ?, nm_siswa = ?, kd_matpel = ?, 
                nm_matpel = ?, 
                uts_sem_ganjil = ?, 
                uas_sem_ganjil = ?, 
                uts_sem_genap = ?, 
                uas_sem_genap = ? 
            WHERE kd_nilai = ?");
        $stmt->bind_param("ssssddddd", $nis, $nm_siswa, $kd_matpel, $nm_matpel, $uts_sem_ganjil, $uas_sem_ganjil, $uts_sem_genap, $uas_sem_genap, $kd_nilai);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteNilai($kd_nilai)
    {
        return $this->koneksi->query("DELETE FROM nilai WHERE kd_nilai = '$kd_nilai'");
    }
    

}

?>