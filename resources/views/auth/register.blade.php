<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - SecureBus</title>
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
      <p>Create your account securely</p>
    </div>

    <form action="{{ route('register_post') }}" method="post" class="login-form" id="registerForm">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" id="name" autocomplete="name">
        <span class="error-message" id="nameError"></span>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" id="email" autocomplete="email">
        <span class="error-message" id="emailError"></span>
      </div>

      <div class="password-row">
        <div class="form-group password-field">
          <label for="password">Password</label>
          <div class="password-wrapper">
            <input type="password" id="password" name="password" autocomplete="new-password">
            <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
            <i class="fas fa-eye eye-open"></i>
            <i class="fas fa-eye-slash eye-closed" style="display: none;"></i>
          </button>
          </div>
          <span class="error-message" id="passwordError"></span>
        </div>

        <div class="form-group password-field">
          <label for="password_confirmation">Confirm Password</label>
          <div class="password-wrapper">
            <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
            <button type="button" class="password-toggle" id="confirmPasswordToggle" aria-label="Toggle password visibility">
            <i class="fas fa-eye eye-open"></i>
            <i class="fas fa-eye-slash eye-closed" style="display: none;"></i>
          </button>
          </div>
          <span class="error-message" id="confirmPasswordError"></span>
        </div>
      </div>

      <button type="submit" class="login-btn">
        <span class="btn-text">Register</span>
        <div class="btn-loader">
          <div class="spinner"></div>
        </div>
      </button>
    </form>

    <!-- Added Login Link -->
    <div class="register-link">
      <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>

    <div class="security-notice">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path d="M8 1L3 3v4.5c0 2.89 2 5.5 5 6 3-0.5 5-3.11 5-6V3l-5-2z" stroke="#10B981" stroke-width="1.5" fill="none"/>
        <path d="M6 8l1.5 1.5L11 6" stroke="#10B981" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span>Your connection is secured with 256-bit SSL encryption</span>
    </div>

  </div>
</div>

<script src="{{ asset('js/pages/auth/register.js') }}"></script>
</body>
</html>