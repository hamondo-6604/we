<nav id="nav">
  <div class="nav-wrap">
    <a class="logo" href="{{ route('landing.home') }}">
      <div class="logo-mark">
        <i class="fas fa-bus"></i>
      </div>
      <span class="logo-wordmark">Voyage<span>PH</span></span>
    </a>

    <ul class="nav-links">
      <li><a href="{{ route('landing.home') }}" class="{{ ($active === 'home') ? 'active' : '' }}">Home</a></li>
      <li><a href="{{ route('landing.ticket_booking') }}" class="{{ ($active === 'ticket_booking') ? 'active' : '' }}">Book a Ticket</a></li>
      <li><a href="{{ route('landing.booking_routes') }}" class="{{ ($active === 'booking_routes') ? 'active' : '' }}">Routes</a></li>
      <li>
        @auth
          <a href="{{ route('landing.booking_promo') }}" class="{{ ($active === 'booking_promo') ? 'active' : '' }}">Promos</a>
        @else
          <a href="#" class="{{ ($active === 'booking_promo') ? 'active' : '' }}" onclick="openLoginModal?.(); return false;">Promos</a>
        @endauth
      </li>
      @auth
        <li><a href="{{ route('manage.bookings') }}" class="{{ ($active === 'manage_bookings') ? 'active' : '' }}">Manage Bookings</a></li>
      @endauth
    </ul>

    <div class="nav-right">
      @guest
        <a class="btn-login" href="{{ route('login') }}">
          <i class="fas fa-sign-in-alt"></i> Login
        </a>
        <a class="btn-book" href="{{ route('register') }}">
          <i class="fas fa-user-plus"></i> Register
        </a>
      @else
        @if(auth()->user()->role === 'admin')
          <button class="btn-login" onclick="window.location.href='{{ route('admin.dashboard') }}'">
            <i class="fas fa-chart-line"></i> Admin Dashboard
          </button>
          <button class="btn-book" onclick="handleLogout?.()">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        @else
          <div class="nav-avatar" onclick="toggleUserMenu?.()">
            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            <div class="nav-avatar-menu" id="userMenu">
              <a href="{{ route('manage.bookings') }}">
                <i class="fas fa-ticket-alt"></i> My Bookings
              </a>
              <a href="#">
                <i class="fas fa-user"></i> My Profile
              </a>
              <a href="#">
                <i class="fas fa-bell"></i> Notifications
              </a>
              <div class="divider"></div>
              <a href="#" onclick="handleLogout?.(); return false;">
                <i class="fas fa-door-open"></i> Sign Out
              </a>
            </div>
          </div>
        @endif
      @endguest
    </div>
  </div>
</nav>
