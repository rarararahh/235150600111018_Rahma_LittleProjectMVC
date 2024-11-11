<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Proker</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php
include_once '../controllers/ProgramKerja.php';
$controller = new ProgramKerjaController();
$programList = $controller->programModel->fetchAllProgramKerja();
?>
    <h2>Daftar Program Kerja</h2>
    <table>
        <tr>
            <th >Nomor</th>
            <th>Nama Program</th>
            <th>Surat Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php if (!empty($programList)): ?>
            <?php foreach ($programList as $proker): ?>
                <tr>
                    <td><?= $proker['nomor'] ?></td>
                    <td><?= $proker['nama'] ?></td>
                    <td><?= $proker['surat_keterangan'] ?></td>
                    <td>
                    <a href="edit_proker.php?nomor=<?= $proker['nomor'] ?>">Edit</a>                    |
                    <a href="../controllers/ProgramKerja.php?action=deleteProker&nomor=<?= $proker['nomor'] ?>" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Belum ada data proker.</td>
            </tr>
        <?php endif; ?>
    <a href="add_proker.php">Tambah Program Kerja</a>
    <a href="../controllers/PengurusController.php?action=logout" onclick="return confirm('Anda yakin ingin logout?')">Logout</a>

</body>
</html>