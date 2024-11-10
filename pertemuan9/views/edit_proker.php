<?php
if (isset($proker)) {
    ?>
    <h2>Edit Program Kerja</h2>
    <form method="POST" action="edit_proker.php">
        <input type="hidden" name="nomor" value="<?php echo $proker['nomor']; ?>" /><br><br>

        <label for="nama">Nama Program:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($proker['nama']); ?>" required /><br><br>
        
        <label for="surat_keterangan">Surat Keterangan:</label>
        <input type="text" id="surat_keterangan" name="surat_keterangan" value="<?php echo htmlspecialchars($proker['surat_keterangan']); ?>" required /><br><br>
        
        <input type="submit" value="Update Program Kerja" />
    </form>
    <?php
} else {
    echo "Program Kerja tidak ditemukan.";
}
?>
