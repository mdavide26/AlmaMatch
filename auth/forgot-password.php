<div class="align-items-center d-flex flex-column justify-content-center vh-100">
    <form method="POST" action="<?php echo PROJECT_DIR; ?>" class="d-flex flex-column align-items-center justify-content-center align-self-center w-100 py-3">
        <header class="d-flex flex-row align-items-center w-100 px-4 gap-3 py-3">
            <div class="icon-logo align-items-center d-flex justify-content-center">
                <i class="fi fi-sr-user-lock"></i>
            </div>
            <div class="d-flex flex-column w-75">
                <header class="title ">Reset Password</header>
                <footer class="subtitle">If your email is registered, you will change your password.</footer>
            </div>
        </header>
        <div class="credential-container d-flex flex-column w-100 px-4 gap-2">
            <div class="d-flex flex-column">
                <span class="input-title">Email</span>
                <div class="input-group d-flex flex-row align-items-center gap-3 py-2 px-3">
                    <i class="fi fi-sr-envelope"></i>
                    <input type="text" name="email" class="input-field" placeholder="you@example.com" required>
                </div>
            </div>
            <div class="d-flex flex-column">
                <span class="input-title">New Password</span>
                <div class="input-group d-flex flex-row align-items-center gap-3 py-2 px-3">
                    <i class="fi fi-sr-key"></i>
                    <input type="password" name="new_password" class="input-field" placeholder="••••••••" required>
                    <button type="button" class="password-toggle-btn ms-auto">
                        <i class="fi fi-br-eye"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-start w-100 px-4 py-3">
            <a href="<?php echo PROJECT_DIR."auth/"; ?>" class="text-decoration-none">Back to Login</a>
        </div>
        <div class="d-flex flex-column w-100 px-4">
            <button type="submit" class="btn login-btn w-100">Reset Password</button>
        </div>
    </form>
</div>