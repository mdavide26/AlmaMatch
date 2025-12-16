<?php
    require_once("../bootstrap.php");

    $category = $_GET["category"] ?? 'explorer';
    
    if (!isset($_SESSION["email"])) {
        header("Location: ".PROJECT_DIR."auth/");
        exit();
    }

    if (isset($category) && $category !== 'explorer') {
        $templateParams["name"] = "explorer-category.php";
        $templateParams["title"] = ucfirst($category);
    } else {
        $templateParams["name"] = "explorer.php";
        $templateParams["title"] = "Explorer";
    }

    $templateParams["desktop"]["main"] = "../template/home.php";
    $templateParams["desktop"]["side"] = $templateParams["name"];

    require("../template/base.php");
?>