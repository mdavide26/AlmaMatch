<?php
    require_once("../bootstrap.php");

    $templateParams["name"] = "profile.php";
    $templateParams["title"] = "Profile";

    $templateParams["desktop"]["main"] = "../template/home.php";

    require("../template/base.php");
?>