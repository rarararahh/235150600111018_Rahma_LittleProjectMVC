<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Proker</title>
</head>
<body>
    <h2>Tambah Proker</h2> 
    <form method="POST" action="add_proker.php">
        <input type="number" name="nomor" placeholder="Nomor Program" required><br><br>
        <input type="text" name="nama" placeholder="Nama Program" required><br><br>
        <input type="text" name="surat_keterangan" placeholder="Surat Keterangan" required><br><br>
        <button type="submit">Tambah Program Kerja</button><br><br>
        <button><a href="list_proker.php">List Proker</a></button>
    </form>
</body>
</html>