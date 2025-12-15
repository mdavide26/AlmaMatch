<?php
    require_once("../bootstrap.php");

    $mainDesktopPage = "../template/home.php";
    $desktopSidePage = "explorer.php";

    if (isset($_SESSION["email"])) {
        $templateParams["name"] = "explorer.php";
        $templateParams["title"] = "Explorer";
    } else {
        header("Location: ".PROJECT_DIR."auth/");
        exit();
    }

    require("../template/base.php");
?>