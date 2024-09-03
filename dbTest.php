<?php
use PHPUnit\Framework\TestCase;

class DeleteGuruTest extends TestCase {
    private $db;
    private $dbMock;

    protected function setUp(): void {
        $this->dbMock = $this->createMock(db::class);
        $this->db = new class($this->dbMock) extends db {
            private $dbMock;

            public function __construct($dbMock) {
                $this->dbMock = $dbMock;
            }

            public function deleteGuru($nip) {
                return $this->dbMock->deleteGuru($nip);
            }
        };
    }

    public function testDeleteGuruSuccess() {
        // Setup mock behavior
        $this->dbMock->method('deleteGuru')->willReturn(true);

        $_GET['nip'] = '12345';
        $_SESSION['message'] = '';

        include 'guru/hapus.php';

        $this->assertEquals('Data berhasil dihapus!', $_SESSION['message']);
    }

    public function testDeleteGuruFailure() {
        // Setup mock behavior
        $this->dbMock->method('deleteGuru')->willReturn(false);
        $this->dbMock->koneksi = $this->createMock(mysqli::class);
        $this->dbMock->koneksi->method('error')->willReturn('Error message');

        $_GET['nip'] = '12345';
        $_SESSION['message'] = '';

        include 'guru/hapus';

        $this->assertEquals('Gagal menghapus data: Error message', $_SESSION['message']);
    }
}
