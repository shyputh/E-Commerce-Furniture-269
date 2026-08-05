@extends('_layout')
@section('title', 'Daftar — RUMASELI')

@section('head')
<style>
.auth-wrap{display:grid;grid-template-columns:1fr 1fr;min-height:calc(100vh - 80px);}
.auth-img{position:relative;overflow:hidden;}
.auth-img img{width:100%;height:100%;object-fit:cover;display:block;}
.auth-img-overlay{position:absolute;inset:0;background:rgba(26,26,26,.35);}
.auth-img-text{position:absolute;bottom:3rem;left:3rem;color:#fff;}
.auth-img-text h2{font-family:var(--serif);font-size:2.2rem;line-height:1.3;font-weight:400;margin-bottom:.5rem;}
.auth-img-text p{font-size:.85rem;color:rgba(255,255,255,.75);}
.auth-form-wrap{display:flex;align-items:center;justify-content:center;padding:3rem 2rem;background:var(--bg);overflow-y:auto;}
.auth-form{width:100%;max-width:400px;}
.auth-form .subtitle{margin-bottom:.75rem;}
.auth-form h1{font-size:2.8rem;margin-bottom:2rem;}
.auth-footer{margin-top:2rem;font-size:.8rem;color:var(--muted);text-align:center;}
.auth-footer a{color:var(--brown);font-weight:600;}
.auth-footer a:hover{opacity:.7;}
.global-error{font-size:.8rem;color:#c53030;background:#fff5f5;border:1px solid #fed7d7;padding:.6rem .9rem;margin-bottom:1.25rem;display:none;}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
@media(max-width:768px){
  .auth-wrap{grid-template-columns:1fr;}
  .auth-img{display:none;}
  .form-row{grid-template-columns:1fr;}
}
</style>
@endsection

@section('content')
<div class="auth-wrap">
  <!-- Image panel -->
  <div class="auth-img">
    <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=1200&auto=format&fit=crop" alt="Interior modern" loading="lazy">
    <div class="auth-img-overlay"></div>
    <div class="auth-img-text">
      <h2>Mulai perjalanan<br>menata rumah Anda.</h2>
      <p>Daftar dan temukan benda-benda untuk ruang Anda.</p>
    </div>
  </div>

  <!-- Form panel -->
  <div class="auth-form-wrap">
    <div class="auth-form">
      <span class="subtitle">Akun baru</span>
      <h1>Daftar</h1>

      <div class="global-error" id="global-error"></div>

      <form id="register-form" onsubmit="handleRegister(event)">
        <div class="form-group">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" class="form-input" id="name" placeholder="Nama Anda" required autocomplete="name">
          <span class="form-error" id="err-name"></span>
        </div>
        <div class="form-group">
          <label class="form-label">Email</label>
          <input type="email" class="form-input" id="email" placeholder="nama@email.com" required autocomplete="email">
          <span class="form-error" id="err-email"></span>
        </div>
        <div class="form-group">
          <label class="form-label">Nomor Telepon</label>
          <input type="tel" class="form-input" id="phone" placeholder="08xxxxxxxxxx" required>
          <span class="form-error" id="err-phone"></span>
        </div>
        <div class="form-group">
          <label class="form-label">Alamat</label>
          <textarea class="form-input" id="address" placeholder="Jl. ..." required rows="2" style="resize:vertical;padding-top:.5rem;"></textarea>
          <span class="form-error" id="err-address"></span>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" class="form-input" id="password" placeholder="Min. 8 karakter" required autocomplete="new-password">
            <span class="form-error" id="err-password"></span>
          </div>
          <div class="form-group">
            <label class="form-label">Konfirmasi</label>
            <input type="password" class="form-input" id="password_confirmation" placeholder="Ulangi password" required autocomplete="new-password">
            <span class="form-error" id="err-password_confirmation"></span>
          </div>
        </div>
        <button type="submit" class="btn btn-full" id="register-btn" style="margin-top:.5rem">
          Buat Akun &rarr;
        </button>
      </form>

      <p class="auth-footer">Sudah punya akun? <a href="/login">Masuk</a></p>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (Auth.getUser()) window.location.href = '/';
});

async function handleRegister(e) {
  e.preventDefault();
  ['name','email','phone','address','password','password_confirmation'].forEach(f => {
    const el = document.getElementById('err-' + f);
    if (el) el.textContent = '';
  });
  document.getElementById('global-error').style.display = 'none';

  const pass = document.getElementById('password').value;
  const confirm = document.getElementById('password_confirmation').value;
  if (pass !== confirm) {
    document.getElementById('err-password_confirmation').textContent = 'Password tidak sama.';
    return;
  }

  const btn = document.getElementById('register-btn');
  btn.disabled = true; btn.textContent = 'Memuat...';

  try {
    const data = await api('POST', '/register', {
      name: document.getElementById('name').value,
      email: document.getElementById('email').value,
      phone: document.getElementById('phone').value,
      address: document.getElementById('address').value,
      password: pass,
      password_confirmation: confirm,
    });
    Auth.setSession(data.token, data.user);
    showToast('Akun berhasil dibuat!', 'success');
    setTimeout(() => { window.location.href = '/'; }, 600);
  } catch(e) {
    btn.disabled = false; btn.textContent = 'Buat Akun →';
    const errs = e.data?.errors;
    if (errs) {
      Object.entries(errs).forEach(([k, v]) => {
        const el = document.getElementById('err-' + k);
        if (el) el.textContent = v[0];
      });
    } else {
      const el = document.getElementById('global-error');
      el.textContent = e.data?.message || 'Gagal mendaftar. Coba lagi.';
      el.style.display = 'block';
    }
  }
}
</script>
@endsection
