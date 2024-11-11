<?php

require("../config/koneksi_mysql.php");

class ProgramKerja 
{
    private int $nomorProgram;
    private $db;
    private string $nama;
    private string $suratKeterangan;

    public function __construct()
    {
        global $mysqli;
        $this->db = $mysqli;
    }

    public function createModel(
        $nomorProgram = "",
        $nama = "",
        $suratKeterangan = "",
    )
    {
        $this->nomorProgram = $nomorProgram;
        $this->nama = $nama;
        $this->suratKeterangan = $suratKeterangan;
    }

    public function fetchAllProgramKerja()
    {
        global $mysqli;
        $stmt = $this->db->query("SELECT * FROM program_kerja");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function fetchOneProgramKerja(int $nomorProgram)
    {
        $stmt = $this->db->prepare("SELECT * FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomorProgram);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function insertProgramKerja($nomor, $nama, $surat_keterangan) 
    {
        $stmt = $this->db->prepare("INSERT INTO program_kerja (nomor, nama, surat_keterangan) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $nomor, $nama, $surat_keterangan);
        return $stmt->execute();
    }

    public function updateProgramKerja($nomorProgram, $nama, $surat_keterangan)
    {
        $stmt = $this->db->prepare("UPDATE program_kerja SET nama = ?, surat_keterangan = ? WHERE nomor = ?");
        $stmt->bind_param("ssi", $nama, $surat_keterangan, $nomorProgram);
        return $stmt->execute();
    }

    public function deleteProgramKerja($nomor)
    {
        $stmt = $this->db->prepare("DELETE FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomor);
        return $stmt->execute();
    }
}