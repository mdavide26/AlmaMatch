<?php
    require_once("../bootstrap.php");

    if (!isset($_SESSION["email"])) {
        header("Location: ".PROJECT_DIR."auth/");
        exit();
    }

    if (isset($_GET["direct"])) {
        $templateParams["name"] = "messages.php";
        $templateParams["desktop"]["main"] = "../template/direct.php";
        $templateParams["title"] = "Directs";
    } else {
        $templateParams["name"] = "messages.php";
        $templateParams["desktop"]["main"] = "../template/home.php";
        $templateParams["title"] = "Messages";

    }
    
    //$templateParams["name"] = "messages.php";
    //$templateParams["title"] = "Messages";
    
    //$templateParams["desktop"]["main"] = "../template/home.php";
    $templateParams["desktop"]["side"] = $templateParams["name"];
    
    $templateParams["resources"]["css"] = ["home.css", "messages.css"];

    $templateParams["matches"] = $dbh->getMatchesForUser(2);
    $templateParams["chats"] = $dbh->getChatsForUser(2);

    
    require("../template/base.php");
?>