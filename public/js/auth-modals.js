document.addEventListener('DOMContentLoaded', function() {
    // Modal validation functions
    function showModalError(input, errorElement, message) {
        errorElement.textContent = message;
        errorElement.classList.add('show');
        input.classList.add('error');
    }

    function hideModalError(input, errorElement) {
        errorElement.textContent = '';
        errorElement.classList.remove('show');
        input.classList.remove('error');
    }

    // Login modal validation
    function validateModalEmail() {
        const emailInput = document.getElementById('modalEmail');
        const errorElement = document.getElementById('modalEmailError');
        const email = emailInput.value.trim();
        
        if (email === '') {
            showModalError(emailInput, errorElement, 'Email is required');
            return false;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showModalError(emailInput, errorElement, 'Please enter a valid email address');
            return false;
        }
        
        hideModalError(emailInput, errorElement);
        return true;
    }

    function validateModalPassword() {
        const passwordInput = document.getElementById('modalPassword');
        const errorElement = document.getElementById('modalPasswordError');
        const password = passwordInput.value;
        
        if (password === '') {
            showModalError(passwordInput, errorElement, 'Password is required');
            return false;
        }
        
        hideModalError(passwordInput, errorElement);
        return true;
    }

    // Register modal validation
    function validateModalName() {
        const nameInput = document.getElementById('modalName');
        const errorElement = document.getElementById('modalNameError');
        const name = nameInput.value.trim();
        
        if (name === '') {
            showModalError(nameInput, errorElement, 'Name is required');
            return false;
        }
        
        if (name.length < 2) {
            showModalError(nameInput, errorElement, 'Name must be at least 2 characters');
            return false;
        }
        
        hideModalError(nameInput, errorElement);
        return true;
    }

    function validateModalRegEmail() {
        const emailInput = document.getElementById('modalRegEmail');
        const errorElement = document.getElementById('modalRegEmailError');
        const email = emailInput.value.trim();
        
        if (email === '') {
            showModalError(emailInput, errorElement, 'Email is required');
            return false;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showModalError(emailInput, errorElement, 'Please enter a valid email address');
            return false;
        }
        
        hideModalError(emailInput, errorElement);
        return true;
    }

    function validateModalRegPassword() {
        const passwordInput = document.getElementById('modalRegPassword');
        const errorElement = document.getElementById('modalRegPasswordError');
        const password = passwordInput.value;
        
        if (password === '') {
            showModalError(passwordInput, errorElement, 'Password is required');
            return false;
        }
        
        if (password.length < 8) {
            showModalError(passwordInput, errorElement, 'Password must be at least 8 characters');
            return false;
        }
        
        hideModalError(passwordInput, errorElement);
        return true;
    }

    function validateModalRegPasswordConfirm() {
        const passwordInput = document.getElementById('modalRegPassword');
        const confirmPasswordInput = document.getElementById('modalRegPasswordConfirm');
        const errorElement = document.getElementById('modalRegPasswordConfirmError');
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        
        if (confirmPassword === '') {
            showModalError(confirmPasswordInput, errorElement, 'Please confirm your password');
            return false;
        }
        
        if (password !== confirmPassword) {
            showModalError(confirmPasswordInput, errorElement, 'Passwords do not match');
            return false;
        }
        
        hideModalError(confirmPasswordInput, errorElement);
        return true;
    }

    // Add event listeners for login modal
    const modalEmailInput = document.getElementById('modalEmail');
    const modalPasswordInput = document.getElementById('modalPassword');
    
    if (modalEmailInput) {
        modalEmailInput.addEventListener('blur', validateModalEmail);
        modalEmailInput.addEventListener('input', function() {
            if (document.getElementById('modalEmailError').classList.contains('show')) {
                validateModalEmail();
            }
        });
    }
    
    if (modalPasswordInput) {
        modalPasswordInput.addEventListener('blur', validateModalPassword);
        modalPasswordInput.addEventListener('input', function() {
            if (document.getElementById('modalPasswordError').classList.contains('show')) {
                validateModalPassword();
            }
        });
    }

    // Add event listeners for register modal
    const modalNameInput = document.getElementById('modalName');
    const modalRegEmailInput = document.getElementById('modalRegEmail');
    const modalRegPasswordInput = document.getElementById('modalRegPassword');
    const modalRegPasswordConfirmInput = document.getElementById('modalRegPasswordConfirm');
    
    if (modalNameInput) {
        modalNameInput.addEventListener('blur', validateModalName);
        modalNameInput.addEventListener('input', function() {
            if (document.getElementById('modalNameError').classList.contains('show')) {
                validateModalName();
            }
        });
    }
    
    if (modalRegEmailInput) {
        modalRegEmailInput.addEventListener('blur', validateModalRegEmail);
        modalRegEmailInput.addEventListener('input', function() {
            if (document.getElementById('modalRegEmailError').classList.contains('show')) {
                validateModalRegEmail();
            }
        });
    }
    
    if (modalRegPasswordInput) {
        modalRegPasswordInput.addEventListener('blur', validateModalRegPassword);
        modalRegPasswordInput.addEventListener('input', function() {
            if (document.getElementById('modalRegPasswordError').classList.contains('show')) {
                validateModalRegPassword();
            }
            if (modalRegPasswordConfirmInput.value && document.getElementById('modalRegPasswordConfirmError').classList.contains('show')) {
                validateModalRegPasswordConfirm();
            }
        });
    }
    
    if (modalRegPasswordConfirmInput) {
        modalRegPasswordConfirmInput.addEventListener('blur', validateModalRegPasswordConfirm);
        modalRegPasswordConfirmInput.addEventListener('input', function() {
            if (document.getElementById('modalRegPasswordConfirmError').classList.contains('show')) {
                validateModalRegPasswordConfirm();
            }
        });
    }

    // Make validation functions global for form submission
    window.validateModalEmail = validateModalEmail;
    window.validateModalPassword = validateModalPassword;
    window.validateModalName = validateModalName;
    window.validateModalRegEmail = validateModalRegEmail;
    window.validateModalRegPassword = validateModalRegPassword;
    window.validateModalRegPasswordConfirm = validateModalRegPasswordConfirm;
});

// Form submission handlers
window.handleLogin = function(event) {
    event.preventDefault();
    
    const isEmailValid = window.validateModalEmail();
    const isPasswordValid = window.validateModalPassword();
    
    if (isEmailValid && isPasswordValid) {
        const form = event.target;
        const formData = new FormData(form);
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Signing in...';
        submitBtn.disabled = true;
        
        // Simulate API call (replace with actual fetch)
        setTimeout(() => {
            // For demo, show success
            document.getElementById('loginSuccess').textContent = 'Login successful! Redirecting...';
            document.getElementById('loginSuccess').style.display = 'block';
            
            setTimeout(() => {
                closeLoginModal();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                // Redirect to dashboard or reload page
                window.location.reload();
            }, 1500);
        }, 1000);
    }
};

window.handleRegister = function(event) {
    event.preventDefault();
    
    const isNameValid = window.validateModalName();
    const isEmailValid = window.validateModalRegEmail();
    const isPasswordValid = window.validateModalRegPassword();
    const isConfirmPasswordValid = window.validateModalRegPasswordConfirm();
    const termsChecked = document.getElementById('terms').checked;
    
    if (!termsChecked) {
        document.getElementById('registerError').textContent = 'Please accept the Terms of Service and Privacy Policy';
        document.getElementById('registerError').style.display = 'block';
        return;
    }
    
    if (isNameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid) {
        const form = event.target;
        const formData = new FormData(form);
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Creating account...';
        submitBtn.disabled = true;
        
        // Simulate API call (replace with actual fetch)
        setTimeout(() => {
            // For demo, show success
            document.getElementById('registerSuccess').textContent = 'Account created successfully! Please check your email to verify.';
            document.getElementById('registerSuccess').style.display = 'block';
            
            setTimeout(() => {
                closeRegisterModal();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                // Redirect to login or show login modal
                openLoginModal();
            }, 2000);
        }, 1000);
    }
};

// Modal password toggle function
window.toggleModalPassword = function(inputId) {
    const input = document.getElementById(inputId);
    const button = input.nextElementSibling;
    const eyeOpen = button.querySelector('.eye-open');
    const eyeClosed = button.querySelector('.eye-closed');
    
    if (input.type === 'password') {
        input.type = 'text';
        eyeOpen.style.display = 'none';
        eyeClosed.style.display = 'inline';
    } else {
        input.type = 'password';
        eyeOpen.style.display = 'inline';
        eyeClosed.style.display = 'none';
    }
};
