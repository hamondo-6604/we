<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - SecureBus</title>
  <link rel="stylesheet" href="{{ asset('form/login/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="login-container">
  <div class="login-card">

    @include('message')

    <div class="login-header">
      <div class="logo">
        <svg width="36" height="36" viewBox="0 0 36 36" fill="none">
          <rect width="36" height="36" rx="8" fill="#6366F1"/>
          <path d="M12 14h12v8H12v-8zm2 2v4h8v-4h-8zm-2-4h12v2H12v-2zm0 12h12v2H12v-2z" fill="white"/>
        </svg>
      </div>
      <h1>SecureBus</h1>
      <p>Access your seat securely</p>
    </div>

    <form action="{{ route('login_post') }}" method="post" class="login-form" id="loginForm">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" id="email" autocomplete="email">
        <span class="error-message" id="emailError"></span>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="password-wrapper">
          <input type="password" id="password" name="password" value="{{ old('password') }}" autocomplete="current-password">
          <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
            <i class="fas fa-eye eye-open"></i>
            <i class="fas fa-eye-slash eye-closed" style="display: none;"></i>
          </button>
        </div>
        <span class="error-message" id="passwordError"></span>
      </div>

      <div class="form-options">
        <label class="checkbox-wrapper">
          <input type="checkbox" id="remember" name="remember">
          <span class="checkmark"></span>
          Remember this device
        </label>
        <a href="#" class="forgot-link">Reset password</a>
      </div>

      <button type="submit" class="login-btn">
        <span class="btn-text">Sign In</span>
        <div class="btn-loader">
          <div class="spinner"></div>
        </div>
      </button>
    </form>

    <!-- Register Link Added -->
    <div class="register-link">
      <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </div>

    <div class="security-notice">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path d="M8 1L3 3v4.5c0 2.89 2 5.5 5 6 3-0.5 5-3.11 5-6V3l-5-2z" stroke="#10B981" stroke-width="1.5" fill="none"/>
        <path d="M6 8l1.5 1.5L11 6" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span>Your connection is secured with 256-bit SSL encryption</span>
    </div>

    <div class="success-message" id="successMessage">
      <div class="success-icon">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
          <circle cx="14" cy="14" r="14" fill="#10B981"/>
          <path d="M9 14l3 3 7-7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      <h3>Welcome back</h3>
      <p>Taking you to your dashboard...</p>
    </div>
  </div>
</div>

<script src="{{ asset('js/pages/auth/login.js') }}"></script>
</body>
</html>