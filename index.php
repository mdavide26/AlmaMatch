<?php
    require_once("bootstrap.php");

    $_SESSION["user_id"] = 2; // TODO: Remove this line when authentication is implemented

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
        // TODO: Implement authentication logic here
        // For now, set the session user to a placeholder value
        $_SESSION["email"] = $_POST["email"];
    }

    if (!isset($_SESSION["email"])) {
        header("Location: ".PROJECT_DIR."auth/");
        exit();
    }

    $templateParams["name"] = "home.php";
    $templateParams["title"] = "Home";

    $templateParams["desktop"]["main"] = $templateParams["name"];
    $templateParams["desktop"]["side"] = "matches.php";

    $templateParams["matches"] = $dbh->getMatchesForUser($_SESSION["user_id"]);
    
    $templateParams["resources"]["css"] = ["home.css", "matches.css"];

    require("template/base.php");
?>