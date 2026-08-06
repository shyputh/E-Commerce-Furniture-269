@extends('_layout')
@section('title', 'Voucher — Admin RUMASELI')
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
.voucher-code{font-family:monospace;font-size:.85rem;font-weight:700;letter-spacing:.12em;color:var(--brown);}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:300;align-items:center;justify-content:center;padding:1rem;}
.modal-overlay.open{display:flex;}
.modal{background:var(--bg);width:100%;max-width:380px;padding:2rem;}
.modal-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.75rem;}
.modal-header h2{font-family:var(--serif);font-size:1.75rem;}
.modal-close{background:none;border:none;cursor:pointer;color:var(--muted);font-size:1.4rem;line-height:1;padding:.2rem;}
.modal-close:hover{color:var(--text);}
.modal-footer{display:flex;gap:.75rem;margin-top:.75rem;}
.modal-footer .btn{flex:1;}
.discount-preview{font-size:.75rem;color:var(--muted);margin-top:.3rem;}
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
        <h1>Voucher</h1>
      </div>
      <button class="btn btn-sm" onclick="openModal()">+ Tambah Voucher</button>
    </div>

    <div class="admin-table-wrap" id="vouchers-table">
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
      <h2 id="modal-title">Tambah Voucher</h2>
      <button class="modal-close" onclick="closeModal()">&times;</button>
    </div>
    <div class="form-group">
      <label class="form-label">Kode Voucher</label>
      <input type="text" class="form-input" id="f-code" placeholder="HEMAT50K" style="text-transform:uppercase;letter-spacing:.08em;font-family:monospace">
      <span class="form-error" id="err-code"></span>
    </div>
    <div class="form-group">
      <label class="form-label">Nilai Diskon (Rp)</label>
      <input type="number" class="form-input" id="f-discount_value" placeholder="50000" oninput="updatePreview()">
      <p class="discount-preview" id="discount-preview"></p>
      <span class="form-error" id="err-discount_value"></span>
    </div>
    <div class="modal-footer">
      <button class="btn" id="modal-save-btn" onclick="saveVoucher()">Tambah</button>
      <button class="btn btn-outline" onclick="closeModal()">Batal</button>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
let allVouchers = [];
let editId = null;

document.addEventListener('DOMContentLoaded', async () => {
  if (!Auth.getUser() || !Auth.isAdmin()) { window.location.href = '/login'; return; }
  if (document.getElementById('sidebar-name')) {
    document.getElementById('sidebar-name').textContent = Auth.getUser()?.name ?? '—';
  }
  await loadVouchers();
});

async function loadVouchers() {
  try {
    const vouchers = await api('GET', '/vouchers');
    allVouchers = vouchers; // Simpan data ke variabel global

    if (vouchers.length === 0) {
      document.getElementById('vouchers-table').innerHTML = `<p style="padding:2rem;font-size:.85rem;color:var(--muted)">Belum ada voucher.</p>`;
      return;
    }
    
    document.getElementById('vouchers-table').innerHTML = `
      <table class="admin-table">
        <thead><tr><th>Kode</th><th>Nilai Diskon</th><th></th></tr></thead>
        <tbody>
          ${vouchers.map(v => `<tr>
            <td><span class="voucher-code">${v.code}</span></td>
            <td style="font-weight:500">${rupiah(v.discount_value)}</td>
            <td>
              <div style="display:flex;gap:1rem">
                <button class="action-link" onclick="openEditModal(${v.id})">Edit</button>
                <button class="action-link danger" onclick="deleteVoucher(${v.id})">Hapus</button>
              </div>
            </td>
          </tr>`).join('')}
        </tbody>
      </table>`;
  } catch(e) {
    document.getElementById('vouchers-table').innerHTML = `<p style="padding:2rem;color:var(--muted)">Gagal memuat voucher.</p>`;
  }
}

function updatePreview() {
  const val = Number(document.getElementById('f-discount_value').value);
  const el = document.getElementById('discount-preview');
  el.textContent = val > 0 ? '= ' + rupiah(val) : '';
}

function openEditModal(id) {
  const voucher = allVouchers.find(v => v.id === id);
  openModal(voucher);
}

function openModal(v = null) {
  editId = v?.id ?? null;
  document.getElementById('f-code').value = v?.code ?? '';
  document.getElementById('f-discount_value').value = v?.discount_value ?? '';
  document.getElementById('err-code').textContent = '';
  document.getElementById('err-discount_value').textContent = '';
  document.getElementById('discount-preview').textContent = v?.discount_value > 0 ? '= ' + rupiah(v.discount_value) : '';
  
  const btn = document.getElementById('modal-save-btn');
  btn.disabled = false; // Reset tombol agar tidak terkunci
  btn.textContent = editId ? 'Simpan' : 'Tambah';
  
  document.getElementById('modal-title').textContent = editId ? 'Edit Voucher' : 'Tambah Voucher';
  document.getElementById('modal-overlay').classList.add('open');
  setTimeout(() => document.getElementById('f-code').focus(), 100);
}

function closeModal() { 
  document.getElementById('modal-overlay').classList.remove('open'); 
}

async function saveVoucher() {
  ['code','discount_value'].forEach(f => document.getElementById('err-'+f).textContent = '');
  const code = document.getElementById('f-code').value.trim().toUpperCase();
  const discount_value = Number(document.getElementById('f-discount_value').value);
  
  if (!code) { document.getElementById('err-code').textContent = 'Kode wajib diisi.'; return; }
  if (!discount_value || discount_value <= 0) { document.getElementById('err-discount_value').textContent = 'Nilai diskon harus lebih dari 0.'; return; }

  const btn = document.getElementById('modal-save-btn');
  btn.disabled = true; 
  btn.textContent = 'Menyimpan...';

  try {
    if (editId) {
      await api('PUT', '/vouchers/' + editId, { code, discount_value });
    } else {
      await api('POST', '/vouchers', { code, discount_value });
    }
    closeModal();
    showToast(editId ? 'Voucher diperbarui.' : 'Voucher ditambahkan.', 'success');
    await loadVouchers();
  } catch(e) {
    const errs = e.data?.errors;
    if (errs) {
      Object.entries(errs).forEach(([k,v]) => { 
        const el = document.getElementById('err-' + k); 
        if(el) el.textContent = v[0]; 
      });
    } else {
      showToast(e.data?.message || 'Gagal menyimpan.', 'error');
    }
  } finally {
    // Selalu reset tombol aktif setelah proses berhasil ataupun gagal
    btn.disabled = false; 
    btn.textContent = editId ? 'Simpan' : 'Tambah';
  }
}

async function deleteVoucher(id) {
  if (!confirm('Hapus voucher ini?')) return;
  try {
    await api('DELETE', '/vouchers/' + id);
    showToast('Voucher dihapus.', 'success');
    await loadVouchers();
  } catch(e) { 
    showToast(e.data?.message || 'Gagal menghapus.', 'error'); 
  }
}
</script>
@endsection