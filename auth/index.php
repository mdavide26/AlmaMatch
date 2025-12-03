<?php
    require_once("../bootstrap.php");

    if (isset($_SESSION["email"])) {
        header("Location: ".PROJECT_DIR);
        exit();

    } else {
        if (isset($_GET["page"]) && $_GET["page"] == "register") {
            $templateParams["name"] = "register.php";
            $templateParams["title"] = "Register";
        } else {
            $templateParams["name"] = "login.php";
            $templateParams["title"] = "Login";
        }
    }

    require("../template/base.php");
?>