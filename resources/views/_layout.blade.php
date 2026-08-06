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
  4:  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWHmK5Nv3qHgIBUwAby_AObLfL65quff6bvDNeyA66HA&s=10',
  5:  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe3ggBbr2GbCGGuP1JMejeq4XRQC9HSWpqUOTPV5zwbQ&s=10',
  6:  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqGiadFLrnUC1GWTYdZLduhuRnwKR1knn_K9lumDu4Fw&s=10',
  7:  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrXCn2pX-dhOQnGjaEeLq8fHR96G1T-iYivfv7WfGaaw&s=10',
  8:  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa5Z7eOMgZhKNzXaV7DEsWWdZ-CRPf0vcCoYnWWMapdA&s=10',
  9:  'https://images.unsplash.com/photo-1616047006789-b7af5afb8c20?q=80&w=600&auto=format&fit=crop',
  10: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJ0jwdccatdjI8qmG_eajRVn14rh14smqn-Uas-630LA&s',

  // ── Kamar Tidur (11-20) ──────────────────────────────────────────────────
  11: 'https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=600&auto=format&fit=crop',
  12: 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=600&auto=format&fit=crop',
  13: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPuSb2bCC8BbRLoTzGyqo1qTHUQ3IN-QYnAj5k8SGKpw&s=10',
  14: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRE-2kPX6vQRqvOahtEykfgZFBA4eY7J1vr4VcEOfDFaA&s=10',
  15: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6jw98UleeGCTIxQK-NAdo1hIDW7P5GZZcXBbmQN4sAQ&s',
  16: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4qPefd9Caz1P8ib_bP5cBYBM7N8wiZBahnenqIunB5A&s=10',
  17: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUAQVVYgJRpFYdnKemf8ti8qEGZOjJ1LJmmPgYecX44g&s=10',
  18: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_shI6i7TLumNyXZoCxuyUkmKInkjPDCPOICTbq-6MCw&s=10',
  19: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRR0j0gippJ9qqdXNKSGbpHC1h9Gh_WzY8mJxSPW_XeWg&s=10',
  20: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8oN6loRrrwFqS2hTcHJNOGCNTVazsH6VExEyvyQOziA&s=10',

  // ── Dapur (21-30) ────────────────────────────────────────────────────────
  21: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQdXeLnWa1kA9Rif1vkEpu1TvDbTTATTZQOr1U7CK-WKw&s=10',
  22: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdobgT1fnjuWpUx-a7MlQUK1JVqS1xx9aW9awyTdGsYw&s=10',
  23: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLhy5K-x3NQxv8FPWqOvHq4Cn6fNvdToW1E0apqqW-3Q&s=10',
  24: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRBmUTit4ndwoPvgVZCgbLteJB4A_6EABgC03cYsYYlQ&s=10',
  25: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOhdjrKffA47cnvcwEhra8Kpfm6WDX2pN7EyPQkk0k0Q&s=10',
  26: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0IHCdyzbtRnhvH9Nk-3uBXCxXKBKeVMdnqEIG_yA00w&s=10',
  27: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNXx-lcASokkJRr_GwPeeVwCqCvHxsiaPT3OhpyVNQgQ&s',
  28: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbkj2bvE7HwiNTaC90MdoKDiC4dnk2oem_scO6vj-Kyw&s=10',
  29: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMdECyUIrHfIwYaNE8nteV7-x-asj7PN0PIToVJzsejQ&s=10',
  30: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRAdsIkkouj8iJZ2X3-zjg9AfkEErN7vdpp-n4DJU7Mmw&s=10',

  // ── Ruang Makan (31-40) ──────────────────────────────────────────────────
  31: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6tpekLRFZ3xV4yL-2GcMarZwa8H1YbZFeWisG9qL_5Q&s=10',
  32: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeB--EVeGSSesw5cXeddCrwvaS6hEBdghvyIiCO163LA&s',
  33: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1kh4K_vj_py4_a1lWKKdbPy4Ug_ngubQ8yZmuKEF8fA&s=10',
  34: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQnzLR3nV66-Tsy4Dfk16CkLQf36z-RlrwD-V3xApALA&s=10',
  35: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsK2SHq8yrBz9uwV0nMuGKyUXXiZ0eSg5L19MrTvonow&s=10',
  36: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRoovInyoEqkVTlS50vBoju_yYdGJ51YuX-zd6GNNO7w&s',
  37: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdzMjqqYA4xiboRfcfv-kc_yqDMy_1E9ojqY2UNePtjg&s=10',
  38: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9FwTDBTiOQ0Oh8djWu3x7SG4hXST2Dtwb_vAsZKyLZw&s=10',
  39: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh5Whb0vhJOqi1KmWZRqj8TSv08hlYlCWnFkiD_P6IFQ&s',
  40: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjb5u_b5883tcx5jKXp9mpCp8URYLC4Tv9MTRZw_ZY6w&s=10',

  // ── Penyimpanan (41-50) ──────────────────────────────────────────────────
  41: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1IujfAxFCLDolGGM45bQM_WE6rHbTNzZ_BzSGLsKU9w&s=10',
  42: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQP1foTklpHj3A0VDmPcUSXjZHJDZAupGLZeD6NsGxG8Q&s=10',
  43: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRj5d3spDgbQNk8u7qZDAvjO0xseqbBtepzO701wcVCcQ&s=10',
  44: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3QDLPSMXzbX9rGA96yMDGz9LJLdryWs2PMOz3xdInow&s=10',
  45: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHBB0O31k8Mha-AJPXtHFi_Sfay-6PTK5psbrgfhyjlg&s=10',
  46: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTEn9KZtF65YijY3iH3rM7h2tWyF4NBex3w0DQV1lhkg&s=10',
  47: 'data:image/webp;base64,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',
  48: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2cKPMTxKntkW-QmQEPwV-0ALW5Od-n-hGQZKZmyeu1g&s=10',
  49: 'data:image/webp;base64,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',
  50: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrOQ-jIP0nAwnfaRU_L1Ju3rQfeRUyFxScgZ2iqfenWw&s=10',

  // ── Dekorasi (51-60) ─────────────────────────────────────────────────────
  51: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5LApQ0cz4tWqkt6vGwf-s3QLiwJX4ZFG9SY96nsLTlw&s',
  52: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy6v-P2MFdFyGiLcNMQ7gdyi5ATKNa69JzYlcvYCUC0A&s=10',
  53: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1wt_Ab9lq-z0sLwZ7rLAOduIhgV80MIchPFO6HWkYVg&s=10',
  54: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpe4EVrfqMOui2Eanig1_qbiOEFx7Hnus88tGWL-paew&s=10',
  55: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTixZwLxZj1cH5LioCOz6klJQiCYvW-Tmk9RVwbyq1q4g&s=10',
  56: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv6pD6-L0oYBy_rSZYRDSNxX3dXCvJbz77CEn5EkFrkw&s=10',
  57: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRexaHeVnPMBPvbThUr_q1GKw20ijpVkoKsslyoG8tDTg&s=10',
  58: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9pj1vIzrWqT3THuvDVuumgB0GRz_TPi8qSSzz-qk_JQ&s=10',
  59: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQRYjOSjI-SEIFeJ2JTqxcz4DRjrdR-98Xswrs-RfNCA&s',
  60: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrArSW_Qg48fOBGcnCOrKE4NAe-8aA1RydcRcFWKTaIw&s=10',
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
