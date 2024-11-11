<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="../register.php">
        <input type="text" name="nama" placeholder="Nama" required><br><br>
        <input type="text" name="nim" placeholder="NIM" required><br><br>
        <input type="number" name="angkatan" placeholder="Angkatan" required><br><br>
        <input type="text" name="jabatan" placeholder="Jabatan" required><br><br>
        <input type="text" name="foto" placeholder="URL Foto" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
