<footer>
  <div class="footer-inner">
    <div class="footer-top">
      <div class="footer-brand">
        <a class="logo" href="{{ route('landing.home') }}" style="filter:brightness(1.2)">
          <div class="logo-mark" style="border-color:rgba(212,168,67,.3)">
            <i class="fas fa-bus"></i>
          </div>
          <span style="font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:800;color:#fff;letter-spacing:-.3px;">
            Voyage<span style="color:#d4a843">PH</span>
          </span>
        </a>
        <p>Philippines' premier bus company — connecting cities with comfort, safety, and reliability since 2018.</p>

        <div class="footer-newsletter">
          <p>Get promo alerts and travel updates:</p>
          <div class="nl-row">
            <input class="nl-input" type="email" placeholder="your@email.com"/>
            <button class="nl-btn">
              <i class="fas fa-paper-plane"></i> Subscribe
            </button>
          </div>
        </div>
      </div>

      <div class="footer-col">
        <h4>Travel</h4>
        <ul>
          <li><a href="{{ route('landing.ticket_booking') }}"><i class="fas fa-ticket-alt"></i> Book a Ticket</a></li>
          <li><a href="{{ route('landing.booking_routes') }}"><i class="fas fa-route"></i> View Routes</a></li>
          <li><a href="{{ route('landing.booking_promo') }}"><i class="fas fa-tags"></i> Promos & Deals</a></li>
          <li><a href="#"><i class="fas fa-users"></i> Group Booking</a></li>
          <li><a href="#"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Account</h4>
        <ul>
          <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a></li>
          <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Log In</a></li>
          <li><a href="{{ route('manage.bookings') }}"><i class="fas fa-ticket-alt"></i> My Bookings</a></li>
          <li><a href="#"><i class="fas fa-user"></i> My Profile</a></li>
          <li><a href="#"><i class="fas fa-bell"></i> Notifications</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="#"><i class="fas fa-building"></i> About VoyagePH</a></li>
          <li><a href="#"><i class="fas fa-envelope"></i> Contact Us</a></li>
          <li><a href="#"><i class="fas fa-question-circle"></i> Help / FAQ</a></li>
          <li><a href="#"><i class="fas fa-undo"></i> Cancellation Policy</a></li>
          <li><a href="#"><i class="fas fa-shield-alt"></i> Privacy Policy</a></li>
          <li><a href="#"><i class="fas fa-file-contract"></i> Terms of Service</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>
        © {{ date('Y') }} VoyagePH. All rights reserved. Made with
        <i class="fas fa-heart"></i> in the Philippines.
      </p>

      <div class="footer-payments">
        <span style="font-size:.68rem;color:rgba(255,255,255,.25);margin-right:6px;">We accept</span>
        <span class="pay-badge">GCash</span>
        <span class="pay-badge">Maya</span>
        <span class="pay-badge">Visa</span>
        <span class="pay-badge">MC</span>
        <span class="pay-badge">OTC</span>
      </div>

      <div class="footer-socials">
        <a class="soc-btn" href="#"><i class="fab fa-facebook-f"></i></a>
        <a class="soc-btn" href="#"><i class="fab fa-x-twitter"></i></a>
        <a class="soc-btn" href="#"><i class="fab fa-linkedin-in"></i></a>
        <a class="soc-btn" href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>
</footer>
