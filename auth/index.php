<?php
    require_once("../bootstrap.php");

    if (isset($_SESSION["email"])) {
        header("Location: ".PROJECT_DIR);
        exit();
    }

    $page = $_GET["page"] ?? 'login';
    $authPage = true;

    switch ($page) {
        case 'forgot-password':
            $templateParams["name"] = "../auth/forgot-password.php";
            $templateParams["title"] = "Forgot Password";
            break;
        case 'register':
            $templateParams["name"] = "../auth/register.php";
            $templateParams["title"] = "Register";
            break;
        case 'login':
            $templateParams["name"] = "../auth/login.php";
            $templateParams["title"] = "Login";
            break;
        default:
            header("Location: ".PROJECT_DIR."auth/");
            exit();
    }

    $templateParams["resources"]["css"] = ["auth.css"];
    
    require("../template/base.php");
?>