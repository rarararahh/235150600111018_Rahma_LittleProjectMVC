<?php

require("config/koneksi_mysql.php");

class ProgramKerja 
{
    private int $nomorProgram;
    private string $nama;
    private string $suratKeterangan;

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
        $stmt = $this->db->query("SELECT * FROM program_kerja");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function fetchOneProgramKerja(int $nomorProgram)
    {
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM program_kerja WHERE nomor = $nomorProgram");
        return $result->fetch_assoc();
    }

    public function insertProgramKerja() 
    {
        global $mysqli;
        $result = $mysqli->query("INSERT INTO program_kerja (nama, surat_keterangan) VALUES ('$this->nama', '$this->suratKeterangan')");
        return $result;
    }

    public function updateProgramKerja()
    {
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE program_kerja SET nama = ?, surat_keterangan = ? WHERE nomor = ?");
        $stmt->bind_param("ssi", $nama, $suratKeterangan, $nomorProgram);
        return $stmt->execute();
    }

    public function deleteProgramKerja()
    {
        global $mysqli;
        $stmt = $mysqli->prepare("DELETE FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $this->nomorProgram);
        return $stmt->execute();
    }
}