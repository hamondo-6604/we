{{-- ─────────────────────────────────────────────────────────────────────────
    LOVO Admin — header.blade.php (topbar)
    Clean white bar, gold accent on hover/badge, matches home.blade.php palette
────────────────────────────────────────────────────────────────────────── --}}

<header id="header" class="topbar">

    {{-- Left: toggle + page title --}}
    <div class="topbar-left">

        {{-- Mobile sidebar toggle --}}
        <button class="topbar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="topbar-title-wrap">
            <h1 class="topbar-title">@yield('page-title', 'Dashboard Overview')</h1>
            <p class="topbar-sub">@yield('page-sub', 'Real-time overview of LOVO operations')</p>
        </div>

    </div>

    {{-- Right: search · date · notifications · settings · avatar --}}
    <div class="topbar-right">

        {{-- Global search --}}
        <div class="topbar-search">
            <i class="fa-solid fa-magnifying-glass topbar-search-icon"></i>
            <input type="text"
                   placeholder="Search anything…"
                   class="topbar-search-input"
                   aria-label="Global search">
        </div>

        {{-- Live date --}}
        <div class="topbar-date" id="live-date" aria-live="polite"></div>

        {{-- Notifications --}}
        <button class="topbar-icon-btn" aria-label="Notifications">
            <i class="fa-solid fa-bell"></i>
            <span class="icon-btn-badge">3</span>
        </button>

        {{-- Settings --}}
        <a href="{{ route('admin.settings') }}"
           class="topbar-icon-btn"
           aria-label="Settings">
            <i class="fa-solid fa-gear"></i>
        </a>

        {{-- User avatar --}}
        <a href="{{ route('admin.profile') }}"
           class="topbar-avatar"
           aria-label="My profile">
            @if(auth()->user()?->profile_photo_url)
                <img src="{{ auth()->user()->profile_photo_url }}"
                     alt="{{ auth()->user()->name }}">
            @else
                <span class="topbar-avatar-initials">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </span>
            @endif
        </a>

    </div>

</header>

{{-- Inline JS: date is set immediately (no FOUC) + sidebar helpers --}}
<script>
(function () {
    var el = document.getElementById('live-date');
    if (el) {
        el.textContent = new Date().toLocaleDateString('en-PH', {
            weekday: 'short', month: 'short', day: 'numeric'
        });
    }
})();

function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('sidebar-overlay').classList.toggle('show');
}

function closeSidebar() {
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('sidebar-overlay').classList.remove('show');
}
</script>