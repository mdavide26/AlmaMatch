<?php
    require_once("../bootstrap.php");

    if (isset($_SESSION["email"])) {
        $templateParams["name"] = "profile.php";
        $templateParams["title"] = "Profile";
        $templateParams["desktop"]["main"] = "../template/home.php";
        $templateParams["desktop"]["side"] = $templateParams["name"];
    } else {
        header("Location: ".PROJECT_DIR."auth/");
        exit();
    }

    require("../template/base.php");
?>