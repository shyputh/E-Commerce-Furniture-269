@extends('_layout')
@section('title', 'Kategori — Admin RUMASELI')

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
table.admin-table td{padding:.85rem 1.25rem;border-top:1px solid var(--border);}
table.admin-table tr:hover td{background:var(--bg);}
.action-link{font-size:.65rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--brown);cursor:pointer;background:none;border:none;}
.action-link.danger{color:#e53e3e;}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:300;align-items:center;justify-content:center;padding:1rem;}
.modal-overlay.open{display:flex;}
.modal{background:var(--bg);width:100%;max-width:380px;padding:2rem;}
.modal-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.75rem;}
.modal-header h2{font-family:var(--serif);font-size:1.75rem;}
.modal-close{background:none;border:none;cursor:pointer;color:var(--muted);font-size:1.4rem;line-height:1;padding:.2rem;}
.modal-close:hover{color:var(--text);}
.modal-footer{display:flex;gap:.75rem;margin-top:.75rem;}
.modal-footer .btn{flex:1;}
@media(max-width:768px){.admin-sidebar{display:none;}.admin-main{padding:1.25rem;}}
</style>
@endsection

@section('content')
<div class="admin-wrap">
  @include('admin._sidebar')
  <div class="admin-main">
    <div class="admin-page-header">
      <div class="admin-page-header-left">
        <span class="subtitle">Manajemen</span>
        <h1>Kategori</h1>
      </div>
      <button class="btn btn-sm" onclick="openModal()">+ Tambah Kategori</button>
    </div>

    <div class="admin-table-wrap" id="cats-table">
      <div style="padding:1.5rem;display:flex;flex-direction:column;gap:.75rem">
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
      <h2 id="modal-title">Tambah Kategori</h2>
      <button class="modal-close" onclick="closeModal()">&times;</button>
    </div>
    <div class="form-group">
      <label class="form-label">Nama Kategori</label>
      <input type="text" class="form-input" id="f-name" placeholder="Ruang Hidup" autofocus>
      <span class="form-error" id="err-name"></span>
    </div>
    <div class="modal-footer">
      <button class="btn" id="modal-save-btn" onclick="saveCategory()">Tambah</button>
      <button class="btn btn-outline" onclick="closeModal()">Batal</button>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
let editId = null;

document.addEventListener('DOMContentLoaded', async () => {
  if (!Auth.getUser() || !Auth.isAdmin()) { window.location.href = '/login'; return; }
  if (document.getElementById('sidebar-name')) {
    document.getElementById('sidebar-name').textContent = Auth.getUser()?.name ?? '—';
  }
  await loadCategories();
});

async function loadCategories() {
  try {
    const cats = await api('GET', '/categories');
    if (cats.length === 0) {
      document.getElementById('cats-table').innerHTML = `<p style="padding:2rem;font-size:.85rem;color:var(--muted)">Belum ada kategori.</p>`;
      return;
    }
    document.getElementById('cats-table').innerHTML = `
      <table class="admin-table">
        <thead><tr><th>ID</th><th>Nama</th><th>Dibuat</th><th></th></tr></thead>
        <tbody>
          ${cats.map(c => `<tr>
            <td style="font-family:monospace;font-size:.75rem;color:var(--muted)">#${c.id}</td>
            <td style="font-weight:500">${c.name}</td>
            <td style="color:var(--muted);font-size:.8rem">${c.created_at ? new Date(c.created_at).toLocaleDateString('id-ID',{day:'numeric',month:'short',year:'numeric'}) : '—'}</td>
            <td>
              <div style="display:flex;gap:1rem">
                <button class="action-link" onclick="openModal({id:${c.id},name:'${c.name.replace(/'/g,"\\'")}' })">Edit</button>
                <button class="action-link danger" onclick="deleteCategory(${c.id})">Hapus</button>
              </div>
            </td>
          </tr>`).join('')}
        </tbody>
      </table>`;
  } catch(e) {
    document.getElementById('cats-table').innerHTML = `<p style="padding:2rem;color:var(--muted)">Gagal memuat kategori.</p>`;
  }
}

function openModal(cat = null) {
  editId = cat?.id ?? null;
  document.getElementById('f-name').value = cat?.name ?? '';
  document.getElementById('err-name').textContent = '';
  document.getElementById('modal-title').textContent = editId ? 'Edit Kategori' : 'Tambah Kategori';
  
  const btn = document.getElementById('modal-save-btn');
  btn.disabled = false; // Reset tombol agar tidak terkunci dalam status disabled
  btn.textContent = editId ? 'Simpan' : 'Tambah';

  document.getElementById('modal-overlay').classList.add('open');
  setTimeout(() => document.getElementById('f-name').focus(), 100);
}

function closeModal() { 
  document.getElementById('modal-overlay').classList.remove('open'); 
}

async function saveCategory() {
  document.getElementById('err-name').textContent = '';
  const name = document.getElementById('f-name').value.trim();
  if (!name) { 
    document.getElementById('err-name').textContent = 'Nama wajib diisi.'; 
    return; 
  }

  const btn = document.getElementById('modal-save-btn');
  btn.disabled = true; 
  btn.textContent = 'Menyimpan...';

  try {
    if (editId) {
      await api('PUT', '/categories/' + editId, { name });
    } else {
      await api('POST', '/categories', { name });
    }
    closeModal();
    showToast(editId ? 'Kategori diperbarui.' : 'Kategori ditambahkan.', 'success');
    await loadCategories();
  } catch(e) {
    const msg = e.data?.errors?.name?.[0] || e.data?.message || 'Gagal menyimpan.';
    document.getElementById('err-name').textContent = msg;
  } finally {
    // Memastikan tombol aktif kembali setelah proses selesai/gagal
    btn.disabled = false; 
    btn.textContent = editId ? 'Simpan' : 'Tambah';
  }
}

document.addEventListener('keydown', e => { 
  if (e.key === 'Enter' && document.getElementById('modal-overlay').classList.contains('open')) {
    saveCategory(); 
  }
});

async function deleteCategory(id) {
  if (!confirm('Hapus kategori ini? Produk yang terhubung mungkin terpengaruh.')) return;
  try {
    await api('DELETE', '/categories/' + id);
    showToast('Kategori dihapus.', 'success');
    await loadCategories();
  } catch(e) { 
    showToast(e.data?.message || 'Gagal menghapus.', 'error'); 
  }
}
</script>
@endsection