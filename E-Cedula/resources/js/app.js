import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login-form');

    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', { email, password })
                    .then(response => {
                        window.location.href = '/home'; // Redirect on successful login
                    })
                    .catch(error => {
                        if (error.response && error.response.status === 422) {
                            // Handle validation errors
                            const errors = error.response.data.errors;
                            let errorMessage = 'Login failed. Please check your credentials and try again.';
                            if (errors.email) {
                                errorMessage = errors.email[0];
                            } else if (errors.password) {
                                errorMessage = errors.password[0];
                            }
                            alert(errorMessage);
                        } else {
                            console.error('Login failed', error);
                            alert('Login failed due to a server error. Please try again later.');
                        }
                    });
            });
        });
    }
});