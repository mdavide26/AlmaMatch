const togglePasswordButtons = document.querySelectorAll('.password-toggle-btn');

togglePasswordButtons.forEach(button => {
    button.addEventListener('click', function () {
        const passwordField = this.previousElementSibling;

        if (passwordField) {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            const icon = this.querySelector('i');
            if (type === 'password') {
                icon.classList.remove('fi-br-eye-crossed');
                icon.classList.add('fi-br-eye');
            } else {
                icon.classList.remove('fi-br-eye');
                icon.classList.add('fi-br-eye-crossed');
            }
        }
    });
});