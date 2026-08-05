<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'RUMASELI — Curated Home Living')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Lora:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
<style>
:root{--bg:#F8F7F3;--text:#2A2A2A;--muted:#7A7A7A;--brown:#AF8B6E;--banner:#EAE6DF;--border:#E0DFD8;--footer:#1A1A1A;--serif:'Lora',serif;--sans:'Inter',sans-serif;}
*{margin:0;padding:0;box-sizing:border-box;}
body{background:var(--bg);color:var(--text);font-family:var(--sans);line-height:1.6;overflow-x:hidden;}
img{max-width:100%;height:auto;display:block;}
a{color:inherit;text-decoration:none;}
h1,h2{font-family:var(--serif);font-weight:400;}
</style>
<style>
/* ── NAVBAR ── */
.navbar{position:sticky;top:0;z-index:100;display:flex;justify-content:space-between;align-items:center;padding:1.5rem 5%;background:var(--bg);border-bottom:1px solid var(--border);}
.logo{font-family:var(--serif);font-size:1.5rem;letter-spacing:.05em;}
.nav-links{display:flex;list-style:none;gap:2rem;}
.nav-links a{font-size:.75rem;font-weight:600;letter-spacing:.05em;text-transform:uppercase;transition:color .2s;}
.nav-links a:hover{color:var(--brown);}
.nav-right{display:flex;align-items:center;gap:1.5rem;}
.nav-right a,.nav-right button{background:none;border:none;cursor:pointer;display:flex;align-items:center;gap:.4rem;font-size:.75rem;font-weight:600;letter-spacing:.05em;text-transform:uppercase;color:var(--text);transition:color .2s;}
.nav-right a:hover,.nav-right button:hover{color:var(--brown);}
.cart-badge{position:relative;display:flex;}
.cart-count{position:absolute;top:-8px;right:-8px;background:var(--brown);color:#fff;font-size:.55rem;font-weight:700;width:16px;height:16px;border-radius:50%;display:flex;align-items:center;justify-content:center;display:none;}
.user-menu{position:relative;}
.user-dropdown{display:none;position:absolute;right:0;top:calc(100% + .5rem);background:var(--bg);border:1px solid var(--border);min-width:160px;box-shadow:0 4px 16px rgba(0,0,0,.08);}
.user-dropdown a,.user-dropdown button{display:block;width:100%;text-align:left;padding:.75rem 1rem;font-size:.75rem;font-weight:500;letter-spacing:.03em;text-transform:none;border:none;background:none;cursor:pointer;color:var(--text);transition:background .2s;}
.user-dropdown a:hover,.user-dropdown button:hover{background:var(--banner);}
.user-dropdown .logout-btn{color:#e53e3e;}
.user-menu:hover .user-dropdown{display:block;}
.hamburger{display:none;background:none;border:none;cursor:pointer;}
.mobile-menu{display:none;position:fixed;inset:0;background:var(--bg);z-index:200;padding:2rem 5%;flex-direction:column;gap:1.5rem;}
.mobile-menu.open{display:flex;}
.mobile-menu .close-btn{align-self:flex-end;background:none;border:none;cursor:pointer;font-size:1.5rem;}
.mobile-menu a,.mobile-menu button{font-size:1rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--text);background:none;border:none;cursor:pointer;text-align:left;}
</style>
<style>
/* ── FOOTER ── */
footer{background:var(--footer);color:#F8F7F3;padding:4rem 5%;margin-top:4rem;}
.footer-inner{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:2rem;}
.footer-left h2{color:#F8F7F3;font-size:1.4rem;margin-bottom:.4rem;}
.footer-left p{font-size:.85rem;color:#A0A0A0;}
.footer-links{display:flex;gap:1.5rem;margin-top:1rem;}
.footer-links a{font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#A0A0A0;transition:color .2s;}
.footer-links a:hover{color:var(--brown);}
.footer-right{display:flex;gap:2rem;flex-wrap:wrap;}
.footer-feature{display:flex;align-items:center;gap:.5rem;font-size:.75rem;color:#A0A0A0;}
.footer-bottom{margin-top:2.5rem;padding-top:1.5rem;border-top:1px solid #2A2A2A;display:flex;justify-content:space-between;flex-wrap:wrap;gap:.5rem;}
.footer-bottom p{font-size:.65rem;color:#555;}
/* ── UTILS ── */
.btn{display:inline-block;background:var(--brown);color:#fff;padding:.8rem 2rem;font-size:.75rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;border:none;cursor:pointer;transition:opacity .3s;}
.btn:hover{opacity:.8;}
.btn-outline{background:transparent;color:var(--text);border:1px solid var(--text);}
.btn-outline:hover{background:var(--text);color:#fff;opacity:1;}
.btn-dark{background:var(--text);color:#fff;}
.btn-sm{padding:.5rem 1.25rem;font-size:.65rem;}
.btn-full{width:100%;text-align:center;}
.btn-danger{background:#e53e3e;}
.subtitle{font-size:.75rem;font-weight:600;letter-spacing:.1em;color:var(--brown);text-transform:uppercase;display:block;margin-bottom:1.5rem;}
.section-header{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:2rem;border-bottom:1px solid var(--border);padding-bottom:1rem;gap:1rem;flex-wrap:wrap;}
.section-header h2{font-size:2.5rem;}
.section-label{font-size:.75rem;font-weight:600;color:var(--brown);letter-spacing:.1em;text-transform:uppercase;}
.badge{display:inline-block;padding:.2rem .7rem;font-size:.65rem;font-weight:600;border-radius:999px;}
.badge-pending{background:#fefcbf;color:#744210;}
.badge-paid{background:#bee3f8;color:#2a4365;}
.badge-shipped{background:#e9d8fd;color:#44337a;}
.badge-completed{background:#c6f6d5;color:#22543d;}
.badge-cancelled{background:#fed7d7;color:#822727;}
.fade-in{opacity:0;transform:translateY(20px);transition:opacity .8s ease-out,transform .8s ease-out;}
.fade-in.visible{opacity:1;transform:translateY(0);}
.skeleton{background:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%);background-size:200% 100%;animation:shimmer 1.5s infinite;}
@keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}
.toast{position:fixed;bottom:2rem;right:2rem;background:var(--text);color:#fff;padding:.75rem 1.5rem;font-size:.8rem;font-weight:500;z-index:999;transform:translateY(100px);opacity:0;transition:all .3s ease;pointer-events:none;}
.toast.show{transform:translateY(0);opacity:1;}
.toast.success{background:#276749;}
.toast.error{background:#c53030;}
input,select,textarea{font-family:var(--sans);}
.form-group{display:flex;flex-direction:column;gap:.35rem;margin-bottom:1.25rem;}
.form-label{font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);}
.form-input{width:100%;background:transparent;border:none;border-bottom:1px solid rgba(42,42,42,.3);padding:.6rem 0;font-size:.9rem;color:var(--text);outline:none;transition:border-color .2s;}
.form-input:focus{border-bottom-color:var(--brown);}
.form-input::placeholder{color:rgba(122,122,122,.5);}
.form-error{font-size:.7rem;color:#e53e3e;}
select.form-input{-webkit-appearance:none;appearance:none;cursor:pointer;}
</style>
<style>
@media(max-width:768px){
  .navbar{padding:1rem 5%;}
  .nav-links{display:none;}
  .hamburger{display:block;}
  .footer-inner{flex-direction:column;}
  .footer-right{flex-direction:column;gap:1rem;}
  .section-header{flex-direction:column;align-items:flex-start;}
  .section-header h2{font-size:1.8rem;}
}
@media(max-width:480px){
  .btn{padding:.7rem 1.5rem;}
}
</style>
@yield('head')
</head>
<body>
<!-- NAVBAR -->
<nav class="navbar">
  <a href="/" class="logo">RUMASELI</a>
  <ul class="nav-links">
    <li><a href="/products">Semua Produk</a></li>
  </ul>
  <div class="nav-right">
    <a href="/products" aria-label="Cari">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
    </a>
    <!-- Cart (customer only) -->
    <a href="/cart" class="cart-badge" id="nav-cart" style="display:none" aria-label="Keranjang">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
      <span class="cart-count" id="cart-count">0</span>
    </a>
    <!-- Guest links -->
    <a href="/login" id="nav-login">MASUK</a>
    <!-- User menu -->
    <div class="user-menu" id="nav-user" style="display:none">
      <button>
        <span id="nav-username">Akun</span>
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
      </button>
      <div class="user-dropdown">
        <a href="/orders" id="dd-orders" style="display:none">Pesanan Saya</a>
        <a href="/admin" id="dd-admin" style="display:none">Dashboard Admin</a>
        <button class="logout-btn" onclick="authLogout()">Keluar</button>
      </div>
    </div>
    <button class="hamburger" onclick="document.getElementById('mobile-menu').classList.toggle('open')" aria-label="Menu">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
    </button>
  </div>
</nav>
<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobile-menu">
  <button class="close-btn" onclick="document.getElementById('mobile-menu').classList.remove('open')">&times;</button>
  <a href="/products" onclick="document.getElementById('mobile-menu').classList.remove('open')">Semua Produk</a>
  <a href="/cart" id="mob-cart" style="display:none" onclick="document.getElementById('mobile-menu').classList.remove('open')">Keranjang</a>
  <a href="/orders" id="mob-orders" style="display:none" onclick="document.getElementById('mobile-menu').classList.remove('open')">Pesanan Saya</a>
  <a href="/admin" id="mob-admin" style="display:none" onclick="document.getElementById('mobile-menu').classList.remove('open')">Dashboard Admin</a>
  <a href="/login" id="mob-login" onclick="document.getElementById('mobile-menu').classList.remove('open')">Masuk</a>
  <button id="mob-logout" style="display:none" onclick="authLogout()">Keluar</button>
</div>
<!-- PAGE CONTENT -->
<main>@yield('content')</main>
<!-- FOOTER -->
<footer>
  <div class="footer-inner">
    <div class="footer-left">
      <h2>RUMASELI</h2>
      <p>Benda yang merawat ruang, dan waktu.</p>
      <div class="footer-links">
        <a href="/products">Produk</a>
        <a href="/login" id="footer-login">Masuk</a>
        <a href="/register" id="footer-register">Daftar</a>
      </div>
    </div>
    <div class="footer-right">
      <div class="footer-feature">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
        <span>Pengiriman aman</span>
      </div>
      <div class="footer-feature">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        <span>Dipilih dengan teliti</span>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; <span id="footer-year"></span> RUMASELI. Semua hak dilindungi.</p>
    <p>Dibuat dengan rasa, untuk ruang yang hidup.</p>
  </div>
</footer>
<!-- TOAST -->
<div class="toast" id="toast"></div>
<!-- ── GLOBAL JS ─────────────────────────────────────────────────────────────── -->
<script>
/* ── Auth helpers ── */
const Auth = {
  getToken: () => localStorage.getItem('rs_token'),
  getUser:  () => { try { return JSON.parse(localStorage.getItem('rs_user')||'null'); } catch{ return null; } },
  setSession: (token, user) => { localStorage.setItem('rs_token', token); localStorage.setItem('rs_user', JSON.stringify(user)); },
  clear: () => { localStorage.removeItem('rs_token'); localStorage.removeItem('rs_user'); localStorage.removeItem('rs_cart_count'); },
  isAdmin: () => { const u = Auth.getUser(); return u?.role?.name?.toLowerCase() === 'admin'; },
  isCustomer: () => { const u = Auth.getUser(); return u?.role?.name?.toLowerCase() === 'customer'; },
};

/* ── API helper ── */
async function api(method, path, body = null) {
  const opts = { method, headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } };
  const token = Auth.getToken();
  if (token) opts.headers['Authorization'] = 'Bearer ' + token;
  if (body) opts.body = JSON.stringify(body);
  const res = await fetch('/api' + path, opts);
  const data = await res.json().catch(() => ({}));
  if (!res.ok) { const err = new Error(data.message || 'Error'); err.data = data; err.status = res.status; throw err; }
  return data;
}

/* ── Toast ── */
function showToast(msg, type = '') {
  const t = document.getElementById('toast');
  t.textContent = msg; t.className = 'toast ' + type;
  setTimeout(() => t.classList.add('show'), 10);
  setTimeout(() => t.classList.remove('show'), 3200);
}

/* ── Format Rupiah ── */
function rupiah(n) { return 'Rp ' + Number(n).toLocaleString('id-ID'); }

/* ── Status labels ── */
const ORDER_STATUS = { pending:'Menunggu Bayar', paid:'Sudah Dibayar', shipped:'Dikirim', completed:'Selesai', cancelled:'Dibatalkan' };
const ORDER_BADGE  = { pending:'badge-pending', paid:'badge-paid', shipped:'badge-shipped', completed:'badge-completed', cancelled:'badge-cancelled' };
const DELIVERY_STATUS = { preparing:'Diproses', shipped:'Dikirim', delivered:'Terkirim' };

/*
 * ── PRODUCT IMAGE MAP ──────────────────────────────────────────────────────
 * Urutan sesuai ProductSeeder: id 1-10 Ruang Tamu, 11-20 Kamar Tidur,
 * 21-30 Dapur, 31-40 Ruang Makan, 41-50 Penyimpanan, 51-60 Dekorasi.
 * Ganti URL di sini kapan saja tanpa menyentuh database.
 * ──────────────────────────────────────────────────────────────────────────
 */
const PRODUCT_IMG_MAP = {
  // ── Ruang Tamu (1-10) ────────────────────────────────────────────────────
  1:  'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=600&auto=format&fit=crop',
  2:  'https://images.unsplash.com/photo-1567016432779-094069958ea5?q=80&w=600&auto=format&fit=crop',
  3:  'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?q=80&w=600&auto=format&fit=crop',
  4:  'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&w=600&auto=format&fit=crop',
  5:  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe3ggBbr2GbCGGuP1JMejeq4XRQC9HSWpqUOTPV5zwbQ&s=10',
  6:  'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=600&auto=format&fit=crop',
  7:  'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=600&auto=format&fit=crop',
  8:  'https://images.unsplash.com/photo-1507149129528-662589e4ec30?q=80&w=600&auto=format&fit=crop',
  9:  'https://images.unsplash.com/photo-1616047006789-b7af5afb8c20?q=80&w=600&auto=format&fit=crop',
  10: 'https://images.unsplash.com/photo-1592078615290-033ee584e267?q=80&w=600&auto=format&fit=crop',

  // ── Kamar Tidur (11-20) ──────────────────────────────────────────────────
  11: 'https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=600&auto=format&fit=crop',
  12: 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=600&auto=format&fit=crop',
  13: 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=600&auto=format&fit=crop',
  14: 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&w=600&auto=format&fit=crop',
  15: 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?q=80&w=600&auto=format&fit=crop',
  16: 'https://images.unsplash.com/photo-1592435873989-2dcaa52bcf05?q=80&w=600&auto=format&fit=crop',
  17: 'https://images.unsplash.com/photo-1507149129528-662589e4ec30?q=80&w=600&auto=format&fit=crop',
  18: 'https://images.unsplash.com/photo-1585412727339-54e4bae3bbf9?q=80&w=600&auto=format&fit=crop',
  19: 'https://images.unsplash.com/photo-1588854337236-6889d631faa8?q=80&w=600&auto=format&fit=crop',
  20: 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=600&auto=format&fit=crop',

  // ── Dapur (21-30) ────────────────────────────────────────────────────────
  21: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_shI6i7TLumNyXZoCxuyUkmKInkjPDCPOICTbq-6MCw&s=10',
  22: 'https://images.unsplash.com/photo-1519947486511-46149fa0a254?q=80&w=600&auto=format&fit=crop',
  23: 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?q=80&w=600&auto=format&fit=crop',
  24: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=600&auto=format&fit=crop',
  25: 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=600&auto=format&fit=crop',
  26: 'https://images.unsplash.com/photo-1556228841-a3c527ebefe5?q=80&w=600&auto=format&fit=crop',
  27: 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?q=80&w=600&auto=format&fit=crop',
  28: 'https://images.unsplash.com/photo-1565183997392-2f6f122e5912?q=80&w=600&auto=format&fit=crop',
  29: 'https://images.unsplash.com/photo-1556228720-da6474490b18?q=80&w=600&auto=format&fit=crop',
  30: 'https://images.unsplash.com/photo-1610701596007-11502861dcfa?q=80&w=600&auto=format&fit=crop',

  // ── Ruang Makan (31-40) ──────────────────────────────────────────────────
  31: 'https://images.unsplash.com/photo-1617806118233-18e1de247200?q=80&w=600&auto=format&fit=crop',
  32: 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=600&auto=format&fit=crop',
  33: 'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?q=80&w=600&auto=format&fit=crop',
  34: 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?q=80&w=600&auto=format&fit=crop',
  35: 'https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?q=80&w=600&auto=format&fit=crop',
  36: 'https://images.unsplash.com/photo-1574180566232-aaad1b5b8450?q=80&w=600&auto=format&fit=crop',
  37: 'https://images.unsplash.com/photo-1565183997392-2f6f122e5912?q=80&w=600&auto=format&fit=crop',
  38: 'https://images.unsplash.com/photo-1559181567-c3190bac4d52?q=80&w=600&auto=format&fit=crop',
  39: 'https://images.unsplash.com/photo-1556228841-a3c527ebefe5?q=80&w=600&auto=format&fit=crop',
  40: 'https://images.unsplash.com/photo-1592892132332-cf1cf4f4e10f?q=80&w=600&auto=format&fit=crop',

  // ── Penyimpanan (41-50) ──────────────────────────────────────────────────
  41: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=600&auto=format&fit=crop',
  42: 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=600&auto=format&fit=crop',
  43: 'https://images.unsplash.com/photo-1588854337236-6889d631faa8?q=80&w=600&auto=format&fit=crop',
  44: 'https://images.unsplash.com/photo-1592078615290-033ee584e267?q=80&w=600&auto=format&fit=crop',
  45: 'https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?q=80&w=600&auto=format&fit=crop',
  46: 'https://images.unsplash.com/photo-1574180566232-aaad1b5b8450?q=80&w=600&auto=format&fit=crop',
  47: 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=600&auto=format&fit=crop',
  48: 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?q=80&w=600&auto=format&fit=crop',
  49: 'https://images.unsplash.com/photo-1592435873989-2dcaa52bcf05?q=80&w=600&auto=format&fit=crop',
  50: 'https://images.unsplash.com/photo-1563861826100-9cb868fdbe1c?q=80&w=600&auto=format&fit=crop',

  // ── Dekorasi (51-60) ─────────────────────────────────────────────────────
  51: 'https://images.unsplash.com/photo-1613977257363-707ba9348227?q=80&w=600&auto=format&fit=crop',
  52: 'https://images.unsplash.com/photo-1610701596007-11502861dcfa?q=80&w=600&auto=format&fit=crop',
  53: 'https://images.unsplash.com/photo-1513519245088-0e12902e5a38?q=80&w=600&auto=format&fit=crop',
  54: 'https://images.unsplash.com/photo-1547393947-1849a9bc45f4?q=80&w=600&auto=format&fit=crop',
  55: 'https://images.unsplash.com/photo-1513569771920-c9e1d31714af?q=80&w=600&auto=format&fit=crop',
  56: 'https://images.unsplash.com/photo-1598880940942-e43af8fad781?q=80&w=600&auto=format&fit=crop',
  57: 'https://images.unsplash.com/photo-1563861826100-9cb868fdbe1c?q=80&w=600&auto=format&fit=crop',
  58: 'https://images.unsplash.com/photo-1574180566232-aaad1b5b8450?q=80&w=600&auto=format&fit=crop',
  59: 'https://images.unsplash.com/photo-1561214115-f2f134cc4912?q=80&w=600&auto=format&fit=crop',
  60: 'https://images.unsplash.com/photo-1559181567-c3190bac4d52?q=80&w=600&auto=format&fit=crop',
};

const FALLBACK_IMG = 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=600&auto=format&fit=crop';

/** Kembalikan URL gambar untuk product ID tertentu. */
function prodImg(id) {
  return PRODUCT_IMG_MAP[id] || FALLBACK_IMG;
}

/* ── Logout ── */
async function authLogout() {
  try { await api('POST', '/logout'); } catch(_) {}
  Auth.clear(); window.location.href = '/login';
}

/* ── Cart count ── */
async function refreshCartCount() {
  if (!Auth.isCustomer()) return;
  try {
    const items = await api('GET', '/cartItem');
    const total = items.reduce((s, i) => s + i.qty, 0);
    localStorage.setItem('rs_cart_count', total);
    updateCartBadge(total);
  } catch(_) {}
}
function updateCartBadge(n) {
  const el = document.getElementById('cart-count');
  if (!el) return;
  el.textContent = n > 9 ? '9+' : n;
  el.style.display = n > 0 ? 'flex' : 'none';
}

/* ── Navbar init ── */
function initNavbar() {
  const user = Auth.getUser();
  document.getElementById('footer-year').textContent = new Date().getFullYear();
  if (user) {
    document.getElementById('nav-login').style.display = 'none';
    document.getElementById('nav-user').style.display = 'block';
    document.getElementById('nav-username').textContent = user.name.split(' ')[0];
    document.getElementById('mob-login').style.display = 'none';
    document.getElementById('mob-logout').style.display = 'block';
    document.getElementById('footer-login').style.display = 'none';
    document.getElementById('footer-register').style.display = 'none';
    if (Auth.isAdmin()) {
      document.getElementById('dd-admin').style.display = 'block';
      document.getElementById('mob-admin').style.display = 'block';
    } else {
      document.getElementById('nav-cart').style.display = 'flex';
      document.getElementById('dd-orders').style.display = 'block';
      document.getElementById('mob-cart').style.display = 'block';
      document.getElementById('mob-orders').style.display = 'block';
      const cached = localStorage.getItem('rs_cart_count');
      if (cached) updateCartBadge(Number(cached));
      refreshCartCount();
    }
  }
}

/* ── Fade-in on scroll ── */
function initFadeIn() {
  const els = document.querySelectorAll('.fade-in');
  const obs = new IntersectionObserver((entries, o) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); o.unobserve(e.target); } });
  }, { threshold: 0.12 });
  els.forEach(el => obs.observe(el));
}

document.addEventListener('DOMContentLoaded', () => { initNavbar(); initFadeIn(); });
</script>
@yield('scripts')
</body>
</html>
