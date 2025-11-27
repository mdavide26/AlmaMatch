<?php
    require_once("db/database.php");
    
    // Start the session
    // TODO: Implement session management

    define("UPLOAD_DIR", "./upload/");
    define("ICONS_MENU", [
        ['href' => '/AlmaMatch/', 'icon' => 'fi-br-house-chimney', 'page' => 'home'],
        ['href' => '/AlmaMatch/explorer', 'icon' => 'fi-br-navigation', 'page' => 'explorer'],
        ['href' => '#', 'icon' => 'fi-br-bolt', 'page' => 'matches'],
        ['href' => '#', 'icon' => 'fi-bs-comment', 'page' => 'messages'],
        ['href' => '#', 'icon' => 'fi-bs-user', 'page' => 'profile']
    ]);
?>