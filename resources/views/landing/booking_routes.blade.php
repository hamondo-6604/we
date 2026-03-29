<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LOVO - Routes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
      background: rgba(249,247,244,.92);
      backdrop-filter: blur(18px) saturate(1.4);
      border-bottom: 1px solid var(--border);
      box-shadow: var(--shadow-md);
    }
    .nav-wrap { max-width: 1260px; margin: 0 auto; height: 100%; display: flex; align-items: center; padding: 0 32px; }
    .logo { display: flex; align-items: center; gap: 10px; text-decoration: none; flex-shrink: 0; margin-right: 44px; }
    .logo-mark { width: 38px; height: 38px; border-radius: 9px; background: var(--ink); display: flex; align-items: center; justify-content: center; }
    .logo-mark svg { width: 20px; height: 20px; fill: none; stroke: var(--gold-lt); stroke-width: 1.8; stroke-linecap: round; }
    .logo-wordmark { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 800; color: var(--ink); letter-spacing: -.3px; }
    .logo-wordmark span { color: var(--gold); }
    .nav-links { display: flex; list-style: none; gap: 2px; }
    .nav-links a { text-decoration: none; color: var(--muted); font-size: .84rem; font-weight: 500; padding: 7px 14px; border-radius: 7px; transition: color .18s, background .18s; white-space: nowrap; position: relative; }
    .nav-links a:hover { color: var(--ink); background: var(--bg-2); }
    .nav-links a.active { color: var(--ink); font-weight: 600; }
    .nav-links a.active::after { content: ''; position: absolute; bottom: -1px; left: 14px; right: 14px; height: 2px; background: var(--gold); border-radius: 2px; }
    .nav-right { margin-left: auto; display: flex; align-items: center; gap: 8px; }
    .btn-login { background: none; border: 1.5px solid var(--border-dk); color: var(--ink-soft); padding: 8px 18px; border-radius: 8px; font-size: .83rem; font-weight: 600; cursor: pointer; font-family: 'Outfit', sans-serif; transition: all .18s; }
    .btn-login:hover { border-color: var(--ink); color: var(--ink); }
    .btn-book { background: var(--ink); color: #fff; border: none; padding: 9px 20px; border-radius: 8px; font-size: .83rem; font-weight: 700; cursor: pointer; font-family: 'Outfit', sans-serif; transition: all .2s; display: flex; align-items: center; gap: 6px; }
    .btn-book:hover { background: var(--ink-mid); transform: translateY(-1px); box-shadow: 0 6px 20px rgba(14,17,23,.2); }

    /* ── PAGE HEADER ── */
    .page-header {
      padding-top: calc(var(--nav-h) + 60px);
      padding-bottom: 64px;
      padding-left: 32px; padding-right: 32px;
      background: linear-gradient(160deg, #fff 0%, var(--bg) 100%);
      position: relative; overflow: hidden;
    }
    .page-header::before {
      content: ''; position: absolute; top: 0; right: 0;
      width: 55%; height: 100%;
      background: radial-gradient(ellipse 70% 70% at 80% 40%, rgba(184,145,42,.07) 0%, transparent 65%);
      pointer-events: none;
    }
    /* Decorative dot grid */
    .page-header::after {
      content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
      background-image: radial-gradient(circle, rgba(184,145,42,.12) 1px, transparent 1px);
      background-size: 28px 28px;
      mask-image: linear-gradient(to right, transparent 0%, rgba(0,0,0,.5) 40%, rgba(0,0,0,.5) 70%, transparent 100%);
      pointer-events: none;
    }
    .ph-inner { max-width: 1260px; margin: 0 auto; position: relative; z-index: 1; }
    .breadcrumb { display: flex; align-items: center; gap: 8px; font-size: .75rem; color: var(--muted-lt); margin-bottom: 28px; }
    .breadcrumb a { color: var(--muted); text-decoration: none; font-weight: 500; }
    .breadcrumb a:hover { color: var(--gold); }
    .breadcrumb .sep { color: var(--border-dk); }
    .breadcrumb .cur { color: var(--gold); font-weight: 600; }
    .ph-eyebrow { display: inline-flex; align-items: center; gap: 8px; font-size: .72rem; font-weight: 700; letter-spacing: 2.5px; text-transform: uppercase; color: var(--gold); margin-bottom: 14px; }
    .ph-eyebrow::before { content: ''; width: 28px; height: 1.5px; background: var(--gold); }
    .ph-heading { font-family: 'Playfair Display', serif; font-size: clamp(2rem, 3.8vw, 3.2rem); font-weight: 800; line-height: 1.08; letter-spacing: -.4px; color: var(--ink); }
    .ph-heading em { font-style: italic; color: var(--gold); }
    .ph-sub { color: var(--muted); font-size: .95rem; line-height: 1.75; margin-top: 14px; max-width: 480px; }

    /* Header stats strip */
    .ph-stats {
      display: flex; gap: 40px; margin-top: 36px;
      padding-top: 28px; border-top: 1px solid var(--border);
      flex-wrap: wrap;
    }
    .ph-stat-num { font-family: 'Playfair Display', serif; font-size: 1.7rem; font-weight: 800; color: var(--ink); display: block; line-height: 1; }
    .ph-stat-num sup { font-size: .9rem; color: var(--gold); }
    .ph-stat-label { font-size: .74rem; color: var(--muted); margin-top: 4px; font-weight: 500; }

    /* ── SEARCH BAR ── */
    .search-bar-wrap {
      background: var(--bg-3); border-bottom: 1px solid var(--border);
      padding: 18px 32px; position: sticky; top: var(--nav-h); z-index: 800;
      box-shadow: var(--shadow-sm);
    }
    .search-bar-inner { max-width: 1260px; margin: 0 auto; display: flex; gap: 12px; align-items: center; }
    .sb-field {
      flex: 1; position: relative;
    }
    .sb-field .sb-icon { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); pointer-events: none; }
    .sb-field .sb-icon svg { width: 15px; height: 15px; fill: none; stroke: var(--muted-lt); stroke-width: 2; stroke-linecap: round; }
    .sb-field input, .sb-field select {
      width: 100%; padding: 11px 14px 11px 38px;
      border: 1.5px solid var(--border); border-radius: 9px;
      background: var(--bg); color: var(--text);
      font-size: .87rem; font-family: 'Outfit', sans-serif;
      outline: none; transition: border-color .18s; appearance: none;
    }
    .sb-field input:focus, .sb-field select:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(184,145,42,.1); }
    .sb-field input::placeholder { color: var(--muted-lt); }
    .sb-search-btn {
      background: var(--gold); color: #fff; border: none;
      padding: 11px 24px; border-radius: 9px; font-size: .87rem; font-weight: 700;
      cursor: pointer; font-family: 'Outfit', sans-serif;
      display: flex; align-items: center; gap: 7px; white-space: nowrap;
      transition: all .2s; flex-shrink: 0;
    }
    .sb-search-btn:hover { background: var(--gold-lt); transform: translateY(-1px); box-shadow: 0 6px 20px rgba(184,145,42,.3); }
    .sb-search-btn svg { width: 14px; height: 14px; fill: none; stroke: currentColor; stroke-width: 2.3; stroke-linecap: round; }
    .sb-divider { width: 1px; height: 28px; background: var(--border); flex-shrink: 0; }
    .sb-results-label { font-size: .78rem; color: var(--muted); white-space: nowrap; flex-shrink: 0; }
    .sb-results-label strong { color: var(--ink); }

    /* ── MAIN LAYOUT ── */
    .routes-layout {
      max-width: 1260px; margin: 0 auto;
      padding: 40px 32px 80px;
      display: grid; grid-template-columns: 260px 1fr; gap: 28px; align-items: start;
    }

    /* ── SIDEBAR FILTERS ── */
    .filters-panel {
      position: sticky; top: calc(var(--nav-h) + 70px);
      display: flex; flex-direction: column; gap: 16px;
    }
    .filter-card {
      background: var(--bg-3); border: 1px solid var(--border);
      border-radius: var(--radius); overflow: hidden;
    }
    .fc-head {
      padding: 14px 18px; border-bottom: 1px solid var(--border);
      display: flex; align-items: center; justify-content: space-between;
    }
    .fc-head h3 { font-size: .82rem; font-weight: 700; color: var(--ink); }
    .fc-clear { background: none; border: none; font-size: .72rem; color: var(--gold); font-weight: 700; cursor: pointer; font-family: 'Outfit', sans-serif; }
    .fc-clear:hover { color: var(--gold-lt); }
    .fc-body { padding: 16px 18px; display: flex; flex-direction: column; gap: 10px; }

    .filter-check {
      display: flex; align-items: center; gap: 10px;
      cursor: pointer; padding: 6px 0;
    }
    .filter-check input[type="checkbox"] { display: none; }
    .fc-box {
      width: 18px; height: 18px; border-radius: 5px;
      border: 1.5px solid var(--border-dk); background: var(--bg);
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0; transition: all .15s;
    }
    .filter-check input:checked + .fc-box { background: var(--ink); border-color: var(--ink); }
    .filter-check input:checked + .fc-box::after { content: '✓'; font-size: .65rem; color: #fff; font-weight: 800; }
    .fc-label { font-size: .82rem; color: var(--muted); flex: 1; }
    .fc-count { font-size: .72rem; color: var(--muted-lt); font-weight: 600; }

    .filter-check:hover .fc-box { border-color: var(--gold); }
    .filter-check:hover .fc-label { color: var(--ink); }

    /* Range slider */
    .range-wrap { padding: 4px 0 8px; }
    .range-labels { display: flex; justify-content: space-between; font-size: .75rem; color: var(--muted); margin-bottom: 10px; }
    .range-labels strong { color: var(--ink); font-weight: 700; }
    input[type="range"] {
      width: 100%; appearance: none; height: 3px;
      background: linear-gradient(to right, var(--gold) 0%, var(--gold) 60%, var(--border) 60%, var(--border) 100%);
      border-radius: 2px; outline: none;
    }
    input[type="range"]::-webkit-slider-thumb {
      appearance: none; width: 18px; height: 18px;
      border-radius: 50%; background: var(--ink);
      border: 2px solid #fff; box-shadow: 0 2px 8px rgba(14,17,23,.2); cursor: pointer;
    }

    /* Region filter pills */
    .region-pills { display: flex; flex-direction: column; gap: 6px; }
    .region-pill {
      display: flex; align-items: center; justify-content: space-between;
      padding: 9px 12px; border-radius: 8px; border: 1.5px solid var(--border);
      cursor: pointer; transition: all .15s; background: var(--bg);
    }
    .region-pill:hover { border-color: var(--border-dk); background: var(--bg-2); }
    .region-pill.active { border-color: var(--ink); background: var(--ink); }
    .rp-label { font-size: .8rem; font-weight: 600; color: var(--muted); }
    .region-pill.active .rp-label { color: #fff; }
    .rp-badge { font-size: .68rem; font-weight: 700; color: var(--muted-lt); background: var(--bg-2); padding: 2px 7px; border-radius: 4px; }
    .region-pill.active .rp-badge { background: rgba(255,255,255,.15); color: rgba(255,255,255,.7); }

    /* ── MAIN CONTENT ── */
    .routes-main { min-width: 0; }

    /* View toggle + sort */
    .list-controls {
      display: flex; align-items: center; gap: 12px; margin-bottom: 24px; flex-wrap: wrap;
    }
    .lc-count { font-size: .85rem; color: var(--muted); flex: 1; }
    .lc-count strong { color: var(--ink); font-weight: 700; }
    .view-toggle { display: flex; border: 1.5px solid var(--border); border-radius: 8px; overflow: hidden; }
    .vt-btn {
      padding: 7px 12px; background: none; border: none;
      cursor: pointer; color: var(--muted); transition: all .15s;
      display: flex; align-items: center;
    }
    .vt-btn svg { width: 15px; height: 15px; fill: none; stroke: currentColor; stroke-width: 2; }
    .vt-btn.active { background: var(--ink); color: #fff; }
    .vt-btn + .vt-btn { border-left: 1.5px solid var(--border); }
    .sort-sel {
      padding: 8px 12px; border-radius: 8px; border: 1.5px solid var(--border);
      background: var(--bg); color: var(--text); font-size: .82rem; font-weight: 600;
      font-family: 'Outfit', sans-serif; outline: none; cursor: pointer; appearance: none;
    }
    .sort-sel:focus { border-color: var(--gold); }

    /* ── REGION SECTION HEADERS ── */
    .region-header {
      display: flex; align-items: center; gap: 16px;
      margin-bottom: 20px; margin-top: 36px;
    }
    .region-header:first-child { margin-top: 0; }
    .rh-icon {
      width: 44px; height: 44px; border-radius: 11px;
      background: var(--ink); display: flex; align-items: center; justify-content: center;
      font-size: 1.2rem; flex-shrink: 0;
    }
    .rh-title { font-family: 'Playfair Display', serif; font-size: 1.15rem; font-weight: 800; color: var(--ink); }
    .rh-sub { font-size: .78rem; color: var(--muted); margin-top: 2px; }
    .rh-line { flex: 1; height: 1px; background: var(--border); }
    .rh-count {
      font-size: .72rem; font-weight: 700; color: var(--muted-lt);
      background: var(--bg-2); padding: 4px 10px; border-radius: 20px;
      border: 1px solid var(--border); white-space: nowrap;
    }

    /* ── ROUTE CARDS GRID ── */
    .route-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; margin-bottom: 8px; }
    .route-grid.list-view { grid-template-columns: 1fr; }

    .route-card {
      background: var(--bg-3); border: 1px solid var(--border);
      border-radius: var(--radius); overflow: hidden;
      transition: transform .22s, box-shadow .22s, border-color .22s;
      cursor: pointer; position: relative;
    }
    .route-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: var(--border-dk); }
    .route-card::after {
      content: ''; position: absolute; bottom: 0; left: 0; right: 0;
      height: 3px; background: var(--gold);
      transform: scaleX(0); transform-origin: left; transition: transform .25s;
    }
    .route-card:hover::after { transform: scaleX(1); }

    /* Card image band */
    .rc-band {
      height: 80px; position: relative; overflow: hidden;
      display: flex; align-items: center; justify-content: center;
    }
    .rc-band-emoji { font-size: 5rem; opacity: .09; position: absolute; }
    .rc-band-content {
      position: relative; z-index: 1;
      display: flex; align-items: center; justify-content: space-between;
      width: 100%; padding: 0 20px;
    }
    .rc-cities-row { display: flex; align-items: center; gap: 12px; }
    .rc-city-name { font-family: 'Playfair Display', serif; font-size: 1rem; font-weight: 800; color: #fff; }
    .rc-arrow-band { color: rgba(255,255,255,.6); font-size: .9rem; }
    .rc-badge-band {
      padding: 3px 10px; border-radius: 4px;
      font-size: .65rem; font-weight: 800;
      letter-spacing: .5px; text-transform: uppercase;
    }
    .badge-hot { background: rgba(192,57,43,.85); color: #fff; }
    .badge-new { background: rgba(5,150,105,.85); color: #fff; }
    .badge-sale { background: rgba(184,145,42,.9); color: var(--ink); }
    .badge-scenic { background: rgba(14,17,23,.7); color: #fff; border: 1px solid rgba(255,255,255,.2); }

    /* Card body */
    .rc-body { padding: 18px 20px 16px; }
    .rc-meta-grid {
      display: grid; grid-template-columns: 1fr 1fr; gap: 10px;
      padding: 14px 0; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);
      margin-bottom: 14px;
    }
    .rc-meta-item small { display: block; font-size: .64rem; color: var(--muted-lt); text-transform: uppercase; letter-spacing: .5px; margin-bottom: 2px; }
    .rc-meta-item span { font-size: .85rem; font-weight: 600; color: var(--ink); }
    .rc-price { font-family: 'Playfair Display', serif; font-size: 1.15rem; font-weight: 800; color: var(--gold); }
    .rc-price sub { font-family: 'Outfit', sans-serif; font-size: .65rem; color: var(--muted); font-weight: 400; vertical-align: baseline; }

    .rc-footer-row {
      display: flex; align-items: center; justify-content: space-between;
    }
    .rc-amenities { display: flex; gap: 6px; flex-wrap: wrap; }
    .rc-amenity-tag {
      font-size: .65rem; font-weight: 600; padding: 3px 8px;
      border-radius: 4px; background: var(--bg-2);
      color: var(--muted); border: 1px solid var(--border);
    }
    .rc-book-now {
      background: var(--ink); color: #fff; border: none;
      padding: 8px 16px; border-radius: 7px; font-size: .78rem; font-weight: 700;
      cursor: pointer; font-family: 'Outfit', sans-serif; transition: all .18s;
      white-space: nowrap; flex-shrink: 0;
    }
    .rc-book-now:hover { background: var(--gold); }

    /* List view card adjustments */
    .route-grid.list-view .route-card { display: grid; grid-template-columns: 220px 1fr; }
    .route-grid.list-view .rc-band { height: auto; min-height: 100%; border-radius: 0; }
    .route-grid.list-view .rc-band-content { flex-direction: column; align-items: flex-start; padding: 20px; gap: 8px; }
    .route-grid.list-view .rc-meta-grid { grid-template-columns: repeat(4, 1fr); }

    /* ── POPULAR DESTINATIONS MAP SECTION ── */
    #map-section {
      background: var(--ink); padding: 72px 32px;
    }
    .map-inner { max-width: 1260px; margin: 0 auto; }
    .map-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 48px; gap: 24px; }
    .map-eyebrow { font-size: .7rem; font-weight: 700; letter-spacing: 2.5px; text-transform: uppercase; color: var(--gold-lt); margin-bottom: 10px; display: flex; align-items: center; gap: 8px; }
    .map-eyebrow::before { content: ''; width: 20px; height: 1.5px; background: var(--gold-lt); }
    .map-title { font-family: 'Playfair Display', serif; font-size: clamp(1.8rem, 3vw, 2.5rem); font-weight: 800; color: #fff; line-height: 1.1; }
    .map-title em { font-style: italic; color: var(--gold-lt); }
    .map-sub { color: rgba(255,255,255,.45); font-size: .9rem; line-height: 1.7; margin-top: 10px; max-width: 380px; }

    /* SVG Philippines map */
    .ph-map-wrap {
      display: grid; grid-template-columns: 1fr 340px; gap: 48px; align-items: start;
    }
    .ph-map-svg-wrap {
      background: rgba(255,255,255,.03); border: 1px solid rgba(255,255,255,.07);
      border-radius: 20px; padding: 28px; position: relative; min-height: 420px;
      display: flex; align-items: center; justify-content: center;
    }
    .ph-map-svg-wrap svg { max-width: 100%; max-height: 380px; }

    /* Destination cards list */
    .dest-list { display: flex; flex-direction: column; gap: 10px; }
    .dest-item {
      background: rgba(255,255,255,.04); border: 1px solid rgba(255,255,255,.07);
      border-radius: 12px; padding: 16px 18px;
      display: flex; align-items: center; gap: 14px;
      cursor: pointer; transition: all .2s;
    }
    .dest-item:hover { background: rgba(184,145,42,.08); border-color: rgba(184,145,42,.25); }
    .dest-item.active { background: rgba(184,145,42,.1); border-color: var(--gold); }
    .dest-num {
      width: 28px; height: 28px; border-radius: 7px;
      background: rgba(255,255,255,.06); display: flex;
      align-items: center; justify-content: center;
      font-size: .7rem; font-weight: 800; color: rgba(255,255,255,.4);
      flex-shrink: 0;
    }
    .dest-item.active .dest-num { background: var(--gold); color: var(--ink); }
    .dest-info { flex: 1; min-width: 0; }
    .dest-name { font-size: .9rem; font-weight: 700; color: #fff; }
    .dest-routes { font-size: .74rem; color: rgba(255,255,255,.38); margin-top: 2px; }
    .dest-price {
      font-family: 'Playfair Display', serif;
      font-size: 1.05rem; font-weight: 800; color: var(--gold-lt);
      text-align: right; flex-shrink: 0;
    }
    .dest-price small { display: block; font-family: 'Outfit', sans-serif; font-size: .65rem; color: rgba(255,255,255,.3); font-weight: 400; }

    /* ── SCHEDULE TICKER ── */
    .ticker-wrap {
      background: var(--bg-2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);
      padding: 14px 0; overflow: hidden; position: relative;
    }
    .ticker-wrap::before, .ticker-wrap::after {
      content: ''; position: absolute; top: 0; bottom: 0; width: 80px; z-index: 2;
    }
    .ticker-wrap::before { left: 0; background: linear-gradient(to right, var(--bg-2), transparent); }
    .ticker-wrap::after { right: 0; background: linear-gradient(to left, var(--bg-2), transparent); }
    .ticker-label {
      position: absolute; left: 32px; top: 50%; transform: translateY(-50%);
      font-size: .68rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px;
      color: var(--gold); z-index: 3; background: var(--bg-2); padding-right: 12px;
    }
    .ticker-track {
      display: flex; gap: 0; white-space: nowrap;
      animation: ticker 35s linear infinite;
    }
    .ticker-track:hover { animation-play-state: paused; }
    @keyframes ticker { from { transform: translateX(0); } to { transform: translateX(-50%); } }
    .ticker-item {
      display: inline-flex; align-items: center; gap: 8px;
      padding: 0 28px; font-size: .8rem; color: var(--muted);
    }
    .ticker-item .ti-route { font-weight: 700; color: var(--ink); }
    .ticker-item .ti-sep { color: var(--border-dk); }
    .ticker-item .ti-dep { color: var(--gold); font-weight: 600; }
    .ticker-dot { width: 4px; height: 4px; border-radius: 50%; background: var(--border-dk); }

    /* ── QUICK BOOK BANNER ── */
    .quick-book-banner {
      background: linear-gradient(135deg, var(--ink) 0%, var(--ink-mid) 100%);
      padding: 56px 32px; position: relative; overflow: hidden;
    }
    .quick-book-banner::before {
      content: '🚌'; position: absolute; right: 8%; top: 50%; transform: translateY(-50%);
      font-size: 10rem; opacity: .04; pointer-events: none;
    }
    .qb-inner { max-width: 1260px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; gap: 32px; flex-wrap: wrap; }
    .qb-text h2 { font-family: 'Playfair Display', serif; font-size: clamp(1.6rem, 2.5vw, 2.2rem); font-weight: 800; color: #fff; }
    .qb-text h2 em { font-style: italic; color: var(--gold-lt); }
    .qb-text p { color: rgba(255,255,255,.45); font-size: .9rem; margin-top: 8px; }
    .qb-actions { display: flex; gap: 12px; flex-wrap: wrap; }
    .qb-btn-primary {
      background: var(--gold); color: var(--ink);
      border: none; padding: 14px 32px; border-radius: 9px;
      font-size: .95rem; font-weight: 800; cursor: pointer;
      font-family: 'Outfit', sans-serif; transition: all .2s;
    }
    .qb-btn-primary:hover { background: var(--gold-lt); transform: translateY(-2px); box-shadow: 0 10px 30px rgba(184,145,42,.35); }
    .qb-btn-secondary {
      background: rgba(255,255,255,.08); color: #fff;
      border: 1.5px solid rgba(255,255,255,.15); padding: 14px 28px;
      border-radius: 9px; font-size: .95rem; font-weight: 600; cursor: pointer;
      font-family: 'Outfit', sans-serif; transition: all .2s;
    }
    .qb-btn-secondary:hover { background: rgba(255,255,255,.14); border-color: rgba(255,255,255,.3); }

    /* ── REVEAL ── */
    .reveal { opacity: 0; transform: translateY(22px); transition: opacity .6s ease, transform .6s ease; }
    .reveal.in { opacity: 1; transform: none; }

    /* ── FOOTER ── */
    footer { background: var(--ink); color: rgba(255,255,255,.5); padding: 56px 32px 28px; }
    .footer-inner { max-width: 1260px; margin: 0 auto; }
    .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 48px; }
    .footer-brand p { font-size: .82rem; line-height: 1.7; color: rgba(255,255,255,.38); margin-top: 16px; max-width: 260px; }
    .footer-col h4 { font-size: .78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; color: rgba(255,255,255,.35); margin-bottom: 16px; }
    .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 10px; }
    .footer-col ul li a { text-decoration: none; color: rgba(255,255,255,.45); font-size: .83rem; transition: color .15s; }
    .footer-col ul li a:hover { color: var(--gold-lt); }
    .footer-bottom { display: flex; align-items: center; justify-content: space-between; padding-top: 28px; border-top: 1px solid rgba(255,255,255,.08); flex-wrap: wrap; gap: 16px; }
    .footer-bottom p { font-size: .78rem; }
    .footer-payments { display: flex; align-items: center; gap: 6px; }
    .pay-badge { padding: 3px 9px; border-radius: 4px; border: 1px solid rgba(255,255,255,.12); font-size: .68rem; font-weight: 700; color: rgba(255,255,255,.55); }
    .footer-socials { display: flex; gap: 8px; }
    .soc-btn { width: 32px; height: 32px; border-radius: 7px; border: 1px solid rgba(255,255,255,.1); display: flex; align-items: center; justify-content: center; font-size: .78rem; color: rgba(255,255,255,.45); text-decoration: none; transition: all .18s; }
    .soc-btn:hover { background: rgba(255,255,255,.08); color: #fff; }

    /* ── NO RESULTS ── */
    .no-results { text-align: center; padding: 60px 24px; display: none; }
    .no-results.show { display: block; }
    .nr-icon { font-size: 3rem; opacity: .3; margin-bottom: 16px; }
    .no-results h3 { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 800; color: var(--ink); margin-bottom: 8px; }
    .no-results p { font-size: .87rem; color: var(--muted); }
  </style>
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<nav id="nav">
  <div class="nav-wrap">
    <a class="logo" href="index.html">
      <div class="logo-mark">
        <!-- Font Awesome Icon for logo -->
        <i class="fas fa-bus" style="font-size: 24px; color: #d4a843;"></i>
      </div>
      <span class="logo-wordmark">Voyage<span>PH</span></span>
    </a>
    <ul class="nav-links">
      <li><a href="{{ route('landing.home') }}">Home</a></li>
      <li><a href="{{ route('landing.ticket_booking') }}">Book a Ticket</a></li>
      <li><a href="{{ route('landing.booking_routes') }}" class="active">Routes</a></li>
      <li><a href="#">Promos</a></li>
      @auth
      <li><a href="{{ route('manage.bookings') }}">Manage Bookings</a></li>
      @endauth
    </ul>
    <div class="nav-right">
      <button class="btn-login">Log In</button>
      <button class="btn-book" onclick="window.location='book-a-ticket.html'">
        <!-- Font Awesome Icon for Book Now button -->
        <i class="fas fa-ticket-alt" style="font-size: 14px;"></i> Book Now
      </button>
    </div>
  </div>
</nav>

<!-- ═══ PAGE HEADER ═══ -->
<div class="page-header">
  <div class="ph-inner">
    <div class="breadcrumb">
      <a href="index.html">Home</a>
      <span class="sep">›</span>
      <span class="cur">Routes</span>
    </div>
    <div class="ph-eyebrow">Explore the Philippines</div>
    <h1 class="ph-heading">All <em>Routes</em> &amp; Destinations</h1>
    <p class="ph-sub">Browse our full network of bus routes connecting Luzon, Visayas, and Mindanao — with departures every day.</p>
    <div class="ph-stats">
      <div>
        <span class="ph-stat-num">80<sup>+</sup></span>
        <div class="ph-stat-label">Active Routes</div>
      </div>
      <div>
        <span class="ph-stat-num">45<sup>+</sup></span>
        <div class="ph-stat-label">Destinations</div>
      </div>
      <div>
        <span class="ph-stat-num">320<sup>+</sup></span>
        <div class="ph-stat-label">Daily Departures</div>
      </div>
      <div>
        <span class="ph-stat-num">3</span>
        <div class="ph-stat-label">Major Island Groups</div>
      </div>
    </div>
  </div>
</div>

<!-- ═══ SCHEDULE TICKER ═══ -->
<div class="ticker-wrap">
  <div class="ticker-label">Live Departures</div>
  <div class="ticker-track" id="ticker-track">
    <!-- filled by JS -->
  </div>
</div>

<!-- ═══ SEARCH BAR ═══ -->
<div class="search-bar-wrap">
  <div class="search-bar-inner">
    <div class="sb-field" style="max-width:220px;">
      <div class="sb-icon">
        <!-- Font Awesome Search Icon -->
        <i class="fas fa-search"></i>
      </div>
      <input type="text" id="search-input" placeholder="Search city or route…" oninput="filterRoutes()"/>
    </div>
    <div class="sb-field" style="max-width:160px;">
      <div class="sb-icon">
        <!-- Font Awesome Location Icon -->
        <i class="fas fa-map-marker-alt"></i>
      </div>
      <select id="region-select" onchange="filterRoutes()">
        <option value="">All Regions</option>
        <option value="metro">Metro Manila</option>
        <option value="luzon">Luzon</option>
        <option value="visayas">Visayas</option>
        <option value="mindanao">Mindanao</option>
      </select>
    </div>
    <div class="sb-field" style="max-width:160px;">
      <div class="sb-icon">
        <!-- Font Awesome Class Icon -->
        <i class="fas fa-cogs"></i>
      </div>
      <select id="class-select" onchange="filterRoutes()">
        <option value="">All Classes</option>
        <option value="Economy">Economy</option>
        <option value="Premier">Premier</option>
        <option value="Luxury">Luxury</option>
      </select>
    </div>
    <div class="sb-divider"></div>
    <div class="sb-results-label">Showing <strong id="result-count">24</strong> routes</div>
    <button class="sb-search-btn" onclick="filterRoutes()">
      <!-- Font Awesome Search Icon -->
      <i class="fas fa-search"></i> Search Routes
    </button>
  </div>
</div>

<!-- ═══ ROUTES LAYOUT ═══ -->
<div class="routes-layout">
  <!-- ── FILTER SIDEBAR ── -->
  <aside class="filters-panel">
    <!-- Duration -->
    <div class="filter-card reveal">
      <div class="fc-head">
        <h3>Travel Duration</h3>
        <button class="fc-clear" onclick="clearFilter(this)">Reset</button>
      </div>
      <div class="fc-body">
        <div class="range-wrap">
          <div class="range-labels"><span>0 hrs</span> <strong id="dur-val">12 hrs max</strong></div>
          <input type="range" min="1" max="24" value="12" oninput="document.getElementById('dur-val').textContent=this.value+' hrs max'"/>
        </div>
      </div>
    </div>
    <!-- Price -->
    <div class="filter-card reveal">
      <div class="fc-head">
        <h3>Price Range</h3>
        <button class="fc-clear" onclick="clearFilter(this)">Reset</button>
      </div>
      <div class="fc-body">
        <div class="range-wrap">
          <div class="range-labels"><span>₱150</span> <strong id="price-val">₱2,500 max</strong></div>
          <input type="range" min="150" max="5000" value="2500" step="50" oninput="document.getElementById('price-val').textContent='₱'+Number(this.value).toLocaleString()+' max'"/>
        </div>
      </div>
    </div>
    <!-- Seat Class -->
    <div class="filter-card reveal">
      <div class="fc-head">
        <h3>Seat Class</h3>
        <button class="fc-clear" onclick="clearFilter(this)">Reset</button>
      </div>
      <div class="fc-body">
        <label class="filter-check"><input type="checkbox" checked onchange="filterRoutes()"><div class="fc-box"></div><span class="fc-label">Economy</span><span class="fc-count">28</span></label>
        <label class="filter-check"><input type="checkbox" checked onchange="filterRoutes()"><div class="fc-box"></div><span class="fc-label">Premier</span><span class="fc-count">32</span></label>
        <label class="filter-check"><input type="checkbox" checked onchange="filterRoutes()"><div class="fc-box"></div><span class="fc-label">Luxury</span><span class="fc-count">20</span></label>
      </div>
    </div>
    <!-- Amenities -->
    <div class="filter-card reveal">
      <div class="fc-head">
        <h3>Amenities</h3>
        <button class="fc-clear" onclick="clearFilter(this)">Reset</button>
      </div>
      <div class="fc-body">
        <label class="filter-check"><input type="checkbox"><div class="fc-box"></div><span class="fc-label">Air-conditioned</span></label>
        <label class="filter-check"><input type="checkbox"><div class="fc-box"></div><span class="fc-label">WiFi on board</span></label>
        <label class="filter-check"><input type="checkbox"><div class="fc-box"></div><span class="fc-label">USB charging</span></label>
        <label class="filter-check"><input type="checkbox"><div class="fc-box"></div><span class="fc-label">Reclining seats</span></label>
        <label class="filter-check"><input type="checkbox"><div class="fc-box"></div><span class="fc-label">Meal included</span></label>
        <label class="filter-check"><input type="checkbox"><div class="fc-box"></div><span class="fc-label">Restroom on board</span></label>
      </div>
    </div>
    <!-- Departure Time -->
    <div class="filter-card reveal">
      <div class="fc-head">
        <h3>Departure Time</h3>
        <button class="fc-clear" onclick="clearFilter(this)">Reset</button>
      </div>
      <div class="fc-body">
        <label class="filter-check"><input type="checkbox"><div class="fc-box"></div><span class="fc-label">Early Morning (12–6 AM)</span></label>
        <label class="filter-check"><input type="checkbox"><div class="fc-box"></div><span class="fc-label">Morning (6 AM–12 PM)</span></label>
        <label class="filter-check"><input type="checkbox"><div class="fc-box"></div><span class="fc-label">Afternoon (12–6 PM)</span></label>
        <label class="filter-check"><input type="checkbox"><div class="fc-box"></div><span class="fc-label">Evening (6 PM–12 AM)</span></label>
      </div>
    </div>
    <!-- Browse by Region -->
    <div class="filter-card reveal">
      <div class="fc-head"><h3>Browse by Region</h3></div>
      <div class="fc-body" style="gap:6px;">
        <div class="region-pills">
          <div class="region-pill active" onclick="setRegionPill(this,'')">
            <span class="rp-label">🇵🇭 All Philippines</span>
            <span class="rp-badge">80</span>
          </div>
          <div class="region-pill" onclick="setRegionPill(this,'metro')">
            <span class="rp-label">🏙️ Metro Manila</span>
            <span class="rp-badge">22</span>
          </div>
          <div class="region-pill" onclick="setRegionPill(this,'luzon')">
            <span class="rp-label">🌄 Luzon</span>
            <span class="rp-badge">34</span>
          </div>
          <div class="region-pill" onclick="setRegionPill(this,'visayas')">
            <span class="rp-label">🏝️ Visayas</span>
            <span class="rp-badge">14</span>
          </div>
          <div class="region-pill" onclick="setRegionPill(this,'mindanao')">
            <span class="rp-label">🌊 Mindanao</span>
            <span class="rp-badge">10</span>
          </div>
        </div>
      </div>
    </div>
  </aside>

  <!-- ── ROUTES MAIN ── -->
  <div class="routes-main">
    <div class="list-controls">
      <div class="lc-count">Showing <strong id="main-count">24</strong> routes across the Philippines</div>
      <div class="view-toggle">
        <button class="vt-btn active" id="grid-btn" onclick="setView('grid')" title="Grid View">
          <!-- Font Awesome Grid View Icon -->
          <i class="fas fa-th"></i>
        </button>
        <button class="vt-btn" id="list-btn" onclick="setView('list')" title="List View">
          <!-- Font Awesome List View Icon -->
          <i class="fas fa-list"></i>
        </button>
      </div>
      <select class="sort-sel" id="sort-sel" onchange="sortRoutes()">
        <option value="popular">Sort: Most Popular</option>
        <option value="price-asc">Sort: Price (Low–High)</option>
        <option value="price-desc">Sort: Price (High–Low)</option>
        <option value="duration">Sort: Shortest Trip</option>
        <option value="alpha">Sort: A–Z</option>
      </select>
    </div>
    <div id="routes-container"></div>
    <div class="no-results" id="no-results">
      <div class="nr-icon">🗺️</div>
      <h3>No routes found</h3>
      <p>Try adjusting your search or filters to find available routes.</p>
    </div>
  </div>
</div>

<!-- ═══ DESTINATIONS MAP SECTION ═══ -->
<section id="map-section">
  <div class="map-inner">
    <div class="map-header reveal">
      <div>
        <div class="map-eyebrow">Coverage</div>
        <h2 class="map-title">Our Network Spans the <em>Archipelago</em></h2>
        <p class="map-sub">From the mountain roads of Cordillera to the coastal highways of Mindanao — VoyagePH connects you everywhere.</p>
      </div>
    </div>
    <div class="ph-map-wrap">
      <!-- Font Awesome icons replacing SVGs -->
      <div class="ph-map-svg-wrap reveal">
        <!-- Luzon -->
        <div class="map-icon" style="position: absolute; top: 120px; left: 160px; color: rgba(212,168,67,.8); font-size: 9px; font-family: serif; font-style: italic; font-weight: 700;">
          <i class="fas fa-map"></i> Luzon
        </div>
        <!-- Mindoro -->
        <div class="map-icon" style="position: absolute; top: 245px; left: 150px; color: rgba(212,168,67,.8); font-size: 9px; font-family: serif; font-style: italic; font-weight: 700;">
          <i class="fas fa-map"></i> Mindoro
        </div>
        <!-- Palawan -->
        <div class="map-icon" style="position: absolute; top: 295px; left: 88px; color: rgba(212,168,67,.8); font-size: 9px; font-family: serif; font-style: italic; font-weight: 700;">
          <i class="fas fa-map"></i> Palawan
        </div>
        <!-- Samar/Leyte -->
        <div class="map-icon" style="position: absolute; top: 250px; left: 248px; color: rgba(212,168,67,.8); font-size: 9px; font-family: serif; font-style: italic; font-weight: 700;">
          <i class="fas fa-map"></i> Samar/Leyte
        </div>
        <!-- Cebu/Bohol -->
        <div class="map-icon" style="position: absolute; top: 308px; left: 220px; color: rgba(212,168,67,.8); font-size: 9px; font-family: serif; font-style: italic; font-weight: 700;">
          <i class="fas fa-map"></i> Cebu/Bohol
        </div>
        <!-- Negros -->
        <div class="map-icon" style="position: absolute; top: 285px; left: 184px; color: rgba(212,168,67,.8); font-size: 9px; font-family: serif; font-style: italic; font-weight: 700;">
          <i class="fas fa-map"></i> Negros
        </div>
        <!-- Panay -->
        <div class="map-icon" style="position: absolute; top: 278px; left: 156px; color: rgba(212,168,67,.8); font-size: 9px; font-family: serif; font-style: italic; font-weight: 700;">
          <i class="fas fa-map"></i> Panay
        </div>
        <!-- Visayas -->
        <div class="map-icon" style="position: absolute; top: 370px; left: 185px; color: rgba(212,168,67,.8); font-size: 9px; font-family: serif; font-style: italic; font-weight: 700;">
          <i class="fas fa-map"></i> Visayas
        </div>
        <!-- Mindanao -->
        <div class="map-icon" style="position: absolute; top: 395px; left: 155px; color: rgba(212,168,67,.8); font-size: 9px; font-family: serif; font-style: italic; font-weight: 700;">
          <i class="fas fa-map"></i> Mindanao
        </div>

        <!-- Route connection lines (just a sample update) -->
        <div class="route-line" style="position: absolute; top: 170px; left: 175px;">
          <i class="fas fa-arrow-right"></i>
        </div>

        <!-- City dots -->
        <div class="city-icon" style="position: absolute; top: 178px; left: 172px; color: var(--gold); font-size: 10px;">
          <i class="fas fa-map-marker-alt"></i> Manila
        </div>
        <div class="city-icon" style="position: absolute; top: 108px; left: 168px; color: rgba(184,145,42,.8); font-size: 9px;">
          <i class="fas fa-map-marker-alt"></i> Baguio
        </div>
        <div class="city-icon" style="position: absolute; top: 65px; left: 200px; color: rgba(184,145,42,.6); font-size: 8px;">
          <i class="fas fa-map-marker-alt"></i> Tuguegarao
        </div>
        <div class="city-icon" style="position: absolute; top: 208px; left: 218px; color: rgba(184,145,42,.6); font-size: 8px;">
          <i class="fas fa-map-marker-alt"></i> Legazpi
        </div>
        <div class="city-icon" style="position: absolute; top: 328px; left: 222px; color: rgba(184,145,42,.8); font-size: 9px;">
          <i class="fas fa-map-marker-alt"></i> Cebu
        </div>
        <div class="city-icon" style="position: absolute; top: 458px; left: 196px; color: rgba(184,145,42,.8); font-size: 9px;">
          <i class="fas fa-map-marker-alt"></i> Davao
        </div>
        <div class="city-icon" style="position: absolute; top: 452px; left: 120px; color: rgba(184,145,42,.6); font-size: 8px;">
          <i class="fas fa-map-marker-alt"></i> Zamboanga
        </div>

        <!-- Animated pulse on Manila -->
        <div class="pulse" style="position: absolute; top: 178px; left: 172px;">
          <i class="fas fa-circle" style="color: rgba(184,145,42,.4); animation: pulseAnimation 2.5s infinite;"></i>
        </div>
      </div>

      <!-- Destination list -->
      <div class="dest-list reveal">
        <div class="dest-item active" onclick="setDest(this)">
          <div class="dest-num">1</div>
          <div class="dest-info">
            <div class="dest-name">Manila (Metro)</div>
            <div class="dest-routes">22 routes departing daily</div>
          </div>
          <div class="dest-price">₱350<small>from</small></div>
        </div>
        <div class="dest-item" onclick="setDest(this)">
          <div class="dest-num">2</div>
          <div class="dest-info">
            <div class="dest-name">Baguio City</div>
            <div class="dest-routes">18 routes · 4–5 hrs</div>
          </div>
          <div class="dest-price">₱420<small>from</small></div>
        </div>
        <div class="dest-item" onclick="setDest(this)">
          <div class="dest-num">3</div>
          <div class="dest-info">
            <div class="dest-name">Cebu City</div>
            <div class="dest-routes">14 routes · via RORO</div>
          </div>
          <div class="dest-price">₱680<small>from</small></div>
        </div>
        <div class="dest-item" onclick="setDest(this)">
          <div class="dest-num">4</div>
          <div class="dest-info">
            <div class="dest-name">Davao City</div>
            <div class="dest-routes">10 routes · 6–8 hrs</div>
          </div>
          <div class="dest-price">₱950<small>from</small></div>
        </div>
        <div class="dest-item" onclick="setDest(this)">
          <div class="dest-num">5</div>
          <div class="dest-info">
            <div class="dest-name">Legazpi City</div>
            <div class="dest-routes">12 routes · Bicol region</div>
          </div>
          <div class="dest-price">₱550<small>from</small></div>
        </div>
        <div class="dest-item" onclick="setDest(this)">
          <div class="dest-num">6</div>
          <div class="dest-info">
            <div class="dest-name">Tuguegarao</div>
            <div class="dest-routes">8 routes · Cagayan Valley</div>
          </div>
          <div class="dest-price">₱720<small>from</small></div>
        </div>
        <div class="dest-item" onclick="setDest(this)">
          <div class="dest-num">7</div>
          <div class="dest-info">
            <div class="dest-name">Zamboanga</div>
            <div class="dest-routes">6 routes · Western Mindanao</div>
          </div>
          <div class="dest-price">₱1,100<small>from</small></div>
        </div>
        <a href="book-a-ticket.html" class="view-all-destinations">View All 45+ Destinations →</a>
      </div>
    </div>
  </div>
</section>

<!-- ═══ QUICK BOOK BANNER ═══ -->
<div class="quick-book-banner">
  <div class="qb-inner">
    <div class="qb-text reveal">
      <h2>Ready to <em>Hit the Road?</em></h2>
      <p>Pick a route above or search your destination — your e-ticket is ready in under 3 minutes.</p>
    </div>
    <div class="qb-actions reveal">
      <button class="qb-btn-primary" onclick="window.location='book-a-ticket.html'">Book a Ticket Now</button>
      <button class="qb-btn-secondary">View Promos & Deals</button>
    </div>
  </div>
</div>

<!-- ═══ FOOTER ═══ -->
<footer>
  <div class="footer-inner">
    <div class="footer-top">
      <div class="footer-brand">
        <a class="logo" href="index.html" style="filter:brightness(1.2)">
          <div class="logo-mark" style="border-color:rgba(212,168,67,.3)">
            <i class="fas fa-bus" style="color:#d4a843;"></i>
          </div>
          <span style="font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:800;color:#fff;">Voyage<span style="color:#d4a843">PH</span></span>
        </a>
        <p>Philippines' premier bus company — connecting cities with comfort, safety, and reliability since 2018.</p>
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
        </ul>
      </div>
      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="#">About VoyagePH</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Help / FAQ</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2026 VoyagePH. All rights reserved. Made with ❤️ in the Philippines.</p>
      <div class="footer-payments">
        <span style="font-size:.68rem;color:rgba(255,255,255,.25);margin-right:6px;">We accept</span>
        <span class="pay-badge">GCash</span><span class="pay-badge">Maya</span><span class="pay-badge">Visa</span><span class="pay-badge">MC</span><span class="pay-badge">OTC</span>
      </div>
      <div class="footer-socials">
        <a class="soc-btn" href="#"><i class="fab fa-facebook-f"></i></a>
        <a class="soc-btn" href="#"><i class="fab fa-twitter"></i></a>
        <a class="soc-btn" href="#"><i class="fab fa-linkedin-in"></i></a>
        <a class="soc-btn" href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>
</footer>

<script>
/* ── ROUTE DATA ── */
const ROUTES = [
  // Metro Manila / Luzon North
  { id:1,  from:'Quezon City',        to:'Baguio City',          region:'luzon',    dur:'4h 30m', price:420,  oldPrice:550,  badge:'hot',    classes:['Economy','Premier'],         amenities:['AC','Reclining','USB'],            departures:18, bandColor:'linear-gradient(135deg,#0e1117,#1a2235)', emoji:'🌄' },
  { id:2,  from:'Manila (Pasay)',      to:'Vigan City',           region:'luzon',    dur:'7h 00m', price:680,  oldPrice:null, badge:'scenic', classes:['Premier','Luxury'],          amenities:['AC','WiFi','Reclining','Restroom'], departures:8,  bandColor:'linear-gradient(135deg,#1a2235,#2e3a52)', emoji:'🏛️' },
  { id:3,  from:'Manila (Cubao)',      to:'Tuguegarao',           region:'luzon',    dur:'9h 00m', price:850,  oldPrice:null, badge:null,     classes:['Economy','Premier'],         amenities:['AC','Reclining'],                  departures:6,  bandColor:'linear-gradient(135deg,#0e1117,#1a2235)', emoji:'🏔️' },
  { id:4,  from:'Manila (Cubao)',      to:'Laoag City',           region:'luzon',    dur:'8h 30m', price:780,  oldPrice:950,  badge:'sale',   classes:['Economy','Premier'],         amenities:['AC','USB','Reclining'],            departures:6,  bandColor:'linear-gradient(135deg,#7d6019,#b8912a)', emoji:'🌾' },
  { id:5,  from:'Makati',             to:'San Fernando, La Union',region:'luzon',    dur:'5h 00m', price:520,  oldPrice:null, badge:null,     classes:['Economy','Premier'],         amenities:['AC','USB'],                        departures:10, bandColor:'linear-gradient(135deg,#0e1117,#2e3a52)', emoji:'🏖️' },
  { id:6,  from:'Quezon City',        to:'Dagupan City',         region:'luzon',    dur:'3h 30m', price:350,  oldPrice:null, badge:'new',    classes:['Economy'],                   amenities:['AC'],                              departures:14, bandColor:'linear-gradient(135deg,#1a2235,#0e1117)', emoji:'🚌' },

  // Metro Manila / Luzon South
  { id:7,  from:'Manila (Pasay)',      to:'Legazpi City',         region:'luzon',    dur:'10h 00m',price:750,  oldPrice:null, badge:null,     classes:['Economy','Premier','Luxury'],amenities:['AC','WiFi','Meal','Restroom'],      departures:8,  bandColor:'linear-gradient(135deg,#0e1117,#1a2235)', emoji:'🌋' },
  { id:8,  from:'Manila (Cubao)',      to:'Naga City',            region:'luzon',    dur:'8h 00m', price:620,  oldPrice:780,  badge:'sale',   classes:['Economy','Premier'],         amenities:['AC','Reclining','USB'],            departures:10, bandColor:'linear-gradient(135deg,#7d6019,#b8912a)', emoji:'⛪' },
  { id:9,  from:'Quezon City',        to:'Daet',                 region:'luzon',    dur:'6h 30m', price:580,  oldPrice:null, badge:null,     classes:['Economy','Premier'],         amenities:['AC','USB'],                        departures:6,  bandColor:'linear-gradient(135deg,#1a2235,#2e3a52)', emoji:'🌊' },
  { id:10, from:'Manila (Pasay)',      to:'Sorsogon City',        region:'luzon',    dur:'11h 00m',price:820,  oldPrice:null, badge:null,     classes:['Premier','Luxury'],          amenities:['AC','WiFi','Reclining','Restroom'],departures:5,  bandColor:'linear-gradient(135deg,#0e1117,#1a2235)', emoji:'🌿' },

  // Metro Manila routes
  { id:11, from:'Manila (Sampaloc)',   to:'Cavite City',          region:'metro',    dur:'1h 30m', price:180,  oldPrice:null, badge:null,     classes:['Economy'],                   amenities:['AC'],                              departures:24, bandColor:'linear-gradient(135deg,#1a2235,#0e1117)', emoji:'🏙️' },
  { id:12, from:'Quezon City',        to:'Batangas City',        region:'metro',    dur:'2h 30m', price:280,  oldPrice:350,  badge:'hot',    classes:['Economy','Premier'],         amenities:['AC','USB'],                        departures:20, bandColor:'linear-gradient(135deg,#0e1117,#2e3a52)', emoji:'⛵' },

  // Visayas
  { id:13, from:'Cebu City',          to:'Ormoc City',           region:'visayas',  dur:'3h 30m', price:390,  oldPrice:null, badge:null,     classes:['Economy','Premier'],         amenities:['AC','Reclining'],                  departures:10, bandColor:'linear-gradient(135deg,#0e1117,#1a2235)', emoji:'🌴' },
  { id:14, from:'Cebu City',          to:'Dumaguete',            region:'visayas',  dur:'4h 00m', price:420,  oldPrice:null, badge:'scenic', classes:['Premier','Luxury'],          amenities:['AC','WiFi','Reclining'],           departures:8,  bandColor:'linear-gradient(135deg,#1a2235,#2e3a52)', emoji:'🏝️' },
  { id:15, from:'Iloilo City',        to:'Bacolod',              region:'visayas',  dur:'2h 30m', price:310,  oldPrice:380,  badge:'sale',   classes:['Economy','Premier'],         amenities:['AC','USB'],                        departures:12, bandColor:'linear-gradient(135deg,#7d6019,#b8912a)', emoji:'🎭' },
  { id:16, from:'Tacloban',           to:'Cebu City',            region:'visayas',  dur:'5h 00m', price:550,  oldPrice:null, badge:'new',    classes:['Premier'],                   amenities:['AC','WiFi','Reclining'],           departures:6,  bandColor:'linear-gradient(135deg,#0e1117,#1a2235)', emoji:'🏄' },

  // Mindanao
  { id:17, from:'Davao City',         to:'General Santos',       region:'mindanao', dur:'3h 00m', price:320,  oldPrice:null, badge:null,     classes:['Economy','Premier'],         amenities:['AC','USB'],                        departures:14, bandColor:'linear-gradient(135deg,#1a2235,#0e1117)', emoji:'🐟' },
  { id:18, from:'Cagayan de Oro',     to:'Davao City',           region:'mindanao', dur:'4h 30m', price:480,  oldPrice:580,  badge:'hot',    classes:['Economy','Premier'],         amenities:['AC','Reclining','USB'],            departures:10, bandColor:'linear-gradient(135deg,#0e1117,#2e3a52)', emoji:'🏔️' },
  { id:19, from:'Zamboanga City',     to:'Pagadian',             region:'mindanao', dur:'3h 30m', price:380,  oldPrice:null, badge:null,     classes:['Economy'],                   amenities:['AC'],                              departures:8,  bandColor:'linear-gradient(135deg,#1a2235,#2e3a52)', emoji:'🌊' },
  { id:20, from:'Iligan City',        to:'Cagayan de Oro',       region:'mindanao', dur:'2h 00m', price:250,  oldPrice:null, badge:'new',    classes:['Economy','Premier'],         amenities:['AC','USB'],                        departures:16, bandColor:'linear-gradient(135deg,#0e1117,#1a2235)', emoji:'🌅' },

  // More Luzon
  { id:21, from:'Baguio City',        to:'Manila (Cubao)',        region:'luzon',    dur:'4h 30m', price:450,  oldPrice:null, badge:null,     classes:['Economy','Premier'],         amenities:['AC','Reclining'],                  departures:16, bandColor:'linear-gradient(135deg,#1a2235,#2e3a52)', emoji:'🏙️' },
  { id:22, from:'Manila (Pasay)',      to:'Boracay (via Caticlan)',region:'visayas',  dur:'12h 00m',price:1200, oldPrice:1500, badge:'sale',   classes:['Premier','Luxury'],          amenities:['AC','WiFi','Meal','Restroom'],      departures:4,  bandColor:'linear-gradient(135deg,#7d6019,#b8912a)', emoji:'🏖️' },
  { id:23, from:'Manila (Cubao)',      to:'Puerto Princesa',      region:'luzon',    dur:'14h 00m',price:1350, oldPrice:null, badge:'scenic', classes:['Luxury'],                    amenities:['AC','WiFi','Meal','Restroom'],      departures:3,  bandColor:'linear-gradient(135deg,#0e1117,#1a2235)', emoji:'🦚' },
  { id:24, from:'Quezon City',        to:'Cabanatuan',           region:'luzon',    dur:'2h 00m', price:220,  oldPrice:null, badge:null,     classes:['Economy'],                   amenities:['AC'],                              departures:20, bandColor:'linear-gradient(135deg,#1a2235,#0e1117)', emoji:'🌾' },
];

const BADGE_MAP = {
  hot:    { label:'🔥 Popular',  cls:'badge-hot' },
  new:    { label:'✨ New Route', cls:'badge-new' },
  sale:   { label:'🏷️ On Sale',  cls:'badge-sale' },
  scenic: { label:'🌄 Scenic',   cls:'badge-scenic' },
};

const REGION_NAMES = {
  metro:    'Metro Manila Routes',
  luzon:    'Luzon Routes',
  visayas:  'Visayas Routes',
  mindanao: 'Mindanao Routes',
};
const REGION_ICONS = { metro:'🏙️', luzon:'🌄', visayas:'🏝️', mindanao:'🌊' };
const REGION_SUBS  = {
  metro:    'City-to-city commuter & provincial routes from Metro Manila',
  luzon:    'Connecting the northern and southern provinces of the main island',
  visayas:  'Inter-island bus & ferry combo routes across the central islands',
  mindanao: 'Southern Philippines routes across the country\'s largest island group',
};

let currentView = 'grid';
let filteredRoutes = [...ROUTES];

function buildCard(r) {
  const badge = r.badge ? `<div class="rc-badge-band ${BADGE_MAP[r.badge].cls}">${BADGE_MAP[r.badge].label}</div>` : '';
  const oldPrice = r.oldPrice ? `<div style="font-size:.72rem;color:var(--muted-lt);text-decoration:line-through;margin-top:1px;">₱${r.oldPrice.toLocaleString()}</div>` : '';
  const amenityTags = r.amenities.map(a => `<span class="rc-amenity-tag">${a}</span>`).join('');
  const classTags = r.classes.join(' · ');

  return `
    <div class="route-card reveal" onclick="bookRoute(${JSON.stringify(r.from).replace(/"/g,"'")},${JSON.stringify(r.to).replace(/"/g,"'")})">
      <div class="rc-band" style="background:${r.bandColor}">
        <div class="rc-band-emoji">${r.emoji}</div>
        <div class="rc-band-content">
          <div class="rc-cities-row">
            <span class="rc-city-name">${r.from}</span>
            <span class="rc-arrow-band">→</span>
            <span class="rc-city-name">${r.to}</span>
          </div>
          ${badge}
        </div>
      </div>
      <div class="rc-body">
        <div class="rc-meta-grid">
          <div class="rc-meta-item"><small>Duration</small><span>${r.dur}</span></div>
          <div class="rc-meta-item"><small>Departures</small><span>${r.departures}/day</span></div>
          <div class="rc-meta-item"><small>Class</small><span>${classTags}</span></div>
          <div class="rc-meta-item"><small>Fare from</small><span class="rc-price">₱${r.price.toLocaleString()} <sub>/seat</sub></span></div>
        </div>
        ${oldPrice}
        <div class="rc-footer-row">
          <div class="rc-amenities">${amenityTags}</div>
          <button class="rc-book-now" onclick="event.stopPropagation();bookRoute('${r.from}','${r.to}')">Book →</button>
        </div>
      </div>
    </div>`;
}

function renderRoutes() {
  const container = document.getElementById('routes-container');
  const noResults = document.getElementById('no-results');

  if (filteredRoutes.length === 0) {
    container.innerHTML = '';
    noResults.classList.add('show');
    return;
  }
  noResults.classList.remove('show');

  // Group by region
  const groups = {};
  filteredRoutes.forEach(r => {
    if (!groups[r.region]) groups[r.region] = [];
    groups[r.region].push(r);
  });

  const regionOrder = ['metro', 'luzon', 'visayas', 'mindanao'];
  let html = '';
  regionOrder.forEach(region => {
    if (!groups[region]) return;
    html += `
      <div class="region-header reveal">
        <div class="rh-icon">${REGION_ICONS[region]}</div>
        <div><div class="rh-title">${REGION_NAMES[region]}</div><div class="rh-sub">${REGION_SUBS[region]}</div></div>
        <div class="rh-line"></div>
        <div class="rh-count">${groups[region].length} route${groups[region].length>1?'s':''}</div>
      </div>
      <div class="route-grid ${currentView === 'list' ? 'list-view' : ''}" id="grid-${region}">
        ${groups[region].map(buildCard).join('')}
      </div>`;
  });

  container.innerHTML = html;

  // Update counts
  document.getElementById('result-count').textContent = filteredRoutes.length;
  document.getElementById('main-count').textContent = filteredRoutes.length;

  // Trigger reveal animations
  requestAnimationFrame(() => {
    document.querySelectorAll('#routes-container .reveal').forEach((el, i) => {
      setTimeout(() => el.classList.add('in'), i * 40);
    });
  });
}

function filterRoutes() {
  const q = document.getElementById('search-input').value.toLowerCase();
  const region = document.getElementById('region-select').value;
  const cls = document.getElementById('class-select').value;

  filteredRoutes = ROUTES.filter(r => {
    const matchQ = !q || r.from.toLowerCase().includes(q) || r.to.toLowerCase().includes(q);
    const matchRegion = !region || r.region === region;
    const matchCls = !cls || r.classes.includes(cls);
    return matchQ && matchRegion && matchCls;
  });

  sortRoutes(false);
  renderRoutes();
}

function sortRoutes(rerender = true) {
  const val = document.getElementById('sort-sel').value;
  filteredRoutes.sort((a, b) => {
    if (val === 'price-asc') return a.price - b.price;
    if (val === 'price-desc') return b.price - a.price;
    if (val === 'duration') return parseFloat(a.dur) - parseFloat(b.dur);
    if (val === 'alpha') return a.from.localeCompare(b.from);
    return a.id - b.id; // popular = default order
  });
  if (rerender) renderRoutes();
}

function setView(view) {
  currentView = view;
  document.getElementById('grid-btn').classList.toggle('active', view === 'grid');
  document.getElementById('list-btn').classList.toggle('active', view === 'list');
  document.querySelectorAll('.route-grid').forEach(g => {
    g.classList.toggle('list-view', view === 'list');
  });
}

function setRegionPill(el, region) {
  document.querySelectorAll('.region-pill').forEach(p => p.classList.remove('active'));
  el.classList.add('active');
  document.getElementById('region-select').value = region;
  filterRoutes();
}

function clearFilter(btn) {
  const card = btn.closest('.filter-card');
  card.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
  card.querySelectorAll('input[type="range"]').forEach(r => { r.value = r.max; r.dispatchEvent(new Event('input')); });
}

function setDest(el) {
  document.querySelectorAll('.dest-item').forEach(d => d.classList.remove('active'));
  el.classList.add('active');
}

function bookRoute(from, to) {
  window.location.href = 'book-a-ticket.html';
}

/* ── TICKER ── */
const tickerData = [
  { route:'Quezon City → Baguio', dep:'06:00 AM', status:'On Time' },
  { route:'Manila → Vigan',       dep:'07:30 AM', status:'Boarding' },
  { route:'Manila → Legazpi',     dep:'08:00 AM', status:'On Time' },
  { route:'Cebu → Ormoc',         dep:'06:30 AM', status:'On Time' },
  { route:'Davao → GenSan',       dep:'07:00 AM', status:'On Time' },
  { route:'CDO → Davao',          dep:'05:00 AM', status:'Departed' },
  { route:'Iloilo → Bacolod',     dep:'08:30 AM', status:'On Time' },
  { route:'Manila → Naga',        dep:'09:00 AM', status:'Boarding' },
  { route:'Baguio → Manila',      dep:'07:00 AM', status:'On Time' },
  { route:'Manila → Tuguegarao',  dep:'10:00 PM', status:'Scheduled' },
];

function buildTicker() {
  const items = [...tickerData, ...tickerData].map(t =>
    `<div class="ticker-item">
      <span class="ti-route">${t.route}</span>
      <span class="ti-sep">·</span>
      <span class="ti-dep">${t.dep}</span>
      <span class="ti-sep">·</span>
      <span>${t.status}</span>
      <div class="ticker-dot"></div>
    </div>`
  ).join('');
  document.getElementById('ticker-track').innerHTML = items;
}

/* ── SCROLL REVEAL ── */
const ro = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); ro.unobserve(e.target); } });
}, { threshold: 0.08 });

/* ── INIT ── */
window.addEventListener('load', () => {
  buildTicker();
  filteredRoutes = [...ROUTES];
  renderRoutes();
  setTimeout(() => {
    document.querySelectorAll('.reveal').forEach(el => ro.observe(el));
  }, 100);
});
</script>
</body>
</html>