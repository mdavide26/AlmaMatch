<?php
    require_once("../bootstrap.php");

    if (isset($_SESSION["email"])) {
        $templateParams["name"] = "explorer.php";
        $templateParams["title"] = "Explorer";
        $templateParams["desktop"]["main"] = "../template/home.php";
        $templateParams["desktop"]["side"] = "explorer.php";
    } else {
        header("Location: ".PROJECT_DIR."auth/");
        exit();
    }

    require("../template/base.php");
?>