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
    <h2>Daftar Program Kerja</h2>
    <table>
        <tr>
            <th >Nomor</th>
            <th>Nama Program</th>
            <th>Surat Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php if (!empty($listProker)): ?>
            <?php foreach ($listProker as $proker): ?>
                <tr>
                    <td><?= $proker['nomor'] ?></td>
                    <td><?= $proker['nama'] ?></td>
                    <td><?= $proker['surat_keterangan'] ?></td>
                    <td>
                        <a href="edit_proker.php?nomor=<?= $proker['nomor'] ?>">Edit</a> |
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Belum ada data proker.</td>
            </tr>
        <?php endif; ?>
    <a href="add_proker.php">Tambah Program Kerja</a>

</body>
</html>