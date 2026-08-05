@extends('_layout')
@section('title', 'Detail Produk — RUMASELI')

@section('head')
<style>
.breadcrumb{padding:1.5rem 5% .5rem;font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);display:flex;gap:.5rem;align-items:center;flex-wrap:wrap;}
.breadcrumb a{color:var(--muted);transition:color .2s;}.breadcrumb a:hover{color:var(--brown);}
.product-detail{display:grid;grid-template-columns:1fr 1fr;gap:4rem;padding:2rem 5% 5rem;align-items:start;}
.detail-img{position:relative;overflow:hidden;background:var(--banner);}
.detail-img img{width:100%;aspect-ratio:1/1;object-fit:cover;display:block;}
.out-badge{position:absolute;inset:0;background:rgba(0,0,0,.4);display:flex;align-items:center;justify-content:center;font-size:.85rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#fff;}
.detail-info{padding-top:.5rem;}
.detail-cat{font-size:.65rem;font-weight:600;color:var(--brown);letter-spacing:.12em;text-transform:uppercase;display:block;margin-bottom:.75rem;}
.detail-info h1{font-size:2.8rem;line-height:1.15;margin-bottom:1rem;}
.detail-price{font-size:1.6rem;font-weight:500;margin-bottom:1.5rem;}
.detail-specs{border-top:1px solid var(--border);padding-top:1.5rem;margin-bottom:1.5rem;display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
.spec-item span:first-child{font-size:.6rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);display:block;margin-bottom:.25rem;}
.spec-item span:last-child{font-size:.9rem;}
.stock-ok{color:#276749;}.stock-out{color:#c53030;}
.qty-row{display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem;}
.qty-label{font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);}
.qty-ctrl{display:flex;align-items:center;border:1px solid var(--border);}
.qty-btn{width:36px;height:36px;background:none;border:none;cursor:pointer;font-size:1.1rem;display:flex;align-items:center;justify-content:center;transition:background .2s;}
.qty-btn:hover{background:var(--banner);}
.qty-val{width:36px;text-align:center;font-size:.9rem;font-weight:500;}
.add-to-cart-btn{margin-bottom:1rem;}
.detail-desc{border-top:1px solid var(--border);padding-top:1.5rem;font-size:.9rem;color:var(--muted);line-height:1.8;}
@media(max-width:900px){.product-detail{grid-template-columns:1fr;gap:2rem;}}
</style>
@endsection

@section('content')
<div class="breadcrumb fade-in">
  <a href="/">Beranda</a><span>/</span>
  <a href="/products">Produk</a><span>/</span>
  <span id="bc-name">Memuat...</span>
</div>

<div class="product-detail" id="product-detail">
  <!-- JS rendered -->
  <div class="detail-img"><div style="aspect-ratio:1/1;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div></div>
  <div class="detail-info">
    <div style="height:1.5rem;background:var(--banner);width:30%;margin-bottom:1rem;animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
    <div style="height:3rem;background:var(--banner);width:80%;margin-bottom:1.5rem;animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
    <div style="height:1.5rem;background:var(--banner);width:40%;animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
  </div>
</div>
@endsection

@section('scripts')
<script>
const PRODUCT_ID = {{ $id }};
let currentProduct = null;
let qty = 1;

async function loadProduct() {
  try {
    const p = await api('GET', '/products/' + PRODUCT_ID);
    currentProduct = p;
    document.title = p.name + ' — RUMASELI';
    document.getElementById('bc-name').textContent = p.name;
    const outOfStock = p.stock === 0;
    const isCustomer = Auth.isCustomer();
    const user = Auth.getUser();

    document.getElementById('product-detail').innerHTML = `
      <div class="detail-img fade-in">
        <img src="${prodImg(p.id)}" alt="${p.name}" loading="lazy">
        ${outOfStock ? `<div class="out-badge">Stok Habis</div>` : ''}
      </div>
      <div class="detail-info fade-in">
        <span class="detail-cat">${p.category?.name ?? 'PRODUK'}</span>
        <h1>${p.name}</h1>
        <p class="detail-price">${rupiah(p.price)}</p>
        <div class="detail-specs">
          <div class="spec-item"><span>Material</span><span>${p.material || '—'}</span></div>
          <div class="spec-item"><span>Berat</span><span>${p.weight ? p.weight + ' kg' : '—'}</span></div>
          <div class="spec-item"><span>Ketersediaan</span><span class="${outOfStock ? 'stock-out' : 'stock-ok'}">${outOfStock ? 'Habis' : p.stock + ' unit'}</span></div>
          <div class="spec-item"><span>Kategori</span><span>${p.category?.name ?? '—'}</span></div>
        </div>
        ${!outOfStock ? `
        <div class="qty-row">
          <span class="qty-label">Jumlah</span>
          <div class="qty-ctrl">
            <button class="qty-btn" id="qty-minus">−</button>
            <span class="qty-val" id="qty-display">1</span>
            <button class="qty-btn" id="qty-plus">+</button>
          </div>
        </div>
        <button class="btn btn-full add-to-cart-btn" id="add-btn" onclick="handleAddToCart()">
          ${user ? 'Tambah ke Keranjang' : 'Masuk untuk Membeli'}
        </button>
        <a href="/cart" id="go-cart" style="display:none;text-align:center;font-size:.7rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--brown);">
          Lihat Keranjang →
        </a>` : ''}
        <div class="detail-desc">
          Dibuat dengan tangan oleh pengrajin lokal. Setiap produk memiliki karakter unik yang tidak dapat direplikasi secara massal — menjadikannya benda yang benar-benar hidup di dalam ruang Anda.
        </div>
      </div>`;

    // Qty stepper
    if (!outOfStock) {
      document.getElementById('qty-minus').addEventListener('click', () => {
        if (qty > 1) { qty--; document.getElementById('qty-display').textContent = qty; }
      });
      document.getElementById('qty-plus').addEventListener('click', () => {
        if (qty < p.stock) { qty++; document.getElementById('qty-display').textContent = qty; }
      });
    }
    initFadeIn();
  } catch(e) {
    document.getElementById('product-detail').innerHTML =
      `<div style="grid-column:1/-1;text-align:center;padding:4rem"><p style="color:var(--muted)">Produk tidak ditemukan.</p><a href="/products" class="btn" style="margin-top:1rem;display:inline-block">Kembali</a></div>`;
  }
}

async function handleAddToCart() {
  if (!Auth.getUser()) { window.location.href = '/login'; return; }
  if (!Auth.isCustomer()) { showToast('Fitur ini hanya untuk customer.', 'error'); return; }
  const btn = document.getElementById('add-btn');
  btn.disabled = true; btn.textContent = 'Menambahkan...';
  try {
    await api('POST', '/cartItem', { product_id: PRODUCT_ID, qty });
    await refreshCartCount();
    btn.textContent = '✓ Ditambahkan ke Keranjang';
    document.getElementById('go-cart').style.display = 'block';
    showToast('Berhasil ditambahkan!', 'success');
    setTimeout(() => { btn.disabled = false; btn.textContent = 'Tambah ke Keranjang'; }, 3000);
  } catch(e) {
    showToast(e.data?.message || e.message || 'Gagal.', 'error');
    btn.disabled = false; btn.textContent = 'Tambah ke Keranjang';
  }
}

document.addEventListener('DOMContentLoaded', loadProduct);
</script>
@endsection
