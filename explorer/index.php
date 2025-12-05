<?php
    require_once("../bootstrap.php");

    $category = $_GET["category"] ?? 'explorer';
    
    if (isset($category) && $category !== 'explorer') {
        $templateParams["name"] = "explorer-category.php";
        $templateParams["title"] = ucfirst($category);
    } else {
        $templateParams["name"] = "explorer.php";
        $templateParams["title"] = "Explorer";
    }

    require("../template/base.php");
?>