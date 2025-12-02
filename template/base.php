<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="stylesheet" href="<?php echo PROJECT_DIR."css/base.css"; ?>">
    <link rel="stylesheet" href="<?php echo PROJECT_DIR."css/".basename($templateParams["name"], ".php").".css"; ?>">
    <title>AlmaMatch | <?php echo $templateParams["title"]; ?></title>
    <script src="<?php echo PROJECT_DIR."js/base.js"; ?>"></script>
</head>
<body class="container-fluid p-0 overflow-x-hidden">
    <!-- Content visible for Desktop -->
    <div class="d-none d-md-block">
        <h2>Desktop Content</h2>
    </div>

    <!-- Content visible for Mobile -->
    <div class="d-block d-md-none d-flex flex-column vh-100">
        <header class="mobile-header d-flex align-items-center fixed-top">
            <img src="<?php echo UPLOAD_DIR."icons/almamatch.png" ?>" class="h-100" alt="AlmaMatch Icon">
            <h1 class="Alma">Alma</h1><h1 class="Match">Match</h1>
        </header>
        <main class="flex-grow-1 d-flex flex-column overflow-y-auto">
            <?php
                require($templateParams["name"]);
            ?>
        </main>
        <footer class="icons-menu d-flex justify-content-center align-items-center py-3 gap-5 fixed-bottom">
            <?php 
                foreach(ICONS_MENU as $icon) {
                    if ($icon['page'] === basename($templateParams["name"], ".php")) {
                        echo '<a href="'.$icon['href'].'" class="text-decoration-none" style="color: #DF693E;"><i class="'.$icon['icon'].'"></i></a>';
                    } else {
                        echo '<a href="'.$icon['href'].'" class="text-decoration-none text-secondary"><i class="'.$icon['icon'].'"></i></a>';
                    }
                }
            ?>
        </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>