document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    function showError(input, errorElement, message) {
        errorElement.textContent = message;
        errorElement.classList.add('show');
        input.parentElement.classList.add('error');
    }

    function hideError(input, errorElement) {
        errorElement.textContent = '';
        errorElement.classList.remove('show');
        input.parentElement.classList.remove('error');
    }

    function validateEmail() {
        const email = emailInput.value.trim();
        
        if (email === '') {
            showError(emailInput, emailError, 'Email is required');
            return false;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showError(emailInput, emailError, 'Please enter a valid email address');
            return false;
        }
        
        hideError(emailInput, emailError);
        return true;
    }

    function validatePassword() {
        const password = passwordInput.value;
        
        if (password === '') {
            showError(passwordInput, passwordError, 'Password is required');
            return false;
        }
        
        hideError(passwordInput, passwordError);
        return true;
    }

    emailInput.addEventListener('blur', validateEmail);
    emailInput.addEventListener('input', function() {
        if (emailError.classList.contains('show')) {
            validateEmail();
        }
    });

    passwordInput.addEventListener('blur', validatePassword);
    passwordInput.addEventListener('input', function() {
        if (passwordError.classList.contains('show')) {
            validatePassword();
        }
    });

    // Password toggle functionality
    const passwordToggle = document.getElementById('passwordToggle');
    
    if (passwordToggle) {
        passwordToggle.addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = this.querySelector('.eye-open');
            const eyeClosed = this.querySelector('.eye-closed');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.style.display = 'none';
                eyeClosed.style.display = 'inline';
            } else {
                passwordInput.type = 'password';
                eyeOpen.style.display = 'inline';
                eyeClosed.style.display = 'none';
            }
        });
    }

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();
        
        if (isEmailValid && isPasswordValid) {
            loginForm.submit();
        }
    });
});