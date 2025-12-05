<?php
    require_once("../bootstrap.php");

    session_destroy();
    header("Location: ".PROJECT_DIR);
    exit();

    require("../template/base.php");
?>