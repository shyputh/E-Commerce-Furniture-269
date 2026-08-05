<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Admin — RUMASELI')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Lora:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
<style>
:root{--bg:#F8F7F3;--text:#2A2A2A;--muted:#7A7A7A;--brown:#AF8B6E;--banner:#EAE6DF;--border:#E0DFD8;--footer:#1A1A1A;--serif:'Lora',serif;--sans:'Inter',sans-serif;}
*{margin:0;padding:0;box-sizing:border-box;}
html,body{height:100%;}
body{background:#F0EDE8;color:var(--text);font-family:var(--sans);line-height:1.6;overflow-x:hidden;}
img{max-width:100%;height:auto;display:block;}
a{color:inherit;text-decoration:none;}
h1,h2{font-family:var(--serif);font-weight:400;}
</style>
<style>
/* ── ADMIN SHELL ─────────────────────────────────────────────────────────── */
.admin-shell{display:flex;min-height:100vh;}

/* ── SIDEBAR ─────────────────────────────────────────────────────────────── */
.admin-sidebar{width:240px;background:var(--footer);flex-shrink:0;display:flex;flex-direction:column;position:sticky;top:0;height:100vh;overflow-y:auto;}
.sidebar-brand{padding:1.75rem 1.5rem 1.5rem;border-bottom:1px solid rgba(255,255,255,.07);}
.sidebar-brand .brand-name{font-family:var(--serif);font-size:1.2rem;letter-spacing:.08em;color:#F8F7F3;margin-bottom:.25rem;}
.sidebar-brand .brand-role{font-size:.6rem;font-weight:600;letter-spacing:.15em;text-transform:uppercase;color:var(--brown);}
.sidebar-user{padding:1rem 1.5rem;border-bottom:1px solid rgba(255,255,255,.07);display:flex;align-items:center;gap:.75rem;}
.sidebar-avatar{width:32px;height:32px;border-radius:50%;background:var(--brown);display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:600;color:#fff;flex-shrink:0;}
.sidebar-user-name{font-size:.82rem;font-weight:500;color:#F8F7F3;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.admin-nav{flex:1;padding:.75rem 0;}
.admin-nav a{display:flex;align-items:center;gap:.85rem;padding:.8rem 1.5rem;font-size:.73rem;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:#888;transition:all .2s;border-left:2px solid transparent;}
.admin-nav a:hover{color:#ccc;background:rgba(255,255,255,.04);}
.admin-nav a.active{color:var(--brown);background:rgba(175,139,110,.08);border-left-color:var(--brown);}
.admin-nav .nav-section{padding:.85rem 1.5rem .35rem;font-size:.55rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:#555;}
.sidebar-footer{padding:1.25rem 1.5rem;border-top:1px solid rgba(255,255,255,.07);}
.sidebar-logout{display:flex;align-items:center;gap:.65rem;background:none;border:none;cursor:pointer;font-size:.7rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#666;transition:color .2s;width:100%;}
.sidebar-logout:hover{color:#fc8181;}

/* ── MAIN CONTENT ────────────────────────────────────────────────────────── */
.admin-main{flex:1;display:flex;flex-direction:column;overflow-x:auto;min-width:0;}
.admin-topbar{background:#fff;border-bottom:1px solid var(--border);padding:.9rem 2rem;display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap;}
.admin-topbar-title{font-size:.7rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);}
.admin-topbar-right{display:flex;align-items:center;gap:1rem;font-size:.75rem;color:var(--muted);}
.admin-topbar-right span{font-weight:500;color:var(--text);}
.admin-content{padding:2rem;}

/* ── SHARED ADMIN COMPONENTS ─────────────────────────────────────────────── */
.page-heading{margin-bottom:2rem;}
.page-heading .subtitle{font-size:.65rem;font-weight:600;letter-spacing:.12em;color:var(--brown);text-transform:uppercase;display:block;margin-bottom:.35rem;}
.page-heading h1{font-size:2.2rem;}
.page-heading-row{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:2rem;flex-wrap:wrap;gap:1rem;}
.page-heading-row .page-heading{margin-bottom:0;}

/* ── STAT CARDS ──────────────────────────────────────────────────────────── */
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.25rem;margin-bottom:2rem;}
.stat-card{background:#fff;border:1px solid var(--border);padding:1.5rem;cursor:pointer;transition:all .2s;position:relative;overflow:hidden;}
.stat-card::before{content:'';position:absolute;top:0;left:0;width:3px;height:100%;background:var(--brown);opacity:0;transition:opacity .2s;}
.stat-card:hover{border-color:var(--brown);box-shadow:0 2px 12px rgba(175,139,110,.12);}
.stat-card:hover::before{opacity:1;}
.stat-card .stat-label{font-size:.6rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);margin-bottom:.6rem;}
.stat-card .stat-val{font-family:var(--serif);font-size:1.8rem;color:var(--text);margin-bottom:.3rem;line-height:1.1;}
.stat-card .stat-sub{font-size:.7rem;color:var(--muted);}

/* ── CARD ────────────────────────────────────────────────────────────────── */
.admin-card{background:#fff;border:1px solid var(--border);margin-bottom:1.5rem;}
.admin-card-header{display:flex;justify-content:space-between;align-items:center;padding:1rem 1.5rem;border-bottom:1px solid var(--border);}
.admin-card-header h2{font-family:var(--sans);font-size:.68rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);}
.admin-card-header a,.admin-card-header button{font-size:.65rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--brown);background:none;border:none;cursor:pointer;}
.admin-card-body{padding:1.5rem;}

/* ── TABLE ───────────────────────────────────────────────────────────────── */
.admin-table-wrap{background:#fff;border:1px solid var(--border);overflow-x:auto;margin-bottom:1.5rem;}
table.admin-table{width:100%;border-collapse:collapse;font-size:.84rem;}
table.admin-table th{text-align:left;font-size:.58rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);padding:.8rem 1.25rem;background:var(--bg);border-bottom:1px solid var(--border);}
table.admin-table td{padding:.9rem 1.25rem;border-top:1px solid var(--border);vertical-align:middle;}
table.admin-table tbody tr{transition:background .15s;}
table.admin-table tbody tr:hover td{background:#fafaf8;}
.table-id{font-family:monospace;font-size:.75rem;color:var(--muted);}
.action-link{font-size:.62rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--brown);cursor:pointer;background:none;border:none;padding:0;}
.action-link:hover{opacity:.7;}
.action-link.danger{color:#e53e3e;}
.action-link.danger:hover{opacity:.7;}

/* ── BADGES ──────────────────────────────────────────────────────────────── */
.badge{display:inline-block;padding:.2rem .7rem;font-size:.65rem;font-weight:600;border-radius:999px;}
.badge-pending{background:#fefcbf;color:#744210;}
.badge-paid{background:#bee3f8;color:#2a4365;}
.badge-shipped{background:#e9d8fd;color:#44337a;}
.badge-completed{background:#c6f6d5;color:#22543d;}
.badge-cancelled{background:#fed7d7;color:#822727;}

/* ── FILTER BAR ──────────────────────────────────────────────────────────── */
.filter-bar{display:flex;gap:.75rem;flex-wrap:wrap;margin-bottom:1.25rem;align-items:center;}
.search-wrap{flex:1;min-width:200px;position:relative;}
.search-wrap svg{position:absolute;left:.75rem;top:50%;transform:translateY(-50%);pointer-events:none;color:var(--muted);}
.search-input{width:100%;background:#fff;border:1px solid var(--border);padding:.55rem .75rem .55rem 2.25rem;font-size:.84rem;color:var(--text);outline:none;transition:border-color .2s;}
.search-input:focus{border-color:var(--brown);}
.filter-btn{background:transparent;border:1px solid var(--border);padding:.4rem .9rem;font-size:.6rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;cursor:pointer;color:var(--muted);transition:all .2s;}
.filter-btn.active{background:var(--brown);border-color:var(--brown);color:#fff;}
.filter-btn:hover:not(.active){border-color:var(--brown);color:var(--brown);}
.result-count{font-size:.7rem;color:var(--muted);letter-spacing:.08em;text-transform:uppercase;margin-bottom:.75rem;}

/* ── DETAIL LAYOUT ───────────────────────────────────────────────────────── */
.detail-grid{display:grid;grid-template-columns:1fr 300px;gap:1.5rem;align-items:start;}
.breadcrumb{font-size:.62rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);display:flex;gap:.4rem;align-items:center;flex-wrap:wrap;margin-bottom:1.5rem;}
.breadcrumb a{color:var(--muted);transition:color .2s;}
.breadcrumb a:hover{color:var(--brown);}
.detail-header{display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:1rem;margin-bottom:1.75rem;}
.detail-header h1{font-size:1.9rem;}
.detail-header .order-date{font-size:.78rem;color:var(--muted);margin-top:.3rem;}
.specs-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
.spec-item span:first-child{font-size:.58rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);display:block;margin-bottom:.2rem;}
.spec-item span:last-child{font-size:.84rem;}
.item-thumb{width:42px;height:42px;object-fit:cover;background:var(--banner);flex-shrink:0;}

/* ── RADIO LIST ──────────────────────────────────────────────────────────── */
.radio-list{display:flex;flex-direction:column;gap:.4rem;margin-bottom:1rem;}
.radio-opt{display:flex;align-items:center;gap:.65rem;padding:.6rem .85rem;border:1px solid var(--border);cursor:pointer;transition:border-color .2s;}
.radio-opt:has(input:checked){border-color:var(--brown);background:#fdf9f6;}
.radio-opt input{accent-color:var(--brown);}
.radio-opt label{font-size:.82rem;cursor:pointer;}

/* ── DELIVERY STATUS BUTTONS ─────────────────────────────────────────────── */
.delivery-btn-group{display:flex;gap:.5rem;flex-wrap:wrap;margin-top:.35rem;}
.d-btn{background:transparent;border:1px solid var(--border);padding:.4rem .9rem;font-size:.6rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;cursor:pointer;color:var(--muted);transition:all .2s;}
.d-btn.active{background:var(--brown);border-color:var(--brown);color:#fff;}
.d-btn:hover:not(.active){border-color:var(--brown);color:var(--brown);}

/* ── FLASH MESSAGE ───────────────────────────────────────────────────────── */
.flash-msg{padding:.7rem 1rem;font-size:.8rem;font-weight:500;margin-bottom:1.25rem;display:none;border-radius:2px;}
.flash-msg.ok{background:#f0fff4;color:#276749;border:1px solid #9ae6b4;}
.flash-msg.err{background:#fff5f5;color:#c53030;border:1px solid #feb2b2;}

/* ── FORM ────────────────────────────────────────────────────────────────── */
.form-group{display:flex;flex-direction:column;gap:.3rem;margin-bottom:1.1rem;}
.form-label{font-size:.6rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);}
.form-input{width:100%;background:transparent;border:none;border-bottom:1px solid rgba(42,42,42,.25);padding:.55rem 0;font-size:.88rem;color:var(--text);outline:none;transition:border-color .2s;font-family:var(--sans);}
.form-input:focus{border-bottom-color:var(--brown);}
.form-input::placeholder{color:rgba(122,122,122,.45);}
select.form-input{-webkit-appearance:none;cursor:pointer;}
.form-error{font-size:.68rem;color:#e53e3e;}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}

/* ── BUTTONS ─────────────────────────────────────────────────────────────── */
.btn{display:inline-flex;align-items:center;justify-content:center;background:var(--brown);color:#fff;padding:.7rem 1.75rem;font-size:.68rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;border:none;cursor:pointer;transition:opacity .25s;}
.btn:hover{opacity:.82;}
.btn:disabled{opacity:.45;cursor:not-allowed;}
.btn-sm{padding:.45rem 1.1rem;font-size:.62rem;}
.btn-full{width:100%;text-align:center;}
.btn-outline{background:transparent;color:var(--brown);border:1px solid var(--brown);}
.btn-outline:hover{background:var(--brown);color:#fff;opacity:1;}
.btn-ghost{background:transparent;color:var(--text);border:1px solid var(--border);}
.btn-ghost:hover{border-color:var(--text);opacity:1;}
.btn-danger{background:#e53e3e;}
.subtitle{font-size:.65rem;font-weight:600;letter-spacing:.12em;color:var(--brown);text-transform:uppercase;display:block;}

/* ── MODAL ───────────────────────────────────────────────────────────────── */
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.55);z-index:400;align-items:center;justify-content:center;padding:1rem;}
.modal-overlay.open{display:flex;}
.modal{background:var(--bg);width:100%;max-width:460px;max-height:92vh;overflow-y:auto;padding:2rem;box-shadow:0 8px 32px rgba(0,0,0,.18);}
.modal-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.75rem;}
.modal-header h2{font-family:var(--serif);font-size:1.6rem;}
.modal-close{background:none;border:none;cursor:pointer;color:var(--muted);font-size:1.4rem;line-height:1;transition:color .2s;}
.modal-close:hover{color:var(--text);}
.modal-footer{display:flex;gap:.75rem;margin-top:1rem;}
.modal-footer .btn{flex:1;}

/* ── SKELETON ────────────────────────────────────────────────────────────── */
.skel{background:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%);background-size:200% 100%;animation:shimmer 1.5s infinite;border-radius:2px;}
@keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}

/* ── TOAST ───────────────────────────────────────────────────────────────── */
.toast{position:fixed;bottom:2rem;right:2rem;background:var(--text);color:#fff;padding:.75rem 1.5rem;font-size:.8rem;font-weight:500;z-index:999;transform:translateY(100px);opacity:0;transition:all .3s ease;pointer-events:none;border-radius:2px;}
.toast.show{transform:translateY(0);opacity:1;}
.toast.success{background:#276749;}
.toast.error{background:#c53030;}

/* ── MOBILE HAMBURGER ────────────────────────────────────────────────────── */
.mob-toggle{display:none;position:fixed;top:.85rem;left:.85rem;z-index:300;background:var(--footer);border:none;cursor:pointer;padding:.55rem;color:#ccc;}
@media(max-width:900px){
  .detail-grid{grid-template-columns:1fr;}
  .stats-grid{grid-template-columns:1fr 1fr;}
}
@media(max-width:768px){
  .mob-toggle{display:flex;}
  .admin-sidebar{position:fixed;left:-260px;top:0;z-index:200;transition:left .25s;}
  .admin-sidebar.open{left:0;}
  .admin-content{padding:1.25rem;}
  .admin-topbar{padding:.75rem 1.25rem;}
  .stats-grid{grid-template-columns:1fr;}
  .form-row{grid-template-columns:1fr;}
}
</style>
@yield('head')
</head>
<body>
