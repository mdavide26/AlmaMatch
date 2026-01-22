<?php
    require_once("../bootstrap.php");
    
    if (!isset($_SESSION["email"])) {
        header("Location: ".PROJECT_DIR."auth/");
        exit();
    }

    $templateParams["name"] = "likes.php";
    $templateParams["title"] = "Likes";

    $templateParams["desktop"]["main"] = "../template/home.php";
    $templateParams["desktop"]["side"] = $templateParams["name"];

    $templateParams["resources"]["css"] = ["home.css", "likes.css"];

    require("../template/base.php");
?>