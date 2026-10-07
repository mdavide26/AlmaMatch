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
        $templateParams["direct-info"] = $dbh->getUserInfoById($_GET["direct"]);
        $templateParams["direct-messages"] = $dbh->getDirectMessages($_SESSION["user_id"], $_GET["direct"]);
        echo $_SESSION["user_id"];
        echo $_GET["direct"];
    } else {
        $templateParams["name"] = "messages.php";
        $templateParams["desktop"]["main"] = "../template/home.php";
        $templateParams["title"] = "Messages";

    }
    
    $templateParams["desktop"]["side"] = $templateParams["name"];
    
    $templateParams["resources"]["css"] = ["home.css", "messages.css"];

    $templateParams["matches"] = $dbh->getMatchesForUser($_SESSION["user_id"]);
    $templateParams["chats"] = $dbh->getChatsForUser($_SESSION["user_id"]);
    
    require("../template/base.php");
?>