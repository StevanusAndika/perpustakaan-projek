document.addEventListener('DOMContentLoaded', function() {
    feather.replace();

    const passwordField = document.getElementById('password');
    const togglePassword = document.getElementById('toggle-password');
    const icon = togglePassword.querySelector('i');

    togglePassword.addEventListener('click', function() {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);

        if (type === 'password') {
            icon.setAttribute('data-feather', 'eye');
        } else {
            icon.setAttribute('data-feather', 'eye-off');
        }
        feather.replace();
    });
});