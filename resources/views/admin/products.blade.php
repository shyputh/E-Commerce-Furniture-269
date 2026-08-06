@extends('_layout')
@section('title', 'Produk — Admin RUMASELI')
@section('head')
<style>
.admin-wrap{display:flex;min-height:calc(100vh - 80px);}
.admin-sidebar{width:220px;background:var(--footer);flex-shrink:0;display:flex;flex-direction:column;}
.admin-sidebar-top{padding:1.5rem 1.25rem;border-bottom:1px solid rgba(255,255,255,.08);}
.admin-sidebar-top p:first-child{font-size:.6rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--brown);margin-bottom:.25rem;}
.admin-sidebar-top p:last-child{font-size:.85rem;font-weight:500;color:#F8F7F3;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.admin-nav{flex:1;padding:.75rem 0;}
.admin-nav a{display:flex;align-items:center;gap:.75rem;padding:.75rem 1.25rem;font-size:.75rem;font-weight:600;letter-spacing:.06em;text-transform:uppercase;color:#A0A0A0;transition:all .2s;}
.admin-nav a:hover,.admin-nav a.active{color:var(--brown);background:rgba(255,255,255,.05);}
.admin-logout{padding:1.25rem;border-top:1px solid rgba(255,255,255,.08);}
.admin-logout button{background:none;border:none;cursor:pointer;font-size:.7rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:#A0A0A0;display:flex;align-items:center;gap:.5rem;transition:color .2s;}
.admin-logout button:hover{color:#fc8181;}
.admin-main{flex:1;padding:2.5rem;overflow-x:auto;}
.admin-page-header{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:2rem;flex-wrap:wrap;gap:1rem;}
.admin-page-header-left .subtitle{margin-bottom:.35rem;}
.admin-page-header-left h1{font-size:2.5rem;}
.admin-table-wrap{background:#fff;border:1px solid var(--border);overflow-x:auto;}
table.admin-table{width:100%;border-collapse:collapse;font-size:.85rem;}
table.admin-table th{text-align:left;font-size:.6rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);padding:.75rem 1.25rem;background:var(--bg);}
table.admin-table td{padding:.85rem 1.25rem;border-top:1px solid var(--border);vertical-align:middle;}
table.admin-table tr:hover td{background:var(--bg);}
.action-link{font-size:.65rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--brown);cursor:pointer;background:none;border:none;}
.action-link.danger{color:#e53e3e;}
.stock-low{color:#e53e3e;font-weight:600;}
/* Modal */
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:300;align-items:center;justify-content:center;padding:1rem;}
.modal-overlay.open{display:flex;}
.modal{background:var(--bg);width:100%;max-width:480px;max-height:90vh;overflow-y:auto;padding:2rem;}
.modal-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.75rem;}
.modal-header h2{font-family:var(--serif);font-size:1.75rem;}
.modal-close{background:none;border:none;cursor:pointer;color:var(--muted);font-size:1.4rem;line-height:1;padding:.2rem;}
.modal-close:hover{color:var(--text);}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
.modal-footer{display:flex;gap:.75rem;margin-top:.75rem;}
.modal-footer .btn{flex:1;}
@media(max-width:768px){.admin-sidebar{display:none;}.admin-main{padding:1.25rem;}.form-row{grid-template-columns:1fr;}}
</style>
@endsection

@section('content')
<div class="admin-wrap">
  @include('admin._sidebar')
  <div class="admin-main">
    <div class="admin-page-header">
      <div class="admin-page-header-left">
        <span class="subtitle">Manajemen</span>
        <h1>Produk</h1>
      </div>
      <button class="btn btn-sm" onclick="openModal()">+ Tambah Produk</button>
    </div>

    <div class="admin-table-wrap" id="products-table">
      <div style="padding:1.5rem;display:flex;flex-direction:column;gap:.75rem">
        <div style="height:42px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
        <div style="height:42px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
        <div style="height:42px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal-overlay" id="modal-overlay">
  <div class="modal">
    <div class="modal-header">
      <h2 id="modal-title">Tambah Produk</h2>
      <button class="modal-close" onclick="closeModal()">&times;</button>
    </div>
    <div class="form-group">
      <label class="form-label">Kategori</label>
      <select class="form-input" id="f-category_id" style="-webkit-appearance:none">
        <option value="">Pilih kategori</option>
      </select>
      <span class="form-error" id="err-category_id"></span>
    </div>
    <div class="form-group">
      <label class="form-label">Nama Produk</label>
      <input type="text" class="form-input" id="f-name" placeholder="Kursi Rattan Sora">
      <span class="form-error" id="err-name"></span>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Harga (Rp)</label>
        <input type="number" class="form-input" id="f-price" placeholder="2480000">
        <span class="form-error" id="err-price"></span>
      </div>
      <div class="form-group">
        <label class="form-label">Stok</label>
        <input type="number" class="form-input" id="f-stock" placeholder="10">
        <span class="form-error" id="err-stock"></span>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label class="form-label">Material</label>
        <input type="text" class="form-input" id="f-material" placeholder="Rotan, Kayu Jati...">
        <span class="form-error" id="err-material"></span>
      </div>
      <div class="form-group">
        <label class="form-label">Berat (kg)</label>
        <input type="number" class="form-input" id="f-weight" placeholder="5" step="0.1">
        <span class="form-error" id="err-weight"></span>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn" id="modal-save-btn" onclick="saveProduct()">Tambah</button>
      <button class="btn btn-outline" onclick="closeModal()">Batal</button>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
let allCategories = [];
let allProducts = [];
let editId = null;

document.addEventListener('DOMContentLoaded', async () => {
  if (!Auth.getUser() || !Auth.isAdmin()) { window.location.href = '/login'; return; }
  if (document.getElementById('sidebar-name')) {
    document.getElementById('sidebar-name').textContent = Auth.getUser()?.name ?? '—';
  }
  await loadAll();
});

async function loadAll() {
  try {
    const [products, cats] = await Promise.all([api('GET','/products'), api('GET','/categories')]);
    allCategories = cats;
    allProducts = products;

    // Fill select
    const sel = document.getElementById('f-category_id');
    sel.innerHTML = '<option value="">Pilih kategori</option>' +
      cats.map(c => `<option value="${c.id}">${c.name}</option>`).join('');

    renderTable(products);
  } catch(e) {
    document.getElementById('products-table').innerHTML = `<p style="padding:2rem;color:var(--muted)">Gagal memuat produk.</p>`;
  }
}

function renderTable(products) {
  if (products.length === 0) {
    document.getElementById('products-table').innerHTML = `<p style="padding:2rem;font-size:.85rem;color:var(--muted)">Belum ada produk.</p>`;
    return;
  }
  document.getElementById('products-table').innerHTML = `
    <table class="admin-table">
      <thead><tr><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Material</th><th></th></tr></thead>
      <tbody>
        ${products.map(p => `<tr>
          <td style="font-weight:500">${p.name}</td>
          <td style="color:var(--muted)">${p.category?.name ?? '—'}</td>
          <td>${rupiah(p.price)}</td>
          <td class="${p.stock <= 3 ? 'stock-low' : ''}">${p.stock}</td>
          <td style="color:var(--muted)">${p.material || '—'}</td>
          <td>
            <div style="display:flex;gap:1rem">
              <button class="action-link" onclick="openEditModal(${p.id})">Edit</button>
              <button class="action-link danger" onclick="deleteProduct(${p.id})">Hapus</button>
            </div>
          </td>
        </tr>`).join('')}
      </tbody>
    </table>`;
}

function openEditModal(id) {
  const product = allProducts.find(p => p.id === id);
  openModal(product);
}

function openModal(product = null) {
  editId = product?.id ?? null;
  
  ['category_id','name','price','stock','material','weight'].forEach(f => {
    document.getElementById('err-'+f).textContent = '';
    document.getElementById('f-'+f).value = product?.[f] ?? '';
  });

  const btn = document.getElementById('modal-save-btn');
  btn.disabled = false; // Memastikan tombol tidak terkunci dalam status disabled
  btn.textContent = editId ? 'Simpan' : 'Tambah';

  document.getElementById('modal-title').textContent = editId ? 'Edit Produk' : 'Tambah Produk';
  document.getElementById('modal-overlay').classList.add('open');
}

function closeModal() { 
  document.getElementById('modal-overlay').classList.remove('open'); 
}

async function saveProduct() {
  ['category_id','name','price','stock','material','weight'].forEach(f => document.getElementById('err-'+f).textContent = '');
  
  const btn = document.getElementById('modal-save-btn');
  btn.disabled = true; 
  btn.textContent = 'Menyimpan...';

  const catVal = document.getElementById('f-category_id').value;
  const priceVal = document.getElementById('f-price').value;
  const stockVal = document.getElementById('f-stock').value;
  const weightVal = document.getElementById('f-weight').value;

  const body = {
    category_id: catVal ? Number(catVal) : null,
    name: document.getElementById('f-name').value,
    price: priceVal !== '' ? Number(priceVal) : null,
    stock: stockVal !== '' ? Number(stockVal) : null,
    material: document.getElementById('f-material').value,
    weight: weightVal !== '' ? Number(weightVal) : null,
  };

  try {
    if (editId) {
      await api('PUT', '/products/' + editId, body);
    } else {
      await api('POST', '/products', body);
    }
    closeModal();
    showToast(editId ? 'Produk diperbarui.' : 'Produk ditambahkan.', 'success');
    await loadAll();
  } catch(e) {
    const errs = e.data?.errors;
    if (errs) {
      Object.entries(errs).forEach(([k, v]) => { 
        const el = document.getElementById('err-' + k); 
        if (el) el.textContent = v[0]; 
      });
    } else {
      showToast(e.data?.message || 'Gagal menyimpan.', 'error');
    }
  } finally {
    // Selalu reset tombol ke status aktif dan teks yang sesuai setelah proses selesai
    btn.disabled = false; 
    btn.textContent = editId ? 'Simpan' : 'Tambah';
  }
}

async function deleteProduct(id) {
  if (!confirm('Hapus produk ini?')) return;
  try {
    await api('DELETE', '/products/' + id);
    showToast('Produk dihapus.', 'success');
    await loadAll();
  } catch(e) { 
    showToast(e.data?.message || 'Gagal menghapus.', 'error'); 
  }
}
</script>
@endsection