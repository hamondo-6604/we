<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>LOVO Admin — Command Center</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --khaki: #c3b091;
  --khaki-dark: #a6977a;
  --khaki-light: #d4c8b0;
  --khaki-bg: rgba(195, 176, 145, 0.1);
  --khaki-line: rgba(195, 176, 145, 0.3);
  --ink: #2c2416;
  --ink-mid: #3d3426;
  --ink-soft: #4e4537;
  --text: #2c2416;
  --text-dim: #6b5d4f;
  --muted: #8b7d6f;
  --muted-lt: #ab9d8f;
  --bg: #f9f7f4;
  --bg2: #f2efe9;
  --bg3: #ebe7e1;
  --bg4: #e4dfd8;
  --border: rgba(195, 176, 145, 0.2);
  --border-lt: rgba(195, 176, 145, 0.4);
  --white: #ffffff;
  --sidebar-w: 280px;
  --header-h: 70px;
  --radius: 10px;
  --radius-sm: 8px;
  --shadow: 0 2px 12px rgba(195, 176, 145, 0.15);
  --shadow-hover: 0 4px 20px rgba(195, 176, 145, 0.25);
}

html{scroll-behavior:smooth}
body{
  font-family:'Outfit',sans-serif;
  background:var(--bg);
  color:var(--text);
  display:flex;
  min-height:100vh;
  overflow-x:hidden;
}

/* ─── SIDEBAR ─── */
#sidebar{
  width:var(--sidebar-w);
  background:var(--white);
  border-right:1px solid var(--border);
  display:flex;
  flex-direction:column;
  position:fixed;
  top:0;left:0;bottom:0;
  z-index:200;
  transition:transform .3s cubic-bezier(.4,0,.2,1);
  box-shadow:var(--shadow);
}

.sidebar-brand{
  height:var(--header-h);
  display:flex;align-items:center;gap:12px;
  padding:0 24px;
  border-bottom:1px solid var(--border);
  flex-shrink:0;
  background:var(--khaki-bg);
}
.brand-mark{
  width:40px;height:40px;border-radius:10px;
  background:var(--khaki);
  border:2px solid var(--white);
  display:flex;align-items:center;justify-content:center;
  box-shadow:0 2px 8px rgba(195, 176, 145, 0.3);
}
.brand-mark svg{width:20px;height:20px;fill:none;stroke:var(--white);stroke-width:2;stroke-linecap:round}
.brand-text{
  font-family:'Playfair Display',serif;
  font-size:1.25rem;font-weight:800;color:var(--ink);
}
.brand-text span{color:var(--khaki-dark)}
.brand-badge{
  margin-left:auto;
  font-size:.65rem;font-weight:700;
  letter-spacing:1.5px;text-transform:uppercase;
  color:var(--white);background:var(--khaki);
  border:1px solid var(--khaki-dark);
  padding:4px 8px;border-radius:6px;
}

.sidebar-nav{
  flex:1;overflow-y:auto;padding:20px 16px;
  scrollbar-width:none;
}
.sidebar-nav::-webkit-scrollbar{display:none}

.nav-group-label{
  font-size:.7rem;font-weight:700;
  letter-spacing:2px;text-transform:uppercase;
  color:var(--muted);
  padding:16px 12px 8px;
  margin-top:12px;
}
.nav-group-label:first-child{margin-top:0}

.nav-item{
  display:flex;align-items:center;gap:12px;
  padding:12px 16px;border-radius:var(--radius-sm);
  cursor:pointer;transition:all .2s ease;
  margin-bottom:4px;
  position:relative;
  text-decoration:none;
  color:var(--text-dim);
  font-size:.87rem;font-weight:500;
}
.nav-item:hover{
  background:var(--khaki-bg);
  color:var(--khaki-dark);
  transform:translateX(2px);
}
.nav-item.active{
  background:linear-gradient(135deg,var(--khaki),var(--khaki-dark));
  color:var(--white);font-weight:600;
  border:1px solid var(--khaki-line);
  box-shadow:0 2px 8px rgba(195, 176, 145, 0.2);
}

/* Icon styling for clean khaki theme */
.nav-icon i {
  color: var(--muted);
  font-size: 20px;
  transition: color 0.2s ease;
}

.nav-item:hover .nav-icon i {
  color: var(--khaki-dark);
}

.nav-item.active .nav-icon i {
  color: var(--white);
}

.nav-item.active::before{
  content:'';position:absolute;left:0;top:50%;
  transform:translateY(-50%);
  width:4px;height:70%;border-radius:2px;
  background:var(--white);
}
.nav-icon{
  width:20px;height:20px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;
  font-size:1.1rem;
}
.nav-badge{
  margin-left:auto;
  background:var(--khaki-dark);color:var(--white);
  font-size:.68rem;font-weight:700;
  padding:3px 7px;border-radius:12px;min-width:22px;text-align:center;
  box-shadow:0 1px 4px rgba(195, 176, 145, 0.3);
}
.nav-badge.gold{background:var(--khaki);color:var(--white)}

.sidebar-footer{
  padding:16px 16px;border-top:1px solid var(--border);
  display:flex;align-items:center;gap:12px;
  background:var(--khaki-bg);
}
.sf-avatar{
  width:36px;height:36px;border-radius:50%;
  background:linear-gradient(135deg,var(--khaki),var(--khaki-dark));
  display:flex;align-items:center;justify-content:center;
  font-weight:700;font-size:.85rem;color:var(--white);flex-shrink:0;
  border:2px solid var(--white);
  box-shadow:0 2px 6px rgba(195, 176, 145, 0.2);
}
.sf-info{flex:1;min-width:0}
.sf-name{font-size:.82rem;font-weight:600;color:var(--ink);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.sf-role{font-size:.7rem;color:var(--muted);margin-top:2px}
.sf-logout{
  width:30px;height:30px;border-radius:6px;
  background:var(--white);border:1px solid var(--border);
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;transition:all .2s;font-size:.9rem;
  color:var(--muted);
}
.sf-logout:hover{
  background:var(--khaki);
  border-color:var(--khaki-dark);
  color:var(--white);
  transform:scale(1.05);
}

/* ─── MAIN ─── */
#main{
  margin-left:var(--sidebar-w);
  flex:1;display:flex;flex-direction:column;
  min-height:100vh;
  background:var(--bg);
}

/* ─── HEADER ─── */
#header{
  height:var(--header-h);
  background:linear-gradient(90deg, var(--white) 0%, var(--khaki-bg) 50%, rgba(195, 176, 145, 0.05) 100%);
  border-bottom:1px solid var(--border);
  display:flex;align-items:center;
  padding:0 32px;gap:20px;
  position:sticky;top:0;z-index:100;
  box-shadow:0 1px 3px rgba(195, 176, 145, 0.1);
}
.header-title{
  font-family:'Playfair Display',serif;
  font-size:1.15rem;font-weight:700;color:var(--ink);
}
.header-subtitle{font-size:.78rem;color:var(--muted);margin-top:2px}
.header-right{margin-left:auto;display:flex;align-items:center;gap:10px}

.h-search{
  display:flex;align-items:center;gap:10px;
  background:var(--bg3);border:1px solid var(--border);
  border-radius:var(--radius-sm);padding:8px 16px;
  min-width:220px;transition:border-color .2s;
}
.h-search:focus-within{border-color:var(--khaki);box-shadow:0 0 0 3px rgba(195, 176, 145, 0.1)}
.h-search input{
  background:none;border:none;outline:none;
  color:var(--text);font-family:'Outfit',sans-serif;
  font-size:.84rem;flex:1;
}
.h-search input::placeholder{color:var(--muted-lt)}

.h-btn{
  width:38px;height:38px;border-radius:var(--radius-sm);
  background:var(--white);border:1px solid var(--border);
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;transition:all .2s;font-size:.9rem;
  position:relative;
  color:var(--muted);
}
.h-btn:hover{
  border-color:var(--khaki);
  background:var(--khaki-bg);
  color:var(--khaki-dark);
  transform:translateY(-1px);
}
.h-notif-dot{
  position:absolute;top:6px;right:6px;
  width:8px;height:8px;border-radius:50%;
  background:var(--khaki-dark);border:2px solid var(--white);
}
.h-date{font-size:.8rem;color:var(--muted);font-weight:500}

/* ─── CONTENT ─── */
#content{flex:1;padding:32px;overflow-y:auto}

/* ─── PAGE SECTIONS ─── */
.page{display:none}
.page.active{display:block}

/* ─── OVERVIEW HEADER ─── */
.page-header{margin-bottom:24px}
.page-header h1{
  font-family:'Playfair Display',serif;
  font-size:1.7rem;font-weight:800;color:var(--ink);
}
.page-header p{font-size:.86rem;color:var(--muted);margin-top:6px}
.page-header-row{display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:12px}

/* ─── KPI CARDS ─── */
.kpi-grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
  gap:16px;margin-bottom:24px;
}
.kpi-card{
  background:var(--white);border:1px solid var(--border);
  border-radius:var(--radius);padding:22px 24px;
  transition:border-color .2s,transform .2s;
  cursor:default;position:relative;overflow:hidden;
  box-shadow:0 1px 3px rgba(195, 176, 145, 0.08);
}
.kpi-card::after{
  content:'';position:absolute;top:0;right:0;
  width:80px;height:80px;
  border-radius:50%;
  transform:translate(30px,-30px);
  opacity:.06;
}
.kpi-card.gold::after{background:var(--khaki)}
.kpi-card.green::after{background:#27ae60}
.kpi-card.blue::after{background:#3498db}
.kpi-card.red::after{background:#e74c3c}
.kpi-card:hover{border-color:var(--khaki-line);transform:translateY(-2px);box-shadow:var(--shadow-hover)}
.kpi-icon{font-size:1.3rem;margin-bottom:12px}
.kpi-value{
  font-family:'Playfair Display',serif;
  font-size:2rem;font-weight:800;color:var(--ink);
  line-height:1;
}
.kpi-label{font-size:.78rem;color:var(--muted);margin-top:8px;font-weight:500}
.kpi-delta{
  display:inline-flex;align-items:center;gap:4px;
  font-size:.72rem;font-weight:600;
  margin-top:10px;padding:3px 8px;border-radius:20px;
}
.kpi-delta.up{background:rgba(39,174,96,.15);color:#27ae60}
.kpi-delta.down{background:rgba(231,76,60,.15);color:#e74c3c}
.kpi-delta.neutral{background:var(--khaki-bg);color:var(--muted)}

/* ─── GRID LAYOUTS ─── */
.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:24px}
.grid-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;margin-bottom:24px}
.grid-2-1{display:grid;grid-template-columns:2fr 1fr;gap:16px;margin-bottom:24px}
.grid-1-2{display:grid;grid-template-columns:1fr 2fr;gap:16px;margin-bottom:24px}
.span-2{grid-column:span 2}

/* ─── PANELS ─── */
.panel{
  background:var(--white);border:1px solid var(--border);
  border-radius:var(--radius);overflow:hidden;
  box-shadow:0 1px 3px rgba(195, 176, 145, 0.08);
}
.panel-head{
  padding:18px 22px;border-bottom:1px solid var(--border);
  display:flex;align-items:center;justify-content:space-between;
  gap:12px;
  background:var(--khaki-bg);
}
.panel-head h2{
  font-size:.9rem;font-weight:700;color:var(--ink);
}
.panel-head p{font-size:.75rem;color:var(--muted);margin-top:2px}
.panel-body{padding:22px}
.panel-body.no-pad{padding:0}

/* ─── TABLES ─── */
.data-table{width:100%;border-collapse:collapse;font-size:.8rem}
.data-table th{
  font-size:.68rem;font-weight:700;letter-spacing:1.2px;
  text-transform:uppercase;color:var(--muted);
  padding:10px 16px;text-align:left;
  border-bottom:1px solid var(--border);
  white-space:nowrap;
}
.data-table td{
  padding:14px 16px;border-bottom:1px solid rgba(195, 176, 145, 0.1);
  color:var(--text-dim);vertical-align:middle;
}
.data-table tr:last-child td{border-bottom:none}
.data-table tr:hover td{background:var(--khaki-bg)}
.data-table .primary-cell{color:var(--ink);font-weight:600}

/* ─── BADGES / STATUS ─── */
.badge{
  display:inline-flex;align-items:center;gap:5px;
  font-size:.7rem;font-weight:600;
  padding:3px 9px;border-radius:20px;white-space:nowrap;
}
.badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor;opacity:.7}
.badge.confirmed{background:rgba(39,174,96,.15);color:#27ae60}
.badge.pending{background:var(--khaki-bg);color:var(--khaki-dark)}
.badge.cancelled{background:rgba(231,76,60,.15);color:#e74c3c}
.badge.active{background:var(--khaki-bg);color:var(--khaki-dark)}
.badge.completed{background:rgba(149,165,166,.15);color:#95a5a6}
.badge.maintenance{background:rgba(155,89,182,.15);color:#9b59b6}
.badge.on-time{background:rgba(39,174,96,.12);color:#27ae60}
.badge.delayed{background:var(--khaki-bg);color:var(--khaki-dark)}

/* ─── MINI CHART ─── */
.sparkline{height:42px;display:flex;align-items:flex-end;gap:3px;margin-top:8px}
.spark-bar{
  flex:1;border-radius:3px 3px 0 0;
  background:var(--khaki);opacity:.3;
  transition:opacity .2s;
}
.spark-bar.hi{opacity:1;background:var(--khaki-dark)}
.spark-bar:hover{opacity:.8}

/* ─── DONUT ─── */
.donut-wrap{display:flex;align-items:center;gap:20px;padding:4px 0}
.donut-svg{width:100px;height:100px;flex-shrink:0}
.donut-legend{flex:1}
.legend-item{
  display:flex;align-items:center;gap:8px;
  font-size:.76rem;color:var(--text-dim);
  margin-bottom:8px;
}
.legend-dot{width:9px;height:9px;border-radius:50%;flex-shrink:0}
.legend-val{margin-left:auto;font-weight:600;color:var(--ink)}

/* ─── PROGRESS BARS ─── */
.progress-row{margin-bottom:14px}
.progress-row:last-child{margin-bottom:0}
.progress-label{display:flex;justify-content:space-between;font-size:.76rem;margin-bottom:6px}
.progress-label span:first-child{color:var(--text-dim)}
.progress-label span:last-child{color:var(--ink);font-weight:600}
.progress-track{height:6px;background:var(--bg4);border-radius:3px;overflow:hidden}
.progress-fill{height:100%;border-radius:3px;transition:width 1s cubic-bezier(.4,0,.2,1)}

/* ─── ACTIVITY FEED ─── */
.activity-item{
  display:flex;gap:14px;padding:12px 0;
  border-bottom:1px solid rgba(195, 176, 145, 0.1);
}
.activity-item:last-child{border-bottom:none}
.act-icon{
  width:32px;height:32px;border-radius:8px;
  display:flex;align-items:center;justify-content:center;
  font-size:.95rem;flex-shrink:0;
}
.act-body{flex:1;min-width:0}
.act-text{font-size:.79rem;color:var(--text-dim);line-height:1.4}
.act-text strong{color:var(--ink)}
.act-time{font-size:.69rem;color:var(--muted);margin-top:3px}

/* ─── STAT ROW ─── */
.stat-row{
  display:flex;justify-content:space-between;
  padding:10px 0;border-bottom:1px solid rgba(195, 176, 145, 0.1);
  font-size:.8rem;
}
.stat-row:last-child{border-bottom:none}
.stat-row-label{color:var(--muted)}
.stat-row-val{color:var(--ink);font-weight:600}

/* ─── TABS ─── */
.tab-bar{
  display:flex;gap:2px;
  background:var(--khaki-bg);border-radius:var(--radius-sm);
  padding:3px;margin-bottom:20px;
  width:fit-content;
}
.tab{
  padding:7px 16px;border-radius:6px;
  font-size:.8rem;font-weight:500;
  cursor:pointer;transition:all .18s;
  color:var(--muted);white-space:nowrap;
}
.tab.active{
  background:var(--white);color:var(--ink);
  font-weight:600;
  box-shadow:0 1px 3px rgba(195, 176, 145, 0.2);
}
.tab:hover:not(.active){color:var(--khaki-dark)}

/* ─── BTNS ─── */
.btn{
  display:inline-flex;align-items:center;gap:6px;
  padding:8px 16px;border-radius:var(--radius-sm);
  font-family:'Outfit',sans-serif;font-size:.79rem;font-weight:600;
  cursor:pointer;transition:all .2s;border:none;
  white-space:nowrap;
}
.btn-primary{background:var(--khaki);color:var(--white)}
.btn-primary:hover{background:var(--khaki-dark);box-shadow:var(--shadow-hover);transform:translateY(-1px)}
.btn-ghost{background:var(--white);color:var(--text-dim);border:1px solid var(--border)}}
.btn-ghost:hover{border-color:var(--khaki);color:var(--khaki-dark)}
.btn-danger{background:rgba(231,76,60,.15);color:#e74c3c;border:1px solid rgba(231,76,60,.2)}}
.btn-danger:hover{background:#e74c3c;color:var(--white)}
.btn-sm{padding:5px 11px;font-size:.73rem}

/* ─── FORM ELEMENTS ─── */
.form-group{margin-bottom:16px}
.form-label{display:block;font-size:.76rem;font-weight:600;color:var(--text-dim);margin-bottom:6px}
.form-input{
  width:100%;background:var(--white);border:1px solid var(--border);
  border-radius:var(--radius-sm);padding:10px 14px;
  color:var(--text);font-family:'Outfit',sans-serif;font-size:.84rem;
  outline:none;transition:border-color .2s;
}
.form-input:focus{border-color:var(--khaki);box-shadow:0 0 0 3px rgba(195, 176, 145, 0.1)}
.form-input::placeholder{color:var(--muted)}
select.form-input option{background:var(--white)}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}

/* ─── ALERT ─── */
.alert{
  display:flex;align-items:flex-start;gap:12px;
  padding:12px 16px;border-radius:var(--radius-sm);
  font-size:.8rem;margin-bottom:12px;
}
.alert.warning{background:var(--khaki-bg);border:1px solid var(--khaki-line);color:var(--khaki-dark)}
.alert.danger{background:rgba(231,76,60,.15);border:1px solid rgba(231,76,60,.2);color:#e74c3c}
.alert.info{background:rgba(52,152,219,.15);border:1px solid rgba(52,152,219,.2);color:#3498db}
.alert.success{background:rgba(39,174,96,.15);border:1px solid rgba(39,174,96,.2);color:#27ae60}

/* ─── CARDS GRID ─── */
.card-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:14px}
.item-card{
  background:var(--white);border:1px solid var(--border);
  border-radius:var(--radius);padding:20px;
  transition:all .2s;cursor:default;
  box-shadow:0 1px 3px rgba(195, 176, 145, 0.08);
}
.item-card:hover{border-color:var(--khaki-line);transform:translateY(-2px);box-shadow:var(--shadow-hover)}
.item-card-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:12px}
.item-card-icon{font-size:1.4rem}
.item-card-title{font-size:.9rem;font-weight:700;color:var(--ink);margin-bottom:3px}
.item-card-sub{font-size:.74rem;color:var(--muted)}

/* ─── MINI MAP / ROUTE VISUAL ─── */
.route-vis{
  display:flex;align-items:center;gap:8px;
  padding:10px 14px;background:var(--khaki-bg);
  border-radius:var(--radius-sm);font-size:.78rem;
}
.route-dot{width:8px;height:8px;border-radius:50%}
.route-dot.origin{background:var(--khaki-dark)}
.route-dot.dest{background:var(--khaki)}
.route-line{flex:1;height:1px;background:var(--border);position:relative}
.route-line::after{
  content:'▶';position:absolute;top:50%;left:50%;
  transform:translate(-50%,-50%);
  font-size:.55rem;color:var(--muted);background:var(--khaki-bg);padding:0 3px;
}
.route-city{color:var(--text-dim);font-weight:500}

/* ─── SCROLLBAR ─── */
::-webkit-scrollbar{width:5px;height:5px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--khaki-line);border-radius:3px}
::-webkit-scrollbar-thumb:hover{background:var(--khaki)}

/* ─── MOBILE TOGGLE ─── */
.menu-toggle{
  display:none;
  width:38px;height:38px;
  border-radius:var(--radius-sm);
  background:var(--white);border:1px solid var(--border);
  align-items:center;justify-content:center;
  cursor:pointer;font-size:1.1rem;
  flex-shrink:0;
  color:var(--muted);
}

/* ─── LIVE INDICATOR ─── */
.live-dot{
  display:inline-flex;align-items:center;gap:6px;
  font-size:.72rem;color:var(--khaki-dark);font-weight:600;
}
.live-dot::before{
  content:'';width:7px;height:7px;border-radius:50%;
  background:var(--khaki-dark);
  animation:pulse 1.8s infinite;
}
@keyframes pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(1.3)}}

/* ─── CHART BAR ─── */
.bar-chart{display:flex;flex-direction:column;gap:0}
.bc-row{display:flex;align-items:center;gap:10px;padding:6px 0;border-bottom:1px solid rgba(195, 176, 145, 0.1)}
.bc-row:last-child{border-bottom:none}
.bc-label{font-size:.75rem;color:var(--muted);width:70px;flex-shrink:0}
.bc-track{flex:1;height:8px;background:var(--bg4);border-radius:4px;overflow:hidden}
.bc-fill{height:100%;border-radius:4px;transition:width 1.2s cubic-bezier(.4,0,.2,1)}
.bc-val{font-size:.75rem;font-weight:600;color:var(--ink);width:50px;text-align:right;flex-shrink:0}

/* ─── LOADING ─── */
.skeleton{
  background:linear-gradient(90deg,var(--khaki-bg) 25%,var(--khaki-line) 50%,var(--khaki-bg) 75%);
  background-size:200% 100%;
  animation:shimmer 1.5s infinite;
  border-radius:4px;
}
@keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}

/* ─── TOOLTIP ─── */
[data-tip]{position:relative}
[data-tip]:hover::after{
  content:attr(data-tip);
  position:absolute;bottom:calc(100% + 6px);left:50%;
  transform:translateX(-50%);
  background:var(--ink);color:var(--text);
  font-size:.7rem;padding:4px 8px;border-radius:5px;
  white-space:nowrap;pointer-events:none;z-index:999;
  border:1px solid var(--khaki-line);
}

/* ─── RESPONSIVE ─── */
@media(max-width:1024px){
  .grid-2,.grid-2-1,.grid-1-2{grid-template-columns:1fr}
  .grid-3{grid-template-columns:1fr 1fr}
  .span-2{grid-column:span 1}
}
@media(max-width:768px){
  #sidebar{transform:translateX(-100%)}
  #sidebar.open{transform:translateX(0)}
  #main{margin-left:0}
  .menu-toggle{display:flex}
  .kpi-grid{grid-template-columns:1fr 1fr}
  .grid-3{grid-template-columns:1fr}
  #content{padding:18px}
  .form-row{grid-template-columns:1fr}
}
@media(max-width:480px){
  .kpi-grid{grid-template-columns:1fr}
}

/* ─── OVERLAY ─── */
#overlay{
  display:none;position:fixed;inset:0;
  background:rgba(0,0,0,.5);z-index:199;
  backdrop-filter:blur(3px);
}
#overlay.show{display:block}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<style>
/* ─── DASHBOARD ENHANCEMENTS ─── */
.brand-mark i { font-size: 1.1rem; color: var(--white); }
.kpi-icon i   { font-size: 1.5rem; }
.kpi-card { position: relative; }
.kpi-card-icon-bg {
  position: absolute; top: 16px; right: 18px;
  width: 44px; height: 44px; border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.1rem;
}
.kpi-card.gold  .kpi-card-icon-bg { background: var(--khaki-bg); color: var(--khaki-dark); }
.kpi-card.green .kpi-card-icon-bg { background: rgba(39,174,96,.15);  color: #27ae60; }
.kpi-card.blue  .kpi-card-icon-bg { background: rgba(52,152,219,.15);  color: #3498db; }
.kpi-card.red   .kpi-card-icon-bg { background: rgba(231,76,60,.15);  color: #e74c3c; }

.act-icon i   { font-size: 1rem; }
.alert i      { font-size: .95rem; flex-shrink: 0; margin-top: 1px; }

/* header search icon */
.h-search-icon { color: var(--muted); font-size: .9rem; }

/* sidebar brand icon */
.brand-mark { display: flex; align-items: center; justify-content: center; }

/* KPI trend arrow icons */
.kpi-delta i { font-size: .7rem; }

/* Panel link button */
.panel-link {
  display: inline-flex; align-items: center; gap: 5px;
  font-size: .75rem; color: var(--khaki-dark); font-weight: 600;
  cursor: pointer; background: none; border: none;
  font-family: 'Outfit', sans-serif;
  transition: opacity .2s;
}
.panel-link:hover { opacity: .75; }

/* Revenue chart container */
.rev-chart-wrap {
  height: 120px;
  display: flex;
  align-items: flex-end;
  gap: 3px;
  margin-top: 16px;
  margin-bottom: 8px;
}
.rev-chart-wrap > div { flex: 1; border-radius: 3px 3px 0 0; transition: opacity .2s; cursor: default; }
.rev-chart-wrap > div:hover { opacity: .7 !important; }

/* Stat mini cards */
.mini-stat-row {
  display: flex; gap: 10px; margin-bottom: 24px;
}
.mini-stat {
  flex: 1; background: var(--white); border: 1px solid var(--border);
  border-radius: var(--radius-sm); padding: 14px 16px;
  display: flex; align-items: center; gap: 12px;
  box-shadow:0 1px 3px rgba(195, 176, 145, 0.08);
}
.mini-stat-icon {
  width: 36px; height: 36px; border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  font-size: .9rem; flex-shrink: 0;
}
.mini-stat-label { font-size: .72rem; color: var(--muted); }
.mini-stat-val { font-size: 1rem; font-weight: 700; color: var(--ink); margin-top: 2px; }

/* Activity icons */
.act-icon-fa {
  width: 34px; height: 34px; border-radius: 9px;
  display: flex; align-items: center; justify-content: center;
  font-size: .95rem; flex-shrink: 0;
}
</style>
</head>
<body>

<!-- OVERLAY (mobile) -->
<div id="overlay" onclick="closeSidebar()"></div>

<!-- SIDEBAR -->
<aside id="sidebar">
  <div class="sidebar-brand">
    <div class="brand-mark"><i class="fas fa-bus-alt"></i></div>
    <span class="brand-text">LO<span>V</span>O</span>
    <span class="brand-badge">Admin</span>
  </div>

<nav class="sidebar-nav">
  <div class="nav-group-label">Overview</div>
  <a class="nav-item active" onclick="navigate('dashboard',this)">
    <span class="nav-icon"><i class="material-icons">pie_chart</i></span> Dashboard
  </a>
  <a class="nav-item" onclick="navigate('analytics',this)">
    <span class="nav-icon"><i class="material-icons">show_chart</i></span> Analytics
  </a>

  <div class="nav-group-label">Operations</div>
  <a class="nav-item" onclick="navigate('bookings',this)">
    <span class="nav-icon"><i class="material-icons">confirmation_number</i></span> Bookings
    <span class="nav-badge">12</span>
  </a>
  <a class="nav-item" onclick="navigate('trips',this)">
    <span class="nav-icon"><i class="material-icons">map</i></span> Trips & Schedules
  </a>
  <a class="nav-item" onclick="navigate('routes',this)">
    <span class="nav-icon"><i class="material-icons">directions</i></span> Routes
  </a>
  <a class="nav-item" onclick="navigate('payments',this)">
    <span class="nav-icon"><i class="material-icons">credit_card</i></span> Payments
  </a>
  <a class="nav-item" onclick="navigate('promotions',this)">
    <span class="nav-icon"><i class="material-icons">local_offer</i></span> Promotions
    <span class="nav-badge gold">3</span>
  </a>

  <div class="nav-group-label">Fleet</div>
  <a class="nav-item" onclick="navigate('buses',this)">
    <span class="nav-icon"><i class="material-icons">directions_bus</i></span> Buses
  </a>
  <a class="nav-item" onclick="navigate('bus_types',this)">
    <span class="nav-icon"><i class="material-icons">weekend</i></span> Bus Types
  </a>
  <a class="nav-item" onclick="navigate('seats',this)">
    <span class="nav-icon"><i class="material-icons">event_seat</i></span> Seats & Layouts
  </a>
  <a class="nav-item" onclick="navigate('maintenance',this)">
    <span class="nav-icon"><i class="material-icons">build</i></span> Maintenance
    <span class="nav-badge">2</span>
  </a>

  <div class="nav-group-label">People</div>
  <a class="nav-item" onclick="navigate('users',this)">
    <span class="nav-icon"><i class="material-icons">group</i></span> Users
  </a>
  <a class="nav-item" onclick="navigate('drivers',this)">
    <span class="nav-icon"><i class="material-icons">badge</i></span> Drivers
  </a>
  <a class="nav-item" onclick="navigate('feedback',this)">
    <span class="nav-icon"><i class="material-icons">forum</i></span> Feedback
    <span class="nav-badge">5</span>
  </a>

  <div class="nav-group-label">System</div>
  <a class="nav-item" onclick="navigate('roles',this)">
    <span class="nav-icon"><i class="material-icons">security</i></span> Roles & Permissions
  </a>
  <a class="nav-item" onclick="navigate('notifications',this)">
    <span class="nav-icon"><i class="material-icons">notifications</i></span> Notifications
  </a>
  <a class="nav-item" onclick="navigate('cities',this)">
    <span class="nav-icon"><i class="material-icons">location_city</i></span> Cities
  </a>
</nav>

  <div class="sidebar-footer">
    <div class="sf-avatar">AD</div>
    <div class="sf-info">
      <div class="sf-name">Admin User</div>
      <div class="sf-role">Super Administrator</div>
    </div>
    <div class="sf-logout" title="Logout"><i class="fas fa-sign-out-alt"></i></div>
  </div>
</aside>


<script>
// ─── NAVIGATION ───
const pageMap = {
  dashboard:'Dashboard Overview',
  analytics:'Analytics',
  bookings:'Bookings',
  trips:'Trips & Schedules',
  routes:'Routes',
  payments:'Payments',
  promotions:'Promotions & Deals',
  buses:'Fleet Management',
  bus_types:'Bus Types',
  seats:'Seats & Layouts',
  maintenance:'Maintenance Logs',
  users:'Users',
  drivers:'Drivers',
  feedback:'Passenger Feedback',
  roles:'Roles & Permissions',
  notifications:'Notifications',
  cities:'Cities',
};
const subMap = {
  dashboard:'Real-time overview of LOVO operations',
  analytics:'Performance trends and business intelligence',
  bookings:'Manage all passenger reservations',
  trips:'All departures and live tracking',
  routes:'Origin-destination pairs and fares',
  payments:'Revenue tracking and transactions',
  promotions:'Promo codes and discount campaigns',
  buses:'38-unit fleet — status and assignments',
  bus_types:'Amenity tiers and seating configs',
  seats:'Seat maps and availability',
  maintenance:'Servicing schedules and history',
  users:'3,891 registered passenger accounts',
  drivers:'42-driver roster and assignments',
  feedback:'Reviews, ratings and complaints',
  roles:'Access control and permissions',
  notifications:'System alerts and messages',
  cities:'Terminal locations and service areas',
};

function navigate(key, el){
  document.querySelectorAll('.page').forEach(p=>p.classList.remove('active'));
  const page = document.getElementById('page-'+key);
  if(page) page.classList.add('active');
  document.querySelectorAll('.nav-item').forEach(n=>n.classList.remove('active'));
  if(el) el.classList.add('active');
  document.getElementById('header-title').textContent = pageMap[key]||key;
  document.getElementById('header-sub').textContent = subMap[key]||'';
  if(window.innerWidth<=768) closeSidebar();
  window.scrollTo(0,0);
}

// ─── SIDEBAR MOBILE ───
function toggleSidebar(){
  document.getElementById('sidebar').classList.toggle('open');
  document.getElementById('overlay').classList.toggle('show');
}
function closeSidebar(){
  document.getElementById('sidebar').classList.remove('open');
  document.getElementById('overlay').classList.remove('show');
}

// ─── LIVE DATE ───
function updateDate(){
  const d=new Date();
  document.getElementById('live-date').textContent=d.toLocaleDateString('en-PH',{weekday:'short',month:'short',day:'numeric'});
}
updateDate();

// ─── SPARKLINES ───
function makeSpark(id, data){
  const el=document.getElementById(id);
  if(!el)return;
  const max=Math.max(...data);
  el.innerHTML=data.map((v,i)=>{
    const h=Math.round((v/max)*38)+4;
    const isHi=i===data.length-1;
    return `<div class="spark-bar${isHi?' hi':''}" style="height:${h}px"></div>`;
  }).join('');
}

const revData=[62,78,54,91,83,70,88,95,72,86,90,104,88,112,98,87,120,130,115,140,125,108,138,145,120,155,162,148,175,190];
const bkData=[28,35,22,42,38,30,45,48,32,40,44,52,41,56,49,38,60,65,58,70,62,54,68,72,58,80,85,74,90,96];
makeSpark('rev-spark',revData.slice(-12));
makeSpark('bk-spark',bkData.slice(-12));

// ─── ANALYTICS BARS ───
function buildAnalyticsBars(){
  const el=document.getElementById('analytics-bars');
  if(!el)return;
  const days=30;
  const vals=Array.from({length:days},()=>Math.floor(Math.random()*80)+30);
  const max=Math.max(...vals);
  el.innerHTML=vals.map((v,i)=>{
    const h=Math.round((v/max)*110)+8;
    const isToday=i===days-1;
    const color=isToday?'var(--gold)':'rgba(184,145,42,0.35)';
    return `<div style="flex:1;height:${h}px;background:${color};border-radius:3px 3px 0 0;cursor:default;transition:all .2s" title="Mar ${i+1}: ${v} bookings" onmouseenter="this.style.opacity='.8'" onmouseleave="this.style.opacity='1'"></div>`;
  }).join('');
}
buildAnalyticsBars();

// ─── TAB INTERACTION ───
document.querySelectorAll('.tab-bar').forEach(