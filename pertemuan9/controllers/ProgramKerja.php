<?php

include_once("../model/ProgramKerja.php");



class ProgramKerjaController 
{
    public $programModel;

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
                include("../views/edit_proker.php");
            } else {
                echo "Program Kerja tidak ditemukan.";
            }
        } else {
            header("Location: list_proker.php");
        }
    }
    public function viewListProker()
    {
        $listProker = $this->programModel->fetchAllProgramKerja();
        include("../views/list_proker.php");
    }


    public function addProker()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomor = $_POST['nomor'];
            $nama = $_POST['nama'];
            $surat_keterangan = $_POST['surat_keterangan'];
            if ($this->programModel->insertProgramKerja($nomor, $nama, $surat_keterangan)) {
                header("Location: ../views/list_proker.php");
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

            if ($this->programModel->updateProgramKerja($nomorProgram, $nama, $suratKeterangan)) {
                header("Location: list_proker.php");
            } else {
                echo "Gagal memperbarui program kerja.";
            }
        }
    }

    public function deleteProker()
    {
        if (isset($_GET['nomor'])) {
            $nomor = $_GET['nomor'];
            if ($this->programModel->deleteProgramKerja($nomor)) {
                header("Location: ../views/list_proker.php");
            } else {
                echo "Gagal menghapus program kerja.";
            }
        }
    }

    
}

if (isset($_GET['action'])) {
    $controller = new ProgramKerjaController();

    switch ($_GET['action']) {
        case 'addProker':
            $controller->addProker();
            break;
        case 'updateProker':
            $controller->updateProker();
            break;
        case 'deleteProker':
            $controller->deleteProker();
            break;
        case 'viewAddProker':
            $controller->viewAddProker();
            break;
        case 'viewEditProker':
            $controller->viewEditProker();
            break;
        default:
            $controller->viewListProker();
    }
}