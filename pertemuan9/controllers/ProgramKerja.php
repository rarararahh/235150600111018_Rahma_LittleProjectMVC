<?php

include_once("model/ProgramKerja.php");

class ProgramKerjaController 
{
    private $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramKerja();
    }

    public function viewAddProker()
    {
        include("views/add_proker.php");
    }

    public function viewEditProker()
    {
        if (isset($_GET['nomor'])) {
            $nomorProgram = $_GET['nomor'];
            $proker = $this->programModel->fetchOneProgramKerja($nomorProgram);

            if ($proker) {
                include("views/edit_proker.php");
            } else {
                echo "Program Kerja tidak ditemukan.";
            }
        } else {
            header("Location: list_proker.php");
        }
    }

    public function viewListProker()
    {
        $listProker = $this->programModel->fetchAll();
        include("views/list_proker.php");
    }


    public function addProker()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $surat_keterangan = $_POST['surat_keterangan'];
            if ($this->programModel->create($nama, $surat_keterangan)) {
                header("Location: list_proker.php");
            } else {
                echo "Gagal menambah program kerja.";
            }
        }
    }

    public function updateProker()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nomor'])) {
            $nomorProgram = $_POST['nomor'];
            $nama = $_POST['nama'];
            $suratKeterangan = $_POST['surat_keterangan'];

            $this->programModel->updateProgramKerja($nomorProgram, $nama, $suratKeterangan);

            header("Location: list_proker.php");
        }
    }

    public function deleteProker()
    {
        if ($this->programModel->delete($nomor)) {
            header("Location: list_proker.php");
        } else {
            echo "Gagal menghapus program kerja.";
        }
    }
}