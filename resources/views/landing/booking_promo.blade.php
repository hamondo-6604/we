<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Promos & Deals – VoyagePH</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('css/landing/booking_promo.css') }}">
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<nav id="nav">
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: .4; transform: scale(.6); }
    }

    .fb-heading {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.8rem, 3vw, 2.8rem);
      font-weight: 800; color: #fff; line-height: 1.1; letter-spacing: -.4px;
      position: relative; z-index: 1;
    }
    .fb-heading em { font-style: italic; color: var(--gold-lt); }

    .fb-sub {
      color: rgba(255,255,255,.55); font-size: .93rem;
      line-height: 1.7; margin-top: 16px; max-width: 460px;
      position: relative; z-index: 1;
    }

    .fb-meta {
      display: flex; align-items: center; gap: 20px;
      margin-top: 28px; position: relative; z-index: 1; flex-wrap: wrap;
    }
    .fb-meta-item {
      display: flex; align-items: center; gap: 8px;
      font-size: .8rem; color: rgba(255,255,255,.5);
    }
    .fb-meta-item svg { width: 14px; height: 14px; stroke: var(--gold-lt); fill: none; stroke-width: 2; stroke-linecap: round; }
    .fb-meta-item strong { color: rgba(255,255,255,.85); }

    .fb-actions {
      display: flex; gap: 12px; margin-top: 32px; flex-wrap: wrap;
      position: relative; z-index: 1;
    }
    .btn-gold {
      background: var(--gold); color: var(--ink);
      border: none; padding: 13px 28px; border-radius: 9px;
      font-size: .88rem; font-weight: 700; cursor: pointer;
      font-family: 'Outfit', sans-serif; transition: all .2s;
      display: flex; align-items: center; gap: 7px;
    }
    .btn-gold:hover { background: var(--gold-lt); transform: translateY(-2px); box-shadow: 0 10px 30px rgba(184,145,42,.4); }
    .btn-ghost {
      background: rgba(255,255,255,.07); color: rgba(255,255,255,.7);
      border: 1px solid rgba(255,255,255,.12);
      padding: 13px 24px; border-radius: 9px;
      font-size: .88rem; font-weight: 600; cursor: pointer;
      font-family: 'Outfit', sans-serif; transition: all .2s;
    }
    .btn-ghost:hover { background: rgba(255,255,255,.13); color: #fff; }

    /* Right side: discount display */
    .fb-discount-wrap {
      position: relative; z-index: 1; text-align: center; flex-shrink: 0;
    }
    .fb-discount-ring {
      width: 200px; height: 200px; border-radius: 50%;
      border: 2px dashed rgba(212,168,67,.3);
      display: flex; align-items: center; justify-content: center;
      position: relative;
      animation: rotate-ring 20s linear infinite;
    }
    @keyframes rotate-ring {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    .fb-discount-inner {
      width: 160px; height: 160px; border-radius: 50%;
      background: rgba(184,145,42,.12);
      border: 1px solid rgba(212,168,67,.2);
      display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      animation: rotate-ring 20s linear infinite reverse;
    }
    .fb-discount-pct {
      font-family: 'Playfair Display', serif;
      font-size: 3.2rem; font-weight: 800;
      color: var(--gold-lt); line-height: 1;
    }
    .fb-discount-off {
      font-size: .75rem; font-weight: 700;
      letter-spacing: 2px; text-transform: uppercase;
      color: rgba(255,255,255,.5); margin-top: 4px;
    }
    .fb-code-tag {
      margin-top: 16px;
      background: rgba(255,255,255,.07);
      border: 1px solid rgba(255,255,255,.12);
      border-radius: 8px; padding: 10px 20px;
      cursor: pointer; transition: all .2s; position: relative;
    }
    .fb-code-tag:hover { background: rgba(255,255,255,.12); }
    .fb-code-label { font-size: .62rem; color: rgba(255,255,255,.4); letter-spacing: 1.5px; text-transform: uppercase; }
    .fb-code-val {
      font-size: 1.05rem; font-weight: 700; color: var(--gold-lt);
      letter-spacing: 3px; font-family: 'Outfit', sans-serif;
      margin-top: 2px;
    }
    .fb-copied {
      position: absolute; inset: 0; border-radius: 8px;
      background: rgba(5,150,105,.15); border-color: rgba(5,150,105,.4);
      display: flex; align-items: center; justify-content: center;
      font-size: .8rem; font-weight: 700; color: #34d399;
      opacity: 0; transition: opacity .2s; pointer-events: none;
    }
    .fb-code-tag.copied .fb-copied { opacity: 1; }

    /* ── FILTER BAR ── */
    .filter-section {
      padding: 48px 32px 0;
      position: sticky; top: var(--nav-h); z-index: 100;
    }
    .filter-inner {
      max-width: 1260px; margin: 0 auto;
      background: rgba(249,247,244,.95);
      backdrop-filter: blur(16px);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 20px 24px;
      display: flex; align-items: center; gap: 16px; flex-wrap: wrap;
      box-shadow: var(--shadow-sm);
    }
    .filter-label {
      font-size: .72rem; font-weight: 700; letter-spacing: 1.5px;
      text-transform: uppercase; color: var(--muted); flex-shrink: 0;
    }
    .filter-divider {
      width: 1px; height: 20px; background: var(--border); flex-shrink: 0;
    }
    .filter-tags { display: flex; gap: 6px; flex-wrap: wrap; }
    .filter-tag {
      padding: 7px 16px; border-radius: 20px;
      font-size: .8rem; font-weight: 600;
      border: 1.5px solid var(--border);
      color: var(--muted); background: var(--bg-3);
      cursor: pointer; transition: all .18s;
    }
    .filter-tag:hover { border-color: var(--gold); color: var(--gold); }
    .filter-tag.active {
      background: var(--ink); border-color: var(--ink);
      color: #fff;
    }
    .filter-search {
      margin-left: auto; position: relative; flex-shrink: 0;
    }
    .filter-search input {
      background: var(--bg-2); border: 1.5px solid var(--border);
      border-radius: 8px; padding: 8px 14px 8px 36px;
      font-size: .83rem; font-family: 'Outfit', sans-serif;
      color: var(--text); outline: none; width: 210px;
      transition: border .18s;
    }
    .filter-search input:focus { border-color: var(--gold); }
    .filter-search input::placeholder { color: var(--muted-lt); }
    .filter-search svg {
      position: absolute; left: 11px; top: 50%; transform: translateY(-50%);
      width: 14px; height: 14px; stroke: var(--muted-lt); fill: none; stroke-width: 2; stroke-linecap: round;
    }

    /* ── PROMO GRID ── */
    .promos-section {
      padding: 40px 32px 80px;
    }
    .promos-inner { max-width: 1260px; margin: 0 auto; }

    .promos-count {
      font-size: .82rem; color: var(--muted); margin-bottom: 24px;
    }
    .promos-count strong { color: var(--text); }

    .promo-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
      gap: 20px;
    }

    .promo-card {
      background: var(--bg-3);
      border: 1px solid var(--border);
      border-radius: 16px;
      overflow: hidden;
      transition: transform .22s, box-shadow .22s, border-color .22s;
      display: flex; flex-direction: column;
      position: relative;
    }
    .promo-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-lg);
      border-color: var(--border-dk);
    }

    .promo-card.featured-card {
      border-color: var(--gold-line);
      background: linear-gradient(135deg, #fff 60%, rgba(184,145,42,.04));
    }
    .promo-card.featured-card:hover { border-color: rgba(184,145,42,.4); }

    /* Card ribbon */
    .card-ribbon {
      position: absolute; top: 16px; left: -1px;
      font-size: .65rem; font-weight: 800; letter-spacing: 1.5px;
      text-transform: uppercase; padding: 5px 12px;
      border-radius: 0 6px 6px 0;
    }
    .ribbon-flash { background: var(--red); color: #fff; }
    .ribbon-new { background: var(--green); color: #fff; }
    .ribbon-exclusive { background: var(--ink); color: var(--gold-lt); }

    /* Card image area */
    .card-visual {
      height: 140px;
      position: relative; overflow: hidden;
      display: flex; align-items: center; justify-content: center;
    }
    .card-visual-bg {
      position: absolute; inset: 0;
      background-size: cover; background-position: center;
    }
    .card-visual-overlay {
      position: absolute; inset: 0;
    }
    .card-visual-content {
      position: relative; z-index: 1;
      text-align: center; padding: 0 20px;
    }
    .card-route-display {
      display: flex; align-items: center; gap: 10px;
      justify-content: center;
    }
    .card-route-city {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem; font-weight: 800; color: #fff;
      text-shadow: 0 2px 8px rgba(0,0,0,.4);
    }
    .card-route-arrow {
      color: rgba(255,255,255,.7); font-size: 1.2rem;
    }
    .card-route-multi {
      font-size: .72rem; font-weight: 600;
      color: rgba(255,255,255,.75); margin-top: 6px;
      letter-spacing: .5px;
    }

    /* Card body */
    .card-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }

    .card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; }
    .card-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.02rem; font-weight: 700; color: var(--ink);
      line-height: 1.25;
    }

    .card-discount-badge {
      flex-shrink: 0; text-align: center;
      background: var(--gold-bg); border: 1px solid var(--gold-line);
      border-radius: 10px; padding: 6px 10px;
    }
    .cdb-pct {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem; font-weight: 800; color: var(--gold);
      line-height: 1;
    }
    .cdb-off { font-size: .58rem; font-weight: 700; color: var(--muted); letter-spacing: 1px; text-transform: uppercase; }

    .card-desc {
      font-size: .82rem; color: var(--muted); line-height: 1.6;
      margin-top: 10px; flex: 1;
    }

    /* Promo code row */
    .card-code-row {
      display: flex; align-items: center; gap: 8px;
      margin-top: 14px;
    }
    .card-code {
      flex: 1; background: var(--bg-2); border: 1.5px dashed var(--border-dk);
      border-radius: 8px; padding: 7px 12px;
      font-size: .83rem; font-weight: 700; color: var(--ink-soft);
      letter-spacing: 2px; cursor: pointer; transition: all .18s;
      display: flex; align-items: center; justify-content: space-between;
    }
    .card-code:hover { border-color: var(--gold); color: var(--gold); }
    .card-code svg { width: 13px; height: 13px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; }
    .code-copied-msg {
      font-size: .7rem; font-weight: 700; color: var(--green);
      opacity: 0; transition: opacity .2s; white-space: nowrap;
    }
    .card-code.copied-state .code-copied-msg { opacity: 1; }

    /* Card footer */
    .card-footer {
      display: flex; align-items: center; justify-content: space-between;
      padding: 14px 20px; border-top: 1px solid var(--border);
      margin-top: auto;
    }
    .card-validity {
      display: flex; align-items: center; gap: 5px;
      font-size: .73rem; color: var(--muted);
    }
    .card-validity svg { width: 12px; height: 12px; stroke: var(--muted); fill: none; stroke-width: 2; stroke-linecap: round; }
    .expiring-soon { color: var(--red); }
    .expiring-soon svg { stroke: var(--red); }

    .card-cta {
      background: var(--ink); color: #fff;
      border: none; padding: 8px 16px; border-radius: 8px;
      font-size: .78rem; font-weight: 700; cursor: pointer;
      font-family: 'Outfit', sans-serif; transition: all .18s;
    }
    .card-cta:hover { background: var(--gold); color: var(--ink); }

    /* Price display */
    .card-price-row {
      display: flex; align-items: baseline; gap: 6px; margin-top: 12px;
    }
    .price-original {
      font-size: .8rem; color: var(--muted-lt); text-decoration: line-through;
    }
    .price-sale {
      font-family: 'Playfair Display', serif;
      font-size: 1.4rem; font-weight: 700; color: var(--gold);
    }
    .price-from { font-size: .72rem; color: var(--muted); font-weight: 500; }

    /* ── LOYALTY / POINTS STRIP ── */
    .loyalty-section {
      padding: 0 32px 60px;
    }
    .loyalty-inner { max-width: 1260px; margin: 0 auto; }
    .loyalty-banner {
      background: linear-gradient(135deg, var(--gold) 0%, #8a6b1c 100%);
      border-radius: 16px; padding: 40px 48px;
      display: grid; grid-template-columns: 1fr auto;
      align-items: center; gap: 40px;
      position: relative; overflow: hidden;
    }
    .loyalty-banner::before {
      content: '';
      position: absolute; top: -50%; right: -10%;
      width: 400px; height: 400px; border-radius: 50%;
      background: rgba(255,255,255,.08); pointer-events: none;
    }
    .loyalty-banner::after {
      content: '';
      position: absolute; bottom: -60%; left: 20%;
      width: 300px; height: 300px; border-radius: 50%;
      background: rgba(255,255,255,.05); pointer-events: none;
    }
    .loyalty-eyebrow {
      font-size: .68rem; font-weight: 800; letter-spacing: 2.5px;
      text-transform: uppercase; color: rgba(255,255,255,.65); margin-bottom: 10px;
    }
    .loyalty-heading {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.4rem, 2.5vw, 2rem); font-weight: 800;
      color: #fff; line-height: 1.15;
    }
    .loyalty-sub {
      font-size: .88rem; color: rgba(255,255,255,.75);
      line-height: 1.65; margin-top: 12px; max-width: 420px;
    }
    .loyalty-perks {
      display: flex; gap: 20px; margin-top: 24px; flex-wrap: wrap;
    }
    .loyalty-perk {
      display: flex; align-items: center; gap: 7px;
      font-size: .8rem; color: rgba(255,255,255,.85);
    }
    .loyalty-perk::before {
      content: '✓'; width: 18px; height: 18px;
      background: rgba(255,255,255,.2); border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: .65rem; font-weight: 800; color: #fff; flex-shrink: 0;
    }
    .loyalty-right { position: relative; z-index: 1; text-align: center; flex-shrink: 0; }
    .loyalty-card-visual {
      background: rgba(255,255,255,.12);
      border: 1px solid rgba(255,255,255,.2);
      border-radius: 14px; padding: 24px 28px;
      backdrop-filter: blur(8px);
      min-width: 200px;
    }
    .lcv-label { font-size: .65rem; letter-spacing: 2px; text-transform: uppercase; color: rgba(255,255,255,.6); }
    .lcv-pts {
      font-family: 'Playfair Display', serif;
      font-size: 2.4rem; font-weight: 800; color: #fff;
      line-height: 1; margin: 6px 0 2px;
    }
    .lcv-sub { font-size: .72rem; color: rgba(255,255,255,.6); }
    .lcv-bar { height: 4px; background: rgba(255,255,255,.15); border-radius: 2px; margin: 14px 0 8px; }
    .lcv-bar-fill { height: 100%; background: #fff; border-radius: 2px; width: 62%; }
    .lcv-progress { font-size: .68rem; color: rgba(255,255,255,.65); text-align: right; }
    .btn-white {
      background: #fff; color: var(--gold);
      border: none; padding: 12px 24px; border-radius: 9px;
      font-size: .85rem; font-weight: 700; cursor: pointer;
      font-family: 'Outfit', sans-serif; transition: all .2s;
      margin-top: 16px; display: inline-block;
    }
    .btn-white:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,.2); }

    /* ── HOW IT WORKS ── */
    .how-section {
      padding: 80px 32px;
      background: var(--bg-3);
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
    }
    .how-inner { max-width: 1260px; margin: 0 auto; }
    .how-header { text-align: center; margin-bottom: 52px; }
    .how-steps {
      display: grid; grid-template-columns: repeat(4, 1fr);
      gap: 0; position: relative;
    }
    .how-steps::before {
      content: '';
      position: absolute; top: 32px; left: calc(12.5%); right: calc(12.5%);
      height: 1px; background: linear-gradient(to right, transparent, var(--border-dk) 20%, var(--border-dk) 80%, transparent);
      z-index: 0;
    }
    .how-step { text-align: center; padding: 0 24px; position: relative; z-index: 1; }
    .how-step-num {
      width: 64px; height: 64px; border-radius: 50%;
      background: var(--bg-3); border: 2px solid var(--border-dk);
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 20px;
      font-family: 'Playfair Display', serif;
      font-size: 1.4rem; font-weight: 800; color: var(--gold);
      position: relative;
    }
    .how-step-num::after {
      content: '';
      position: absolute; inset: -5px;
      border-radius: 50%;
      border: 1.5px dashed rgba(184,145,42,.3);
    }
    .how-step-title {
      font-family: 'Playfair Display', serif;
      font-size: 1rem; font-weight: 700; color: var(--ink); margin-bottom: 8px;
    }
    .how-step-desc { font-size: .82rem; color: var(--muted); line-height: 1.65; }

    /* ── NEWSLETTER CTA ── */
    .newsletter-section { padding: 80px 32px; }
    .newsletter-inner {
      max-width: 1260px; margin: 0 auto;
      background: var(--ink); border-radius: 20px;
      padding: 60px; text-align: center;
      position: relative; overflow: hidden;
    }
    .newsletter-inner::before {
      content: '';
      position: absolute; top: -40%; left: 50%;
      transform: translateX(-50%);
      width: 600px; height: 600px;
      background: radial-gradient(circle, rgba(184,145,42,.15) 0%, transparent 65%);
      pointer-events: none;
    }
    .nl-heading {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.6rem, 2.8vw, 2.4rem); font-weight: 800;
      color: #fff; position: relative; z-index: 1;
    }
    .nl-heading em { font-style: italic; color: var(--gold-lt); }
    .nl-sub { color: rgba(255,255,255,.55); font-size: .92rem; margin-top: 12px; position: relative; z-index: 1; }
    .nl-form {
      display: flex; gap: 8px; max-width: 480px; margin: 28px auto 0;
      position: relative; z-index: 1;
    }
    .nl-input {
      flex: 1; background: rgba(255,255,255,.08);
      border: 1.5px solid rgba(255,255,255,.12);
      border-radius: 9px; padding: 13px 18px;
      font-size: .9rem; font-family: 'Outfit', sans-serif;
      color: #fff; outline: none; transition: border .18s;
    }
    .nl-input::placeholder { color: rgba(255,255,255,.35); }
    .nl-input:focus { border-color: var(--gold); }
    .nl-btn {
      background: var(--gold); color: var(--ink);
      border: none; padding: 13px 24px; border-radius: 9px;
      font-size: .88rem; font-weight: 700; cursor: pointer;
      font-family: 'Outfit', sans-serif; transition: all .2s; white-space: nowrap;
    }
    .nl-btn:hover { background: var(--gold-lt); transform: translateY(-1px); }
    .nl-note { font-size: .72rem; color: rgba(255,255,255,.3); margin-top: 12px; position: relative; z-index: 1; }

    /* ── FOOTER ── */
    footer {
      background: var(--ink);
      color: rgba(255,255,255,.7);
      font-size: .83rem;
    }
    .footer-inner { max-width: 1260px; margin: 0 auto; padding: 0 32px; }
    .footer-top {
      display: grid; grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 48px; padding: 64px 0 48px;
      border-bottom: 1px solid rgba(255,255,255,.07);
    }
    .footer-brand p { color: rgba(255,255,255,.45); line-height: 1.7; margin-top: 16px; font-size: .82rem; max-width: 280px; }
    .footer-newsletter { margin-top: 24px; }
    .footer-newsletter p { color: rgba(255,255,255,.4); font-size: .78rem; margin-bottom: 10px; }
    .nl-row { display: flex; gap: 6px; }
    .nl-row .nl-input {
      font-size: .82rem; padding: 9px 14px;
    }
    .nl-row .nl-btn { padding: 9px 16px; font-size: .8rem; }
    .footer-col h4 { color: #fff; font-size: .8rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 16px; }
    .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 8px; }
    .footer-col ul li a { color: rgba(255,255,255,.45); text-decoration: none; font-size: .83rem; transition: color .18s; }
    .footer-col ul li a:hover { color: var(--gold-lt); }
    .footer-bottom { display: flex; align-items: center; justify-content: space-between; padding: 24px 0; gap: 16px; flex-wrap: wrap; }
    .footer-bottom p { color: rgba(255,255,255,.3); font-size: .75rem; }
    .footer-payments { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
    .pay-badge { background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.1); border-radius: 5px; padding: 3px 8px; font-size: .68rem; font-weight: 700; color: rgba(255,255,255,.5); }
    .footer-socials { display: flex; gap: 8px; }
    .soc-btn { width: 32px; height: 32px; border-radius: 8px; background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.1); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,.5); font-size: .75rem; text-decoration: none; transition: all .18s; }
    .soc-btn:hover { background: var(--gold); color: var(--ink); border-color: var(--gold); }

    /* ── REVEAL ANIMATION ── */
    .reveal {
      opacity: 0; transform: translateY(24px);
      transition: opacity .6s ease, transform .6s ease;
    }
    .reveal.visible { opacity: 1; transform: translateY(0); }

    /* ── RESPONSIVE ── */
    @media (max-width: 900px) {
      .featured-banner { grid-template-columns: 1fr; padding: 36px 28px; }
      .fb-discount-wrap { display: none; }
      .how-steps { grid-template-columns: repeat(2, 1fr); gap: 32px; }
      .how-steps::before { display: none; }
      .loyalty-banner { grid-template-columns: 1fr; }
      .loyalty-right { display: none; }
      .footer-top { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 640px) {
      .nav-links { display: none; }
      .page-header { padding-left: 20px; padding-right: 20px; }
      .featured-section, .filter-section, .promos-section, .loyalty-section,
      .how-section, .newsletter-section { padding-left: 20px; padding-right: 20px; }
      .promo-grid { grid-template-columns: 1fr; }
      .how-steps { grid-template-columns: 1fr; }
      .footer-top { grid-template-columns: 1fr; gap: 32px; }
      .nl-form { flex-direction: column; }
      .filter-search { display: none; }
    }

    /* ── EMPTY STATE ── */
    .empty-state {
      text-align: center; padding: 80px 20px;
      display: none;
    }
    .empty-state svg { width: 56px; height: 56px; stroke: var(--muted-lt); fill: none; stroke-width: 1.2; stroke-linecap: round; margin-bottom: 16px; }
    .empty-state h3 { font-family: 'Playfair Display', serif; font-size: 1.3rem; color: var(--ink); margin-bottom: 8px; }
    .empty-state p { font-size: .85rem; color: var(--muted); }

    /* loading shimmer */
    @keyframes shimmer {
      0% { background-position: -400px 0; }
      100% { background-position: 400px 0; }
    }
  </style>
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<nav id="nav">
  <div class="nav-wrap">
    <a class="logo" href="home-page.html">
      <div class="logo-mark">
        <svg viewBox="0 0 24 24"><path d="M3 14V8a2 2 0 012-2h14a2 2 0 012 2v6M3 14h18M3 14l-1 3h20l-1-3M7 14v2m10-2v2M6 10h12"/></svg>
      </div>
      <span class="logo-wordmark">Voyage<span>PH</span></span>
    </a>
    <ul class="nav-links">
      <li><a href="home-page.html">Home</a></li>
      <li><a href="book-a-ticket.html">Book a Ticket</a></li>
      <li><a href="routes.html">Routes</a></li>
      <li><a href="#" class="active">Promos & Deals</a></li>
      <li><a href="#">Schedule</a></li>
      <li><a href="#">My Bookings</a></li>
    </ul>
    <div class="nav-right">
      <button class="btn-login">Log In</button>
      <button class="btn-book">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M3 14V8a2 2 0 012-2h14a2 2 0 012 2v6M3 14h18M3 14l-1 3h20l-1-3"/></svg>
        Book Now
      </button>
    </div>
  </div>
</nav>

<!-- ═══ PROMO FLASH TICKER ═══ -->
<div class="ticker-bar">
  <span class="ticker-label">🔥 Flash Deals</span>
  <div class="ticker-deals">
    <span class="ticker-deal">Manila → Baguio — 30% off</span>
    <span class="ticker-sep">·</span>
    <span class="ticker-deal">Cebu → Ormoc — ₱299</span>
    <span class="ticker-sep">·</span>
    <span class="ticker-deal">Student Promo — Extra 15%</span>
  </div>
  <div class="countdown-wrap">
    <span style="font-size:.72rem;color:rgba(255,255,255,.4);letter-spacing:1px;text-transform:uppercase;margin-right:4px;">Ends in</span>
    <div class="cd-unit">
      <span class="cd-num" id="cd-h">08</span>
      <span class="cd-label">hrs</span>
    </div>
    <span class="cd-colon">:</span>
    <div class="cd-unit">
      <span class="cd-num" id="cd-m">34</span>
      <span class="cd-label">min</span>
    </div>
    <span class="cd-colon">:</span>
    <div class="cd-unit">
      <span class="cd-num" id="cd-s">17</span>
      <span class="cd-label">sec</span>
    </div>
  </div>
</div>

<!-- ═══ PAGE HEADER ═══ -->
<div class="page-header">
  <div class="ph-inner">
    <div class="breadcrumb">
      <a href="home-page.html">Home</a>
      <span class="sep">/</span>
      <span class="cur">Promos & Deals</span>
    </div>
    <div class="ph-eyebrow">Savings & Specials</div>
    <h1 class="ph-heading">Exclusive <em>Promos</em> &amp; Deals</h1>
    <p class="ph-sub">Handpicked discounts, seasonal fares, and limited-time offers — travel more for less across the Philippines.</p>
  </div>
</div>

<!-- ═══ FEATURED PROMO BANNER ═══ -->
<section class="featured-section">
  <div class="featured-inner">
    <div class="section-title-row reveal">
      <div>
        <div class="section-eyebrow">Deal of the Month</div>
        <h2 class="section-heading">This Month's <em>Spotlight</em></h2>
      </div>
    </div>

    <div class="featured-banner reveal">
      <div class="banner-grid">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
              <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width=".5"/>
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#grid)"/>
        </svg>
      </div>

      <div>
        <div class="fb-badge">✦ Holy Week Special</div>
        <h2 class="fb-heading">Travel the <em>Philippines</em><br>at Half the Price</h2>
        <p class="fb-sub">Book any intercity route between April 14–20 and get 50% off your fare. Perfect for going home or exploring a new destination this summer.</p>

        <div class="fb-meta">
          <div class="fb-meta-item">
            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Valid <strong>Apr 14–20, 2026</strong>
          </div>
          <div class="fb-meta-item">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            Book by <strong>Apr 12</strong>
          </div>
          <div class="fb-meta-item">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
            All seat classes
          </div>
        </div>

        <div class="fb-actions">
          <button class="btn-gold" onclick="window.location.href='book-a-ticket.html'">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M3 14V8a2 2 0 012-2h14a2 2 0 012 2v6M3 14h18M3 14l-1 3h20l-1-3"/></svg>
            Book This Deal
          </button>
          <button class="btn-ghost" onclick="copyCode('HOLYWEEK50', this)">Copy Code: HOLYWEEK50</button>
        </div>
      </div>

      <div class="fb-discount-wrap">
        <div class="fb-discount-ring">
          <div class="fb-discount-inner">
            <div class="fb-discount-pct">50%</div>
            <div class="fb-discount-off">OFF</div>
          </div>
        </div>
        <div class="fb-code-tag" onclick="copyCode('HOLYWEEK50', this)" id="featured-code">
          <div class="fb-code-label">Promo Code</div>
          <div class="fb-code-val">HOLYWEEK50</div>
          <div class="fb-copied">✓ Copied!</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FILTER BAR ═══ -->
<div class="filter-section">
  <div class="filter-inner">
    <span class="filter-label">Filter</span>
    <div class="filter-divider"></div>
    <div class="filter-tags">
      <button class="filter-tag active" onclick="filterPromos('all', this)">All Deals</button>
      <button class="filter-tag" onclick="filterPromos('flash', this)">⚡ Flash Sale</button>
      <button class="filter-tag" onclick="filterPromos('seasonal', this)">🌸 Seasonal</button>
      <button class="filter-tag" onclick="filterPromos('student', this)">🎓 Student</button>
      <button class="filter-tag" onclick="filterPromos('senior', this)">🌿 Senior / PWD</button>
      <button class="filter-tag" onclick="filterPromos('group', this)">👥 Group</button>
      <button class="filter-tag" onclick="filterPromos('route', this)">🗺️ Route Specials</button>
    </div>
    <div class="filter-search">
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <input type="text" placeholder="Search promos…" oninput="searchPromos(this.value)"/>
    </div>
  </div>
</div>

<!-- ═══ PROMOS GRID ═══ -->
<section class="promos-section">
  <div class="promos-inner">
    <p class="promos-count reveal"><strong id="promo-count">12</strong> active promotions</p>

    <div class="promo-grid" id="promo-grid">

      <!-- Card 1: Flash Sale -->
      <div class="promo-card reveal" data-cat="flash" data-title="super flash tuesday fare seats limited">
        <div class="card-ribbon ribbon-flash">⚡ Flash Sale</div>
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #1a2235 0%, #0e1117 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.7));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">Manila</span>
              <span class="card-route-arrow">→</span>
              <span class="card-route-city">Baguio</span>
            </div>
            <div class="card-route-multi">Every Tuesday · Limited Seats</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Super Flash Tuesday Fare</div>
            <div class="card-discount-badge">
              <div class="cdb-pct">30%</div>
              <div class="cdb-off">off</div>
            </div>
          </div>
          <p class="card-desc">Enjoy slashed fares every Tuesday for the Manila–Baguio corridor. Book at least 3 days ahead to lock in the discount.</p>
          <div class="card-price-row">
            <span class="price-from">from</span>
            <span class="price-original">₱650</span>
            <span class="price-sale">₱455</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('FLASH30', this)">
              <span>FLASH30</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity expiring-soon">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            Ends in 2 days
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 2: Seasonal -->
      <div class="promo-card reveal" data-cat="seasonal" data-title="holy week summer homecoming routes promo">
        <div class="card-ribbon ribbon-new">🌸 Seasonal</div>
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #b8912a 0%, #6b4f0e 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.6));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">Nationwide</span>
            </div>
            <div class="card-route-multi">Holy Week · All Routes</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Holy Week Homecoming Promo</div>
            <div class="card-discount-badge">
              <div class="cdb-pct">50%</div>
              <div class="cdb-off">off</div>
            </div>
          </div>
          <p class="card-desc">Head home or travel anywhere across Luzon, Visayas & Mindanao this Holy Week with 50% off all routes. Book early — seats go fast!</p>
          <div class="card-price-row">
            <span class="price-from">from</span>
            <span class="price-original">₱800</span>
            <span class="price-sale">₱400</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('HOLYWEEK50', this)">
              <span>HOLYWEEK50</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity">
            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Apr 14–20, 2026
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 3: Student -->
      <div class="promo-card reveal" data-cat="student" data-title="student school id discount university college">
        <div class="card-ribbon ribbon-new">🎓 Student</div>
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #1e3a5f 0%, #0e1117 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.65));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">All Routes</span>
            </div>
            <div class="card-route-multi">Valid School ID required</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Student Fare Discount</div>
            <div class="card-discount-badge">
              <div class="cdb-pct">20%</div>
              <div class="cdb-off">off</div>
            </div>
          </div>
          <p class="card-desc">Students with valid school IDs get 20% off any route, any day. Just present your ID upon boarding. No code needed — discount applied automatically at checkout.</p>
          <div class="card-price-row">
            <span class="price-from">from</span>
            <span class="price-original">₱500</span>
            <span class="price-sale">₱400</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('STUDENT20', this)">
              <span>STUDENT20</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity">
            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Year-round
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 4: Senior / PWD -->
      <div class="promo-card reveal" data-cat="senior" data-title="senior citizen pwd discount government mandated">
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #2d4a3e 0%, #1a2e26 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.65));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">All Routes</span>
            </div>
            <div class="card-route-multi">Senior Citizen Card / PWD ID required</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Senior Citizen &amp; PWD Discount</div>
            <div class="card-discount-badge" style="background:var(--green-bg);border-color:rgba(5,150,105,.2);">
              <div class="cdb-pct" style="color:var(--green);">20%</div>
              <div class="cdb-off">off</div>
            </div>
          </div>
          <p class="card-desc">Government-mandated 20% discount for Senior Citizens and PWDs on all VoyagePH routes. Present valid ID upon boarding.</p>
          <div class="card-price-row">
            <span class="price-from">from</span>
            <span class="price-original">₱500</span>
            <span class="price-sale" style="color:var(--green);">₱400</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('SENIOR20', this)">
              <span>SENIOR20</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity">
            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Year-round
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 5: Group -->
      <div class="promo-card reveal" data-cat="group" data-title="group booking ten or more seats family friends">
        <div class="card-ribbon ribbon-exclusive">★ Group</div>
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #3a1a5f 0%, #1a0e35 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.65));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">All Routes</span>
            </div>
            <div class="card-route-multi">10+ passengers · Charter available</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Group Travel Discount</div>
            <div class="card-discount-badge">
              <div class="cdb-pct">15%</div>
              <div class="cdb-off">off</div>
            </div>
          </div>
          <p class="card-desc">Traveling with 10 or more? Get 15% off for your entire group on any route. For 20+ passengers, call us to arrange a dedicated charter bus.</p>
          <div class="card-price-row">
            <span class="price-from">from</span>
            <span class="price-original">₱650</span>
            <span class="price-sale">₱552</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('GROUP15', this)">
              <span>GROUP15</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity">
            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Year-round
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 6: Route Special -->
      <div class="promo-card reveal" data-cat="route" data-title="cebu ormoc visayas route special weekend">
        <div class="card-ribbon ribbon-flash">🗺️ Route Deal</div>
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #1a3a2a 0%, #0e1f17 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.65));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">Cebu</span>
              <span class="card-route-arrow">→</span>
              <span class="card-route-city">Ormoc</span>
            </div>
            <div class="card-route-multi">Weekend departures only</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Cebu–Ormoc Weekend Saver</div>
            <div class="card-discount-badge">
              <div class="cdb-pct">₱299</div>
              <div class="cdb-off">flat</div>
            </div>
          </div>
          <p class="card-desc">Flat ₱299 fare on the Cebu City–Ormoc route every Saturday and Sunday. Valid for Economy and Standard class seats only.</p>
          <div class="card-price-row">
            <span class="price-from">was</span>
            <span class="price-original">₱480</span>
            <span class="price-sale">₱299</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('CEBUSAVER', this)">
              <span>CEBUSAVER</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity expiring-soon">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            Ends Apr 30
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 7: Early Bird -->
      <div class="promo-card reveal" data-cat="flash" data-title="early bird book advance 7 days discount">
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #3d2a00 0%, #1a1000 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.65));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">All Routes</span>
            </div>
            <div class="card-route-multi">Book 7+ days ahead</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Early Bird Advance Fare</div>
            <div class="card-discount-badge">
              <div class="cdb-pct">25%</div>
              <div class="cdb-off">off</div>
            </div>
          </div>
          <p class="card-desc">Plan ahead and save big. Book any route at least 7 days before your departure date and automatically receive a 25% early bird discount.</p>
          <div class="card-price-row">
            <span class="price-from">from</span>
            <span class="price-original">₱700</span>
            <span class="price-sale">₱525</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('EARLYBIRD', this)">
              <span>EARLYBIRD</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity">
            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Year-round
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 8: Bagyo Season Alert (Route) -->
      <div class="promo-card reveal" data-cat="route" data-title="davao general santos mindanao southern route">
        <div class="card-ribbon ribbon-new">🗺️ Route Deal</div>
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #1a2a3a 0%, #0e1720 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.65));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">Davao</span>
              <span class="card-route-arrow">→</span>
              <span class="card-route-city">GenSan</span>
            </div>
            <div class="card-route-multi">Mindanao Southern Route</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Davao–GenSan Corridor Launch</div>
            <div class="card-discount-badge">
              <div class="cdb-pct">40%</div>
              <div class="cdb-off">off</div>
            </div>
          </div>
          <p class="card-desc">Celebrating our new Mindanao route! Enjoy 40% off all seat classes on the Davao–General Santos City corridor for the first 60 days of operations.</p>
          <div class="card-price-row">
            <span class="price-from">from</span>
            <span class="price-original">₱420</span>
            <span class="price-sale">₱252</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('GENSAN40', this)">
              <span>GENSAN40</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity expiring-soon">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            Ends May 15
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 9: GCash Promo -->
      <div class="promo-card reveal" data-cat="flash" data-title="gcash cashback payment mobile wallet discount">
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #003087 0%, #001a4d 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.65));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">Pay via GCash</span>
            </div>
            <div class="card-route-multi">All routes · Limited redemptions</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">GCash PayDay Cashback</div>
            <div class="card-discount-badge">
              <div class="cdb-pct">₱50</div>
              <div class="cdb-off">back</div>
            </div>
          </div>
          <p class="card-desc">Pay with GCash and get ₱50 cashback credited to your GCash wallet within 24 hours. Valid once per user per month. Min. fare of ₱300 required.</p>
          <div class="card-price-row">
            <span class="price-from">Get back</span>
            <span class="price-sale">₱50</span>
            <span class="price-from">cashback</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('GCASH50', this)">
              <span>GCASH50</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity expiring-soon">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            Ends Apr 30
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 10: Referral -->
      <div class="promo-card reveal" data-cat="group" data-title="referral refer friend credit wallet bonus">
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #1a3d2a 0%, #0e2018 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.65));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">Refer & Earn</span>
            </div>
            <div class="card-route-multi">No limit on referrals</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Refer a Friend Bonus</div>
            <div class="card-discount-badge" style="background:var(--green-bg);border-color:rgba(5,150,105,.2);">
              <div class="cdb-pct" style="color:var(--green);">₱75</div>
              <div class="cdb-off">each</div>
            </div>
          </div>
          <p class="card-desc">Earn ₱75 travel credit for every friend you refer who books their first trip on VoyagePH. Your friend also gets ₱50 off their first booking.</p>
          <div class="card-price-row">
            <span class="price-from">earn</span>
            <span class="price-sale" style="color:var(--green);">₱75</span>
            <span class="price-from">per referral</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('REFER75', this)">
              <span>REFER75</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity">
            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Year-round
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 11: Birthday -->
      <div class="promo-card reveal" data-cat="seasonal" data-title="birthday month special personal celebration">
        <div class="card-ribbon ribbon-exclusive">🎂 Birthday</div>
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #3d0a2a 0%, #1f051a 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.65));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">All Routes</span>
            </div>
            <div class="card-route-multi">Valid within your birthday month</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Birthday Month Treat</div>
            <div class="card-discount-badge">
              <div class="cdb-pct">15%</div>
              <div class="cdb-off">off</div>
            </div>
          </div>
          <p class="card-desc">Celebrate your birthday with a travel treat! Get 15% off any route during your birthday month. Log in to your VoyagePH account to unlock this deal automatically.</p>
          <div class="card-price-row">
            <span class="price-from">up to</span>
            <span class="price-sale">15% off</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('BIRTHDAY15', this)">
              <span>BIRTHDAY15</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity">
            <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Your birthday month
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

      <!-- Card 12: Manila - Ilocos -->
      <div class="promo-card reveal" data-cat="route" data-title="manila ilocos norte vigan heritage luzon north">
        <div class="card-ribbon ribbon-new">🗺️ Route Deal</div>
        <div class="card-visual">
          <div class="card-visual-bg" style="background: linear-gradient(135deg, #2a1a00 0%, #150d00 100%);"></div>
          <div class="card-visual-overlay" style="background: linear-gradient(to bottom, transparent 30%, rgba(14,17,23,.65));"></div>
          <div class="card-visual-content">
            <div class="card-route-display">
              <span class="card-route-city">Manila</span>
              <span class="card-route-arrow">→</span>
              <span class="card-route-city">Vigan</span>
            </div>
            <div class="card-route-multi">Heritage Route · North Luzon</div>
          </div>
        </div>
        <div class="card-body">
          <div class="card-top">
            <div class="card-title">Manila–Vigan Heritage Route Promo</div>
            <div class="card-discount-badge">
              <div class="cdb-pct">35%</div>
              <div class="cdb-off">off</div>
            </div>
          </div>
          <p class="card-desc">Explore the UNESCO-listed heritage city of Vigan with 35% off the Manila–Vigan overnight express. Includes complimentary bottled water and snack.</p>
          <div class="card-price-row">
            <span class="price-from">from</span>
            <span class="price-original">₱900</span>
            <span class="price-sale">₱585</span>
          </div>
          <div class="card-code-row">
            <div class="card-code" onclick="copyCardCode('VIGAN35', this)">
              <span>VIGAN35</span>
              <svg viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
            </div>
            <span class="code-copied-msg">✓ Copied</span>
          </div>
        </div>
        <div class="card-footer">
          <div class="card-validity expiring-soon">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            Ends May 31
          </div>
          <button class="card-cta" onclick="window.location.href='book-a-ticket.html'">Book Now</button>
        </div>
      </div>

    </div><!-- /promo-grid -->

    <!-- Empty State -->
    <div class="empty-state" id="empty-state">
      <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
      <h3>No Promos Found</h3>
      <p>Try a different filter or check back soon for new deals.</p>
    </div>

  </div>
</section>

<!-- ═══ LOYALTY / VOYAGE REWARDS ═══ -->
<section class="loyalty-section reveal">
  <div class="loyalty-inner">
    <div class="loyalty-banner">
      <div>
        <div class="loyalty-eyebrow">✦ VoyagePH Rewards</div>
        <h2 class="loyalty-heading">Earn Points on Every Trip.<br>Redeem for Free Rides.</h2>
        <p class="loyalty-sub">Join the VoyagePH Rewards program and earn 1 point for every ₱10 spent. Redeem points for discounts, free upgrades, and exclusive member deals.</p>
        <div class="loyalty-perks">
          <span class="loyalty-perk">Earn on every booking</span>
          <span class="loyalty-perk">Free seat upgrades</span>
          <span class="loyalty-perk">Member-only flash sales</span>
          <span class="loyalty-perk">Birthday bonus points</span>
        </div>
        <button class="btn-white" style="margin-top:28px;">Join Rewards — It's Free</button>
      </div>
      <div class="loyalty-right">
        <div class="loyalty-card-visual">
          <div class="lcv-label">Your Points Balance</div>
          <div class="lcv-pts">1,240</div>
          <div class="lcv-sub">≈ ₱124 travel credit</div>
          <div class="lcv-bar"><div class="lcv-bar-fill"></div></div>
          <div class="lcv-progress">1,240 / 2,000 to Gold tier</div>
        </div>
        <button class="btn-white">View My Rewards</button>
      </div>
    </div>
  </div>
</section>

<!-- ═══ HOW TO USE A PROMO ═══ -->
<section class="how-section">
  <div class="how-inner">
    <div class="how-header reveal">
      <div class="section-eyebrow" style="justify-content:center;">How It Works</div>
      <h2 class="section-heading" style="text-align:center;">Redeeming Your <em>Promo</em> in 4 Easy Steps</h2>
    </div>
    <div class="how-steps">
      <div class="how-step reveal">
        <div class="how-step-num">1</div>
        <div class="how-step-title">Find Your Deal</div>
        <p class="how-step-desc">Browse active promos on this page and copy the promo code for the deal you want.</p>
      </div>
      <div class="how-step reveal">
        <div class="how-step-num">2</div>
        <div class="how-step-title">Book Your Trip</div>
        <p class="how-step-desc">Head to the Book a Ticket page and select your route, date, and seat class.</p>
      </div>
      <div class="how-step reveal">
        <div class="how-step-num">3</div>
        <div class="how-step-title">Enter Promo Code</div>
        <p class="how-step-desc">Paste the code in the "Promo Code" field at checkout and click Apply to see the discount.</p>
      </div>
      <div class="how-step reveal">
        <div class="how-step-num">4</div>
        <div class="how-step-title">Save &amp; Travel</div>
        <p class="how-step-desc">Complete payment and enjoy your discounted fare. Your e-ticket goes straight to your inbox.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ NEWSLETTER CTA ═══ -->
<section class="newsletter-section reveal">
  <div class="newsletter-inner">
    <h2 class="nl-heading">Never Miss a <em>Deal</em> Again</h2>
    <p class="nl-sub">Subscribe to promo alerts and be the first to know about flash sales, holiday specials, and exclusive member offers.</p>
    <div class="nl-form">
      <input class="nl-input" type="email" placeholder="your@email.com"/>
      <button class="nl-btn">Notify Me</button>
    </div>
    <p class="nl-note">No spam, ever. Unsubscribe anytime. We send 2–4 emails per month.</p>
  </div>
</section>

<!-- ═══ FOOTER ═══ -->
<footer>
  <div class="footer-inner">
    <div class="footer-top">
      <div class="footer-brand">
        <a class="logo" href="home-page.html" style="filter:brightness(1.2)">
          <div class="logo-mark" style="border-color:rgba(212,168,67,.3)">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#d4a843" stroke-width="1.8" stroke-linecap="round"><path d="M3 14V8a2 2 0 012-2h14a2 2 0 012 2v6M3 14h18M3 14l-1 3h20l-1-3M7 14v2m10-2v2M6 10h12"/></svg>
          </div>
          <span style="font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:800;color:#fff;letter-spacing:-.3px;">Voyage<span style="color:#d4a843">PH</span></span>
        </a>
        <p>Philippines' premier bus company — connecting cities with comfort, safety, and reliability since 2018.</p>
        <div class="footer-newsletter">
          <p>Get promo alerts and travel updates:</p>
          <div class="nl-row">
            <input class="nl-input" type="email" placeholder="your@email.com"/>
            <button class="nl-btn">Subscribe</button>
          </div>
        </div>
      </div>
      <div class="footer-col">
        <h4>Travel</h4>
        <ul>
          <li><a href="book-a-ticket.html">Book a Ticket</a></li>
          <li><a href="routes.html">View Routes</a></li>
          <li><a href="#">Promos & Deals</a></li>
          <li><a href="#">Group Booking</a></li>
          <li><a href="#">Schedule</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Account</h4>
        <ul>
          <li><a href="#">Register</a></li>
          <li><a href="#">Log In</a></li>
          <li><a href="#">My Bookings</a></li>
          <li><a href="#">My Profile</a></li>
          <li><a href="#">Notifications</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="#">About VoyagePH</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Help / FAQ</a></li>
          <li><a href="#">Cancellation Policy</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2026 VoyagePH. All rights reserved. Made with ❤️ in the Philippines.</p>
      <div class="footer-payments">
        <span style="font-size:.68rem;color:rgba(255,255,255,.25);margin-right:6px;">We accept</span>
        <span class="pay-badge">GCash</span>
        <span class="pay-badge">Maya</span>
        <span class="pay-badge">Visa</span>
        <span class="pay-badge">MC</span>
        <span class="pay-badge">OTC</span>
      </div>
      <div class="footer-socials">
        <a class="soc-btn" href="#">f</a>
        <a class="soc-btn" href="#">𝕏</a>
        <a class="soc-btn" href="#">in</a>
        <a class="soc-btn" href="#">📷</a>
      </div>
    </div>
  </div>
</footer>

<script>
  /* ── COUNTDOWN TIMER ── */
  let endTime = Date.now() + (8 * 3600 + 34 * 60 + 17) * 1000;
  function tick() {
    const diff = Math.max(0, endTime - Date.now());
    const h = Math.floor(diff / 3600000);
    const m = Math.floor((diff % 3600000) / 60000);
    const s = Math.floor((diff % 60000) / 1000);
    document.getElementById('cd-h').textContent = String(h).padStart(2, '0');
    document.getElementById('cd-m').textContent = String(m).padStart(2, '0');
    document.getElementById('cd-s').textContent = String(s).padStart(2, '0');
  }
  tick();
  setInterval(tick, 1000);

  /* ── COPY CODE (Featured Banner) ── */
  function copyCode(code, el) {
    navigator.clipboard?.writeText(code).catch(() => {});
    const tag = document.getElementById('featured-code');
    if (tag) {
      tag.classList.add('copied');
      setTimeout(() => tag.classList.remove('copied'), 1800);
    }
    if (el && el.tagName === 'BUTTON') {
      const orig = el.textContent;
      el.textContent = '✓ Copied!';
      setTimeout(() => el.textContent = orig, 1600);
    }
  }

  /* ── COPY CARD CODE ── */
  function copyCardCode(code, el) {
    navigator.clipboard?.writeText(code).catch(() => {});
    el.classList.add('copied-state');
    setTimeout(() => el.classList.remove('copied-state'), 1800);
  }

  /* ── FILTER ── */
  function filterPromos(cat, btn) {
    document.querySelectorAll('.filter-tag').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');

    const cards = document.querySelectorAll('#promo-grid .promo-card');
    let visible = 0;
    cards.forEach(card => {
      const match = cat === 'all' || card.dataset.cat === cat;
      card.style.display = match ? '' : 'none';
      if (match) visible++;
    });
    document.getElementById('promo-count').textContent = visible;
    document.getElementById('empty-state').style.display = visible === 0 ? 'block' : 'none';
  }

  /* ── SEARCH ── */
  function searchPromos(q) {
    const query = q.toLowerCase().trim();
    const cards = document.querySelectorAll('#promo-grid .promo-card');
    let visible = 0;
    cards.forEach(card => {
      const text = (card.dataset.title || '') + ' ' + (card.textContent || '');
      const match = !query || text.toLowerCase().includes(query);
      card.style.display = match ? '' : 'none';
      if (match) visible++;
    });
    document.getElementById('promo-count').textContent = visible;
    document.getElementById('empty-state').style.display = visible === 0 ? 'block' : 'none';
  }

  /* ── SCROLL REVEAL ── */
  const ro = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('visible'); ro.unobserve(e.target); }
    });
  }, { threshold: 0.08 });
  document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

  /* ── STAGGERED CARD REVEALS ── */
  document.querySelectorAll('.promo-card.reveal').forEach((card, i) => {
    card.style.transitionDelay = `${i * 0.06}s`;
  });
</script>
</body>
</html>
