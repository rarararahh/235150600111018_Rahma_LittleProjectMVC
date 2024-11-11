<?php
// session_start();
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     header("Location: login_view.php");
//     exit();
// }

include_once '../controllers/ProgramKerja.php';
$controller = new ProgramKerjaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateProker();
    header("Location: list_proker.php");
    exit();
}

// Fetch the program data if 'nomor' is provided in GET request
if (isset($_GET['nomor'])) {
    $nomorProgram = (int)$_GET['nomor'];
    $program = $controller->programModel->fetchOneProgramKerja($nomorProgram);
    if (!$program) {
        echo "Program kerja tidak ditemukan!";
        exit();
    }
} else {
    header("Location: list_proker.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Program Kerja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0 16px;
            box-sizing: border-box;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Program Kerja</h2>
        <form action="edit_proker.php" method="POST">
            <label for="nomor">Nomor Program:</label>
            <input type="number" name="nomor" id="nomor" value="<?= htmlspecialchars($program['nomor']) ?>" readonly>

            <label for="nama">Nama Program:</label>
            <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($program['nama']) ?>" required>

            <label for="surat_keterangan">Surat Keterangan:</label>
            <input type="text" name="surat_keterangan" id="surat_keterangan" value="<?= htmlspecialchars($program['surat_keterangan']) ?>" required>

            <button type="submit">Update Program Kerja</button>
        </form>
    </div>
</body>

</html>
