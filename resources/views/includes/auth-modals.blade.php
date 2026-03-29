<!-- Login Modal -->
<div class="modal-overlay" id="loginModal">
  <div class="modal">
    <button class="modal-close" onclick="closeLoginModal()">
      <i class="fas fa-times"></i>
    </button>
    <div class="modal-header">
      <div class="modal-logo">
        <i class="fas fa-bus"></i>
      </div>
      <h2 class="modal-title">Welcome Back</h2>
      <p class="modal-subtitle">Sign in to access your SecureBus account</p>
    </div>
    <form class="modal-body" onsubmit="handleLogin(event)">
      <div class="form-group">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-input" placeholder="Enter your email" id="modalEmail">
        <span class="error-message" id="modalEmailError"></span>
      </div>
      <div class="form-group">
        <label class="form-label">Password</label>
        <div class="password-wrapper">
          <input type="password" name="password" class="form-input" placeholder="Enter your password" id="modalPassword">
          <button type="button" class="password-toggle" onclick="toggleModalPassword('modalPassword')">
            <i class="fas fa-eye eye-open"></i>
            <i class="fas fa-eye-slash eye-closed" style="display: none;"></i>
          </button>
        </div>
        <span class="error-message" id="modalPasswordError"></span>
      </div>
      <div class="form-checkbox">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Remember this device</label>
      </div>
      <div class="form-error" id="loginError" style="display: none; margin-bottom: 16px; padding: 12px; border-radius: 8px; background: rgba(192, 57, 43, 0.1); border: 1px solid rgba(192, 57, 43, 0.3); color: #c0392b; font-size: 0.85rem; text-align: center;"></div>
      <div class="form-success" id="loginSuccess" style="display: none; margin-bottom: 16px; padding: 12px; border-radius: 8px; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.3); color: #059669; font-size: 0.85rem; text-align: center;"></div>
      <button type="submit" class="btn-modal btn-primary-modal">Sign In</button>
    </form>
    <div class="modal-footer">
      <div class="modal-switch">
        Don't have an account? <a href="#" onclick="switchToRegister()">Sign Up</a>
      </div>
    </div>
  </div>
</div>

<!-- Register Modal -->
<div class="modal-overlay" id="registerModal">
  <div class="modal">
    <button class="modal-close" onclick="closeRegisterModal()">
      <i class="fas fa-times"></i>
    </button>
    <div class="modal-header">
      <div class="modal-logo">
        <i class="fas fa-bus"></i>
      </div>
      <h2 class="modal-title">Create Account</h2>
      <p class="modal-subtitle">Join SecureBus and start your journey with exclusive benefits</p>
    </div>
    <form class="modal-body" onsubmit="handleRegister(event)">
      <div class="form-group">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-input" placeholder="Enter your full name" id="modalName">
        <span class="error-message" id="modalNameError"></span>
      </div>
      <div class="form-group">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-input" placeholder="Enter your email" id="modalRegEmail">
        <span class="error-message" id="modalRegEmailError"></span>
      </div>
      <div class="form-group">
        <label class="form-label">Password</label>
        <div class="password-wrapper">
          <input type="password" name="password" class="form-input" placeholder="Create a password (min. 8 characters)" id="modalRegPassword">
          <button type="button" class="password-toggle" onclick="toggleModalPassword('modalRegPassword')">
            <i class="fas fa-eye eye-open"></i>
            <i class="fas fa-eye-slash eye-closed" style="display: none;"></i>
          </button>
        </div>
        <span class="error-message" id="modalRegPasswordError"></span>
      </div>
      <div class="form-group">
        <label class="form-label">Confirm Password</label>
        <div class="password-wrapper">
          <input type="password" name="password_confirmation" class="form-input" placeholder="Confirm your password" id="modalRegPasswordConfirm">
          <button type="button" class="password-toggle" onclick="toggleModalPassword('modalRegPasswordConfirm')">
            <i class="fas fa-eye eye-open"></i>
            <i class="fas fa-eye-slash eye-closed" style="display: none;"></i>
          </button>
        </div>
        <span class="error-message" id="modalRegPasswordConfirmError"></span>
      </div>
      <div class="form-checkbox">
        <input type="checkbox" id="terms" name="terms">
        <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
      </div>
      <div class="form-error" id="registerError" style="display: none; margin-bottom: 16px; padding: 12px; border-radius: 8px; background: rgba(192, 57, 43, 0.1); border: 1px solid rgba(192, 57, 43, 0.3); color: #c0392b; font-size: 0.85rem; text-align: center;"></div>
      <div class="form-success" id="registerSuccess" style="display: none; margin-bottom: 16px; padding: 12px; border-radius: 8px; background: rgba(5, 150, 105, 0.1); border: 1px solid rgba(5, 150, 105, 0.3); color: #059669; font-size: 0.85rem; text-align: center;"></div>
      <button type="submit" class="btn-modal btn-primary-modal">Create Account</button>
    </form>
    <div class="modal-footer">
      <div class="modal-switch">
        Already have an account? <a href="#" onclick="switchToLogin()">Sign In</a>
      </div>
    </div>
  </div>
</div>

<script>
// Modal functions
function openLoginModal() {
  document.getElementById('loginModal').style.display = 'flex';
  document.body.style.overflow = 'hidden';
}

function closeLoginModal() {
  document.getElementById('loginModal').style.display = 'none';
  document.body.style.overflow = 'auto';
  clearModalErrors();
}

function openRegisterModal() {
  document.getElementById('registerModal').style.display = 'flex';
  document.body.style.overflow = 'hidden';
}

function closeRegisterModal() {
  document.getElementById('registerModal').style.display = 'none';
  document.body.style.overflow = 'auto';
  clearModalErrors();
}

function switchToLogin() {
  closeRegisterModal();
  setTimeout(openLoginModal, 300);
}

function switchToRegister() {
  closeLoginModal();
  setTimeout(openRegisterModal, 300);
}

function clearModalErrors() {
  // Clear login modal errors
  document.getElementById('loginError').style.display = 'none';
  document.getElementById('loginSuccess').style.display = 'none';
  document.getElementById('modalEmailError').textContent = '';
  document.getElementById('modalEmailError').classList.remove('show');
  document.getElementById('modalPasswordError').textContent = '';
  document.getElementById('modalPasswordError').classList.remove('show');
  
  // Clear register modal errors
  document.getElementById('registerError').style.display = 'none';
  document.getElementById('registerSuccess').style.display = 'none';
  document.getElementById('modalNameError').textContent = '';
  document.getElementById('modalNameError').classList.remove('show');
  document.getElementById('modalRegEmailError').textContent = '';
  document.getElementById('modalRegEmailError').classList.remove('show');
  document.getElementById('modalRegPasswordError').textContent = '';
  document.getElementById('modalRegPasswordError').classList.remove('show');
  document.getElementById('modalRegPasswordConfirmError').textContent = '';
  document.getElementById('modalRegPasswordConfirmError').classList.remove('show');
}

// Close modals when clicking outside
window.onclick = function(event) {
  if (event.target.classList.contains('modal-overlay')) {
    if (event.target.id === 'loginModal') {
      closeLoginModal();
    } else if (event.target.id === 'registerModal') {
      closeRegisterModal();
    }
  }
}
</script>
