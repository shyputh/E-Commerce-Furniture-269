@extends('_layout')
@section('title', 'Keranjang — RUMASELI')

@section('head')
<style>
.cart-wrap{padding:3rem 5% 5rem;}
.cart-wrap .subtitle{margin-bottom:.5rem;}
.cart-wrap h1{font-size:3rem;margin-bottom:2.5rem;}
.cart-layout{display:grid;grid-template-columns:1fr 380px;gap:3rem;align-items:start;}
.cart-items{border-top:1px solid var(--border);}
.cart-item{display:flex;gap:1.25rem;padding:1.5rem 0;border-bottom:1px solid var(--border);}
.cart-item-img{width:90px;height:90px;object-fit:cover;background:var(--banner);flex-shrink:0;cursor:pointer;}
.cart-item-body{flex:1;display:flex;flex-direction:column;justify-content:space-between;}
.cart-item-top{display:flex;justify-content:space-between;align-items:flex-start;gap:.5rem;}
.cart-item-cat{font-size:.6rem;font-weight:600;color:var(--brown);letter-spacing:.1em;text-transform:uppercase;display:block;margin-bottom:.25rem;}
.cart-item-name{font-size:.9rem;font-weight:500;cursor:pointer;transition:color .2s;}
.cart-item-name:hover{color:var(--brown);}
.remove-btn{background:none;border:none;cursor:pointer;color:var(--muted);flex-shrink:0;padding:.2rem;transition:color .2s;}
.remove-btn:hover{color:#c53030;}
.cart-item-bottom{display:flex;justify-content:space-between;align-items:center;}
.qty-ctrl{display:flex;align-items:center;border:1px solid var(--border);}
.qty-btn{width:30px;height:30px;background:none;border:none;cursor:pointer;font-size:1rem;display:flex;align-items:center;justify-content:center;transition:background .2s;}
.qty-btn:hover{background:var(--banner);}
.qty-val{width:30px;text-align:center;font-size:.85rem;font-weight:500;}
.line-total{font-size:.9rem;font-weight:500;}
.cart-back{margin-top:1.25rem;font-size:.7rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);display:inline-block;}
.cart-back:hover{color:var(--brown);}
/* Summary sidebar */
.cart-summary{background:var(--banner);padding:2rem;}
.cart-summary h2{font-family:var(--serif);font-size:1.4rem;margin-bottom:1.5rem;}
.summary-lines{display:flex;flex-direction:column;gap:.75rem;font-size:.85rem;margin-bottom:1.25rem;}
.summary-line{display:flex;justify-content:space-between;}
.summary-line span:first-child{color:var(--muted);}
.summary-divider{border:none;border-top:1px solid #D0CDC5;margin:.75rem 0;}
.summary-total{display:flex;justify-content:space-between;font-weight:600;font-size:.95rem;}
.summary-total span:last-child{font-family:var(--serif);font-size:1.2rem;}
.voucher-group{margin-bottom:1.5rem;}
.voucher-group .form-label{margin-bottom:.35rem;}
.checkout-error{font-size:.75rem;color:#c53030;margin-bottom:.75rem;display:none;}
/* Empty state */
.cart-empty{text-align:center;padding:4rem 0;}
.cart-empty h2{font-family:var(--serif);font-size:2rem;margin-bottom:.75rem;}
.cart-empty p{color:var(--muted);font-size:.9rem;margin-bottom:2rem;}
@media(max-width:900px){.cart-layout{grid-template-columns:1fr;}}
@media(max-width:480px){.cart-item-img{width:70px;height:70px;}}
</style>
@endsection

@section('content')
<div class="cart-wrap fade-in">
  <span class="subtitle">Belanja</span>
  <h1>Keranjang Anda</h1>
  <div id="cart-content">
    <!-- skeleton -->
    <div style="display:flex;flex-direction:column;gap:1.5rem;">
      <div style="height:90px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
      <div style="height:90px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
let cartItems = [];

document.addEventListener('DOMContentLoaded', async () => {
  if (!Auth.getUser()) { window.location.href = '/login'; return; }
  if (!Auth.isCustomer()) { window.location.href = '/'; return; }
  await loadCart();
});

async function loadCart() {
  try {
    cartItems = await api('GET', '/cartItem');
    renderCart();
  } catch(e) {
    document.getElementById('cart-content').innerHTML =
      `<p style="color:var(--muted)">Gagal memuat keranjang.</p>`;
  }
}

function renderCart() {
  const wrap = document.getElementById('cart-content');
  if (cartItems.length === 0) {
    wrap.innerHTML = `<div class="cart-empty">
      <h2>Keranjang Anda kosong.</h2>
      <p>Temukan produk yang menarik untuk ditinggali di rumah Anda.</p>
      <a href="/products" class="btn">Lihat Produk &rarr;</a>
    </div>`;
    return;
  }

  const subtotal = cartItems.reduce((s,i) => s + i.qty * (i.product?.price ?? 0), 0);

  wrap.innerHTML = `
    <div class="cart-layout">
      <div>
        <div class="cart-items" id="cart-items-list">
          ${cartItems.map(item => renderCartItem(item)).join('')}
        </div>
        <a href="/products" class="cart-back">&larr; Lanjut Belanja</a>
      </div>
      <div class="cart-summary">
        <h2>Ringkasan Pesanan</h2>
        <div class="summary-lines" id="summary-lines">
          ${cartItems.map(i => `
            <div class="summary-line">
              <span>${i.product?.name ?? '—'} &times;${i.qty}</span>
              <span>${rupiah(i.qty * (i.product?.price ?? 0))}</span>
            </div>`).join('')}
        </div>
        <hr class="summary-divider">
        <div class="voucher-group">
          <label class="form-label">Kode Voucher</label>
          <input type="text" class="form-input" id="voucher-input" placeholder="Masukkan kode...">
        </div>
        <hr class="summary-divider">
        <div class="summary-total">
          <span>Subtotal</span>
          <span id="subtotal-display">${rupiah(subtotal)}</span>
        </div>
        <p class="checkout-error" id="checkout-error"></p>
        <button class="btn btn-full" style="margin-top:1.25rem" id="checkout-btn" onclick="handleCheckout()">
          Checkout &rarr;
        </button>
        <p style="font-size:.65rem;color:var(--muted);text-align:center;margin-top:.75rem;line-height:1.6">
          Dengan checkout, Anda menyetujui syarat dan ketentuan yang berlaku.
        </p>
      </div>
    </div>`;
}

function renderCartItem(item) {
  return `
    <div class="cart-item" id="cart-item-${item.id}">
      <img class="cart-item-img" src="${prodImg(item.product_id)}" alt="${item.product?.name ?? ''}"
        onclick="window.location='/products/${item.product_id}'" loading="lazy">
      <div class="cart-item-body">
        <div class="cart-item-top">
          <div>
            <span class="cart-item-cat">${item.product?.category?.name ?? ''}</span>
            <span class="cart-item-name" onclick="window.location='/products/${item.product_id}'">${item.product?.name ?? '—'}</span>
          </div>
          <button class="remove-btn" onclick="removeItem(${item.id})" aria-label="Hapus">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
          </button>
        </div>
        <div class="cart-item-bottom">
          <div class="qty-ctrl">
            <button class="qty-btn" onclick="changeQty(${item.id}, ${item.qty - 1})">−</button>
            <span class="qty-val" id="qty-${item.id}">${item.qty}</span>
            <button class="qty-btn" onclick="changeQty(${item.id}, ${item.qty + 1})">+</button>
          </div>
          <span class="line-total" id="line-${item.id}">${rupiah(item.qty * (item.product?.price ?? 0))}</span>
        </div>
      </div>
    </div>`;
}

async function changeQty(id, newQty) {
  if (newQty < 1) { await removeItem(id); return; }
  try {
    await api('PUT', '/cartItem/' + id, { qty: newQty });
    const item = cartItems.find(i => i.id === id);
    if (item) { item.qty = newQty; }
    document.getElementById('qty-' + id).textContent = newQty;
    const price = cartItems.find(i => i.id === id)?.product?.price ?? 0;
    document.getElementById('line-' + id).textContent = rupiah(newQty * price);
    updateSubtotal();
    await refreshCartCount();
  } catch(e) { showToast('Gagal update qty.', 'error'); }
}

async function removeItem(id) {
  try {
    await api('DELETE', '/cartItem/' + id);
    cartItems = cartItems.filter(i => i.id !== id);
    if (cartItems.length === 0) { renderCart(); }
    else {
      const el = document.getElementById('cart-item-' + id);
      if (el) el.remove();
      updateSubtotal();
    }
    await refreshCartCount();
  } catch(e) { showToast('Gagal menghapus item.', 'error'); }
}

function updateSubtotal() {
  const sub = cartItems.reduce((s,i) => s + i.qty * (i.product?.price ?? 0), 0);
  const el = document.getElementById('subtotal-display');
  if (el) el.textContent = rupiah(sub);
}

async function handleCheckout() {
  const btn = document.getElementById('checkout-btn');
  const errEl = document.getElementById('checkout-error');
  errEl.style.display = 'none';
  btn.disabled = true; btn.textContent = 'Memproses...';
  try {
    const voucher = document.getElementById('voucher-input')?.value.trim();
    const body = voucher ? { voucher_code: voucher } : {};
    const order = await api('POST', '/orders', body);
    localStorage.removeItem('rs_cart_count');
    await refreshCartCount();
    showToast('Pesanan berhasil dibuat!', 'success');
    setTimeout(() => { window.location.href = '/orders/' + order.id; }, 600);
  } catch(e) {
    btn.disabled = false; btn.textContent = 'Checkout →';
    errEl.textContent = e.data?.errors
      ? Object.values(e.data.errors).flat()[0]
      : (e.data?.message || 'Gagal checkout.');
    errEl.style.display = 'block';
  }
}
</script>
@endsection
