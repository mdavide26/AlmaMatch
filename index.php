<?php
    require_once("bootstrap.php");

    $_SESSION["user"] = $_SESSION["user"] ?? null;

    if (!$_SESSION["user"] ?? false) {
        $templateParams["name"] = "login.php";
        $templateParams["title"] = "Login";
    } else {
        $templateParams["name"] = "home.php";
        $templateParams["title"] = "Home";
    }

    require("template/base.php");
?>