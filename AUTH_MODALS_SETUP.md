# How to Add Login/Register Modals to Any Page

## Quick Setup

### 1. Add Login/Register Buttons to Navigation
In your navbar's `nav-right` section, add:

```blade
<div class="nav-right">
  @guest
  <button class="btn-login" onclick="openLoginModal()">Login</button>
  <button class="btn-book" onclick="openRegisterModal()">Register</button>
  @else
  <!-- Show user avatar/menu for logged in users -->
  <div class="nav-avatar" id="user-avatar-btn">
    {{ substr(auth()->user()->name, 0, 2)->upper() }}
    <div class="nav-avatar-menu">
      <a href="{{ route('manage.bookings') }}">🎫 My Bookings</a>
      <a href="#">👤 My Profile</a>
      <div class="divider"></div>
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">🚪 Sign Out</a>
    </div>
  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  @endguest
</div>
```

### 2. Include Auth Modals (only for guests)
Add this before the closing `</body>` tag:

```blade
<!-- ═══ AUTH MODALS ═══ -->
@guest
@include('includes.auth-modals')
<script src="{{ asset('js/auth-modals.js') }}"></script>
@endguest
```

## Complete Example

Here's a complete example for any page:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <!-- Your CSS styles -->
</head>
<body>
  <!-- Your navigation -->
  <nav>
    <div class="nav-wrap">
      <a class="logo" href="{{ route('landing.home') }}">
        Your Logo
      </a>
      <ul class="nav-links">
        <li><a href="{{ route('landing.home') }}">Home</a></li>
        <li><a href="{{ route('landing.ticket_booking') }}">Book a Ticket</a></li>
        <!-- Add your other nav items -->
      </ul>
      <div class="nav-right">
        @guest
        <button class="btn-login" onclick="openLoginModal()">Login</button>
        <button class="btn-book" onclick="openRegisterModal()">Register</button>
        @else
        <div class="nav-avatar" id="user-avatar-btn">
          {{ substr(auth()->user()->name, 0, 2)->upper() }}
          <div class="nav-avatar-menu">
            <a href="{{ route('manage.bookings') }}">🎫 My Bookings</a>
            <a href="#">👤 My Profile</a>
            <div class="divider"></div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">🚪 Sign Out</a>
          </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        @endguest
      </div>
    </div>
  </nav>

  <!-- Your page content -->
  <main>
    <!-- Your content here -->
  </main>

  <!-- Your existing scripts -->
  <script src="your-existing-scripts.js"></script>

  <!-- ═══ AUTH MODALS ═══ -->
  @guest
  @include('includes.auth-modals')
  <script src="{{ asset('js/auth-modals.js') }}"></script>
  @endguest
</body>
</html>
```

## Features Included

### ✅ Professional Validation
- No HTML5 `required` attributes
- Custom error messages below each field
- Real-time validation on blur and input
- Professional styling with smooth animations

### ✅ Login Modal
- Email validation
- Password validation
- Remember me option
- Forgot password link

### ✅ Register Modal
- Name validation (min 2 characters)
- Email validation
- Password validation (min 8 characters)
- Password confirmation validation
- Terms & conditions checkbox

### ✅ User Experience
- Smooth modal transitions
- Click outside to close
- Escape key to close
- Switch between login/register
- Loading states
- Success/error messages

## CSS Classes Needed

Make sure your CSS includes these modal styles (they should already be in your main stylesheet):

```css
/* Modal overlay */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
}

.modal-overlay.show {
  opacity: 1;
  visibility: visible;
}

/* Modal content */
.modal {
  background: white;
  border-radius: 12px;
  max-width: 400px;
  width: 90%;
  max-height: 90vh;
  overflow-y: auto;
  transform: scale(0.9);
  transition: transform 0.3s ease;
}

.modal-overlay.show .modal {
  transform: scale(1);
}

/* Form validation styles */
.error-message {
  color: #dc2626;
  font-size: 12px;
  font-weight: 500;
  margin-top: 4px;
  opacity: 0;
  transform: translateY(-2px);
  transition: all 0.2s ease;
}

.error-message.show {
  opacity: 1;
  transform: translateY(0);
}

.form-input.error {
  border-color: #dc2626;
  background: #fef2f2;
}
```

That's it! Now any page can have professional login/register modals with custom validation.
