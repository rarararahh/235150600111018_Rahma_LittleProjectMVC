<?php
include_once("controllers/PengurusController.php");
header("Location: view/list_proker.php");

$controller = new PengurusController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $controller->viewLogin();
} else {
    $controller->loginAccount();
}

exit();
