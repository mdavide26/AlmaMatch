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
    <?php foreach($templateParams["resources"]["css"] as $cssFile): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo PROJECT_DIR."css/".$cssFile; ?>">
    <?php endforeach; ?>
    <title>AlmaMatch | <?php echo $templateParams["title"]; ?></title>
    <script src="<?php echo PROJECT_DIR."js/base.js"; ?>"></script>
</head>
<body class="container-fluid p-0 overflow-x-hidden">
    <!-- Content visible for Desktop -->
    <div class="d-none d-md-flex row p-0 vh-100" role="desktop-content">
        <?php if (!isset($authPage) || !$authPage): ?>
            <aside class="col-md-4 col-lg-3 col-xl-3 p-0 d-flex flex-column align-items-center justify-content-start h-100 overflow-hidden">
                <nav class="desktop-nav w-100 py-3 d-flex flex-row align-items-center ps-4 pe-2 justify-content-between" role="navigation">
                    <a href="<?php echo PROJECT_DIR."profile/"; ?>" class="profile-btn h-75 d-flex align-items-center gap-2 text-decoration-none p-1 pe-3" role="profile-link" aria-label="Go to your profile page to view or edit your information.">
                        <img src="<?php echo PICTURES_DIR."Primo/1.png"; ?>" class="h-100" alt="That image contains your profile picture.">
                        <span>You</span>
                    </a>
                    <div class="desktop-icons d-flex flex-row justify-content-end align-items-center gap-1 ms-1" role="desktop-icons-menu">
                        <?php 
                            foreach(DESKTOP_ICONS_MENU as $icon):
                                if ($icon['page'] === basename($templateParams["name"], ".php")): ?>
                                    <a href="<?php echo $icon['href']; ?>" class="text-decoration-none" role="<?php echo $icon['page']."-icon"; ?>" aria-label="<?php echo "Go to the ".$icon['page']." page."; ?>" style="color: #DF693E;"><i class="<?php echo $icon['icon']; ?> fs-md-2 fs-lg-4"></i></a>
                                <?php else: ?>
                                    <a href="<?php echo $icon['href']; ?>" class="text-decoration-none text-secondary" role="<?php echo $icon['page']."-icon"; ?>" aria-label="<?php echo "Go to the ".$icon['page']." page."; ?>"><i class="<?php echo $icon['icon']; ?> fs-md-2 fs-lg-4"></i></a>
                                <?php endif;
                            endforeach;
                        ?>
                    </div>
                </nav>
                <div class="desktop-sidebar-content w-100 flex-grow-1 d-flex flex-column align-items-center justify-content-start overflow-hidden">
                    <?php if ($templateParams["name"] == "home.php" 
                            || $templateParams["name"] == "messages.php" 
                            || $templateParams["name"] == "matches.php"): ?>
                        <header class="d-flex flex-row w-100 align-items-start py-3 justify-content-around" role="sidebar-links">
                            <a class="text-decoration-none <?php echo (basename($templateParams["desktop"]["side"], ".php") === "matches") ? "selected" : ""; ?>" href="<?php echo PROJECT_DIR; ?>">Matches</a>
                            <span>|</span>
                            <a class="text-decoration-none <?php echo (basename($templateParams["desktop"]["side"], ".php") === "messages") ? "selected" : ""; ?>" href="<?php echo PROJECT_DIR."messages/"; ?>">Messages</a>
                        </header>
                    <?php endif; ?>
                    <div class="flex-grow-1 w-100 overflow-y-auto overflow-x-hidden" role="sidebar-main-content">
                        <?php
                            require($templateParams["desktop"]["side"]);
                        ?>
                    </div>
                </div>
            </aside>
        <div class="col-md-1 col-lg-2 col-xl-3"></div>
        <main class="col-md-6 col-lg-5 col-xl-3">
            <?php
                require($templateParams["desktop"]["main"]);
            ?>
        </main>
        <div class="col-md-1 col-lg-2 col-xl-3"></div>
        <?php else: ?>
            <div class="col-3"></div>
            <main class="col-6 px-5">
                <?php
                    require($templateParams["name"]);
                ?>
            </main>
            <div class="col-3"></div>
        <?php endif; ?>
    </div>

    <!-- Content visible for Mobile -->
    <div class="d-flex d-md-none d-flex flex-column vh-100" role="mobile-content">
        <header class="mobile-header d-flex align-items-center fixed-top" role="banner">
            <img src="<?php echo UPLOAD_DIR."icons/almamatch.png" ?>" class="h-100" alt="That image contains the logo of AlmaMatch app, 4 people teaming up for a common goal.">
            <h1 class="Alma">Alma</h1><h1 class="Match">Match</h1>
        </header>
        <main class="flex-grow-1 d-flex flex-column overflow-y-auto">
            <?php
                require($templateParams["name"]);
            ?>
        </main>
        <?php if ($templateParams["name"] != "login.php" && $templateParams["name"] != "register.php"): ?>
        <nav class="icons-menu d-flex justify-content-center align-items-center py-3 gap-5 fixed-bottom">
            <?php 
                $currentPage = basename($templateParams["name"], ".php");

                foreach(MOBILE_ICONS_MENU as $icon):
                    $activePages = [];
                    if ($icon['page'] === 'explorer') {
                        $activePages = ['explorer', 'explorer-category'];
                    } else {
                        $activePages = [$icon['page']];
                    }
                
                    if (in_array($currentPage, $activePages)): ?>
                        <a href="<?php echo $icon['href']; ?>" class="text-decoration-none" style="color: #DF693E;">
                            <i class="<?php echo $icon['icon']; ?>"></i>
                        </a>
                    <?php else: ?>
                        <a href="<?php echo $icon['href']; ?>" class="text-decoration-none text-secondary">
                            <i class="<?php echo $icon['icon']; ?>"></i>
                        </a>
                    <?php endif;
                endforeach;
            ?>
        </nav>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <?php if (isset($authPage) && $authPage): ?>
        <script src="<?php echo PROJECT_DIR."js/auth.js"; ?>"></script>
    <?php else: ?>
        <?php if (file_exists(PROJECT_DIR."js/".basename($templateParams["name"], ".php").".js")): ?>
            <script src="<?php echo PROJECT_DIR."js/".basename($templateParams["name"], ".php").".js"; ?>"></script>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>