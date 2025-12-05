<div class="align-items-center d-flex flex-column justify-content-center vh-100">
    <form method="POST" action="<?php echo PROJECT_DIR; ?>" class="d-flex flex-column align-items-center justify-content-center align-self-center w-100 py-3">
        <div class="d-flex flex-row align-items-center gap-3 py-3">
            <div class="icon-logo align-items-center d-flex justify-content-center">
                <i class="fi fi-sr-user-lock"></i>
            </div>
            <div>
                <header class="title ">Create Account</header>
                <footer class="subtitle">Hello - please fill in the details below</footer>
            </div>
        </div>
        <div class="credential-container d-flex flex-column w-100 px-4 gap-2">
            <div class="d-flex flex-column">
                <span class="input-title">Username</span>
                <div class="input-group d-flex flex-row align-items-center gap-3 py-2 px-3">
                    <i class="fi fi-sr-user"></i>
                    <input type="text" name="username" class="input-field" placeholder="yourusername" required>
                </div>
            </div>

            <div class="d-flex flex-column">
                <span class="input-title">Email</span>
                <div class="input-group d-flex flex-row align-items-center gap-3 py-2 px-3">
                    <i class="fi fi-sr-envelope"></i>
                    <input type="text" name="email" class="input-field" placeholder="you@example.com" required>
                </div>
            </div>

            <div class="d-flex flex-column">
                <span class="input-title">Password</span>
                <div class="input-group d-flex flex-row align-items-center gap-3 py-2 px-3">
                    <i class="fi fi-sr-key"></i>
                    <input type="password" name="password" class="input-field" placeholder="••••••••" required>
                    <button type="button" class="password-toggle-btn ms-auto">
                        <i class="fi fi-br-eye"></i>
                    </button>
                </div>
            </div>

            <div class="d-flex flex-column">
                <span class="input-title">Confirm Password</span>
                <div class="input-group d-flex flex-row align-items-center gap-3 py-2 px-3">
                    <i class="fi fi-sr-key"></i>
                    <input type="password" name="confirm_password" class="input-field" placeholder="••••••••" required>
                    <button type="button" class="password-toggle-btn ms-auto">
                        <i class="fi fi-br-eye"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-end w-100 py-3 px-5">
            <a href="<?php echo PROJECT_DIR."auth"; ?>" class="text-decoration-none">Login</a>
        </div>

        <div class="d-flex flex-column w-100 px-4">
            <button type="submit" class="btn login-btn w-100">Register</button>
        </div>
    </form>
</div>