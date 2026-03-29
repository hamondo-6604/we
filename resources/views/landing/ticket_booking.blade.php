<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Book a Ticket – VoyagePH</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --ink:       #0e1117;
      --ink-mid:   #1a2235;
      --ink-soft:  #2e3a52;
      --gold:      #b8912a;
      --gold-lt:   #d4a843;
      --gold-bg:   rgba(184,145,42,.08);
      --gold-line: rgba(184,145,42,.2);
      --red:       #c0392b;
      --bg:        #f9f7f4;
      --bg-2:      #f2ede6;
      --bg-3:      #ffffff;
      --border:    #e4ddd3;
      --border-dk: #ccc4b8;
      --muted:     #7a7468;
      --muted-lt:  #a09890;
      --text:      #1a1612;
      --nav-h:     70px;
      --radius:    14px;
      --shadow-sm: 0 2px 12px rgba(14,17,23,.06);
      --shadow-md: 0 8px 32px rgba(14,17,23,.1);
      --shadow-lg: 0 20px 60px rgba(14,17,23,.14);
      --green:     #059669;
      --green-bg:  rgba(5,150,105,.08);
    }

    html { scroll-behavior: smooth; }
    body { font-family: 'Outfit', sans-serif; background: var(--bg); color: var(--text); overflow-x: hidden; }

    /* ── NAVBAR ── */
    #nav {
      position: fixed; top: 0; left: 0; right: 0;
      height: var(--nav-h); z-index: 900;
      background: rgba(249,247,244,.95);
      backdrop-filter: blur(18px) saturate(1.4);
      border-bottom: 1px solid var(--border);
      box-shadow: var(--shadow-sm);
    }
    .nav-wrap {
      max-width: 1260px; margin: 0 auto;
      height: 100%; display: flex; align-items: center; padding: 0 32px;
    }
    .logo { display: flex; align-items: center; gap: 10px; text-decoration: none; flex-shrink: 0; margin-right: 44px; }
    .logo-mark { width: 38px; height: 38px; border-radius: 9px; background: var(--ink); display: flex; align-items: center; justify-content: center; }
    .logo-mark svg { width: 20px; height: 20px; fill: none; stroke: var(--gold-lt); stroke-width: 1.8; stroke-linecap: round; }
    .logo-wordmark { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 800; color: var(--ink); letter-spacing: -.3px; }
    .logo-wordmark span { color: var(--gold); }
    .nav-links { display: flex; list-style: none; gap: 2px; }
    .nav-links a { text-decoration: none; color: var(--muted); font-size: .84rem; font-weight: 500; padding: 7px 14px; border-radius: 7px; transition: color .18s, background .18s; white-space: nowrap; }
    .nav-links a:hover { color: var(--ink); background: var(--bg-2); }
    .nav-links a.active { color: var(--ink); font-weight: 600; position: relative; }
    .nav-links a.active::after { content: ''; position: absolute; bottom: -1px; left: 14px; right: 14px; height: 2px; background: var(--gold); border-radius: 2px; }
    .nav-right { margin-left: auto; display: flex; align-items: center; gap: 8px; }
    .btn-nav { background: none; border: 1.5px solid var(--border-dk); color: var(--ink-soft); padding: 8px 18px; border-radius: 8px; font-size: .83rem; font-weight: 600; cursor: pointer; font-family: 'Outfit', sans-serif; transition: all .18s; }
    .btn-nav:hover { border-color: var(--ink); color: var(--ink); }
    .btn-nav-solid { background: var(--ink); color: #fff; border: none; padding: 9px 20px; border-radius: 8px; font-size: .83rem; font-weight: 700; cursor: pointer; font-family: 'Outfit', sans-serif; transition: all .2s; }
    .btn-nav-solid:hover { background: var(--ink-mid); transform: translateY(-1px); box-shadow: 0 6px 20px rgba(14,17,23,.2); }

    /* ── STEP PROGRESS BAR ── */
    .steps-bar {
      position: sticky; top: var(--nav-h); z-index: 800;
      background: var(--bg-3); border-bottom: 1px solid var(--border);
      padding: 0 32px; box-shadow: var(--shadow-sm);
    }
    .steps-inner { max-width: 1260px; margin: 0 auto; display: flex; align-items: stretch; }
    .step-item {
      display: flex; align-items: center; gap: 12px;
      padding: 18px 32px 18px 0;
      position: relative; cursor: pointer; flex-shrink: 0;
      transition: all .2s;
    }
    .step-item:first-child { padding-left: 0; }
    .step-item + .step-item::before { content: '›'; color: var(--border-dk); font-size: 1.2rem; margin-right: 32px; }
    .step-dot {
      width: 32px; height: 32px; border-radius: 50%;
      border: 1.5px solid var(--border-dk);
      display: flex; align-items: center; justify-content: center;
      font-size: .75rem; font-weight: 700;
      color: var(--muted); background: var(--bg); flex-shrink: 0; transition: all .25s;
    }
    .step-item.done .step-dot { background: var(--green); border-color: var(--green); color: #fff; }
    .step-item.active .step-dot { background: var(--ink); border-color: var(--ink); color: #fff; }
    .step-label { font-size: .8rem; font-weight: 600; color: var(--muted); white-space: nowrap; }
    .step-item.active .step-label { color: var(--ink); }
    .step-item.done .step-label { color: var(--green); }

    /* ── PAGE HEADER ── */
    .page-header {
      padding-top: calc(var(--nav-h) + 52px);
      padding-bottom: 40px; padding-left: 32px; padding-right: 32px;
      background: linear-gradient(160deg, #fff 0%, var(--bg) 100%);
      position: relative; overflow: hidden;
    }
    .page-header::before {
      content: ''; position: absolute; top: 0; right: 0;
      width: 50%; height: 100%;
      background: radial-gradient(ellipse 70% 70% at 80% 40%, rgba(184,145,42,.07) 0%, transparent 65%);
      pointer-events: none;
    }
    .ph-inner { max-width: 1260px; margin: 0 auto; position: relative; z-index: 1; }
    .ph-eyebrow { display: inline-flex; align-items: center; gap: 8px; font-size: .72rem; font-weight: 700; letter-spacing: 2.5px; text-transform: uppercase; color: var(--gold); margin-bottom: 14px; }
    .ph-eyebrow::before { content: ''; width: 28px; height: 1.5px; background: var(--gold); }
    .ph-heading { font-family: 'Playfair Display', serif; font-size: clamp(2rem, 3.5vw, 2.8rem); font-weight: 800; line-height: 1.1; letter-spacing: -.3px; color: var(--ink); }
    .ph-heading em { font-style: italic; color: var(--gold); }
    .ph-sub { color: var(--muted); font-size: .95rem; line-height: 1.7; margin-top: 12px; max-width: 440px; }
    .breadcrumb { display: flex; align-items: center; gap: 8px; font-size: .75rem; color: var(--muted-lt); margin-bottom: 28px; }
    .breadcrumb a { color: var(--muted); text-decoration: none; font-weight: 500; }
    .breadcrumb a:hover { color: var(--gold); }
    .breadcrumb .sep { color: var(--border-dk); }
    .breadcrumb .cur { color: var(--gold); font-weight: 600; }

    /* ── MAIN LAYOUT ── */
    .booking-layout {
      max-width: 1260px; margin: 0 auto;
      padding: 40px 32px 80px;
      display: grid; grid-template-columns: 1fr 380px;
      gap: 32px; align-items: start;
    }

    /* ── CARDS ── */
    .card { background: var(--bg-3); border: 1px solid var(--border); border-radius: 18px; box-shadow: var(--shadow-sm); overflow: hidden; }
    .card-head { padding: 22px 28px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 14px; }
    .card-head-icon { width: 40px; height: 40px; border-radius: 10px; background: var(--gold-bg); border: 1px solid var(--gold-line); display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; }
    .card-head h2 { font-family: 'Playfair Display', serif; font-size: 1.15rem; font-weight: 800; color: var(--ink); }
    .card-head p { font-size: .8rem; color: var(--muted); margin-top: 2px; }
    .card-body { padding: 28px; }

    /* ── FORM ELEMENTS ── */
    .trip-tabs { display: flex; gap: 6px; margin-bottom: 24px; }
    .trip-tab { flex: 1; padding: 10px 16px; border-radius: 9px; border: 1.5px solid var(--border); background: none; font-family: 'Outfit', sans-serif; font-size: .82rem; font-weight: 600; cursor: pointer; color: var(--muted); transition: all .18s; display: flex; align-items: center; justify-content: center; gap: 6px; }
    .trip-tab.active { background: var(--ink); color: #fff; border-color: var(--ink); }
    .trip-tab:not(.active):hover { border-color: var(--border-dk); color: var(--ink); }
    .form-row { display: grid; gap: 14px; margin-bottom: 14px; }
    .form-row.cols-2 { grid-template-columns: 1fr 1fr; }
    .form-row.cols-3 { grid-template-columns: 1fr auto 1fr; }
    .form-field { display: flex; flex-direction: column; gap: 6px; }
    .form-field label { font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--muted); }
    .field-wrap { position: relative; }
    .field-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--muted-lt); pointer-events: none; display: flex; align-items: center; }
    .field-icon svg { width: 16px; height: 16px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; }
    .form-field select, .form-field input[type="text"], .form-field input[type="date"], .form-field input[type="email"], .form-field input[type="tel"], .form-field input[type="number"] {
      background: var(--bg); border: 1.5px solid var(--border); border-radius: 10px; padding: 13px 14px 13px 40px;
      color: var(--text); font-size: .9rem; font-family: 'Outfit', sans-serif; outline: none;
      transition: border-color .18s, box-shadow .18s; appearance: none; width: 100%;
    }
    .form-field select:focus, .form-field input:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(184,145,42,.12); }
    .no-icon select, .no-icon input { padding-left: 14px; }
    .swap-btn { align-self: end; padding-bottom: 3px; display: flex; align-items: flex-end; justify-content: center; }
    .swap-btn button { width: 38px; height: 46px; border-radius: 9px; border: 1.5px solid var(--border-dk); background: var(--bg-2); cursor: pointer; display: flex; align-items: center; justify-content: center; color: var(--muted); transition: all .2s; }
    .swap-btn button:hover { background: var(--ink); color: #fff; border-color: var(--ink); }
    .swap-btn button svg { width: 16px; height: 16px; fill: none; stroke: currentColor; stroke-width: 2; stroke-linecap: round; }
    .pax-row { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; margin-bottom: 14px; }
    .pax-field { border: 1.5px solid var(--border); border-radius: 10px; padding: 12px 14px; background: var(--bg); display: flex; flex-direction: column; gap: 6px; transition: border-color .18s; }
    .pax-field:focus-within { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(184,145,42,.12); }
    .pax-label { font-size: .65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--muted); }
    .pax-ctrl { display: flex; align-items: center; gap: 8px; }
    .pax-btn { width: 26px; height: 26px; border-radius: 6px; border: 1.5px solid var(--border-dk); background: var(--bg-3); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; line-height: 1; color: var(--ink); font-weight: 700; transition: all .15s; }
    .pax-btn:hover { background: var(--ink); color: #fff; border-color: var(--ink); }
    .pax-num { font-size: 1rem; font-weight: 700; color: var(--ink); flex: 1; text-align: center; }
    .class-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; margin-bottom: 20px; }
    .class-card { border: 1.5px solid var(--border); border-radius: 10px; padding: 14px 12px; cursor: pointer; transition: all .18s; text-align: center; position: relative; overflow: hidden; }
    .class-card:hover { border-color: var(--border-dk); }
    .class-card.selected { border-color: var(--gold); background: var(--gold-bg); }
    .class-card.selected::after { content: '✓'; position: absolute; top: 8px; right: 10px; font-size: .7rem; color: var(--gold); font-weight: 800; }
    .class-icon { font-size: 1.5rem; margin-bottom: 6px; }
    .class-name { font-size: .78rem; font-weight: 700; color: var(--ink); }
    .class-price { font-size: .72rem; color: var(--muted); margin-top: 2px; }

    /* ── CTA BUTTONS ── */
    .btn-primary {
      background: var(--ink); color: #fff; border: none; width: 100%;
      padding: 15px; border-radius: 10px; font-size: .95rem; font-weight: 700; cursor: pointer;
      font-family: 'Outfit', sans-serif; transition: all .2s;
      display: flex; align-items: center; justify-content: center; gap: 8px; margin-top: 4px;
    }
    .btn-primary:hover { background: var(--ink-mid); transform: translateY(-1px); box-shadow: 0 10px 30px rgba(14,17,23,.2); }
    .btn-primary svg { width: 16px; height: 16px; fill: none; stroke: currentColor; stroke-width: 2.2; stroke-linecap: round; }
    .btn-secondary {
      background: none; color: var(--ink); border: 1.5px solid var(--border-dk);
      padding: 13px 28px; border-radius: 10px; font-size: .9rem; font-weight: 600; cursor: pointer;
      font-family: 'Outfit', sans-serif; transition: all .2s; display: flex; align-items: center; gap: 8px;
    }
    .btn-secondary:hover { border-color: var(--ink); background: var(--bg-2); }
    .btn-row { display: flex; gap: 12px; margin-top: 28px; }
    .btn-row .btn-primary { flex: 1; }

    /* ── RESULTS ── */
    .filter-chips { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 20px; }
    .chip { padding: 6px 14px; border-radius: 50px; border: 1.5px solid var(--border); background: var(--bg-3); font-size: .78rem; font-weight: 600; cursor: pointer; color: var(--muted); transition: all .18s; white-space: nowrap; font-family: 'Outfit', sans-serif; }
    .chip:hover { border-color: var(--border-dk); color: var(--ink); }
    .chip.active { background: var(--ink); color: #fff; border-color: var(--ink); }
    .results-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
    .results-title { font-family: 'Playfair Display', serif; font-size: 1.1rem; font-weight: 800; color: var(--ink); }
    .results-count { font-size: .8rem; color: var(--muted); margin-top: 2px; }
    .sort-select { padding: 8px 12px; border-radius: 8px; border: 1.5px solid var(--border); background: var(--bg); color: var(--text); font-size: .8rem; font-weight: 600; font-family: 'Outfit', sans-serif; outline: none; cursor: pointer; appearance: none; }
    .sort-select:focus { border-color: var(--gold); }
    .result-card {
      background: var(--bg-3); border: 1px solid var(--border);
      border-radius: 14px; overflow: hidden; margin-bottom: 14px;
      cursor: pointer; position: relative; transition: all .2s;
    }
    .result-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: var(--border-dk); }
    .result-card.featured { border-color: var(--gold); }
    .result-card.rc-selected { border-color: var(--green); box-shadow: 0 0 0 3px rgba(5,150,105,.15); }
    .featured-badge { position: absolute; top: 0; right: 0; background: var(--gold); color: var(--ink); font-size: .65rem; font-weight: 800; padding: 4px 12px; border-radius: 0 0 0 10px; letter-spacing: .5px; text-transform: uppercase; }
    .rc-main { padding: 20px 22px; display: grid; grid-template-columns: 1fr auto auto auto; gap: 22px; align-items: center; }
    .rc-operator { display: flex; align-items: center; gap: 12px; }
    .op-logo { width: 44px; height: 44px; border-radius: 10px; background: var(--ink); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; }
    .op-name { font-size: .9rem; font-weight: 700; color: var(--ink); }
    .op-class { font-size: .73rem; color: var(--muted); margin-top: 2px; }
    .op-class span { display: inline-block; padding: 2px 8px; border-radius: 4px; font-size: .65rem; font-weight: 700; margin-left: 4px; }
    .cls-luxury { background: var(--gold-bg); color: var(--gold); }
    .cls-premier { background: rgba(14,17,23,.06); color: var(--ink-soft); }
    .cls-economy { background: var(--green-bg); color: var(--green); }
    .rc-time { text-align: center; }
    .rc-time-dep { font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 800; color: var(--ink); }
    .rc-time-city { font-size: .72rem; color: var(--muted); margin-top: 2px; }
    .rc-duration { display: flex; flex-direction: column; align-items: center; gap: 4px; min-width: 100px; }
    .dur-line { width: 100%; height: 1px; background: var(--border-dk); position: relative; display: flex; align-items: center; justify-content: center; }
    .dur-line::before, .dur-line::after { content: ''; position: absolute; width: 6px; height: 6px; border-radius: 50%; background: var(--border-dk); }
    .dur-line::before { left: 0; } .dur-line::after { right: 0; }
    .dur-label { font-size: .72rem; color: var(--muted); font-weight: 500; }
    .dur-time { font-size: .82rem; font-weight: 700; color: var(--ink-soft); }
    .rc-price-block { text-align: right; min-width: 140px; }
    .rc-price-label { font-size: .68rem; color: var(--muted-lt); text-transform: uppercase; letter-spacing: .5px; margin-bottom: 3px; }
    .rc-price-main { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 800; color: var(--gold); line-height: 1; }
    .rc-price-main small { font-family: 'Outfit', sans-serif; font-size: .72rem; color: var(--muted); font-weight: 400; }
    .rc-old-price { font-size: .78rem; color: var(--muted-lt); text-decoration: line-through; margin-top: 2px; }
    .rc-book-btn { margin-top: 10px; width: 100%; background: var(--ink); color: #fff; border: none; padding: 10px 20px; border-radius: 8px; font-size: .82rem; font-weight: 700; cursor: pointer; font-family: 'Outfit', sans-serif; transition: all .2s; }
    .rc-book-btn:hover { background: var(--gold); }
    .rc-footer { border-top: 1px solid var(--border); padding: 11px 22px; display: flex; align-items: center; gap: 16px; background: var(--bg); }
    .rc-amenity { display: flex; align-items: center; gap: 5px; font-size: .73rem; color: var(--muted); font-weight: 500; }
    .rc-amenity svg { width: 13px; height: 13px; fill: none; stroke: var(--green); stroke-width: 2.2; stroke-linecap: round; }
    .rc-seats { margin-left: auto; font-size: .73rem; font-weight: 700; }
    .seats-low { color: var(--red); } .seats-ok { color: var(--green); }

    /* ── SEAT MAP ── */
    .seat-bus-wrap { background: var(--bg); border: 1px solid var(--border); border-radius: 14px; padding: 20px; }
    .bus-front { text-align: center; font-size: .78rem; font-weight: 600; color: var(--muted); padding-bottom: 14px; border-bottom: 2px dashed var(--border-dk); margin-bottom: 18px; }
    .seat-rows { display: flex; flex-direction: column; gap: 8px; }
    .seat-row { display: grid; grid-template-columns: 26px repeat(2,38px) 20px repeat(2,38px); gap: 6px; align-items: center; }
    .row-num { font-size: .7rem; font-weight: 700; color: var(--muted-lt); text-align: center; }
    .seat {
      width: 38px; height: 38px; border-radius: 8px;
      border: 1.5px solid var(--border-dk); background: var(--bg-3);
      display: flex; align-items: center; justify-content: center;
      font-size: .7rem; font-weight: 700; color: var(--ink);
      cursor: pointer; transition: all .18s; user-select: none;
    }
    .seat:hover:not(.taken) { border-color: var(--gold); background: var(--gold-bg); color: var(--gold); }
    .seat.taken { background: var(--bg-2); color: var(--muted-lt); cursor: not-allowed; border-color: var(--border); }
    .seat.selected { background: var(--ink); color: #fff; border-color: var(--ink); }
    .seat.ladies { background: rgba(236,72,153,.06); border-color: rgba(236,72,153,.35); color: #be185d; }
    .seat.ladies:hover { background: rgba(236,72,153,.12); }
    .seat-legend { display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 16px; }
    .sl-item { display: flex; align-items: center; gap: 6px; font-size: .75rem; color: var(--muted); font-weight: 500; }
    .sl-dot { width: 16px; height: 16px; border-radius: 4px; border: 1.5px solid; }
    .sl-avail { background: var(--bg-3); border-color: var(--border-dk); }
    .sl-sel { background: var(--ink); border-color: var(--ink); }
    .sl-taken { background: var(--bg-2); border-color: var(--border); }
    .sl-ladies { background: rgba(236,72,153,.06); border-color: rgba(236,72,153,.35); }

    /* ── PASSENGER FORM ── */
    .pax-section { margin-bottom: 28px; }
    .pax-section-title { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 800; color: var(--ink); margin-bottom: 16px; display: flex; align-items: center; gap: 10px; }
    .pax-num-badge { background: var(--ink); color: #fff; width: 24px; height: 24px; border-radius: 6px; display: inline-flex; align-items: center; justify-content: center; font-size: .72rem; font-weight: 800; font-family: 'Outfit', sans-serif; }
    .divider { height: 1px; background: var(--border); margin: 24px 0; }

    /* ── PAYMENT ── */
    .pay-methods { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px; }
    .pay-method {
      border: 1.5px solid var(--border); border-radius: 12px;
      padding: 16px; cursor: pointer; transition: all .18s;
      display: flex; align-items: center; gap: 12px;
    }
    .pay-method:hover { border-color: var(--border-dk); }
    .pay-method.selected { border-color: var(--gold); background: var(--gold-bg); }
    .pay-method-icon { font-size: 1.6rem; flex-shrink: 0; }
    .pay-method-name { font-size: .88rem; font-weight: 700; color: var(--ink); }
    .pay-method-sub { font-size: .72rem; color: var(--muted); margin-top: 2px; }
    .pay-method .check { margin-left: auto; width: 20px; height: 20px; border-radius: 50%; border: 1.5px solid var(--border-dk); flex-shrink: 0; transition: all .18s; display: flex; align-items: center; justify-content: center; }
    .pay-method.selected .check { background: var(--gold); border-color: var(--gold); color: #fff; font-size: .7rem; }
    .card-fields { display: none; }
    .card-fields.show { display: block; }
    .card-num-wrap { position: relative; }
    .card-brands { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); display: flex; gap: 4px; }
    .card-brand { font-size: .65rem; font-weight: 800; padding: 2px 6px; border-radius: 3px; }
    .cb-visa { background: #1a1f71; color: #fff; }
    .cb-mc { background: #eb001b; color: #fff; }

    /* ── CONFIRMATION ── */
    .confirm-hero { text-align: center; padding: 40px 28px; }
    .confirm-check { width: 72px; height: 72px; background: var(--green); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; animation: popIn .4s ease; }
    .confirm-check svg { width: 36px; height: 36px; stroke: #fff; fill: none; stroke-width: 2.5; stroke-linecap: round; }
    @keyframes popIn { from { transform: scale(.3); opacity: 0; } to { transform: scale(1); opacity: 1; } }
    .confirm-title { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 800; color: var(--ink); margin-bottom: 8px; }
    .confirm-sub { color: var(--muted); font-size: .95rem; line-height: 1.6; }
    .ref-code { display: inline-block; background: var(--gold-bg); border: 1.5px solid var(--gold-line); padding: 10px 20px; border-radius: 8px; font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 800; color: var(--gold); margin: 20px 0; letter-spacing: 2px; }
    .ticket-card {
      background: var(--bg-3); border: 1px solid var(--border); border-radius: 18px;
      overflow: hidden; margin: 0 28px 28px;
    }
    .ticket-head { background: var(--ink); padding: 20px 24px; color: #fff; display: flex; align-items: center; justify-content: space-between; }
    .ticket-head-logo { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 800; }
    .ticket-head-logo span { color: var(--gold); }
    .ticket-head-status { font-size: .72rem; font-weight: 700; background: var(--green); color: #fff; padding: 4px 10px; border-radius: 50px; }
    .ticket-body { padding: 24px; }
    .ticket-route { display: flex; align-items: center; gap: 20px; margin-bottom: 22px; }
    .tr-city-name { font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 800; color: var(--ink); }
    .tr-city-full { font-size: .78rem; color: var(--muted); margin-top: 2px; }
    .tr-line { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 4px; }
    .tr-arrow { font-size: 1.5rem; color: var(--gold); }
    .tr-dur { font-size: .72rem; color: var(--muted); font-weight: 600; }
    .ticket-details { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; }
    .td-label { font-size: .65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--muted-lt); margin-bottom: 4px; }
    .td-val { font-size: .9rem; font-weight: 700; color: var(--ink); }
    .ticket-divider { border: none; border-top: 2px dashed var(--border); margin: 20px 0; position: relative; }
    .ticket-divider::before, .ticket-divider::after { content: ''; position: absolute; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; background: var(--bg); border-radius: 50%; border: 1px solid var(--border); }
    .ticket-divider::before { left: -8px; } .ticket-divider::after { right: -8px; }

    /* ── SUMMARY SIDEBAR ── */
    .sidebar { display: flex; flex-direction: column; gap: 20px; }
    .summary-card { background: var(--bg-3); border: 1px solid var(--border); border-radius: 18px; overflow: hidden; }
    .summary-head { background: var(--ink); padding: 22px 24px; color: #fff; }
    .summary-head h3 { font-family: 'Playfair Display', serif; font-size: 1.05rem; font-weight: 800; }
    .summary-head p { font-size: .78rem; color: rgba(255,255,255,.45); margin-top: 4px; }
    .summary-body { padding: 20px 24px; }
    .summary-route { display: flex; align-items: center; gap: 10px; padding: 14px; border-radius: 10px; background: var(--bg); border: 1px solid var(--border); margin-bottom: 14px; }
    .sr-city { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 800; color: var(--ink); }
    .sr-arrow { color: var(--gold); font-size: 1rem; flex: 1; text-align: center; }
    .sr-meta { font-size: .72rem; color: var(--muted); margin-top: 3px; }
    .summary-line { display: flex; justify-content: space-between; align-items: center; padding: 8px 0; font-size: .83rem; border-bottom: 1px solid var(--border); }
    .summary-line:last-of-type { border-bottom: none; }
    .summary-line .sl-label { color: var(--muted); }
    .summary-line .sl-val { font-weight: 600; color: var(--ink); }
    .summary-total { display: flex; justify-content: space-between; align-items: center; padding: 14px 0 0; margin-top: 4px; border-top: 2px solid var(--border); }
    .st-label { font-size: .85rem; font-weight: 700; color: var(--ink); }
    .st-amount { font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 800; color: var(--gold); }
    .st-amount small { font-family: 'Outfit', sans-serif; font-size: .72rem; color: var(--muted); font-weight: 400; }
    .promo-row { display: flex; gap: 8px; margin-top: 14px; }
    .promo-input { flex: 1; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: 8px; background: var(--bg); font-size: .83rem; font-family: 'Outfit', sans-serif; outline: none; color: var(--text); transition: border-color .18s; }
    .promo-input:focus { border-color: var(--gold); }
    .promo-apply { padding: 10px 16px; border-radius: 8px; border: 1.5px solid var(--border-dk); background: none; font-size: .8rem; font-weight: 700; cursor: pointer; color: var(--ink); font-family: 'Outfit', sans-serif; transition: all .18s; }
    .promo-apply:hover { background: var(--ink); color: #fff; border-color: var(--ink); }
    .info-card { background: var(--bg-3); border: 1px solid var(--border); border-radius: 14px; padding: 18px 20px; }
    .info-card h4 { font-family: 'Playfair Display', serif; font-size: .95rem; font-weight: 800; color: var(--ink); margin-bottom: 12px; display: flex; align-items: center; gap: 8px; }
    .info-card h4 svg { width: 16px; height: 16px; fill: none; stroke: var(--gold); stroke-width: 2; stroke-linecap: round; }
    .info-item { display: flex; align-items: flex-start; gap: 8px; margin-bottom: 8px; }
    .info-item:last-child { margin-bottom: 0; }
    .info-item svg { width: 14px; height: 14px; fill: none; stroke: var(--green); stroke-width: 2.2; stroke-linecap: round; flex-shrink: 0; margin-top: 2px; }
    .info-item span { font-size: .78rem; color: var(--muted); line-height: 1.5; }

    /* ── STEPS (PAGES) ── */
    .step-page { display: none; }
    .step-page.active { display: block; }

    /* ── REVEAL ANIM ── */
    .reveal { opacity: 0; transform: translateY(16px); transition: opacity .4s ease, transform .4s ease; }
    .reveal.in { opacity: 1; transform: none; }

    /* ── TOAST ── */
    .toast {
      position: fixed; bottom: 32px; right: 32px; z-index: 9999;
      background: var(--ink); color: #fff; padding: 14px 22px; border-radius: 12px;
      font-size: .88rem; font-weight: 600; box-shadow: var(--shadow-lg);
      display: flex; align-items: center; gap: 10px;
      transform: translateY(80px); opacity: 0;
      transition: all .3s cubic-bezier(.34,1.56,.64,1);
      pointer-events: none;
    }
    .toast.show { transform: translateY(0); opacity: 1; }
    .toast .t-icon { font-size: 1rem; }

    /* ── FOOTER ── */
    footer { background: var(--ink); color: rgba(255,255,255,.55); padding: 28px 32px; }
    .footer-inner { max-width: 1260px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; }
    .footer-payments { display: flex; align-items: center; gap: 6px; }
    .pay-badge { font-size: .65rem; font-weight: 800; padding: 3px 8px; border-radius: 4px; background: rgba(255,255,255,.1); color: rgba(255,255,255,.6); }
    .footer-socials { display: flex; gap: 6px; }
    .soc-btn { width: 30px; height: 30px; border-radius: 7px; background: rgba(255,255,255,.08); display: flex; align-items: center; justify-content: center; font-size: .7rem; color: rgba(255,255,255,.5); text-decoration: none; transition: all .18s; }
    .soc-btn:hover { background: var(--gold); color: var(--ink); }

    /* ── RESPONSIVE ── */
    @media (max-width: 900px) {
      .booking-layout { grid-template-columns: 1fr; }
      .sidebar { order: -1; }
      .steps-inner { overflow-x: auto; }
      .step-item { padding: 14px 18px 14px 0; }
    }
    @media (max-width: 640px) {
      .nav-links { display: none; }
      .booking-layout { padding: 24px 16px 60px; }
      .card-body { padding: 20px; }
      .rc-main { grid-template-columns: 1fr auto; }
      .rc-duration, .rc-time:last-of-type { display: none; }
      .pay-methods { grid-template-columns: 1fr; }
      .ticket-details { grid-template-columns: 1fr 1fr; }
    }
  </style>
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<nav id="nav">
  <div class="nav-wrap">
    <a href="#" class="logo">
      <div class="logo-mark">
        <svg viewBox="0 0 24 24"><path d="M12 2 L4 7 L4 17 L12 22 L20 17 L20 7 Z"/><path d="M12 7 L12 17 M8 9.5 L16 9.5 M8 14.5 L16 14.5"/></svg>
      </div>
      <span class="logo-wordmark">Voyage<span>PH</span></span>
    </a>
    <ul class="nav-links">
      <li><a href="{{ route('landing.home') }}">Home</a></li>
      <li><a href="#" class="active">Book a Ticket</a></li>
      <li><a href="{{ route('landing.booking_routes') }}">Routes</a></li>
      <li><a href="#">Promos</a></li>
      @auth
      <li><a href="{{ route('manage.bookings') }}">Manage Bookings</a></li>
      @endauth
    </ul>
    <div class="nav-right">
      <button class="btn-nav">Log In</button>
      <button class="btn-nav-solid">Register</button>
    </div>
  </div>
</nav>

<!-- ═══ PAGE HEADER ═══ -->
<div class="page-header">
  <div class="ph-inner">
    <nav class="breadcrumb">
      <a href="#">Home</a><span class="sep">/</span>
      <span class="cur" id="breadcrumb-cur">Search & Select Trip</span>
    </nav>
    <div class="ph-eyebrow">Book a Ticket</div>
    <h1 class="ph-heading" id="page-title">Find Your <em>Perfect Journey</em></h1>
    <p class="ph-sub" id="page-sub">Search thousands of routes across the Philippines. Flexible schedules, premium comfort.</p>
  </div>
</div>

<!-- ═══ STEPS BAR ═══ -->
<div class="steps-bar">
  <div class="steps-inner">
    <div class="step-item active" id="step-nav-1" onclick="goToStep(1)">
      <div class="step-dot">1</div>
      <div class="step-label">Search & Select</div>
    </div>
    <div class="step-item" id="step-nav-2" onclick="goToStep(2)">
      <div class="step-dot">2</div>
      <div class="step-label">Choose Seat</div>
    </div>
    <div class="step-item" id="step-nav-3" onclick="goToStep(3)">
      <div class="step-dot">3</div>
      <div class="step-label">Passenger Details</div>
    </div>
    <div class="step-item" id="step-nav-4" onclick="goToStep(4)">
      <div class="step-dot">4</div>
      <div class="step-label">Payment</div>
    </div>
    <div class="step-item" id="step-nav-5" onclick="goToStep(5)">
      <div class="step-dot">5</div>
      <div class="step-label">Confirmation</div>
    </div>
  </div>
</div>

<!-- ═══ MAIN ═══ -->
<main>
  <div class="booking-layout">

    <!-- LEFT COLUMN -->
    <div id="main-col">

      <!-- ══ STEP 1: SEARCH & SELECT ══ -->
      <div class="step-page active" id="page-1">

        <!-- Search Form -->
        <div class="card reveal in" style="margin-bottom:28px;">
          <div class="card-head">
            <div class="card-head-icon">🔍</div>
            <div>
              <h2>Plan Your Trip</h2>
              <p>Choose route, date and travel class</p>
            </div>
          </div>
          <div class="card-body">
            <div class="trip-tabs">
              <button class="trip-tab active" onclick="setTrip(this,'one')">🎫 One-Way</button>
              <button class="trip-tab" onclick="setTrip(this,'round')">🔄 Round Trip</button>
            </div>
            <div class="form-row cols-3">
              <div class="form-field">
                <label>From</label>
                <div class="field-wrap">
                  <span class="field-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="10" r="3"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg></span>
                  <select id="origin">
                    <option value="">Select City</option>
                    <option value="MNL" selected>Manila (Cubao)</option>
                    <option value="QC">Quezon City (Araneta)</option>
                    <option value="PSY">Pasay (PITX)</option>
                    <option value="CLK">Clark, Pampanga</option>
                    <option value="SFO">San Fernando, La Union</option>
                    <option value="BAG">Baguio City</option>
                    <option value="DAG">Dagupan City</option>
                  </select>
                </div>
              </div>
              <div class="swap-btn">
                <button onclick="swapCities()" title="Swap">
                  <svg viewBox="0 0 24 24"><path d="M7 16V4M7 4L4 7M7 4L10 7"/><path d="M17 8V20M17 20L20 17M17 20L14 17"/></svg>
                </button>
              </div>
              <div class="form-field">
                <label>To</label>
                <div class="field-wrap">
                  <span class="field-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="10" r="3"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg></span>
                  <select id="destination">
                    <option value="">Select City</option>
                    <option value="BAG" selected>Baguio City</option>
                    <option value="MNL">Manila (Cubao)</option>
                    <option value="QC">Quezon City (Araneta)</option>
                    <option value="ILO">Iloilo City</option>
                    <option value="CDO">Cagayan de Oro</option>
                    <option value="DAV">Davao City</option>
                    <option value="CEB">Cebu City (South Terminal)</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row cols-2">
              <div class="form-field">
                <label>Departure Date</label>
                <div class="field-wrap">
                  <span class="field-icon"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></span>
                  <input type="date" id="dep-date" value="2026-04-05"/>
                </div>
              </div>
              <div class="form-field" id="ret-field" style="display:none;">
                <label>Return Date</label>
                <div class="field-wrap">
                  <span class="field-icon"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg></span>
                  <input type="date" id="ret-date" value="2026-04-08"/>
                </div>
              </div>
            </div>
            <div class="pax-row">
              <div class="pax-field">
                <div class="pax-label">Adults <span style="font-weight:400;letter-spacing:0">(12+)</span></div>
                <div class="pax-ctrl">
                  <button class="pax-btn" onclick="changePax('adults',-1)">−</button>
                  <span class="pax-num" id="adults-num">1</span>
                  <button class="pax-btn" onclick="changePax('adults',1)">+</button>
                </div>
              </div>
              <div class="pax-field">
                <div class="pax-label">Children <span style="font-weight:400;letter-spacing:0">(3–11)</span></div>
                <div class="pax-ctrl">
                  <button class="pax-btn" onclick="changePax('children',-1)">−</button>
                  <span class="pax-num" id="children-num">0</span>
                  <button class="pax-btn" onclick="changePax('children',1)">+</button>
                </div>
              </div>
              <div class="pax-field">
                <div class="pax-label">Senior/PWD</div>
                <div class="pax-ctrl">
                  <button class="pax-btn" onclick="changePax('senior',-1)">−</button>
                  <span class="pax-num" id="senior-num">0</span>
                  <button class="pax-btn" onclick="changePax('senior',1)">+</button>
                </div>
              </div>
            </div>
            <div class="class-grid">
              <div class="class-card" onclick="selectClass(this,'economy')">
                <div class="class-icon">🚌</div>
                <div class="class-name">Economy</div>
                <div class="class-price">From ₱380</div>
              </div>
              <div class="class-card selected" onclick="selectClass(this,'premier')">
                <div class="class-icon">⭐</div>
                <div class="class-name">Premier</div>
                <div class="class-price">From ₱580</div>
              </div>
              <div class="class-card" onclick="selectClass(this,'luxury')">
                <div class="class-icon">👑</div>
                <div class="class-name">Luxury</div>
                <div class="class-price">From ₱980</div>
              </div>
            </div>
            <button class="btn-primary" onclick="searchTrips()">
              <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
              Search Available Trips
            </button>
          </div>
        </div>

        <!-- Results -->
        <div id="results-section" style="display:none;">
          <div class="results-header">
            <div>
              <div class="results-title">Available Trips</div>
              <div class="results-count">6 trips found · Manila → Baguio · Apr 5, 2026</div>
            </div>
            <select class="sort-select">
              <option>Earliest Departure</option>
              <option>Lowest Price</option>
              <option>Shortest Duration</option>
            </select>
          </div>
          <div class="filter-chips">
            <button class="chip active" onclick="setChip(this)">All</button>
            <button class="chip" onclick="setChip(this)">Economy</button>
            <button class="chip" onclick="setChip(this)">Premier</button>
            <button class="chip" onclick="setChip(this)">Luxury</button>
            <button class="chip" onclick="setChip(this)">Night Trip</button>
            <button class="chip" onclick="setChip(this)">Direct</button>
          </div>

          <!-- Trip Cards -->
          <div class="result-card featured reveal in" onclick="selectTrip(this,'VoyagePH Express','06:00 AM','12:30 PM','6h 30m','Premier','₱680','₱850')">
            <div class="featured-badge">⭐ Best Value</div>
            <div class="rc-main">
              <div class="rc-operator">
                <div class="op-logo">🚌</div>
                <div>
                  <div class="op-name">VoyagePH Express</div>
                  <div class="op-class">Direct · Non-stop <span class="cls-premier">Premier</span></div>
                </div>
              </div>
              <div class="rc-time">
                <div class="rc-time-dep">06:00</div>
                <div class="rc-time-city">Manila, Cubao</div>
              </div>
              <div class="rc-duration">
                <div class="dur-label">6h 30m</div>
                <div class="dur-line"></div>
                <div class="dur-time">Direct</div>
              </div>
              <div class="rc-time">
                <div class="rc-time-dep">12:30</div>
                <div class="rc-time-city">Baguio City</div>
              </div>
              <div class="rc-price-block">
                <div class="rc-price-label">per person</div>
                <div class="rc-price-main">₱680<small>/pax</small></div>
                <div class="rc-old-price">₱850</div>
                <button class="rc-book-btn" onclick="event.stopPropagation();selectTrip(this.closest('.result-card'),'VoyagePH Express','06:00 AM','12:30 PM','6h 30m','Premier','₱680','₱850')">Select Trip →</button>
              </div>
            </div>
            <div class="rc-footer">
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>WiFi</span>
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>Reclining Seats</span>
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>AC</span>
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>USB Charging</span>
              <span class="rc-seats seats-low" style="margin-left:auto;">⚠ 5 seats left</span>
            </div>
          </div>

          <div class="result-card reveal in" onclick="selectTrip(this,'Victory Liner','08:30 AM','03:15 PM','6h 45m','Economy','₱420','₱420')">
            <div class="rc-main">
              <div class="rc-operator">
                <div class="op-logo">🚐</div>
                <div>
                  <div class="op-name">Victory Liner</div>
                  <div class="op-class">Direct · Non-stop <span class="cls-economy">Economy</span></div>
                </div>
              </div>
              <div class="rc-time">
                <div class="rc-time-dep">08:30</div>
                <div class="rc-time-city">Manila, Cubao</div>
              </div>
              <div class="rc-duration">
                <div class="dur-label">6h 45m</div>
                <div class="dur-line"></div>
                <div class="dur-time">Direct</div>
              </div>
              <div class="rc-time">
                <div class="rc-time-dep">15:15</div>
                <div class="rc-time-city">Baguio City</div>
              </div>
              <div class="rc-price-block">
                <div class="rc-price-label">per person</div>
                <div class="rc-price-main">₱420<small>/pax</small></div>
                <button class="rc-book-btn" onclick="event.stopPropagation();selectTrip(this.closest('.result-card'),'Victory Liner','08:30 AM','03:15 PM','6h 45m','Economy','₱420','₱420')">Select Trip →</button>
              </div>
            </div>
            <div class="rc-footer">
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>AC</span>
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>Comfortable Seats</span>
              <span class="rc-seats seats-ok" style="margin-left:auto;">✓ 18 seats available</span>
            </div>
          </div>

          <div class="result-card reveal in" onclick="selectTrip(this,'Genesis Transport','10:00 AM','04:30 PM','6h 30m','Luxury','₱1,050','₱1,050')">
            <div class="rc-main">
              <div class="rc-operator">
                <div class="op-logo" style="background:var(--gold);">👑</div>
                <div>
                  <div class="op-name">Genesis Transport</div>
                  <div class="op-class">Direct · Non-stop <span class="cls-luxury">Luxury</span></div>
                </div>
              </div>
              <div class="rc-time">
                <div class="rc-time-dep">10:00</div>
                <div class="rc-time-city">Manila, Cubao</div>
              </div>
              <div class="rc-duration">
                <div class="dur-label">6h 30m</div>
                <div class="dur-line"></div>
                <div class="dur-time">Direct</div>
              </div>
              <div class="rc-time">
                <div class="rc-time-dep">16:30</div>
                <div class="rc-time-city">Baguio City</div>
              </div>
              <div class="rc-price-block">
                <div class="rc-price-label">per person</div>
                <div class="rc-price-main">₱1,050<small>/pax</small></div>
                <button class="rc-book-btn" onclick="event.stopPropagation();selectTrip(this.closest('.result-card'),'Genesis Transport','10:00 AM','04:30 PM','6h 30m','Luxury','₱1,050','₱1,050')">Select Trip →</button>
              </div>
            </div>
            <div class="rc-footer">
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>WiFi</span>
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>Lie-flat Seats</span>
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>Meal Included</span>
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>Blanket & Pillow</span>
              <span class="rc-seats seats-ok" style="margin-left:auto;">✓ 12 seats available</span>
            </div>
          </div>

          <div class="result-card reveal in" onclick="selectTrip(this,'Partas Liner','01:00 PM','07:45 PM','6h 45m','Premier','₱620','₱620')">
            <div class="rc-main">
              <div class="rc-operator">
                <div class="op-logo" style="background:#1a2235;">🚌</div>
                <div>
                  <div class="op-name">Partas Liner</div>
                  <div class="op-class">Direct · Non-stop <span class="cls-premier">Premier</span></div>
                </div>
              </div>
              <div class="rc-time">
                <div class="rc-time-dep">13:00</div>
                <div class="rc-time-city">Manila, Cubao</div>
              </div>
              <div class="rc-duration">
                <div class="dur-label">6h 45m</div>
                <div class="dur-line"></div>
                <div class="dur-time">Direct</div>
              </div>
              <div class="rc-time">
                <div class="rc-time-dep">19:45</div>
                <div class="rc-time-city">Baguio City</div>
              </div>
              <div class="rc-price-block">
                <div class="rc-price-label">per person</div>
                <div class="rc-price-main">₱620<small>/pax</small></div>
                <button class="rc-book-btn" onclick="event.stopPropagation();selectTrip(this.closest('.result-card'),'Partas Liner','01:00 PM','07:45 PM','6h 45m','Premier','₱620','₱620')">Select Trip →</button>
              </div>
            </div>
            <div class="rc-footer">
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>WiFi</span>
              <span class="rc-amenity"><svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>Reclining Seats</span>
              <span class="rc-seats seats-ok" style="margin-left:auto;">✓ 22 seats available</span>
            </div>
          </div>

        </div>
      </div>

      <!-- ══ STEP 2: CHOOSE SEAT ══ -->
      <div class="step-page" id="page-2">
        <div class="card">
          <div class="card-head">
            <div class="card-head-icon">🪑</div>
            <div>
              <h2>Choose Your Seat</h2>
              <p id="seat-trip-label">VoyagePH Express · 06:00 AM · Premier Class</p>
            </div>
          </div>
          <div class="card-body">
            <div class="seat-legend">
              <div class="sl-item"><div class="sl-dot sl-avail"></div>Available</div>
              <div class="sl-item"><div class="sl-dot sl-sel"></div>Your Selection</div>
              <div class="sl-item"><div class="sl-dot sl-taken"></div>Taken</div>
              <div class="sl-item"><div class="sl-dot sl-ladies"></div>Ladies Only</div>
            </div>
            <div class="seat-bus-wrap">
              <div class="bus-front">🚌 Driver · Front of Bus</div>
              <div class="seat-rows" id="seat-map-inline"></div>
            </div>
            <div class="btn-row">
              <button class="btn-secondary" onclick="goToStep(1)">
                <svg style="width:14px;height:14px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back
              </button>
              <button class="btn-primary" onclick="confirmSeatAndNext()">
                Continue: Passenger Details
                <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- ══ STEP 3: PASSENGER DETAILS ══ -->
      <div class="step-page" id="page-3">
        <div class="card">
          <div class="card-head">
            <div class="card-head-icon">👤</div>
            <div>
              <h2>Passenger Details</h2>
              <p>Fill in accurate details for boarding</p>
            </div>
          </div>
          <div class="card-body" id="pax-forms-container">
            <!-- Dynamically generated -->
          </div>
        </div>
      </div>

      <!-- ══ STEP 4: PAYMENT ══ -->
      <div class="step-page" id="page-4">
        <div class="card">
          <div class="card-head">
            <div class="card-head-icon">💳</div>
            <div>
              <h2>Payment</h2>
              <p>Secure payment — SSL encrypted</p>
            </div>
          </div>
          <div class="card-body">

            <div style="font-size:.8rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--muted);margin-bottom:12px;">Select Payment Method</div>
            <div class="pay-methods">
              <div class="pay-method selected" onclick="selectPayment(this,'gcash','card-fields-gcash')">
                <div class="pay-method-icon">💚</div>
                <div>
                  <div class="pay-method-name">GCash</div>
                  <div class="pay-method-sub">Mobile wallet</div>
                </div>
                <div class="check">✓</div>
              </div>
              <div class="pay-method" onclick="selectPayment(this,'maya','card-fields-maya')">
                <div class="pay-method-icon">💙</div>
                <div>
                  <div class="pay-method-name">Maya (PayMaya)</div>
                  <div class="pay-method-sub">Mobile wallet</div>
                </div>
                <div class="check"></div>
              </div>
              <div class="pay-method" onclick="selectPayment(this,'card','card-fields-card')">
                <div class="pay-method-icon">💳</div>
                <div>
                  <div class="pay-method-name">Credit / Debit Card</div>
                  <div class="pay-method-sub">Visa, Mastercard</div>
                </div>
                <div class="check"></div>
              </div>
              <div class="pay-method" onclick="selectPayment(this,'otc','card-fields-otc')">
                <div class="pay-method-icon">🏪</div>
                <div>
                  <div class="pay-method-name">Over the Counter</div>
                  <div class="pay-method-sub">7-Eleven, Bayad Center</div>
                </div>
                <div class="check"></div>
              </div>
            </div>

            <!-- GCash fields -->
            <div id="card-fields-gcash" class="card-fields show">
              <div class="form-field" style="margin-bottom:14px;">
                <label>GCash Mobile Number</label>
                <div class="field-wrap">
                  <span class="field-icon"><svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><path d="M12 18h.01"/></svg></span>
                  <input type="tel" placeholder="09XX XXX XXXX" id="gcash-num"/>
                </div>
              </div>
              <div style="background:rgba(5,150,105,.06);border:1px solid rgba(5,150,105,.2);border-radius:10px;padding:14px;font-size:.82rem;color:var(--muted);line-height:1.6;">
                📱 You will receive a GCash payment request on this number. Approve it in your GCash app to complete the booking.
              </div>
            </div>

            <!-- Maya fields -->
            <div id="card-fields-maya" class="card-fields">
              <div class="form-field" style="margin-bottom:14px;">
                <label>Maya Mobile Number</label>
                <div class="field-wrap">
                  <span class="field-icon"><svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><path d="M12 18h.01"/></svg></span>
                  <input type="tel" placeholder="09XX XXX XXXX" id="maya-num"/>
                </div>
              </div>
              <div style="background:rgba(59,130,246,.06);border:1px solid rgba(59,130,246,.2);border-radius:10px;padding:14px;font-size:.82rem;color:var(--muted);line-height:1.6;">
                📱 A Maya payment link will be sent to this number. Complete payment within 15 minutes.
              </div>
            </div>

            <!-- Credit card fields -->
            <div id="card-fields-card" class="card-fields">
              <div class="form-field" style="margin-bottom:14px;">
                <label>Cardholder Name</label>
                <div class="field-wrap no-icon">
                  <input type="text" placeholder="As printed on card" id="card-name"/>
                </div>
              </div>
              <div class="form-field" style="margin-bottom:14px;">
                <label>Card Number</label>
                <div class="field-wrap card-num-wrap">
                  <span class="field-icon"><svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/></svg></span>
                  <input type="text" placeholder="0000 0000 0000 0000" id="card-num" maxlength="19" oninput="formatCardNum(this)"/>
                  <div class="card-brands">
                    <span class="card-brand cb-visa">VISA</span>
                    <span class="card-brand cb-mc">MC</span>
                  </div>
                </div>
              </div>
              <div class="form-row cols-2">
                <div class="form-field">
                  <label>Expiry Date</label>
                  <div class="field-wrap no-icon">
                    <input type="text" placeholder="MM / YY" id="card-exp" maxlength="7" oninput="formatExpiry(this)"/>
                  </div>
                </div>
                <div class="form-field">
                  <label>CVV</label>
                  <div class="field-wrap no-icon">
                    <input type="text" placeholder="•••" id="card-cvv" maxlength="4"/>
                  </div>
                </div>
              </div>
            </div>

            <!-- OTC fields -->
            <div id="card-fields-otc" class="card-fields">
              <div style="background:var(--gold-bg);border:1px solid var(--gold-line);border-radius:10px;padding:14px;font-size:.82rem;color:var(--muted);line-height:1.6;">
                🏪 A payment reference code will be generated. Pay at any 7-Eleven, Bayad Center, or partner outlets within <strong style="color:var(--gold);">24 hours</strong> to confirm your booking.
              </div>
            </div>

            <div class="divider"></div>
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:20px;">
              <input type="checkbox" id="terms-check" style="width:16px;height:16px;accent-color:var(--ink);cursor:pointer;"/>
              <label for="terms-check" style="font-size:.82rem;color:var(--muted);cursor:pointer;line-height:1.5;">
                I agree to the <a href="#" style="color:var(--gold);font-weight:600;">Terms & Conditions</a> and <a href="#" style="color:var(--gold);font-weight:600;">Cancellation Policy</a>
              </label>
            </div>

            <div class="btn-row">
              <button class="btn-secondary" onclick="goToStep(3)">
                <svg style="width:14px;height:14px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back
              </button>
              <button class="btn-primary" onclick="processPayment()" style="flex:1;">
                🔒 Pay <span id="pay-amount">₱710.00</span> — Confirm Booking
                <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- ══ STEP 5: CONFIRMATION ══ -->
      <div class="step-page" id="page-5">
        <div class="card">
          <div class="confirm-hero">
            <div class="confirm-check">
              <svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
            </div>
            <div class="confirm-title">Booking Confirmed!</div>
            <div class="confirm-sub">Your ticket has been booked successfully. A confirmation email and SMS have been sent to your contact details.</div>
            <div class="ref-code" id="confirm-ref">VPH-2026-8437</div>
          </div>

          <div class="ticket-card" id="e-ticket">
            <div class="ticket-head">
              <div class="ticket-head-logo">Voyage<span>PH</span> · e-Ticket</div>
              <div class="ticket-head-status">✓ Confirmed</div>
            </div>
            <div class="ticket-body">
              <div class="ticket-route">
                <div class="tr-city">
                  <div class="tr-city-name">MNL</div>
                  <div class="tr-city-full">Manila, Cubao</div>
                </div>
                <div class="tr-line">
                  <div class="tr-arrow">✈</div>
                  <div class="tr-dur" id="tkt-dur">6h 30m</div>
                </div>
                <div class="tr-city" style="text-align:right;">
                  <div class="tr-city-name">BAG</div>
                  <div class="tr-city-full">Baguio City</div>
                </div>
              </div>
              <div class="ticket-details">
                <div class="td-item">
                  <div class="td-label">Departure</div>
                  <div class="td-val" id="tkt-dep">06:00 AM</div>
                </div>
                <div class="td-item">
                  <div class="td-label">Arrival</div>
                  <div class="td-val" id="tkt-arr">12:30 PM</div>
                </div>
                <div class="td-item">
                  <div class="td-label">Date</div>
                  <div class="td-val">Apr 5, 2026</div>
                </div>
                <div class="td-item">
                  <div class="td-label">Operator</div>
                  <div class="td-val" id="tkt-op">VoyagePH Express</div>
                </div>
                <div class="td-item">
                  <div class="td-label">Seat</div>
                  <div class="td-val" id="tkt-seat">—</div>
                </div>
                <div class="td-item">
                  <div class="td-label">Class</div>
                  <div class="td-val" id="tkt-class">Premier</div>
                </div>
                <div class="td-item">
                  <div class="td-label">Passenger</div>
                  <div class="td-val" id="tkt-pax">—</div>
                </div>
                <div class="td-item">
                  <div class="td-label">Total Paid</div>
                  <div class="td-val" id="tkt-total" style="color:var(--gold);">₱710.00</div>
                </div>
                <div class="td-item">
                  <div class="td-label">Status</div>
                  <div class="td-val" style="color:var(--green);">✓ Paid</div>
                </div>
              </div>
              <hr class="ticket-divider"/>
              <div style="text-align:center;font-size:.75rem;color:var(--muted);line-height:1.7;">
                <strong style="color:var(--ink);">Important:</strong> Present this e-ticket (print or digital) at the boarding counter.<br>
                Arrive at least <strong>30 minutes</strong> before departure. Valid ID required.
              </div>
            </div>
          </div>

          <div style="display:flex;gap:12px;padding:0 28px 28px;flex-wrap:wrap;">
            <button class="btn-primary" style="flex:1;" onclick="printTicket()">🖨 Print / Download Ticket</button>
            <button class="btn-secondary" onclick="bookAnother()">Book Another Trip</button>
          </div>
        </div>
      </div>

    </div><!-- end main-col -->

    <!-- RIGHT SIDEBAR -->
    <div class="sidebar">
      <div class="summary-card">
        <div class="summary-head">
          <h3>Trip Summary</h3>
          <p>Your booking at a glance</p>
        </div>
        <div class="summary-body">
          <div class="summary-route">
            <div>
              <div class="sr-city">Manila</div>
              <div class="sr-meta" id="sum-dep-time">—</div>
            </div>
            <div class="sr-arrow">→</div>
            <div style="text-align:right;">
              <div class="sr-city">Baguio</div>
              <div class="sr-meta" id="sum-arr-time">—</div>
            </div>
          </div>
          <div class="summary-line"><span class="sl-label">Date</span><span class="sl-val">Apr 5, 2026</span></div>
          <div class="summary-line"><span class="sl-label">Operator</span><span class="sl-val" id="sum-op">—</span></div>
          <div class="summary-line"><span class="sl-label">Class</span><span class="sl-val" id="sum-class">Premier</span></div>
          <div class="summary-line"><span class="sl-label">Passengers</span><span class="sl-val" id="sum-pax">1 Adult</span></div>
          <div class="summary-line"><span class="sl-label">Seat</span><span class="sl-val" id="sum-seat">Not selected</span></div>
          <div class="summary-line"><span class="sl-label">Base Fare</span><span class="sl-val" id="sum-base">—</span></div>
          <div class="summary-line"><span class="sl-label">Service Fee</span><span class="sl-val">₱30.00</span></div>
          <div class="summary-line"><span class="sl-label">Discount</span><span class="sl-val" id="sum-disc">—</span></div>
          <div class="summary-total">
            <span class="st-label">Total</span>
            <span class="st-amount" id="sum-total">—<small> PHP</small></span>
          </div>
          <div class="promo-row" id="promo-row">
            <input class="promo-input" id="promo-inp" placeholder="Promo code (e.g. VOYAGE30)"/>
            <button class="promo-apply" onclick="applyPromo()">Apply</button>
          </div>
        </div>
      </div>

      <div class="info-card">
        <h4>
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></svg>
          Good to Know
        </h4>
        <div class="info-item"><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg><span>Free cancellation up to 24 hours before departure</span></div>
        <div class="info-item"><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg><span>Bring a valid government-issued ID for boarding</span></div>
        <div class="info-item"><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg><span>20 kg baggage allowance per passenger</span></div>
        <div class="info-item"><svg viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg><span>Arrive at least 30 minutes before departure</span></div>
      </div>
    </div>

  </div>
</main>

<!-- ═══ FOOTER ═══ -->
<footer>
  <div class="footer-inner">
    <p style="font-size:.78rem;">© 2026 VoyagePH. All rights reserved.</p>
    <div class="footer-payments">
      <span style="font-size:.68rem;color:rgba(255,255,255,.25);margin-right:6px;">We accept</span>
      <span class="pay-badge">GCash</span><span class="pay-badge">Maya</span>
      <span class="pay-badge">Visa</span><span class="pay-badge">MC</span><span class="pay-badge">OTC</span>
    </div>
    <div class="footer-socials">
      <a class="soc-btn" href="#">f</a><a class="soc-btn" href="#">𝕏</a>
      <a class="soc-btn" href="#">in</a><a class="soc-btn" href="#">📷</a>
    </div>
  </div>
</footer>

<!-- ═══ TOAST ═══ -->
<div class="toast" id="toast"><span class="t-icon" id="toast-icon">✓</span><span id="toast-msg">Done!</span></div>

<script>
/* ════════════════════════════════════════
   STATE
════════════════════════════════════════ */
const state = {
  currentStep: 1,
  trip: null,
  seat: null,
  pax: { adults: 1, children: 0, senior: 0 },
  passengers: [],
  payment: 'gcash',
  basePrice: 0,
  discount: 0,
};

/* ════════════════════════════════════════
   STEP NAVIGATION
════════════════════════════════════════ */
const stepTitles = [
  '', // placeholder for 0
  { title: 'Find Your <em>Perfect Journey</em>', sub: 'Search thousands of routes across the Philippines.', crumb: 'Search & Select Trip' },
  { title: 'Choose Your <em>Seat</em>', sub: 'Pick the perfect spot for your journey.', crumb: 'Choose Seat' },
  { title: 'Passenger <em>Details</em>', sub: 'Fill in accurate details for seamless boarding.', crumb: 'Passenger Details' },
  { title: 'Secure <em>Payment</em>', sub: 'Your payment is SSL-encrypted and 100% safe.', crumb: 'Payment' },
  { title: 'Booking <em>Confirmed!</em>', sub: 'Your journey is locked in. Safe travels!', crumb: 'Confirmation' },
];

function goToStep(n) {
  // Can only go back, or to already-done steps
  if (n > state.currentStep) return;
  if (n < 1 || n > 5) return;
  activateStep(n);
}

function activateStep(n) {
  state.currentStep = n;
  // Update pages
  document.querySelectorAll('.step-page').forEach((p, i) => {
    p.classList.toggle('active', i + 1 === n);
  });
  // Update step nav
  for (let i = 1; i <= 5; i++) {
    const el = document.getElementById('step-nav-' + i);
    el.classList.remove('active', 'done');
    if (i < n) el.classList.add('done'), el.querySelector('.step-dot').textContent = '✓';
    else if (i === n) el.classList.add('active'), el.querySelector('.step-dot').textContent = i;
    else el.querySelector('.step-dot').textContent = i;
  }
  // Update header
  const t = stepTitles[n];
  document.getElementById('page-title').innerHTML = t.title;
  document.getElementById('page-sub').textContent = t.sub;
  document.getElementById('breadcrumb-cur').textContent = t.crumb;

  // Scroll to top
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

/* ════════════════════════════════════════
   STEP 1: SEARCH
════════════════════════════════════════ */
const pax = { adults: 1, children: 0, senior: 0 };
function changePax(type, delta) {
  const min = type === 'adults' ? 1 : 0;
  pax[type] = Math.max(min, Math.min(6, pax[type] + delta));
  document.getElementById(type + '-num').textContent = pax[type];
  state.pax = { ...pax };
  updateSummaryPax();
}
function setTrip(el, type) {
  document.querySelectorAll('.trip-tab').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
  document.getElementById('ret-field').style.display = type === 'round' ? '' : 'none';
}
let selectedClass = 'premier';
function selectClass(el, cls) {
  document.querySelectorAll('.class-card').forEach(c => c.classList.remove('selected'));
  el.classList.add('selected'); selectedClass = cls;
  document.getElementById('sum-class').textContent = cls.charAt(0).toUpperCase() + cls.slice(1);
}
function swapCities() {
  const o = document.getElementById('origin'), d = document.getElementById('destination');
  [o.value, d.value] = [d.value, o.value];
}
function setChip(el) {
  document.querySelectorAll('.chip').forEach(c => c.classList.remove('active'));
  el.classList.add('active');
}
function searchTrips() {
  const rs = document.getElementById('results-section');
  rs.style.display = 'block';
  setTimeout(() => {
    rs.querySelectorAll('.reveal').forEach((el, i) => setTimeout(() => el.classList.add('in'), i * 80));
  }, 50);
  rs.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
function selectTrip(card, operator, dep, arr, dur, cls, price, oldPrice) {
  document.querySelectorAll('.result-card').forEach(c => c.classList.remove('rc-selected'));
  card.classList.add('rc-selected');
  // Parse price number
  const priceNum = parseFloat(price.replace(/[₱,]/g, ''));
  state.trip = { operator, dep, arr, dur, cls, price, oldPrice, priceNum };
  state.basePrice = priceNum;
  // Update summary sidebar
  document.getElementById('sum-dep-time').textContent = dep;
  document.getElementById('sum-arr-time').textContent = arr;
  document.getElementById('sum-op').textContent = operator;
  document.getElementById('sum-class').textContent = cls;
  document.getElementById('sum-base').textContent = price;
  updateTotal();
  // Move to step 2
  setTimeout(() => {
    activateStep(2);
    buildSeatMap();
    document.getElementById('seat-trip-label').textContent = `${operator} · ${dep} · ${cls} Class`;
    document.getElementById('pay-amount').textContent = document.getElementById('sum-total').textContent;
  }, 200);
}

/* ════════════════════════════════════════
   STEP 2: SEAT MAP
════════════════════════════════════════ */
const takenSeats = new Set(['1A','1B','2C','2D','3A','4C','4D','5B','6A','6D','7C','8B','9A','9D','10C','11B','11D','12A']);
const ladiesSeats = new Set(['1C','1D','2A','2B']);
let selectedSeat = null;

function buildSeatMap() {
  const map = document.getElementById('seat-map-inline');
  map.innerHTML = '';
  for (let row = 1; row <= 13; row++) {
    const rowEl = document.createElement('div');
    rowEl.className = 'seat-row';
    rowEl.innerHTML = `<div class="row-num">${row}</div>`;
    ['A','B','_','C','D'].forEach(col => {
      if (col === '_') {
        rowEl.innerHTML += `<div></div>`;
      } else {
        const id = row + col;
        const taken = takenSeats.has(id);
        const ladies = ladiesSeats.has(id);
        const isSel = selectedSeat === id;
        let cls = 'seat';
        if (taken) cls += ' taken';
        else if (isSel) cls += ' selected';
        else if (ladies) cls += ' ladies';
        rowEl.innerHTML += `<div class="${cls}" onclick="toggleSeat('${id}')">${id}</div>`;
      }
    });
    map.appendChild(rowEl);
  }
}

function toggleSeat(id) {
  if (takenSeats.has(id)) return;
  selectedSeat = (selectedSeat === id) ? null : id;
  buildSeatMap();
  document.getElementById('sum-seat').textContent = selectedSeat ? 'Seat ' + selectedSeat : 'Not selected';
  state.seat = selectedSeat;
}

function confirmSeatAndNext() {
  if (!selectedSeat) { showToast('⚠', 'Please select a seat first.'); return; }
  state.seat = selectedSeat;
  document.getElementById('sum-seat').textContent = 'Seat ' + selectedSeat;
  buildPassengerForms();
  activateStep(3);
}

/* ════════════════════════════════════════
   STEP 3: PASSENGER DETAILS
════════════════════════════════════════ */
function buildPassengerForms() {
  const total = state.pax.adults + state.pax.children + state.pax.senior;
  const container = document.getElementById('pax-forms-container');
  container.innerHTML = '';

  const types = [];
  for (let i = 0; i < state.pax.adults; i++) types.push({ type: 'Adult', label: 'Adult ' + (i + 1) });
  for (let i = 0; i < state.pax.children; i++) types.push({ type: 'Child', label: 'Child ' + (i + 1) });
  for (let i = 0; i < state.pax.senior; i++) types.push({ type: 'Senior/PWD', label: 'Senior/PWD ' + (i + 1) });

  types.forEach((p, idx) => {
    const sec = document.createElement('div');
    sec.className = 'pax-section';
    sec.innerHTML = `
      <div class="pax-section-title">
        <span class="pax-num-badge">${idx + 1}</span> ${p.label} Details
      </div>
      <div class="form-row cols-2">
        <div class="form-field">
          <label>First Name</label>
          <div class="field-wrap no-icon"><input type="text" id="pax-fn-${idx}" placeholder="First name"/></div>
        </div>
        <div class="form-field">
          <label>Last Name</label>
          <div class="field-wrap no-icon"><input type="text" id="pax-ln-${idx}" placeholder="Last name"/></div>
        </div>
      </div>
      <div class="form-row cols-2">
        <div class="form-field">
          <label>Date of Birth</label>
          <div class="field-wrap no-icon"><input type="date" id="pax-dob-${idx}"/></div>
        </div>
        <div class="form-field">
          <label>Gender</label>
          <div class="field-wrap no-icon">
            <select id="pax-gen-${idx}">
              <option value="">Select</option>
              <option>Male</option><option>Female</option><option>Prefer not to say</option>
            </select>
          </div>
        </div>
      </div>
      ${idx === 0 ? `
      <div class="form-row cols-2">
        <div class="form-field">
          <label>Email Address</label>
          <div class="field-wrap">
            <span class="field-icon"><svg viewBox="0 0 24 24" style="width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/></svg></span>
            <input type="email" id="pax-email" placeholder="your@email.com"/>
          </div>
        </div>
        <div class="form-field">
          <label>Mobile Number</label>
          <div class="field-wrap">
            <span class="field-icon"><svg viewBox="0 0 24 24" style="width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;"><rect x="5" y="2" width="14" height="20" rx="2"/><path d="M12 18h.01"/></svg></span>
            <input type="tel" id="pax-mobile" placeholder="09XX XXX XXXX"/>
          </div>
        </div>
      </div>` : ''}
      ${idx < types.length - 1 ? '<div class="divider"></div>' : ''}
    `;
    container.appendChild(sec);
  });

  // Add navigation buttons
  const nav = document.createElement('div');
  nav.className = 'btn-row';
  nav.innerHTML = `
    <button class="btn-secondary" onclick="goToStep(2)">
      <svg style="width:14px;height:14px;fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
      Back
    </button>
    <button class="btn-primary" onclick="submitPassengers()" style="flex:1;">
      Continue: Payment
      <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </button>
  `;
  container.appendChild(nav);
}

function submitPassengers() {
  const fn = document.getElementById('pax-fn-0')?.value.trim();
  const ln = document.getElementById('pax-ln-0')?.value.trim();
  const email = document.getElementById('pax-email')?.value.trim();
  const mobile = document.getElementById('pax-mobile')?.value.trim();
  if (!fn || !ln) { showToast('⚠', 'Please fill in passenger name.'); return; }
  if (!email) { showToast('⚠', 'Please enter your email address.'); return; }
  if (!mobile) { showToast('⚠', 'Please enter your mobile number.'); return; }
  state.passengers = [{ fn, ln, email, mobile }];
  document.getElementById('pay-amount').textContent = document.getElementById('sum-total').textContent.replace(' PHP','');
  activateStep(4);
}

/* ════════════════════════════════════════
   STEP 4: PAYMENT
════════════════════════════════════════ */
function selectPayment(el, method, fieldsId) {
  document.querySelectorAll('.pay-method').forEach(m => {
    m.classList.remove('selected');
    m.querySelector('.check').textContent = '';
  });
  el.classList.add('selected');
  el.querySelector('.check').textContent = '✓';
  state.payment = method;
  document.querySelectorAll('.card-fields').forEach(f => f.classList.remove('show'));
  document.getElementById(fieldsId).classList.add('show');
}

function formatCardNum(input) {
  let val = input.value.replace(/\D/g, '').substring(0, 16);
  input.value = val.replace(/(\d{4})(?=\d)/g, '$1 ');
}
function formatExpiry(input) {
  let val = input.value.replace(/\D/g, '').substring(0, 4);
  if (val.length >= 2) val = val.substring(0, 2) + ' / ' + val.substring(2);
  input.value = val;
}

function processPayment() {
  if (!document.getElementById('terms-check').checked) {
    showToast('⚠', 'Please agree to the Terms & Conditions.');
    return;
  }
  // Payment method validation
  if (state.payment === 'gcash' && !document.getElementById('gcash-num').value.trim()) {
    showToast('⚠', 'Please enter your GCash number.'); return;
  }
  if (state.payment === 'maya' && !document.getElementById('maya-num').value.trim()) {
    showToast('⚠', 'Please enter your Maya number.'); return;
  }
  if (state.payment === 'card') {
    if (!document.getElementById('card-name').value.trim()) { showToast('⚠', 'Please enter cardholder name.'); return; }
    if (document.getElementById('card-num').value.replace(/\s/g,'').length < 16) { showToast('⚠', 'Please enter a valid card number.'); return; }
  }

  // Simulate processing
  const btn = document.querySelector('#page-4 .btn-primary');
  btn.textContent = '⏳ Processing Payment...';
  btn.disabled = true;
  setTimeout(() => {
    btn.disabled = false;
    btn.innerHTML = '🔒 Pay — Confirm Booking <svg viewBox="0 0 24 24" style="width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2.2;stroke-linecap:round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>';
    showConfirmation();
  }, 2000);
}

/* ════════════════════════════════════════
   STEP 5: CONFIRMATION
════════════════════════════════════════ */
function showConfirmation() {
  const ref = 'VPH-' + new Date().getFullYear() + '-' + Math.floor(1000 + Math.random() * 9000);
  document.getElementById('confirm-ref').textContent = ref;
  // Fill ticket
  if (state.trip) {
    document.getElementById('tkt-dep').textContent = state.trip.dep;
    document.getElementById('tkt-arr').textContent = state.trip.arr;
    document.getElementById('tkt-dur').textContent = state.trip.dur;
    document.getElementById('tkt-op').textContent = state.trip.operator;
    document.getElementById('tkt-class').textContent = state.trip.cls;
    document.getElementById('tkt-total').textContent = document.getElementById('sum-total').textContent.replace(' PHP','');
  }
  if (state.seat) document.getElementById('tkt-seat').textContent = 'Seat ' + state.seat;
  if (state.passengers.length) {
    const p = state.passengers[0];
    document.getElementById('tkt-pax').textContent = p.fn + ' ' + p.ln;
  }
  // Hide promo box on confirmation
  document.getElementById('promo-row').style.display = 'none';
  activateStep(5);
  showToast('🎉', 'Booking confirmed! Check your email.');
}

function printTicket() {
  window.print();
}
function bookAnother() {
  location.reload();
}

/* ════════════════════════════════════════
   SUMMARY HELPERS
════════════════════════════════════════ */
function updateSummaryPax() {
  const p = state.pax;
  const parts = [];
  if (p.adults > 0) parts.push(p.adults + ' Adult' + (p.adults > 1 ? 's' : ''));
  if (p.children > 0) parts.push(p.children + ' Child' + (p.children > 1 ? 'ren' : ''));
  if (p.senior > 0) parts.push(p.senior + ' Senior');
  document.getElementById('sum-pax').textContent = parts.join(', ') || '1 Adult';
  updateTotal();
}

function updateTotal() {
  const totalPax = state.pax.adults + state.pax.children + state.pax.senior;
  const base = state.basePrice * totalPax;
  const fee = 30;
  const disc = state.discount;
  const total = base + fee - disc;
  document.getElementById('sum-base').textContent = base > 0 ? '₱' + base.toLocaleString('en-PH', {minimumFractionDigits:2}) : '—';
  document.getElementById('sum-total').textContent = base > 0 ? '₱' + total.toLocaleString('en-PH', {minimumFractionDigits:2}) : '—';
  if (state.currentStep === 4) {
    document.getElementById('pay-amount').textContent = base > 0 ? '₱' + total.toLocaleString('en-PH', {minimumFractionDigits:2}) : '';
  }
}

/* ════════════════════════════════════════
   PROMO
════════════════════════════════════════ */
function applyPromo() {
  const code = document.getElementById('promo-inp').value.trim().toUpperCase();
  const discEl = document.getElementById('sum-disc');
  const inp = document.getElementById('promo-inp');
  if (code === 'VOYAGE30') {
    state.discount = Math.round(state.basePrice * 0.30);
    discEl.textContent = '−₱' + state.discount.toFixed(2) + ' (30%)';
    discEl.style.color = 'var(--green)';
    inp.style.borderColor = 'var(--green)';
    updateTotal();
    showToast('🎉', 'Promo code applied! 30% off.');
  } else if (code) {
    discEl.textContent = 'Invalid code';
    discEl.style.color = 'var(--red)';
    inp.style.borderColor = 'var(--red)';
    showToast('❌', 'Invalid promo code.');
  }
}

/* ════════════════════════════════════════
   TOAST
════════════════════════════════════════ */
let toastTimer = null;
function showToast(icon, msg) {
  const t = document.getElementById('toast');
  document.getElementById('toast-icon').textContent = icon;
  document.getElementById('toast-msg').textContent = msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 3200);
}

/* ════════════════════════════════════════
   SCROLL REVEAL
════════════════════════════════════════ */
const ro = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); ro.unobserve(e.target); } });
}, { threshold: 0.06 });
document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

/* Init */
window.addEventListener('load', () => {
  setTimeout(() => {
    document.getElementById('results-section').style.display = 'block';
    document.querySelectorAll('#results-section .reveal').forEach((el, i) => setTimeout(() => el.classList.add('in'), i * 80));
  }, 350);
});
</script>
</body>
</html>