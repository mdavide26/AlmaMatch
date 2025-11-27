<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel="stylesheet" href="css/base.css">
    <title>AlmaMatch</title>
    <script src="js/base.js"></script>
</head>
<body class="container-fluid p-0">
    <!-- Content visible for Desktop -->
    <div class="d-none d-md-block">
        <h2>Desktop Content</h2>
    </div>

    <!-- Content visible for Mobile -->
    <div class="d-block d-md-none d-flex flex-column min-vh-100">
        <header class="mobile-header d-flex align-items-center">
            <img src="upload/icons/almamatch.png" class="h-100" alt="AlmaMatch Icon">
            <h1 class="Alma">Alma</h1><h1 class="Match">Match</h1>
        </header>
        <main class="flex-grow-1">
            <?php
                require($templateParams["name"]);
            ?>
        </main>
        <footer class="icons-menu d-flex justify-content-center align-items-center py-5 gap-5">
            <a href="#" class="text-decoration-none"><i class="fi fi-br-house-chimney" style="color: #DF693E;"></i></a>
            <a href="#" class="text-decoration-none text-secondary"><i class="fi fi-br-navigation"></i></a>
            <a href="#" class="text-decoration-none text-secondary"><i class="fi fi-br-bolt"></i></a>
            <a href="#" class="text-decoration-none text-secondary"><i class="fi fi-br-beacon"></i></a>
            <a href="#" class="text-decoration-none text-secondary"><i class="fi fi-br-user"></i></a>
        </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>