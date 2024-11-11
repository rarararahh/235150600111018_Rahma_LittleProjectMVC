<?php
include_once("controllers/PengurusController.php");
header("Location: views/login_view.php");

$controller = new PengurusController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->registerAccount();
} else {
    $controller->viewRegister();
}

exit();
