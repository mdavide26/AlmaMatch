<?php
    require_once("../bootstrap.php");

    $mainDesktopPage = "../template/home.php";
    $desktopSidePage = $_GET["page"] ?? "matches";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
        // TODO: Implement authentication logic here
        // For now, set the session user to a placeholder value
        $_SESSION["email"] = $_POST["email"];
    }

    if (isset($_SESSION["email"])) {
        $templateParams["name"] = "explorer.php";
        $templateParams["title"] = "Explorer";
    } else {
        header("Location: ".PROJECT_DIR."auth/");
        exit();
    }

    require("../template/base.php");
?>