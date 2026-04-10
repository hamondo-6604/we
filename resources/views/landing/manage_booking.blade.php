@extends('landing.layouts.app', ['active' => 'manage_bookings'])

@section('title', 'My Bookings – VoyagePH')

@push('styles')
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --ink:#0e1117; --ink-mid:#1a2235; --ink-soft:#2e3a52;
      --gold:#b8912a; --gold-lt:#d4a843;
      --gold-bg:rgba(184,145,42,.08); --gold-line:rgba(184,145,42,.2);
      --red:#c0392b; --red-bg:rgba(192,57,43,.07);
      --bg:#f9f7f4; --bg-2:#f2ede6; --bg-3:#ffffff;
      --border:#e4ddd3; --border-dk:#ccc4b8;
      --muted:#7a7468; --muted-lt:#a09890; --text:#1a1612;
      --green:#059669; --green-bg:rgba(5,150,105,.08);
      --blue:#2563eb; --blue-bg:rgba(37,99,235,.07);
      --nav-h:70px; --radius:14px;
      --shadow-sm:0 2px 12px rgba(14,17,23,.06);
      --shadow-md:0 8px 32px rgba(14,17,23,.10);
      --shadow-lg:0 20px 60px rgba(14,17,23,.14);
    }
    html { scroll-behavior:smooth; }
    body { font-family:'Outfit',sans-serif; background:var(--bg); color:var(--text); overflow-x:hidden; }

    /* ══ NAVBAR ══ */
    #nav {
      position:fixed; top:0; left:0; right:0; height:var(--nav-h); z-index:900;
      background:rgba(249,247,244,.95); backdrop-filter:blur(18px) saturate(1.4);
      border-bottom:1px solid var(--border); box-shadow:var(--shadow-sm);
    }
    .nav-wrap { max-width:1260px; margin:0 auto; height:100%; display:flex; align-items:center; padding:0 32px; }
    .logo { display:flex; align-items:center; gap:10px; text-decoration:none; flex-shrink:0; margin-right:44px; cursor:pointer; }
    .logo-mark { width:38px; height:38px; border-radius:9px; background:var(--ink); display:flex; align-items:center; justify-content:center; }
    .logo-mark svg { width:20px; height:20px; fill:none; stroke:var(--gold-lt); stroke-width:1.8; stroke-linecap:round; }
    .logo-mark i { font-size:1.05rem; color:var(--gold-lt); }
    .logo-wordmark { font-family:'Playfair Display',serif; font-size:1.2rem; font-weight:800; color:var(--ink); letter-spacing:-.3px; }
    .logo-wordmark span { color:var(--gold); }
    .nav-links { display:flex; list-style:none; gap:2px; }
    .nav-links a { text-decoration:none; color:var(--muted); font-size:.84rem; font-weight:500; padding:7px 14px; border-radius:7px; transition:color .18s,background .18s; white-space:nowrap; position:relative; cursor:pointer; }
    .nav-links a:hover { color:var(--ink); background:var(--bg-2); }
    .nav-links a.active { color:var(--ink); font-weight:600; }
    .nav-links a.active::after { content:''; position:absolute; bottom:-1px; left:14px; right:14px; height:2px; background:var(--gold); border-radius:2px; }
    .nav-right { margin-left:auto; display:flex; align-items:center; gap:8px; }
    .btn-login {
      background:none; border:1.5px solid var(--border-dk); color:var(--ink-soft);
      padding:8px 18px; border-radius:8px; font-size:.83rem; font-weight:600;
      cursor:pointer; font-family:'Outfit',sans-serif; transition:all .18s;
      text-decoration:none; display:inline-flex; align-items:center; gap:6px;
    }
    .btn-login:hover { border-color:var(--ink); color:var(--ink); }
    .btn-book {
      background:var(--ink); color:#fff; border:none; padding:9px 20px; border-radius:8px;
      font-size:.83rem; font-weight:700; cursor:pointer; font-family:'Outfit',sans-serif;
      transition:all .2s; display:inline-flex; align-items:center; gap:6px;
      text-decoration:none;
    }
    .btn-book:hover { background:var(--ink-mid); transform:translateY(-1px); box-shadow:0 6px 20px rgba(14,17,23,.2); }
    /* user avatar */
    .nav-avatar { width:36px; height:36px; border-radius:50%; background:var(--ink); color:var(--gold-lt); font-family:'Playfair Display',serif; font-weight:800; font-size:.82rem; display:flex; align-items:center; justify-content:center; cursor:pointer; border:2px solid var(--gold-line); position:relative; }
    .nav-avatar-menu { position:absolute; top:calc(100% + 10px); right:0; background:var(--bg-3); border:1px solid var(--border); border-radius:12px; box-shadow:var(--shadow-md); padding:8px; min-width:180px; display:none; z-index:999; }
    .nav-avatar:hover .nav-avatar-menu { display:block; }
    .nav-avatar-menu a { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:8px; font-size:.82rem; color:var(--text); text-decoration:none; transition:background .15s; cursor:pointer; }
    .nav-avatar-menu a:hover { background:var(--bg-2); }
    .nav-avatar-menu .divider { height:1px; background:var(--border); margin:4px 0; }

    /* ══ PAGE HEADER ══ */
    .page-header {
      padding-top:calc(var(--nav-h) + 52px); padding-bottom:48px; padding-left:32px; padding-right:32px;
      background:linear-gradient(160deg,#fff 0%,var(--bg) 100%); position:relative; overflow:hidden;
    }
    .page-header::before { content:''; position:absolute; top:0; right:0; width:55%; height:100%; background:radial-gradient(ellipse 70% 70% at 80% 40%,rgba(184,145,42,.07) 0%,transparent 65%); pointer-events:none; }
    .ph-inner { max-width:1260px; margin:0 auto; position:relative; z-index:1; display:flex; align-items:flex-end; justify-content:space-between; gap:24px; flex-wrap:wrap; }
    .breadcrumb { display:flex; align-items:center; gap:8px; font-size:.75rem; color:var(--muted-lt); margin-bottom:20px; }
    .breadcrumb a { color:var(--muted); text-decoration:none; font-weight:500; cursor:pointer; }
    .breadcrumb a:hover { color:var(--gold); }
    .breadcrumb .sep { color:var(--border-dk); }
    .breadcrumb .cur { color:var(--gold); font-weight:600; }
    .ph-eyebrow { display:inline-flex; align-items:center; gap:8px; font-size:.72rem; font-weight:700; letter-spacing:2.5px; text-transform:uppercase; color:var(--gold); margin-bottom:12px; }
    .ph-eyebrow::before { content:''; width:28px; height:1.5px; background:var(--gold); }
    .ph-heading { font-family:'Playfair Display',serif; font-size:clamp(2rem,3.5vw,2.8rem); font-weight:800; line-height:1.1; letter-spacing:-.3px; color:var(--ink); }
    .ph-heading em { font-style:italic; color:var(--gold); }
    .ph-sub { color:var(--muted); font-size:.95rem; line-height:1.7; margin-top:10px; max-width:480px; }
    /* header stat pills */
    .ph-stats { display:flex; gap:12px; flex-wrap:wrap; }
    .ph-stat { background:var(--bg-3); border:1px solid var(--border); border-radius:50px; padding:8px 18px; display:flex; align-items:center; gap:8px; font-size:.8rem; font-weight:600; color:var(--ink); box-shadow:var(--shadow-sm); }
    .ph-stat .dot { width:8px; height:8px; border-radius:50%; flex-shrink:0; }
    .dot-upcoming { background:#3b82f6; }
    .dot-completed { background:var(--green); }
    .dot-cancelled { background:var(--red); }

    /* ══ MAIN LAYOUT ══ */
    .page-body { max-width:1260px; margin:0 auto; padding:40px 32px 80px; display:grid; grid-template-columns:260px 1fr; gap:32px; align-items:start; }

    /* ══ SIDEBAR ══ */
    .sidebar { position:sticky; top:calc(var(--nav-h) + 20px); display:flex; flex-direction:column; gap:16px; }

    .profile-card { background:var(--bg-3); border:1px solid var(--border); border-radius:18px; overflow:hidden; box-shadow:var(--shadow-sm); }
    .profile-card-head { background:var(--ink); padding:24px 20px; text-align:center; position:relative; }
    .profile-card-head::before { content:''; position:absolute; top:-30px; left:50%; transform:translateX(-50%); width:200px; height:200px; border-radius:50%; background:radial-gradient(circle,rgba(184,145,42,.18) 0%,transparent 65%); }
    .profile-avatar { width:64px; height:64px; border-radius:50%; background:var(--gold-bg); border:3px solid rgba(255,255,255,.15); display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:800; color:var(--gold-lt); margin:0 auto 12px; position:relative; z-index:1; }
    .profile-name { font-family:'Playfair Display',serif; font-size:1rem; font-weight:800; color:#fff; margin-bottom:4px; }
    .profile-email { font-size:.75rem; color:rgba(255,255,255,.45); }
    .profile-verified { display:inline-flex; align-items:center; gap:5px; background:rgba(5,150,105,.18); border:1px solid rgba(5,150,105,.3); padding:3px 10px; border-radius:50px; font-size:.68rem; font-weight:700; color:#34d399; margin-top:8px; }
    .profile-card-body { padding:16px; }
    .profile-stat-row { display:grid; grid-template-columns:1fr 1fr 1fr; gap:8px; margin-bottom:12px; }
    .profile-stat { text-align:center; padding:10px 6px; background:var(--bg); border-radius:10px; border:1px solid var(--border); }
    .profile-stat-num { font-family:'Playfair Display',serif; font-size:1.1rem; font-weight:800; color:var(--ink); }
    .profile-stat-label { font-size:.62rem; color:var(--muted); margin-top:2px; text-transform:uppercase; letter-spacing:.5px; }

    .sidebar-nav { background:var(--bg-3); border:1px solid var(--border); border-radius:14px; overflow:hidden; box-shadow:var(--shadow-sm); }
    .snav-item { display:flex; align-items:center; gap:12px; padding:13px 16px; font-size:.84rem; font-weight:600; color:var(--muted); cursor:pointer; transition:all .15s; border-left:3px solid transparent; }
    .snav-item:hover { background:var(--bg-2); color:var(--ink); }
    .snav-item.active { background:var(--gold-bg); color:var(--gold); border-left-color:var(--gold); }
    .snav-item .snav-icon { font-size:1rem; width:22px; text-align:center; flex-shrink:0; }
    .snav-badge { margin-left:auto; background:var(--ink); color:#fff; font-size:.62rem; font-weight:800; padding:2px 7px; border-radius:50px; }
    .snav-badge.gold { background:var(--gold); }

    .quick-card { background:var(--ink); border-radius:14px; padding:20px; }
    .quick-card h4 { font-family:'Playfair Display',serif; font-size:.95rem; font-weight:800; color:#fff; margin-bottom:6px; }
    .quick-card p { font-size:.78rem; color:rgba(255,255,255,.45); margin-bottom:14px; line-height:1.5; }
    .quick-btn { width:100%; background:var(--gold); border:none; color:var(--ink); padding:10px; border-radius:8px; font-weight:700; font-size:.82rem; cursor:pointer; font-family:'Outfit',sans-serif; transition:all .18s; }
    .quick-btn:hover { background:var(--gold-lt); transform:translateY(-1px); }

    /* ══ MAIN CONTENT ══ */
    .main-col { display:flex; flex-direction:column; gap:24px; }

    /* ── Filter Bar ── */
    .filter-bar { background:var(--bg-3); border:1px solid var(--border); border-radius:14px; padding:16px 20px; display:flex; align-items:center; gap:12px; flex-wrap:wrap; box-shadow:var(--shadow-sm); }
    .filter-tabs { display:flex; gap:4px; background:var(--bg); border-radius:8px; padding:3px; flex-wrap:wrap; }
    .filter-tab { padding:7px 16px; border-radius:6px; font-size:.8rem; font-weight:600; border:none; background:none; color:var(--muted); cursor:pointer; font-family:'Outfit',sans-serif; transition:all .18s; white-space:nowrap; }
    .filter-tab.active { background:var(--bg-3); color:var(--ink); box-shadow:var(--shadow-sm); }
    .filter-tab:not(.active):hover { color:var(--ink); }
    .filter-count { font-size:.68rem; background:var(--border); padding:1px 6px; border-radius:50px; margin-left:4px; font-weight:700; }
    .filter-tab.active .filter-count { background:var(--gold-bg); color:var(--gold); }
    .filter-search { margin-left:auto; position:relative; }
    .filter-search input { background:var(--bg); border:1.5px solid var(--border); border-radius:8px; padding:9px 14px 9px 36px; font-size:.82rem; font-family:'Outfit',sans-serif; color:var(--text); outline:none; width:220px; transition:border-color .18s; }
    .filter-search input:focus { border-color:var(--gold); box-shadow:0 0 0 3px rgba(184,145,42,.1); }
    .filter-search::before { content:'🔍'; position:absolute; left:12px; top:50%; transform:translateY(-50%); font-size:.75rem; pointer-events:none; }
    .filter-sort { padding:8px 12px; border-radius:8px; border:1.5px solid var(--border); background:var(--bg); color:var(--text); font-size:.8rem; font-weight:600; font-family:'Outfit',sans-serif; outline:none; cursor:pointer; appearance:none; }
    .filter-sort:focus { border-color:var(--gold); }

    /* ── Booking Cards ── */
    .booking-card {
      background:var(--bg-3); border:1px solid var(--border); border-radius:18px;
      overflow:hidden; box-shadow:var(--shadow-sm);
      transition:box-shadow .22s, transform .22s; position:relative;
    }
    .booking-card:hover { box-shadow:var(--shadow-md); transform:translateY(-2px); }

    /* status accent border */
    .booking-card.status-upcoming { border-left:4px solid #3b82f6; }
    .booking-card.status-completed { border-left:4px solid var(--green); }
    .booking-card.status-cancelled { border-left:4px solid var(--red); }
    .booking-card.status-pending { border-left:4px solid var(--gold); }

    .bc-head { padding:18px 22px; display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid var(--border); background:var(--bg); gap:12px; flex-wrap:wrap; }
    .bc-ref { font-size:.72rem; font-weight:700; color:var(--muted); letter-spacing:.5px; }
    .bc-ref strong { color:var(--ink); font-size:.85rem; }
    .bc-status { display:inline-flex; align-items:center; gap:6px; padding:4px 12px; border-radius:50px; font-size:.72rem; font-weight:700; letter-spacing:.3px; text-transform:uppercase; }
    .status-upcoming .bc-status { background:var(--blue-bg); color:var(--blue); }
    .status-completed .bc-status { background:var(--green-bg); color:var(--green); }
    .status-cancelled .bc-status { background:var(--red-bg); color:var(--red); }
    .status-pending .bc-status { background:var(--gold-bg); color:var(--gold); }
    .bc-status-dot { width:6px; height:6px; border-radius:50%; background:currentColor; }
    /* pulsing dot for upcoming */
    .status-upcoming .bc-status-dot { animation:pulse-status 2s infinite; }
    @keyframes pulse-status { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(.7)} }

    .bc-head-right { display:flex; align-items:center; gap:10px; }
    .bc-date { font-size:.75rem; color:var(--muted); }
    .bc-more { background:none; border:none; cursor:pointer; color:var(--muted); font-size:1.1rem; padding:4px 8px; border-radius:6px; transition:background .15s; position:relative; }
    .bc-more:hover { background:var(--bg-2); color:var(--ink); }
    .bc-more-menu { position:absolute; right:0; top:calc(100% + 6px); background:var(--bg-3); border:1px solid var(--border); border-radius:10px; box-shadow:var(--shadow-md); padding:6px; min-width:180px; display:none; z-index:10; }
    .bc-more.open .bc-more-menu { display:block; }
    .bc-more-item { display:flex; align-items:center; gap:10px; padding:9px 12px; border-radius:7px; font-size:.82rem; color:var(--text); cursor:pointer; transition:background .15s; white-space:nowrap; }
    .bc-more-item:hover { background:var(--bg-2); }
    .bc-more-item.danger { color:var(--red); }
    .bc-more-item.danger:hover { background:var(--red-bg); }

    .bc-body { padding:22px; }
    .bc-route-row { display:flex; align-items:center; gap:16px; margin-bottom:18px; }
    .bc-city-block { }
    .bc-city-code { font-family:'Playfair Display',serif; font-size:1.9rem; font-weight:800; color:var(--ink); line-height:1; }
    .bc-city-name { font-size:.72rem; color:var(--muted); margin-top:3px; }
    .bc-middle { flex:1; display:flex; flex-direction:column; align-items:center; gap:5px; }
    .bc-timeline { width:100%; display:flex; align-items:center; gap:0; }
    .bc-tl-dot { width:8px; height:8px; border-radius:50%; border:2px solid var(--border-dk); background:var(--bg-3); flex-shrink:0; }
    .bc-tl-line { flex:1; height:1.5px; background:linear-gradient(90deg,var(--border-dk),var(--border-dk)); position:relative; }
    .bc-tl-bus { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); font-size:.8rem; }
    .bc-duration { font-size:.72rem; color:var(--muted); font-weight:600; }
    .bc-class-pill { font-size:.65rem; font-weight:700; padding:2px 8px; border-radius:4px; }
    .pill-luxury { background:var(--gold-bg); color:var(--gold); }
    .pill-premier { background:rgba(14,17,23,.07); color:var(--ink-soft); }
    .pill-economy { background:var(--green-bg); color:var(--green); }

    .bc-meta-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:0; border-top:1px solid var(--border); padding-top:16px; }
    .bc-meta-item { padding:0 0 0 0; }
    .bc-meta-item + .bc-meta-item { border-left:1px solid var(--border); padding-left:16px; }
    .bc-meta-label { font-size:.65rem; font-weight:700; text-transform:uppercase; letter-spacing:.8px; color:var(--muted-lt); margin-bottom:4px; }
    .bc-meta-val { font-size:.88rem; font-weight:700; color:var(--ink); }
    .bc-meta-val.gold { color:var(--gold); font-family:'Playfair Display',serif; }

    .bc-footer { padding:14px 22px; border-top:1px solid var(--border); background:var(--bg); display:flex; align-items:center; gap:10px; flex-wrap:wrap; }
    .bc-amenity { display:flex; align-items:center; gap:5px; font-size:.72rem; color:var(--muted); }
    .bc-action-btns { margin-left:auto; display:flex; gap:8px; }
    .bc-btn { padding:8px 18px; border-radius:8px; font-size:.8rem; font-weight:700; cursor:pointer; font-family:'Outfit',sans-serif; transition:all .18s; border:none; display:flex; align-items:center; gap:6px; white-space:nowrap; }
    .bc-btn-ghost { background:none; border:1.5px solid var(--border-dk); color:var(--ink); }
    .bc-btn-ghost:hover { border-color:var(--ink); background:var(--bg-2); }
    .bc-btn-primary { background:var(--ink); color:#fff; }
    .bc-btn-primary:hover { background:var(--ink-mid); transform:translateY(-1px); box-shadow:0 6px 18px rgba(14,17,23,.18); }
    .bc-btn-gold { background:var(--gold); color:var(--ink); }
    .bc-btn-gold:hover { background:var(--gold-lt); transform:translateY(-1px); }
    .bc-btn-danger { background:none; border:1.5px solid var(--red); color:var(--red); }
    .bc-btn-danger:hover { background:var(--red-bg); }

    /* Countdown timer */
    .bc-countdown { display:flex; align-items:center; gap:6px; font-size:.78rem; font-weight:700; color:var(--blue); background:var(--blue-bg); padding:5px 12px; border-radius:6px; }
    .bc-countdown svg { width:13px; height:13px; stroke:currentColor; fill:none; stroke-width:2; stroke-linecap:round; }

    /* ── Empty State ── */
    .empty-state { text-align:center; padding:80px 32px; background:var(--bg-3); border:1px solid var(--border); border-radius:18px; box-shadow:var(--shadow-sm); }
    .empty-icon { font-size:3.5rem; margin-bottom:16px; opacity:.6; }
    .empty-title { font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:800; color:var(--ink); margin-bottom:8px; }
    .empty-sub { font-size:.9rem; color:var(--muted); max-width:340px; margin:0 auto 24px; line-height:1.7; }
    .empty-btn { background:var(--ink); color:#fff; border:none; padding:12px 28px; border-radius:9px; font-size:.9rem; font-weight:700; cursor:pointer; font-family:'Outfit',sans-serif; transition:all .2s; display:inline-flex; align-items:center; gap:8px; }
    .empty-btn:hover { background:var(--ink-mid); transform:translateY(-2px); box-shadow:0 8px 24px rgba(14,17,23,.18); }

    /* ── Activity Feed ── */
    .activity-card { background:var(--bg-3); border:1px solid var(--border); border-radius:14px; padding:20px; box-shadow:var(--shadow-sm); }
    .activity-title { font-family:'Playfair Display',serif; font-size:.95rem; font-weight:800; color:var(--ink); margin-bottom:16px; display:flex; align-items:center; gap:8px; }
    .activity-title svg { width:16px; height:16px; fill:none; stroke:var(--gold); stroke-width:2; stroke-linecap:round; }
    .activity-list { display:flex; flex-direction:column; gap:0; }
    .activity-item { display:flex; align-items:flex-start; gap:12px; padding:10px 0; border-bottom:1px solid var(--border); }
    .activity-item:last-child { border-bottom:none; padding-bottom:0; }
    .activity-dot { width:8px; height:8px; border-radius:50%; flex-shrink:0; margin-top:5px; }
    .activity-msg { font-size:.8rem; color:var(--muted); line-height:1.6; flex:1; }
    .activity-msg strong { color:var(--ink); }
    .activity-time { font-size:.7rem; color:var(--muted-lt); flex-shrink:0; margin-top:2px; }

    /* ══ MODALS ══ */
    .modal-overlay { position:fixed; inset:0; background:rgba(14,17,23,.55); backdrop-filter:blur(6px); z-index:1000; display:flex; align-items:center; justify-content:center; opacity:0; pointer-events:none; transition:opacity .25s; padding:16px; }
    .modal-overlay.open { opacity:1; pointer-events:all; }
    .modal-box { background:var(--bg-3); border-radius:20px; width:100%; max-width:520px; box-shadow:var(--shadow-lg); transform:scale(.95) translateY(12px); transition:transform .28s cubic-bezier(.34,1.56,.64,1); position:relative; overflow:hidden; }
    .modal-overlay.open .modal-box { transform:scale(1) translateY(0); }
    .modal-box.wide { max-width:680px; }
    .modal-head { padding:22px 28px; border-bottom:1px solid var(--border); display:flex; align-items:center; justify-content:space-between; gap:12px; }
    .modal-head h3 { font-family:'Playfair Display',serif; font-size:1.2rem; font-weight:800; color:var(--ink); }
    .modal-head p { font-size:.8rem; color:var(--muted); margin-top:3px; }
    .modal-close { background:none; border:none; font-size:1.1rem; cursor:pointer; color:var(--muted); width:32px; height:32px; border-radius:50%; display:flex; align-items:center; justify-content:center; transition:background .15s; flex-shrink:0; }
    .modal-close:hover { background:var(--bg-2); }
    .modal-body { padding:24px 28px; }
    .modal-foot { padding:18px 28px; border-top:1px solid var(--border); display:flex; gap:10px; justify-content:flex-end; }

    /* Ticket modal */
    .ticket-wrap { background:var(--bg); border-radius:14px; overflow:hidden; border:1px solid var(--border); }
    .ticket-top { background:var(--ink); padding:20px 24px; display:flex; align-items:center; justify-content:space-between; }
    .ticket-logo { font-family:'Playfair Display',serif; font-size:1rem; font-weight:800; color:#fff; }
    .ticket-logo span { color:var(--gold); }
    .ticket-ref { font-size:.72rem; color:rgba(255,255,255,.4); font-family:'Outfit',sans-serif; margin-top:2px; }
    .ticket-status-badge { background:var(--green); color:#fff; font-size:.7rem; font-weight:700; padding:4px 12px; border-radius:50px; }
    .ticket-body { padding:22px 24px; }
    .ticket-route-big { display:flex; align-items:center; gap:16px; margin-bottom:20px; }
    .trbig-city { }
    .trbig-code { font-family:'Playfair Display',serif; font-size:2rem; font-weight:800; color:var(--ink); }
    .trbig-name { font-size:.75rem; color:var(--muted); margin-top:2px; }
    .trbig-mid { flex:1; display:flex; flex-direction:column; align-items:center; gap:4px; }
    .trbig-arrow { font-size:1.5rem; color:var(--gold); }
    .trbig-dur { font-size:.72rem; color:var(--muted); font-weight:600; }
    .ticket-details { display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; margin-bottom:14px; }
    .td-item .td-label { font-size:.62rem; font-weight:700; text-transform:uppercase; letter-spacing:.8px; color:var(--muted-lt); margin-bottom:3px; }
    .td-item .td-val { font-size:.9rem; font-weight:700; color:var(--ink); }
    .ticket-divider { border:none; border-top:2px dashed var(--border-dk); margin:16px -24px; position:relative; }
    .ticket-divider::before,.ticket-divider::after { content:''; position:absolute; top:50%; transform:translateY(-50%); width:16px; height:16px; background:var(--bg); border-radius:50%; border:1px solid var(--border-dk); }
    .ticket-divider::before { left:-8px; } .ticket-divider::after { right:-8px; }
    .ticket-qr { text-align:center; padding:12px 0 4px; }
    .qr-box { display:inline-block; background:#fff; border:1px solid var(--border); padding:12px; border-radius:10px; margin-bottom:8px; }
    .qr-canvas { display:grid; grid-template-columns:repeat(7,6px); gap:1px; }
    .qr-c { width:6px; height:6px; border-radius:1px; }
    .qr-c.b { background:var(--ink); }
    .ticket-qr-label { font-size:.7rem; color:var(--muted); }
    .ticket-note { font-size:.73rem; color:var(--muted); text-align:center; line-height:1.7; padding-top:10px; border-top:1px solid var(--border); }

    /* Reschedule modal */
    .resc-info { background:var(--gold-bg); border:1px solid var(--gold-line); border-radius:10px; padding:14px; font-size:.82rem; color:var(--muted); line-height:1.6; margin-bottom:20px; }
    .resc-info strong { color:var(--gold); }
    .form-field { display:flex; flex-direction:column; gap:6px; margin-bottom:14px; }
    .form-field label { font-size:.68rem; font-weight:700; text-transform:uppercase; letter-spacing:1px; color:var(--muted); }
    .form-field select, .form-field input { background:var(--bg); border:1.5px solid var(--border); border-radius:10px; padding:12px 14px; color:var(--text); font-size:.9rem; font-family:'Outfit',sans-serif; outline:none; transition:border-color .18s,box-shadow .18s; appearance:none; width:100%; }
    .form-field select:focus, .form-field input:focus { border-color:var(--gold); box-shadow:0 0 0 3px rgba(184,145,42,.12); }
    .trip-options { display:flex; flex-direction:column; gap:8px; margin-top:14px; }
    .trip-option { border:1.5px solid var(--border); border-radius:10px; padding:14px 16px; cursor:pointer; display:flex; align-items:center; gap:14px; transition:all .18s; }
    .trip-option:hover { border-color:var(--border-dk); }
    .trip-option.selected { border-color:var(--gold); background:var(--gold-bg); }
    .trip-option input[type=radio] { accent-color:var(--gold); width:16px; height:16px; flex-shrink:0; cursor:pointer; }
    .to-time { font-family:'Playfair Display',serif; font-size:1.1rem; font-weight:800; color:var(--ink); }
    .to-meta { font-size:.75rem; color:var(--muted); margin-top:2px; }
    .to-price { margin-left:auto; font-family:'Playfair Display',serif; font-size:1.1rem; font-weight:800; color:var(--gold); }
    .to-avail { font-size:.68rem; color:var(--green); margin-top:2px; text-align:right; }

    /* Cancel modal */
    .cancel-warn { background:var(--red-bg); border:1px solid rgba(192,57,43,.2); border-radius:10px; padding:14px; font-size:.82rem; color:var(--muted); line-height:1.6; margin-bottom:20px; }
    .cancel-warn strong { color:var(--red); }
    .cancel-policy { font-size:.82rem; color:var(--muted); line-height:1.7; }
    .cancel-policy li { margin-bottom:6px; padding-left:4px; }
    .cancel-reason { display:flex; flex-direction:column; gap:6px; }
    .cancel-reason label { display:flex; align-items:center; gap:10px; padding:10px 14px; border:1.5px solid var(--border); border-radius:8px; cursor:pointer; font-size:.84rem; color:var(--text); transition:all .15s; }
    .cancel-reason label:hover { border-color:var(--border-dk); background:var(--bg-2); }
    .cancel-reason input[type=radio] { accent-color:var(--red); width:15px; height:15px; }

    /* Rating modal */
    .stars-row { display:flex; gap:8px; justify-content:center; margin:16px 0; }
    .star-btn { font-size:2rem; cursor:pointer; transition:transform .15s; background:none; border:none; line-height:1; }
    .star-btn:hover, .star-btn.active { transform:scale(1.2); filter:drop-shadow(0 0 6px rgba(184,145,42,.5)); }
    .rating-aspects { display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-bottom:16px; }
    .aspect-item { border:1.5px solid var(--border); border-radius:8px; padding:10px 12px; }
    .aspect-label { font-size:.72rem; color:var(--muted); margin-bottom:6px; font-weight:600; }
    .aspect-stars { display:flex; gap:3px; }
    .asp-star { font-size:1rem; cursor:pointer; transition:transform .12s; }
    .asp-star:hover { transform:scale(1.15); }
    .review-textarea { width:100%; background:var(--bg); border:1.5px solid var(--border); border-radius:10px; padding:12px 14px; font-size:.88rem; font-family:'Outfit',sans-serif; color:var(--text); outline:none; resize:vertical; min-height:80px; transition:border-color .18s; }
    .review-textarea:focus { border-color:var(--gold); box-shadow:0 0 0 3px rgba(184,145,42,.1); }

    /* ══ MODAL FOOTER BTNS ══ */
    .mf-btn { padding:10px 22px; border-radius:9px; font-size:.88rem; font-weight:700; cursor:pointer; font-family:'Outfit',sans-serif; transition:all .18s; border:none; }
    .mf-btn-ghost { background:none; border:1.5px solid var(--border-dk); color:var(--ink); }
    .mf-btn-ghost:hover { border-color:var(--ink); background:var(--bg-2); }
    .mf-btn-primary { background:var(--ink); color:#fff; }
    .mf-btn-primary:hover { background:var(--ink-mid); transform:translateY(-1px); box-shadow:0 6px 18px rgba(14,17,23,.18); }
    .mf-btn-gold { background:var(--gold); color:var(--ink); }
    .mf-btn-gold:hover { background:var(--gold-lt); }
    .mf-btn-danger { background:var(--red); color:#fff; }
    .mf-btn-danger:hover { filter:brightness(1.1); }

    /* ══ TOAST ══ */
    .toast { position:fixed; bottom:32px; right:32px; z-index:9999; background:var(--ink); color:#fff; padding:14px 22px; border-radius:12px; font-size:.88rem; font-weight:600; box-shadow:var(--shadow-lg); display:flex; align-items:center; gap:10px; transform:translateY(80px); opacity:0; transition:all .3s cubic-bezier(.34,1.56,.64,1); pointer-events:none; }
    .toast.show { transform:translateY(0); opacity:1; }

    /* ══ REVEAL ══ */
    .reveal { opacity:0; transform:translateY(16px); transition:opacity .4s ease,transform .4s ease; }
    .reveal.in { opacity:1; transform:none; }

    /* ══ RESPONSIVE ══ */
    @media (max-width:900px) { .page-body { grid-template-columns:1fr; } .sidebar { position:static; } }
    @media (max-width:640px) {
      .nav-links, .nav-right { display:none; }
      .page-body { padding:24px 16px 60px; }
      .bc-meta-grid { grid-template-columns:1fr 1fr; }
      .bc-meta-item:nth-child(3) { border-left:none; }
      .filter-bar { gap:8px; }
      .filter-search input { width:140px; }
      .ticket-details { grid-template-columns:1fr 1fr; }
    }
  </style>
@endpush

@section('content')

<!-- ══ PAGE HEADER ══ -->
<div class="page-header">
  <div class="ph-inner">
    <div>
      <nav class="breadcrumb">
        <a href="{{ route('landing.home') }}">Home</a>
        <span class="sep">/</span>
        <span class="cur">My Bookings</span>
      </nav>
      <div class="ph-eyebrow">Passenger Dashboard</div>
      <h1 class="ph-heading">My <em>Bookings</em></h1>
      <p class="ph-sub">Manage all your trips, download e-tickets, reschedule, and track your travel history.</p>
    </div>
    <div class="ph-stats">
      <div class="ph-stat"><span class="dot dot-upcoming"></span>2 Upcoming</div>
      <div class="ph-stat"><span class="dot dot-completed"></span>5 Completed</div>
      <div class="ph-stat"><span class="dot dot-cancelled"></span>1 Cancelled</div>
    </div>
  </div>
</div>

<!-- ══ BODY ══ -->
<div class="page-body">

  <!-- ── SIDEBAR ── -->
  <aside class="sidebar">

    <!-- Profile Card -->
    <div class="profile-card reveal in">
      <div class="profile-card-head">
        <div class="profile-avatar">JD</div>
        <div class="profile-name">Juan dela Cruz</div>
        <div class="profile-email">juan@email.com</div>
        <div class="profile-verified">✓ Verified Account</div>
      </div>
      <div class="profile-card-body">
        <div class="profile-stat-row">
          <div class="profile-stat">
            <div class="profile-stat-num">8</div>
            <div class="profile-stat-label">Trips</div>
          </div>
          <div class="profile-stat">
            <div class="profile-stat-num">₱4.2k</div>
            <div class="profile-stat-label">Spent</div>
          </div>
          <div class="profile-stat">
            <div class="profile-stat-num">4.9</div>
            <div class="profile-stat-label">Rating</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar Nav -->
    <div class="sidebar-nav reveal in">
      <div class="snav-item active" id="snav-bookings" onclick="showSideNav('bookings')">
        <span class="snav-icon">🎫</span> My Bookings
        <span class="snav-badge">8</span>
      </div>
      <div class="snav-item" id="snav-upcoming" onclick="showSideNav('upcoming')">
        <span class="snav-icon">📅</span> Upcoming Trips
        <span class="snav-badge gold">2</span>
      </div>
      <div class="snav-item" id="snav-history" onclick="showSideNav('history')">
        <span class="snav-icon">🕐</span> Travel History
      </div>
      <div class="snav-item" id="snav-profile" onclick="showSideNav('profile')">
        <span class="snav-icon">👤</span> My Profile
      </div>
      <div class="snav-item" id="snav-saved" onclick="showSideNav('saved')">
        <span class="snav-icon">❤️</span> Saved Routes
      </div>
      <div class="snav-item" onclick="showToast('🔔','Notification settings coming soon.')">
        <span class="snav-icon">🔔</span> Notifications
      </div>
      <div class="snav-item" onclick="showToast('🎟','Promo wallet coming soon.')">
        <span class="snav-icon">🎟</span> Promo Wallet
        <span class="snav-badge gold">1</span>
      </div>
      <div class="snav-item" onclick="showToast('👋','You have been signed out.')">
        <span class="snav-icon">🚪</span> Sign Out
      </div>
    </div>

    <!-- Quick Book -->
    <div class="quick-card reveal in">
      <h4>Quick Book</h4>
      <p>Your most booked route:<br><strong style="color:var(--gold-lt)">Manila → Baguio</strong></p>
      <button class="quick-btn" onclick="showToast('🎫','Opening booking for Manila → Baguio...')">Book Again →</button>
    </div>

  </aside>

  <!-- ── MAIN CONTENT ── -->
  <div class="main-col" id="main-col">

    <!-- Filter Bar -->
    <div class="filter-bar reveal in" id="filter-bar">
      <div class="filter-tabs" id="filter-tabs">
        <button class="filter-tab active" onclick="filterBookings('all',this)">All <span class="filter-count">8</span></button>
        <button class="filter-tab" onclick="filterBookings('upcoming',this)">Upcoming <span class="filter-count">2</span></button>
        <button class="filter-tab" onclick="filterBookings('completed',this)">Completed <span class="filter-count">5</span></button>
        <button class="filter-tab" onclick="filterBookings('cancelled',this)">Cancelled <span class="filter-count">1</span></button>
        <button class="filter-tab" onclick="filterBookings('pending',this)">Pending <span class="filter-count">0</span></button>
      </div>
      <div class="filter-search">
        <input type="text" placeholder="Search by ref, route…" oninput="searchBookings(this.value)" id="search-input"/>
      </div>
      <select class="filter-sort" onchange="sortBookings(this.value)">
        <option value="newest">Newest First</option>
        <option value="oldest">Oldest First</option>
        <option value="departure">By Departure</option>
        <option value="price">By Price</option>
      </select>
    </div>

    <!-- Booking Cards Container -->
    <div id="bookings-container"></div>

    <!-- Activity Feed (shown in bookings view) -->
    <div class="activity-card reveal in" id="activity-feed">
      <div class="activity-title">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
        Recent Activity
      </div>
      <div class="activity-list">
        <div class="activity-item">
          <div class="activity-dot" style="background:#3b82f6"></div>
          <div class="activity-msg">E-ticket for <strong>VPH-2026-8437</strong> (Manila → Baguio) downloaded.</div>
          <div class="activity-time">2 hrs ago</div>
        </div>
        <div class="activity-item">
          <div class="activity-dot" style="background:var(--green)"></div>
          <div class="activity-msg">Booking <strong>VPH-2026-7201</strong> confirmed. Payment of <strong>₱1,050</strong> received.</div>
          <div class="activity-time">3 days ago</div>
        </div>
        <div class="activity-item">
          <div class="activity-dot" style="background:var(--gold)"></div>
          <div class="activity-msg">Promo code <strong>VOYAGE30</strong> applied — saved ₱204 on booking VPH-2026-8437.</div>
          <div class="activity-time">3 days ago</div>
        </div>
        <div class="activity-item">
          <div class="activity-dot" style="background:var(--red)"></div>
          <div class="activity-msg">Booking <strong>VPH-2026-5512</strong> cancelled. Refund of ₱620 initiated.</div>
          <div class="activity-time">1 week ago</div>
        </div>
        <div class="activity-item">
          <div class="activity-dot" style="background:var(--green)"></div>
          <div class="activity-msg">Trip <strong>VPH-2026-4409</strong> completed. Please leave a review!</div>
          <div class="activity-time">2 weeks ago</div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ══ TICKET MODAL ══ -->
<div class="modal-overlay" id="ticket-modal" onclick="closeModal('ticket-modal',event)">
  <div class="modal-box wide">
    <div class="modal-head">
      <div><h3>E-Ticket</h3><p id="tkt-modal-ref">Booking Reference</p></div>
      <button class="modal-close" onclick="closeModalById('ticket-modal')">✕</button>
    </div>
    <div class="modal-body">
      <div class="ticket-wrap">
        <div class="ticket-top">
          <div>
            <div class="ticket-logo">Voyage<span>PH</span></div>
            <div class="ticket-ref" id="tkt-ref-display">REF: —</div>
          </div>
          <div class="ticket-status-badge">✓ Confirmed</div>
        </div>
        <div class="ticket-body">
          <div class="ticket-route-big">
            <div class="trbig-city">
              <div class="trbig-code" id="tkt-from-code">MNL</div>
              <div class="trbig-name" id="tkt-from-name">Manila, Cubao</div>
            </div>
            <div class="trbig-mid">
              <div class="trbig-arrow">✈</div>
              <div class="trbig-dur" id="tkt-duration">6h 30m</div>
            </div>
            <div class="trbig-city" style="text-align:right;">
              <div class="trbig-code" id="tkt-to-code">BAG</div>
              <div class="trbig-name" id="tkt-to-name">Baguio City</div>
            </div>
          </div>
          <div class="ticket-details">
            <div class="td-item"><div class="td-label">Departure</div><div class="td-val" id="tkt-dep">06:00 AM</div></div>
            <div class="td-item"><div class="td-label">Arrival</div><div class="td-val" id="tkt-arr">12:30 PM</div></div>
            <div class="td-item"><div class="td-label">Date</div><div class="td-val" id="tkt-date">—</div></div>
            <div class="td-item"><div class="td-label">Operator</div><div class="td-val" id="tkt-operator">VoyagePH Express</div></div>
            <div class="td-item"><div class="td-label">Seat</div><div class="td-val" id="tkt-seat">—</div></div>
            <div class="td-item"><div class="td-label">Class</div><div class="td-val" id="tkt-class">Premier</div></div>
            <div class="td-item"><div class="td-label">Passenger</div><div class="td-val" id="tkt-pax">Juan dela Cruz</div></div>
            <div class="td-item"><div class="td-label">Amount Paid</div><div class="td-val" id="tkt-paid" style="color:var(--gold);">—</div></div>
            <div class="td-item"><div class="td-label">Status</div><div class="td-val" style="color:var(--green);">✓ Paid</div></div>
          </div>
          <hr class="ticket-divider"/>
          <div class="ticket-qr">
            <div class="qr-box">
              <div class="qr-canvas" id="qr-canvas"></div>
            </div>
            <div class="ticket-qr-label">Scan at boarding terminal</div>
          </div>
          <div class="ticket-note">
            Present this e-ticket (print or digital) at the boarding counter.<br>
            Arrive at least <strong>30 minutes</strong> before departure. Valid ID required.
          </div>
        </div>
      </div>
    </div>
    <div class="modal-foot">
      <button class="mf-btn mf-btn-ghost" onclick="closeModalById('ticket-modal')">Close</button>
      <button class="mf-btn mf-btn-primary" onclick="printTicket()">🖨 Print Ticket</button>
      <button class="mf-btn mf-btn-gold" onclick="downloadTicket()">⬇ Download PDF</button>
    </div>
  </div>
</div>

<!-- ══ RESCHEDULE MODAL ══ -->
<div class="modal-overlay" id="resc-modal" onclick="closeModal('resc-modal',event)">
  <div class="modal-box wide">
    <div class="modal-head">
      <div><h3>Reschedule Trip</h3><p id="resc-ref-label">Select a new date and departure time</p></div>
      <button class="modal-close" onclick="closeModalById('resc-modal')">✕</button>
    </div>
    <div class="modal-body">
      <div class="resc-info">⚠ <strong>Free rescheduling</strong> is available up to 24 hours before departure. Rescheduling within 24 hours incurs a <strong>₱100 rebooking fee</strong>. Fare difference applies if upgrading class or operator.</div>
      <div class="form-field">
        <label>New Departure Date</label>
        <input type="date" id="resc-date" onchange="loadRescTrips()"/>
      </div>
      <div id="resc-trips" style="display:none;">
        <div style="font-size:.8rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--muted);margin-bottom:10px;">Available Departures</div>
        <div class="trip-options">
          <label class="trip-option selected">
            <input type="radio" name="resc-trip" value="0600" checked/>
            <div><div class="to-time">06:00 AM</div><div class="to-meta">VoyagePH Express · Premier · Direct</div></div>
            <div><div class="to-price">₱680</div><div class="to-avail">✓ 8 seats left</div></div>
          </label>
          <label class="trip-option">
            <input type="radio" name="resc-trip" value="0900"/>
            <div><div class="to-time">09:00 AM</div><div class="to-meta">Victory Liner · Economy · Direct</div></div>
            <div><div class="to-price">₱420</div><div class="to-avail">✓ 22 seats left</div></div>
          </label>
          <label class="trip-option">
            <input type="radio" name="resc-trip" value="1300"/>
            <div><div class="to-time">01:00 PM</div><div class="to-meta">Genesis Transport · Luxury · Direct</div></div>
            <div><div class="to-price">₱1,050</div><div class="to-avail">✓ 5 seats left</div></div>
          </label>
          <label class="trip-option">
            <input type="radio" name="resc-trip" value="2200"/>
            <div><div class="to-time">10:00 PM</div><div class="to-meta">Partas Liner · Premier · Overnight</div></div>
            <div><div class="to-price">₱620</div><div class="to-avail" style="color:var(--red);">⚠ 3 seats left</div></div>
          </label>
        </div>
      </div>
    </div>
    <div class="modal-foot">
      <button class="mf-btn mf-btn-ghost" onclick="closeModalById('resc-modal')">Cancel</button>
      <button class="mf-btn mf-btn-gold" onclick="confirmReschedule()">Confirm Reschedule →</button>
    </div>
  </div>
</div>

<!-- ══ CANCEL MODAL ══ -->
<div class="modal-overlay" id="cancel-modal" onclick="closeModal('cancel-modal',event)">
  <div class="modal-box">
    <div class="modal-head">
      <div><h3>Cancel Booking</h3><p id="cancel-ref-label">This action cannot be undone</p></div>
      <button class="modal-close" onclick="closeModalById('cancel-modal')">✕</button>
    </div>
    <div class="modal-body">
      <div class="cancel-warn">⚠ <strong>Cancellation Policy:</strong> Free cancellation up to 24 hours before departure. Within 24 hours, a ₱150 cancellation fee applies.</div>
      <div style="margin-bottom:16px;">
        <div style="font-size:.8rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--muted);margin-bottom:10px;">Refund Estimate</div>
        <div style="background:var(--bg);border:1px solid var(--border);border-radius:10px;padding:14px;display:flex;justify-content:space-between;align-items:center;">
          <div>
            <div style="font-size:.82rem;color:var(--muted);">Original fare</div>
            <div style="font-size:.82rem;color:var(--muted);">Cancellation fee</div>
            <div style="font-size:.9rem;font-weight:700;color:var(--ink);margin-top:6px;border-top:1px solid var(--border);padding-top:6px;">Refund amount</div>
          </div>
          <div style="text-align:right;">
            <div style="font-size:.82rem;color:var(--ink);" id="cancel-orig">—</div>
            <div style="font-size:.82rem;color:var(--red);">−₱0.00</div>
            <div style="font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:800;color:var(--green);margin-top:6px;border-top:1px solid var(--border);padding-top:6px;" id="cancel-refund">—</div>
          </div>
        </div>
        <div style="font-size:.73rem;color:var(--muted);margin-top:8px;">Refund will be credited within 3–5 business days to your original payment method.</div>
      </div>
      <div style="font-size:.8rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--muted);margin-bottom:10px;">Reason for Cancellation</div>
      <div class="cancel-reason">
        <label><input type="radio" name="cancel-reason" value="plans" checked/> Change of plans</label>
        <label><input type="radio" name="cancel-reason" value="emergency"/> Emergency / personal reasons</label>
        <label><input type="radio" name="cancel-reason" value="schedule"/> Schedule conflict</label>
        <label><input type="radio" name="cancel-reason" value="other"/> Other reason</label>
      </div>
    </div>
    <div class="modal-foot">
      <button class="mf-btn mf-btn-ghost" onclick="closeModalById('cancel-modal')">Keep Booking</button>
      <button class="mf-btn mf-btn-danger" onclick="confirmCancel()">Yes, Cancel Booking</button>
    </div>
  </div>
</div>

<!-- ══ RATING MODAL ══ -->
<div class="modal-overlay" id="rating-modal" onclick="closeModal('rating-modal',event)">
  <div class="modal-box">
    <div class="modal-head">
      <div><h3>Rate Your Trip</h3><p id="rating-ref-label">How was your journey?</p></div>
      <button class="modal-close" onclick="closeModalById('rating-modal')">✕</button>
    </div>
    <div class="modal-body">
      <div style="text-align:center;margin-bottom:8px;font-size:.85rem;color:var(--muted);" id="rating-trip-label">Manila → Baguio</div>
      <div style="text-align:center;font-size:.8rem;font-weight:700;color:var(--muted);letter-spacing:.5px;text-transform:uppercase;margin-bottom:4px;">Overall Experience</div>
      <div class="stars-row" id="main-stars">
        <button class="star-btn active" data-val="1" onclick="setMainRating(1)">⭐</button>
        <button class="star-btn active" data-val="2" onclick="setMainRating(2)">⭐</button>
        <button class="star-btn active" data-val="3" onclick="setMainRating(3)">⭐</button>
        <button class="star-btn active" data-val="4" onclick="setMainRating(4)">⭐</button>
        <button class="star-btn" data-val="5" onclick="setMainRating(5)">☆</button>
      </div>
      <div style="text-align:center;font-size:.8rem;color:var(--muted);margin-bottom:18px;" id="rating-label-text">Very Good</div>
      <div class="rating-aspects">
        <div class="aspect-item">
          <div class="aspect-label">Comfort</div>
          <div class="aspect-stars" id="asp-comfort" data-val="4">⭐⭐⭐⭐☆</div>
        </div>
        <div class="aspect-item">
          <div class="aspect-label">Punctuality</div>
          <div class="aspect-stars" id="asp-punctuality" data-val="5">⭐⭐⭐⭐⭐</div>
        </div>
        <div class="aspect-item">
          <div class="aspect-label">Driver</div>
          <div class="aspect-stars" id="asp-driver" data-val="4">⭐⭐⭐⭐☆</div>
        </div>
        <div class="aspect-item">
          <div class="aspect-label">Cleanliness</div>
          <div class="aspect-stars" id="asp-clean" data-val="4">⭐⭐⭐⭐☆</div>
        </div>
      </div>
      <div style="margin-bottom:6px;font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.8px;color:var(--muted);">Write a Review (optional)</div>
      <textarea class="review-textarea" id="review-text" placeholder="Share your experience to help other passengers…"></textarea>
    </div>
    <div class="modal-foot">
      <button class="mf-btn mf-btn-ghost" onclick="closeModalById('rating-modal')">Skip</button>
      <button class="mf-btn mf-btn-gold" onclick="submitRating()">⭐ Submit Rating</button>
    </div>
  </div>
</div>

<!-- Toast -->
<div class="toast" id="toast"><span id="ti">✓</span>&nbsp;<span id="tm">Done!</span></div>

@endsection

@push('scripts')
<script>
/* ══════════════════════════════════════
   DATA
══════════════════════════════════════ */
const bookings = [
  {
    id: 'VPH-2026-8437', status: 'upcoming',
    from:'Manila, Cubao', fromCode:'MNL', to:'Baguio City', toCode:'BAG',
    dep:'06:00 AM', arr:'12:30 PM', date:'Apr 5, 2026', dateISO:'2026-04-05',
    dur:'6h 30m', operator:'VoyagePH Express', seat:'7C', cls:'Premier',
    pax:'Juan dela Cruz', paid:'₱476.00', amenities:['WiFi','Reclining Seat','AC','USB'],
    countdown: true
  },
  {
    id: 'VPH-2026-7201', status: 'upcoming',
    from:'Manila, Cubao', fromCode:'MNL', to:'Vigan, Ilocos Sur', toCode:'VIG',
    dep:'10:00 PM', arr:'06:00 AM', date:'Apr 12, 2026', dateISO:'2026-04-12',
    dur:'8h 00m', operator:'Genesis Transport', seat:'3A', cls:'Luxury',
    pax:'Juan dela Cruz', paid:'₱1,050.00', amenities:['WiFi','Lie-flat Seat','Meal','Blanket'],
    countdown: false
  },
  {
    id: 'VPH-2026-6088', status: 'completed',
    from:'Manila, Cubao', fromCode:'MNL', to:'Baguio City', toCode:'BAG',
    dep:'06:00 AM', arr:'12:30 PM', date:'Mar 15, 2026', dateISO:'2026-03-15',
    dur:'6h 30m', operator:'VoyagePH Express', seat:'5B', cls:'Premier',
    pax:'Juan dela Cruz', paid:'₱680.00', amenities:['WiFi','Reclining Seat','AC'],
    rated: false
  },
  {
    id: 'VPH-2026-4409', status: 'completed',
    from:'Baguio City', fromCode:'BAG', to:'Manila, Cubao', toCode:'MNL',
    dep:'07:00 AM', arr:'01:30 PM', date:'Mar 18, 2026', dateISO:'2026-03-18',
    dur:'6h 30m', operator:'Victory Liner', seat:'12D', cls:'Economy',
    pax:'Juan dela Cruz', paid:'₱420.00', amenities:['AC','Comfortable Seats'],
    rated: true
  },
  {
    id: 'VPH-2026-3301', status: 'completed',
    from:'Manila, Pasay', fromCode:'PSY', to:'Laoag, Ilocos Norte', toCode:'LAO',
    dep:'09:00 PM', arr:'09:00 AM', date:'Feb 20, 2026', dateISO:'2026-02-20',
    dur:'12h 00m', operator:'Partas Liner', seat:'2C', cls:'Premier',
    pax:'Juan dela Cruz', paid:'₱620.00', amenities:['WiFi','Reclining Seat','Blanket'],
    rated: true
  },
  {
    id: 'VPH-2026-2215', status: 'completed',
    from:'Manila, Cubao', fromCode:'MNL', to:'Dagupan City', toCode:'DAG',
    dep:'08:00 AM', arr:'12:00 PM', date:'Jan 30, 2026', dateISO:'2026-01-30',
    dur:'4h 00m', operator:'Five Star Bus', seat:'9A', cls:'Economy',
    pax:'Juan dela Cruz', paid:'₱280.00', amenities:['AC'],
    rated: true
  },
  {
    id: 'VPH-2026-1109', status: 'completed',
    from:'Quezon City', fromCode:'QC', to:'Tuguegarao, Cagayan', toCode:'TUG',
    dep:'10:00 PM', arr:'07:00 AM', date:'Jan 10, 2026', dateISO:'2026-01-10',
    dur:'9h 00m', operator:'Dominion Bus Lines', seat:'6B', cls:'Economy',
    pax:'Juan dela Cruz', paid:'₱490.00', amenities:['AC','Reclining Seat'],
    rated: true
  },
  {
    id: 'VPH-2026-5512', status: 'cancelled',
    from:'Manila, Cubao', fromCode:'MNL', to:'Cabanatuan, Nueva Ecija', toCode:'CAB',
    dep:'08:00 AM', arr:'11:30 AM', date:'Mar 28, 2026', dateISO:'2026-03-28',
    dur:'3h 30m', operator:'Five Star Bus', seat:'—', cls:'Economy',
    pax:'Juan dela Cruz', paid:'₱153.00', amenities:['AC'],
    cancelledReason:'Change of plans'
  }
];

let activeFilter = 'all';
let searchQuery = '';
let sortOrder = 'newest';
let activeCancelId = null;
let activeRescId = null;
let mainRating = 4;

/* ══════════════════════════════════════
   RENDER
══════════════════════════════════════ */
function getFiltered() {
  let list = bookings;
  if (activeFilter !== 'all') list = list.filter(b => b.status === activeFilter);
  if (searchQuery) {
    const q = searchQuery.toLowerCase();
    list = list.filter(b => b.id.toLowerCase().includes(q) || b.from.toLowerCase().includes(q) || b.to.toLowerCase().includes(q) || b.operator.toLowerCase().includes(q));
  }
  if (sortOrder === 'oldest') list = [...list].reverse();
  if (sortOrder === 'departure') list = [...list].sort((a,b) => new Date(a.dateISO) - new Date(b.dateISO));
  if (sortOrder === 'price') list = [...list].sort((a,b) => parseFloat(b.paid.replace(/[₱,]/g,'')) - parseFloat(a.paid.replace(/[₱,]/g,'')));
  return list;
}

function renderBookings() {
  const container = document.getElementById('bookings-container');
  const list = getFiltered();
  if (list.length === 0) {
    container.innerHTML = `
      <div class="empty-state reveal in">
        <div class="empty-icon">🎫</div>
        <div class="empty-title">No Bookings Found</div>
        <div class="empty-sub">No bookings match your current filter. Try a different category or search term.</div>
        <button class="empty-btn" onclick="filterBookings('all',document.querySelector('.filter-tab'))">
          View All Bookings
        </button>
      </div>`;
    return;
  }
  container.innerHTML = list.map(b => renderCard(b)).join('');

  // Setup countdown timers for upcoming
  list.filter(b => b.countdown).forEach(b => startCountdown(b));
}

function renderCard(b) {
  const isUpcoming = b.status === 'upcoming';
  const isCompleted = b.status === 'completed';
  const isCancelled = b.status === 'cancelled';

  const statusLabel = { upcoming:'Upcoming', completed:'Completed', cancelled:'Cancelled', pending:'Pending' }[b.status];
  const amenityIcons = { WiFi:'📶', 'Reclining Seat':'💺', 'Lie-flat Seat':'🛏', AC:'❄️', USB:'🔌', Meal:'🍱', Blanket:'🛡', 'Comfortable Seats':'💺' };

  const actions = () => {
    if (isUpcoming) return `
      <div class="bc-countdown" id="cd-${b.id}">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
        <span>Loading…</span>
      </div>
      <div class="bc-action-btns">
        <button class="bc-btn bc-btn-ghost" onclick="openTicket('${b.id}')">🎫 E-Ticket</button>
        <button class="bc-btn bc-btn-ghost" onclick="openReschedule('${b.id}')">📅 Reschedule</button>
        <button class="bc-btn bc-btn-primary" onclick="showToast('📍','Tracking bus for ${b.id}...')">📍 Track Bus</button>
      </div>`;
    if (isCompleted) return `
      <div class="bc-action-btns">
        <button class="bc-btn bc-btn-ghost" onclick="openTicket('${b.id}')">🎫 E-Ticket</button>
        ${!b.rated ? `<button class="bc-btn bc-btn-gold" onclick="openRating('${b.id}')">⭐ Rate Trip</button>` : `<button class="bc-btn bc-btn-ghost" style="cursor:default;opacity:.6;">⭐ Rated</button>`}
        <button class="bc-btn bc-btn-primary" onclick="showToast('🎫','Rebooking ${b.from} → ${b.to}...')">Book Again</button>
      </div>`;
    if (isCancelled) return `
      <div style="font-size:.78rem;color:var(--red);display:flex;align-items:center;gap:6px;">
        ✕ Cancelled &nbsp;·&nbsp; Reason: ${b.cancelledReason || '—'}
      </div>
      <div class="bc-action-btns">
        <button class="bc-btn bc-btn-primary" onclick="showToast('🎫','Rebooking ${b.from} → ${b.to}...')">Book Again</button>
      </div>`;
    return '';
  };

  return `
  <div class="booking-card status-${b.status} reveal in">
    <div class="bc-head">
      <div class="bc-ref">Booking Ref <strong>${b.id}</strong></div>
      <div class="bc-head-right">
        <span class="bc-date">📅 ${b.date}</span>
        <div class="bc-status"><span class="bc-status-dot"></span>${statusLabel}</div>
        <div class="bc-more" onclick="toggleMore(this)">
          ⋯
          <div class="bc-more-menu" onclick="event.stopPropagation()">
            <div class="bc-more-item" onclick="openTicket('${b.id}')">🎫 View E-Ticket</div>
            <div class="bc-more-item" onclick="copyRef('${b.id}')">📋 Copy Reference</div>
            ${isUpcoming ? `<div class="bc-more-item" onclick="openReschedule('${b.id}')">📅 Reschedule</div>` : ''}
            ${isUpcoming ? `<div class="bc-more-item" onclick="openCancel('${b.id}')">✕ Cancel Booking</div>` : ''}
            <div class="bc-more-item" onclick="showToast('📧','Receipt sent to your email.')">📧 Email Receipt</div>
            ${isCompleted && !b.rated ? `<div class="bc-more-item" onclick="openRating('${b.id}')">⭐ Rate Trip</div>` : ''}
            ${isCancelled ? `<div class="bc-more-item" onclick="showToast('🎫','Rebooking...')">🔁 Book Again</div>` : ''}
          </div>
        </div>
      </div>
    </div>
    <div class="bc-body">
      <div class="bc-route-row">
        <div class="bc-city-block">
          <div class="bc-city-code">${b.fromCode}</div>
          <div class="bc-city-name">${b.from}</div>
        </div>
        <div class="bc-middle">
          <div class="bc-timeline">
            <div class="bc-tl-dot"></div>
            <div class="bc-tl-line"><div class="bc-tl-bus">🚌</div></div>
            <div class="bc-tl-dot"></div>
          </div>
          <div class="bc-duration">${b.dur} &nbsp;·&nbsp; <span class="bc-class-pill pill-${b.cls.toLowerCase()}">${b.cls}</span></div>
        </div>
        <div class="bc-city-block" style="text-align:right;">
          <div class="bc-city-code">${b.toCode}</div>
          <div class="bc-city-name">${b.to}</div>
        </div>
      </div>
      <div class="bc-meta-grid">
        <div class="bc-meta-item">
          <div class="bc-meta-label">Departure</div>
          <div class="bc-meta-val">${b.dep}</div>
        </div>
        <div class="bc-meta-item">
          <div class="bc-meta-label">Arrival</div>
          <div class="bc-meta-val">${b.arr}</div>
        </div>
        <div class="bc-meta-item">
          <div class="bc-meta-label">Operator</div>
          <div class="bc-meta-val" style="font-size:.8rem;">${b.operator}</div>
        </div>
        <div class="bc-meta-item">
          <div class="bc-meta-label">Seat · Total Paid</div>
          <div class="bc-meta-val">${b.seat} &nbsp;<span class="bc-meta-val gold">${b.paid}</span></div>
        </div>
      </div>
    </div>
    <div class="bc-footer">
      ${b.amenities.map(a => `<span class="bc-amenity">${amenityIcons[a] || '✓'} ${a}</span>`).join('')}
      ${actions()}
    </div>
  </div>`;
}

/* ══════════════════════════════════════
   COUNTDOWN TIMERS
══════════════════════════════════════ */
function startCountdown(booking) {
  const el = document.getElementById('cd-' + booking.id);
  if (!el) return;
  const depDate = new Date(booking.dateISO + ' ' + booking.dep);

  function update() {
    const now = new Date();
    const diff = depDate - now;
    if (diff <= 0) { el.innerHTML = `<svg viewBox="0 0 24 24" style="width:13px;height:13px;stroke:var(--green);fill:none;stroke-width:2;stroke-linecap:round;"><path d="M20 6L9 17l-5-5"/></svg> Departed`; el.style.color = 'var(--green)'; el.style.background = 'var(--green-bg)'; return; }
    const days = Math.floor(diff / 86400000);
    const hours = Math.floor((diff % 86400000) / 3600000);
    const mins = Math.floor((diff % 3600000) / 60000);
    el.querySelector('span').textContent = days > 0 ? `${days}d ${hours}h ${mins}m` : `${hours}h ${mins}m until departure`;
  }
  update();
  setInterval(update, 60000);
}

/* ══════════════════════════════════════
   FILTERS & SEARCH
══════════════════════════════════════ */
function filterBookings(filter, btn) {
  activeFilter = filter;
  document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
  if (btn) btn.classList.add('active');
  renderBookings();
}
function searchBookings(q) {
  searchQuery = q.trim();
  renderBookings();
}
function sortBookings(val) {
  sortOrder = val;
  renderBookings();
}

/* ══════════════════════════════════════
   SIDEBAR NAV
══════════════════════════════════════ */
function showSideNav(view) {
  document.querySelectorAll('.snav-item').forEach(i => i.classList.remove('active'));
  const el = document.getElementById('snav-' + view);
  if (el) el.classList.add('active');

  const fb = document.getElementById('filter-bar');
  const af = document.getElementById('activity-feed');

  if (view === 'upcoming') { filterBookings('upcoming', null); if (fb) fb.style.display = 'flex'; if (af) af.style.display = 'none'; }
  else if (view === 'history') { filterBookings('completed', null); if (fb) fb.style.display = 'flex'; if (af) af.style.display = 'none'; }
  else if (view === 'bookings') { filterBookings('all', null); if (fb) fb.style.display = 'flex'; if (af) af.style.display = 'block'; }
  else if (view === 'profile') { showProfileView(); }
  else if (view === 'saved') { showSavedRoutes(); }
}

function showProfileView() {
  const fb = document.getElementById('filter-bar');
  const af = document.getElementById('activity-feed');
  const bc = document.getElementById('bookings-container');
  if (fb) fb.style.display = 'none';
  if (af) af.style.display = 'none';
  bc.innerHTML = `
    <div class="booking-card reveal in" style="border-left:4px solid var(--gold);">
      <div class="modal-head" style="border-bottom:1px solid var(--border);padding:20px 22px;">
        <div><h3 style="font-family:'Playfair Display',serif;font-size:1.2rem;font-weight:800;color:var(--ink);">My Profile</h3></div>
      </div>
      <div class="modal-body" style="padding:24px 22px;">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
          <div class="form-field"><label>First Name</label><input type="text" value="Juan"/></div>
          <div class="form-field"><label>Last Name</label><input type="text" value="dela Cruz"/></div>
          <div class="form-field"><label>Email</label><input type="email" value="juan@email.com"/></div>
          <div class="form-field"><label>Mobile</label><input type="tel" value="09171234567"/></div>
          <div class="form-field"><label>Date of Birth</label><input type="date" value="1995-06-15"/></div>
          <div class="form-field"><label>Gender</label><select><option selected>Male</option><option>Female</option><option>Other</option></select></div>
        </div>
        <div style="margin-top:16px;"><div class="form-field"><label>Address</label><input type="text" value="123 Kalayaan Ave., Quezon City"/></div></div>
        <div style="margin-top:20px;text-align:right;">
          <button class="mf-btn mf-btn-gold" onclick="showToast('✅','Profile updated successfully!')">Save Changes</button>
        </div>
      </div>
    </div>`;
}

function showSavedRoutes() {
  const fb = document.getElementById('filter-bar');
  const af = document.getElementById('activity-feed');
  const bc = document.getElementById('bookings-container');
  if (fb) fb.style.display = 'none';
  if (af) af.style.display = 'none';
  const saved = [
    { from:'Manila', to:'Baguio City', freq:'8 trips', lastBooked:'Mar 15, 2026' },
    { from:'Baguio City', to:'Manila', freq:'7 trips', lastBooked:'Mar 18, 2026' },
    { from:'Manila', to:'Vigan', freq:'2 trips', lastBooked:'Feb 20, 2026' },
  ];
  bc.innerHTML = `<div class="booking-card reveal in" style="border-left:4px solid var(--gold);">
    <div class="modal-head" style="padding:20px 22px;border-bottom:1px solid var(--border);">
      <div><h3 style="font-family:'Playfair Display',serif;font-size:1.2rem;font-weight:800;color:var(--ink);">Saved Routes</h3></div>
    </div>
    <div style="padding:16px 22px;display:flex;flex-direction:column;gap:10px;">
    ${saved.map(s => `
      <div style="display:flex;align-items:center;justify-content:space-between;padding:14px;background:var(--bg);border-radius:10px;border:1px solid var(--border);">
        <div>
          <div style="font-family:'Playfair Display',serif;font-weight:800;color:var(--ink);">${s.from} <span style="color:var(--gold);">→</span> ${s.to}</div>
          <div style="font-size:.74rem;color:var(--muted);margin-top:3px;">${s.freq} · Last booked ${s.lastBooked}</div>
        </div>
        <button class="mf-btn mf-btn-gold" onclick="showToast('🎫','Booking ${s.from} → ${s.to}...')">Book Now →</button>
      </div>`).join('')}
    </div></div>`;
}

/* ══════════════════════════════════════
   MORE MENU
══════════════════════════════════════ */
function toggleMore(el) {
  event.stopPropagation();
  const wasOpen = el.classList.contains('open');
  document.querySelectorAll('.bc-more.open').forEach(m => m.classList.remove('open'));
  if (!wasOpen) el.classList.add('open');
}
document.addEventListener('click', () => document.querySelectorAll('.bc-more.open').forEach(m => m.classList.remove('open')));

function copyRef(id) {
  navigator.clipboard.writeText(id).catch(() => {});
  showToast('📋', `Reference ${id} copied!`);
}

/* ══════════════════════════════════════
   TICKET MODAL
══════════════════════════════════════ */
function openTicket(id) {
  const b = bookings.find(x => x.id === id);
  if (!b) return;
  document.getElementById('tkt-modal-ref').textContent = b.id;
  document.getElementById('tkt-ref-display').textContent = 'REF: ' + b.id;
  document.getElementById('tkt-from-code').textContent = b.fromCode;
  document.getElementById('tkt-from-name').textContent = b.from;
  document.getElementById('tkt-to-code').textContent = b.toCode;
  document.getElementById('tkt-to-name').textContent = b.to;
  document.getElementById('tkt-duration').textContent = b.dur;
  document.getElementById('tkt-dep').textContent = b.dep;
  document.getElementById('tkt-arr').textContent = b.arr;
  document.getElementById('tkt-date').textContent = b.date;
  document.getElementById('tkt-operator').textContent = b.operator;
  document.getElementById('tkt-seat').textContent = b.seat;
  document.getElementById('tkt-class').textContent = b.cls;
  document.getElementById('tkt-pax').textContent = b.pax;
  document.getElementById('tkt-paid').textContent = b.paid;
  generateQR();
  openModalById('ticket-modal');
}
function generateQR() {
  // Generate a simple pseudo-QR pattern
  const canvas = document.getElementById('qr-canvas');
  canvas.innerHTML = '';
  const pattern = [
    1,1,1,1,1,1,1, 0,1,0,1,0,1,0, 1,0,0,1,0,0,1, 0,1,1,0,1,1,0,
    1,0,1,0,1,0,1, 0,0,1,1,0,0,1, 1,1,1,1,1,1,1, 0,0,0,0,0,0,0,
    1,0,1,1,0,1,0, 0,1,0,0,1,0,1, 1,1,0,1,1,0,1, 0,0,1,0,0,1,0,
    1,1,1,1,1,1,1
  ];
  for (let i = 0; i < 49; i++) {
    const c = document.createElement('div');
    c.className = 'qr-c ' + ((pattern[i % pattern.length] || (i % 3 === 0 ? 1 : 0)) ? 'b' : '');
    canvas.appendChild(c);
  }
}
function printTicket() { window.print(); showToast('🖨','Opening print dialog...'); }
function downloadTicket() { showToast('⬇','Ticket PDF downloaded!'); }

/* ══════════════════════════════════════
   RESCHEDULE MODAL
══════════════════════════════════════ */
function openReschedule(id) {
  activeRescId = id;
  const b = bookings.find(x => x.id === id);
  document.getElementById('resc-ref-label').textContent = `${b.from} → ${b.to} · ${b.id}`;
  const d = new Date(b.dateISO); d.setDate(d.getDate() + 1);
  document.getElementById('resc-date').value = d.toISOString().split('T')[0];
  document.getElementById('resc-trips').style.display = 'none';
  openModalById('resc-modal');
}
function loadRescTrips() {
  const trips = document.getElementById('resc-trips');
  trips.style.display = 'none';
  setTimeout(() => { trips.style.display = 'block'; }, 400);
}
function confirmReschedule() {
  const b = bookings.find(x => x.id === activeRescId);
  if (!b) return;
  const newDate = document.getElementById('resc-date').value;
  const selected = document.querySelector('input[name="resc-trip"]:checked');
  if (!newDate) { showToast('⚠','Please select a new date.'); return; }
  const newTime = selected ? selected.value : '0600';
  const timeStr = newTime === '0600' ? '06:00 AM' : newTime === '0900' ? '09:00 AM' : newTime === '1300' ? '01:00 PM' : '10:00 PM';
  closeModalById('resc-modal');
  showToast('📅', `Trip rescheduled to ${new Date(newDate).toDateString()} at ${timeStr}!`);
}

/* ══════════════════════════════════════
   CANCEL MODAL
══════════════════════════════════════ */
function openCancel(id) {
  activeCancelId = id;
  const b = bookings.find(x => x.id === id);
  document.getElementById('cancel-ref-label').textContent = `${b.from} → ${b.to} · ${b.id}`;
  document.getElementById('cancel-orig').textContent = b.paid;
  document.getElementById('cancel-refund').textContent = b.paid;
  openModalById('cancel-modal');
}
function confirmCancel() {
  if (!activeCancelId) return;
  const idx = bookings.findIndex(x => x.id === activeCancelId);
  if (idx > -1) {
    bookings[idx].status = 'cancelled';
    bookings[idx].cancelledReason = document.querySelector('input[name="cancel-reason"]:checked')?.value || 'Change of plans';
  }
  closeModalById('cancel-modal');
  renderBookings();
  showToast('✕', 'Booking cancelled. Refund will be processed in 3–5 business days.');
}

/* ══════════════════════════════════════
   RATING MODAL
══════════════════════════════════════ */
function openRating(id) {
  const b = bookings.find(x => x.id === id);
  document.getElementById('rating-ref-label').textContent = b.id;
  document.getElementById('rating-trip-label').textContent = `${b.from} → ${b.to} · ${b.date}`;
  activeRescId = id;
  setMainRating(4);
  openModalById('rating-modal');
}
const ratingLabels = ['', 'Poor', 'Fair', 'Good', 'Very Good', 'Excellent!'];
function setMainRating(val) {
  mainRating = val;
  document.querySelectorAll('#main-stars .star-btn').forEach((s, i) => {
    s.classList.toggle('active', i < val);
    s.textContent = i < val ? '⭐' : '☆';
  });
  document.getElementById('rating-label-text').textContent = ratingLabels[val] || '';
}
function submitRating() {
  const b = bookings.find(x => x.id === activeRescId);
  if (b) b.rated = true;
  closeModalById('rating-modal');
  renderBookings();
  showToast('⭐', 'Thank you for your review! It helps other passengers.');
}

/* ══════════════════════════════════════
   MODAL HELPERS
══════════════════════════════════════ */
function openModalById(id) {
  document.getElementById(id).classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeModalById(id) {
  document.getElementById(id).classList.remove('open');
  document.body.style.overflow = '';
}
function closeModal(id, e) {
  if (e.target === document.getElementById(id)) closeModalById(id);
}

/* ══════════════════════════════════════
   TOAST
══════════════════════════════════════ */
let toastTimer;
function showToast(icon, msg) {
  document.getElementById('ti').textContent = icon;
  document.getElementById('tm').textContent = msg;
  const t = document.getElementById('toast');
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 3400);
}

/* ══════════════════════════════════════
   SCROLL REVEAL
══════════════════════════════════════ */
const ro = new IntersectionObserver(es => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); ro.unobserve(e.target); } }), { threshold: 0.06 });
document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

/* ── INIT ── */
renderBookings();
</script>
@endpush
