<div class="align-items-center d-flex flex-column justify-content-center vh-100">
    <form method="POST" action="" class="d-flex flex-column align-items-center justify-content-center align-self-center w-75 gap-4 pb-4">
        <span class="title text-center py-4 w-100 h-100">LOGIN</span>
        <input type="text" class="w-75" placeholder="Username" required>
        <input type="password" class="w-75" placeholder="Password" required>
        <div class="d-flex justify-content-center gap-4">
            <a href="<?php echo PROJECT_DIR."register"; ?>" class="btn auth-btn text-decoration-none">Register</a>
            <button type="submit" class="btn auth-btn">Login</button>
        </div>
    </form>
</div>