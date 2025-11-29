<?php
    require_once("db/database.php");
    
    // Start the session
    // TODO: Implement session management

    define("PROJECT_DIR", "/AlmaMatch/");
    define("UPLOAD_DIR", PROJECT_DIR."upload/");
    define("PICTURES_DIR", UPLOAD_DIR."pictures/");
    define("ICONS_MENU", [
        ['href' => PROJECT_DIR, 'icon' => 'fi-br-house-chimney', 'page' => 'home'],
        ['href' => PROJECT_DIR."explorer", 'icon' => 'fi-br-navigation', 'page' => 'explorer'],
        ['href' => '#', 'icon' => 'fi-br-bolt', 'page' => 'matches'],
        ['href' => '#', 'icon' => 'fi-bs-comment', 'page' => 'messages'],
        ['href' => PROJECT_DIR."profile", 'icon' => 'fi-bs-user', 'page' => 'profile']
    ]);
?>