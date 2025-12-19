<?php
    require_once("bootstrap.php");

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

    $templateParams["matches"] = $dbh->getMatchesForUser(2);
    
    $templateParams["resources"]["css"] = ["home.css", "matches.css"];

    require("template/base.php");
?>