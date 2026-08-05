@extends('_layout')
@section('title', 'Masuk — RUMASELI')

@section('head')
<style>
.auth-wrap{display:grid;grid-template-columns:1fr 1fr;min-height:calc(100vh - 80px);}
.auth-img{position:relative;overflow:hidden;}
.auth-img img{width:100%;height:100%;object-fit:cover;display:block;}
.auth-img-overlay{position:absolute;inset:0;background:rgba(26,26,26,.35);}
.auth-img-text{position:absolute;bottom:3rem;left:3rem;color:#fff;}
.auth-img-text h2{font-family:var(--serif);font-size:2.2rem;line-height:1.3;font-weight:400;margin-bottom:.5rem;}
.auth-img-text p{font-size:.85rem;color:rgba(255,255,255,.75);}
.auth-form-wrap{display:flex;align-items:center;justify-content:center;padding:3rem 2rem;background:var(--bg);}
.auth-form{width:100%;max-width:380px;}
.auth-form .subtitle{margin-bottom:.75rem;}
.auth-form h1{font-size:2.8rem;margin-bottom:2.5rem;}
.auth-footer{margin-top:2rem;font-size:.8rem;color:var(--muted);text-align:center;}
.auth-footer a{color:var(--brown);font-weight:600;}
.auth-footer a:hover{opacity:.7;}
.global-error{font-size:.8rem;color:#c53030;background:#fff5f5;border:1px solid #fed7d7;padding:.6rem .9rem;margin-bottom:1.25rem;display:none;}
@media(max-width:768px){
  .auth-wrap{grid-template-columns:1fr;}
  .auth-img{display:none;}
}
</style>
@endsection

@section('content')
<div class="auth-wrap">
  <!-- Image panel -->
  <div class="auth-img">
    <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=1200&auto=format&fit=crop" alt="Interior ruang tamu" loading="lazy">
    <div class="auth-img-overlay"></div>
    <div class="auth-img-text">
      <h2>Selamat datang<br>kembali.</h2>
      <p>Masuk untuk melanjutkan belanja Anda.</p>
    </div>
  </div>

  <!-- Form panel -->
  <div class="auth-form-wrap">
    <div class="auth-form">
      <span class="subtitle">Akun</span>
      <h1>Masuk</h1>

      <div class="global-error" id="global-error"></div>

      <form id="login-form" onsubmit="handleLogin(event)">
        <div class="form-group">
          <label class="form-label">Email</label>
          <input type="email" class="form-input" id="email" placeholder="nama@email.com" required autocomplete="email">
          <span class="form-error" id="err-email"></span>
        </div>
        <div class="form-group">
          <label class="form-label">Password</label>
          <input type="password" class="form-input" id="password" placeholder="••••••••" required autocomplete="current-password">
          <span class="form-error" id="err-password"></span>
        </div>
        <button type="submit" class="btn btn-full" id="login-btn" style="margin-top:.5rem">
          Masuk &rarr;
        </button>
      </form>

      <p class="auth-footer">Belum punya akun? <a href="/register">Daftar sekarang</a></p>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
// Redirect if already logged in
document.addEventListener('DOMContentLoaded', () => {
  const user = Auth.getUser();
  if (user) {
    window.location.href = Auth.isAdmin() ? '/admin' : '/';
  }
});

async function handleLogin(e) {
  e.preventDefault();
  // Clear errors
  ['email','password'].forEach(f => document.getElementById('err-'+f).textContent = '');
  document.getElementById('global-error').style.display = 'none';

  const btn = document.getElementById('login-btn');
  btn.disabled = true; btn.textContent = 'Memuat...';

  try {
    const data = await api('POST', '/login', {
      email: document.getElementById('email').value,
      password: document.getElementById('password').value,
    });
    Auth.setSession(data.token, data.user);
    showToast('Berhasil masuk!', 'success');
    const role = data.user?.role?.name?.toLowerCase();
    setTimeout(() => { window.location.href = role === 'admin' ? '/admin' : '/'; }, 600);
  } catch(e) {
    btn.disabled = false; btn.textContent = 'Masuk →';
    const errs = e.data?.errors;
    if (errs) {
      Object.entries(errs).forEach(([k, v]) => {
        const el = document.getElementById('err-' + k);
        if (el) el.textContent = v[0];
      });
    } else {
      const el = document.getElementById('global-error');
      el.textContent = e.data?.message || 'Email atau password salah.';
      el.style.display = 'block';
    }
  }
}
</script>
@endsection
