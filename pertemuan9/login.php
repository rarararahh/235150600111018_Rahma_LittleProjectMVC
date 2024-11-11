<?php
include_once("controllers/PengurusController.php");
header("Location: views/list_proker.php");

$controller = new PengurusController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->loginAccount();
} else {
    $controller->viewLogin();
}

exit();
