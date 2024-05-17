import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login-form');

    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            axios.get('/sanctum/csrf-cookie').then(response => {
                // Now we can make a login request
                axios.post('/login', {
                    email: email,
                    password: password
                }).then(response => {
                    console.log('Logged in successfully');
                    // Handle successful login (e.g., redirect to dashboard)
                    window.location.href = '/dashboard';
                }).catch(error => {
                    console.error('Login failed', error);
                    // Handle login failure (e.g., display error message)
                    alert('Login failed. Please check your credentials and try again.');
                });
            });
        });
    }
});