<?php
    require_once("../bootstrap.php");

    if (!isset($_SESSION["email"])) {
        header("Location: " . PROJECT_DIR . "auth/");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $receiver_id = $_POST["receiver_id"];
        $message_content = $_POST["message_content"];
        $sender_id = $_SESSION["user_id"];

        if (empty($receiver_id) || empty($message_content)) {
            header("Location: " . PROJECT_DIR . "messages/");
            exit();
        }

        $dbh->saveMessage($sender_id, $receiver_id, $message_content);

        header("Location: " . PROJECT_DIR . "messages/?direct=" . $receiver_id);
        exit();
    }

    header("Location: " . PROJECT_DIR . "messages/");
    exit();
?>