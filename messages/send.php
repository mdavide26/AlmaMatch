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

        echo "Sender ID: $sender_id, Receiver ID: $receiver_id, Message Content: $message_content";

        // TODO: Salvare il messaggio nel database

        header("Location: " . PROJECT_DIR . "messages/?direct=" . urlencode($receiver_id));
        exit();
    }

    header("Location: " . PROJECT_DIR . "messages/");
    exit();
?>