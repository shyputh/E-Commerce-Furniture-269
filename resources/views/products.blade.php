@extends('_layout')
@section('title', 'Semua Produk — RUMASELI')

@section('head')
<style>
.page-header{padding:3rem 5% 0;}
.page-header .subtitle{margin-bottom:.5rem;}
.page-header h1{font-size:3rem;margin-bottom:2rem;}
.filter-bar{padding:1.5rem 5%;display:flex;gap:1rem;align-items:center;flex-wrap:wrap;border-bottom:1px solid var(--border);}
.search-wrap{flex:1;min-width:180px;position:relative;}
.search-wrap svg{position:absolute;left:0;top:50%;transform:translateY(-50%);pointer-events:none;color:var(--muted);}
.search-input{width:100%;background:transparent;border:none;border-bottom:1px solid rgba(42,42,42,.3);padding:.6rem 0 .6rem 1.6rem;font-size:.85rem;color:var(--text);outline:none;transition:border-color .2s;}
.search-input:focus{border-bottom-color:var(--brown);}
.filter-tags{display:flex;gap:.5rem;flex-wrap:wrap;}
.filter-btn{background:transparent;border:1px solid rgba(42,42,42,.25);padding:.4rem .9rem;font-size:.65rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;cursor:pointer;color:var(--muted);transition:all .2s;}
.filter-btn.active{background:var(--brown);border-color:var(--brown);color:#fff;}
.filter-btn:hover:not(.active){border-color:var(--brown);color:var(--brown);}
.products-section{padding:2.5rem 5%;}
.result-count{font-size:.75rem;color:var(--muted);letter-spacing:.08em;text-transform:uppercase;margin-bottom:1.5rem;}
.product-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1.5rem;}
.prod-card{cursor:pointer;}
.prod-card-img{position:relative;overflow:hidden;background:var(--banner);}
.prod-card-img img{width:100%;aspect-ratio:1/1;object-fit:cover;transition:transform .5s;display:block;}
.prod-card:hover .prod-card-img img{transform:scale(1.05);}
.out-of-stock-overlay{position:absolute;inset:0;background:rgba(0,0,0,.4);display:flex;align-items:center;justify-content:center;}
.out-of-stock-overlay span{color:#fff;font-size:.7rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;}
.quick-add{position:absolute;bottom:0;left:0;right:0;background:rgba(42,42,42,.9);color:#fff;font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;padding:.75rem;border:none;cursor:pointer;transform:translateY(100%);transition:transform .3s;width:100%;}
.prod-card:hover .quick-add{transform:translateY(0);}
.prod-card-info{padding:.75rem 0;}
.prod-cat{font-size:.65rem;font-weight:600;color:var(--brown);letter-spacing:.1em;text-transform:uppercase;display:block;margin-bottom:.3rem;}
.prod-card-info h3{font-family:var(--sans);font-size:.9rem;font-weight:500;margin-bottom:.2rem;transition:color .2s;}
.prod-card:hover .prod-card-info h3{color:var(--brown);}
.prod-card-info p{font-size:.85rem;color:var(--muted);}
.empty-state{grid-column:1/-1;padding:4rem;text-align:center;}
.empty-state h3{font-family:var(--serif);font-size:1.8rem;margin-bottom:.75rem;}
.empty-state p{color:var(--muted);font-size:.9rem;}
@media(max-width:992px){.product-grid{grid-template-columns:repeat(3,1fr);}}
@media(max-width:768px){.product-grid{grid-template-columns:repeat(2,1fr);}.filter-bar{flex-direction:column;align-items:stretch;}.search-wrap{min-width:100%;}}
@media(max-width:480px){.product-grid{grid-template-columns:1fr;}}
</style>
@endsection

@section('content')
<div class="page-header fade-in">
  <span class="subtitle">Katalog</span>
  <h1>Semua Produk</h1>
</div>

<div class="filter-bar fade-in">
  <div class="search-wrap">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
    <input type="search" class="search-input" id="search-input" placeholder="Cari produk...">
  </div>
  <div class="filter-tags" id="filter-tags">
    <button class="filter-btn active" data-id="">Semua</button>
  </div>
</div>

<div class="products-section">
  <p class="result-count" id="result-count">&nbsp;</p>
  <div class="product-grid" id="products-grid">
    <!-- skeletons -->
    <div><div style="background:var(--banner);aspect-ratio:1/1;animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div></div>
    <div><div style="background:var(--banner);aspect-ratio:1/1;animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div></div>
    <div><div style="background:var(--banner);aspect-ratio:1/1;animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div></div>
    <div><div style="background:var(--banner);aspect-ratio:1/1;animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div></div>
  </div>
</div>
@endsection

@section('scripts')
<script>
let allProducts = [];
let selectedCat = '';

// Read ?category= from URL
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('category')) selectedCat = urlParams.get('category');

function renderProducts(list) {
  const grid = document.getElementById('products-grid');
  const count = document.getElementById('result-count');
  count.textContent = list.length + ' Produk';

  if (list.length === 0) {
    grid.innerHTML = `<div class="empty-state"><h3>Tidak ada produk.</h3><p>Coba ubah filter atau kata kunci pencarian.</p></div>`;
    return;
  }

  const isCustomer = Auth.isCustomer();
  grid.innerHTML = list.map(p => {
    const outOfStock = p.stock === 0;
    return `
    <div class="prod-card" onclick="window.location='/products/${p.id}'">
      <div class="prod-card-img">
        <img src="${prodImg(p.id)}" alt="${p.name}" loading="lazy">
        ${outOfStock ? `<div class="out-of-stock-overlay"><span>Habis</span></div>` : ''}
        ${isCustomer && !outOfStock ? `<button class="quick-add" onclick="event.stopPropagation();quickAdd(${p.id})">Tambah ke Keranjang</button>` : ''}
      </div>
      <div class="prod-card-info">
        <span class="prod-cat">${p.category?.name ?? 'PRODUK'}</span>
        <h3>${p.name}</h3>
        <p>${rupiah(p.price)}</p>
      </div>
    </div>`;
  }).join('');
}

function applyFilters() {
  const q = document.getElementById('search-input').value.trim().toLowerCase();
  const filtered = allProducts.filter(p => {
    const matchCat = !selectedCat || String(p.category_id) === String(selectedCat);
    const matchQ   = !q || p.name.toLowerCase().includes(q) || (p.category?.name||'').toLowerCase().includes(q);
    return matchCat && matchQ;
  });
  renderProducts(filtered);
}

async function quickAdd(productId) {
  if (!Auth.isCustomer()) { window.location.href = '/login'; return; }
  try {
    await api('POST', '/cartItem', { product_id: productId, qty: 1 });
    await refreshCartCount();
    showToast('Ditambahkan ke keranjang!', 'success');
  } catch(e) {
    showToast(e.message || 'Gagal menambahkan.', 'error');
  }
}

async function loadProducts() {
  try {
    const [products, cats] = await Promise.all([
      api('GET', '/products'),
      api('GET', '/categories'),
    ]);
    allProducts = products;

    // Build category filter buttons
    const tags = document.getElementById('filter-tags');
    tags.innerHTML = `<button class="filter-btn ${!selectedCat ? 'active' : ''}" data-id="">Semua</button>` +
      cats.map(c => `<button class="filter-btn ${String(c.id) === String(selectedCat) ? 'active' : ''}" data-id="${c.id}">${c.name}</button>`).join('');

    tags.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        selectedCat = btn.dataset.id;
        tags.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        applyFilters();
      });
    });

    applyFilters();
  } catch(e) {
    document.getElementById('products-grid').innerHTML =
      `<div class="empty-state"><h3>Gagal memuat produk.</h3><p>${e.message}</p></div>`;
  }
}

document.getElementById('search-input').addEventListener('input', applyFilters);
document.addEventListener('DOMContentLoaded', loadProducts);
</script>
@endsection
