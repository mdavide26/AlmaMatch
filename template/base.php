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
    <?php if (isset($authPage) && $authPage): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo PROJECT_DIR."css/auth.css"; ?>" />
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo PROJECT_DIR."css/".basename($templateParams["name"], ".php").".css"; ?>">
    <?php endif; ?>
    <title>AlmaMatch | <?php echo $templateParams["title"]; ?></title>
    <script src="<?php echo PROJECT_DIR."js/base.js"; ?>"></script>
</head>
<body class="container-fluid p-0 overflow-x-hidden">
    <!-- Content visible for Desktop -->
    <div class="d-none d-md-block">
        
    </div>

    <!-- Content visible for Mobile -->
    <div class="d-block d-md-none d-flex flex-column vh-100">
        <header class="mobile-header d-flex align-items-center fixed-top">
            <img src="<?php echo UPLOAD_DIR."icons/almamatch.png" ?>" class="h-100" alt="That image contains the logo of AlmaMatch app, 4 people teaming up for a common goal.">
            <h1 class="Alma">Alma</h1><h1 class="Match">Match</h1>
        </header>
        <main class="flex-grow-1 d-flex flex-column overflow-y-auto">
            <?php
                require($templateParams["name"]);
            ?>
        </main>
        <?php if ($templateParams["name"] != "login.php" && $templateParams["name"] != "register.php"): ?>
        <footer class="icons-menu d-flex justify-content-center align-items-center py-3 gap-5 fixed-bottom">
            <?php 
                foreach(ICONS_MENU as $icon):
                    if ($icon['page'] === basename($templateParams["name"], ".php")): ?>
                        <a href="<?php echo $icon['href']; ?>" class="text-decoration-none" style="color: #DF693E;"><i class="<?php echo $icon['icon']; ?>"></i></a>
                    <?php else: ?>
                        <a href="<?php echo $icon['href']; ?>" class="text-decoration-none text-secondary"><i class="<?php echo $icon['icon']; ?>"></i></a>
                    <?php endif;
                endforeach;
            ?>
        </footer>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <?php if (isset($authPage) && $authPage): ?>
        <script src="<?php echo PROJECT_DIR."js/auth.js"; ?>"></script>
    <?php else: ?>
        <script src="<?php echo PROJECT_DIR."js/".basename($templateParams["name"], ".php").".js"; ?>"></script>
    <?php endif; ?>
</body>
</html>