<?php

include_once("model/PengurusBEM.php");

class PengurusController 
{
    private $pengurusModel;

    public function __construct()
    {
        $this->pengurusModel = new PengurusBEM();
    }

    public function viewRegister()
    {
        include("views/register_view.php");
    }

    public function registerAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $angkatan = $_POST['angkatan'];
            $jabatan = $_POST['jabatan'];
            $foto = $_POST['foto'];  
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            if ($this->pengurusModel->register($nama, $nim, $angkatan, $jabatan, $foto, $password)) {
                header("Location: login.php"); 
            } else {
                echo "Failed to register.";
            }
        }
    }

    public function viewLogin()
    {
        include("views/login_view.php");
    }

    public function loginAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = $_POST['nim'];
            $password = $_POST['password'];
    
            $pengurus = $this->pengurusModel->login($nim, $password);
            if ($pengurus) {
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['pengurus_id'] = $pengurus['nim'];
                header("Location: views/list_proker.php");
                exit();
            } else {
                echo "NIM atau Password salah";
            }
        }
    }
    
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: views/login_view.php");
        exit();
    }
}    