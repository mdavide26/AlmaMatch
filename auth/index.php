<?php
    require_once("../bootstrap.php");

    if (isset($_SESSION["email"])) {
        header("Location: ".PROJECT_DIR);
        exit();
    }

    $page = $_GET["page"] ?? 'login';

    switch ($page) {
        case 'forgot-password':
            $templateParams["name"] = "forgot-password.php";
            $templateParams["title"] = "Forgot Password";
            break;
        case 'register':
            $templateParams["name"] = "register.php";
            $templateParams["title"] = "Register";
            break;
        case 'login':
            $templateParams["name"] = "login.php";
            $templateParams["title"] = "Login";
            break;
        default:
            header("Location: ".PROJECT_DIR."auth/");
            exit();
    }

    require("../template/base.php");
?>