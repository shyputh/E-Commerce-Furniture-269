@extends('_layout')
@section('title', 'Pesanan — Admin RUMASELI')
@section('head')
<style>
@import url('');
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
.admin-page-header{margin-bottom:2rem;}
.admin-page-header .subtitle{margin-bottom:.35rem;}
.admin-page-header h1{font-size:2.5rem;}
.filter-bar{display:flex;gap:.75rem;flex-wrap:wrap;margin-bottom:1.5rem;align-items:center;}
.search-wrap{flex:1;min-width:180px;position:relative;}
.search-wrap svg{position:absolute;left:0;top:50%;transform:translateY(-50%);pointer-events:none;color:var(--muted);}
.search-input{width:100%;background:#fff;border:1px solid var(--border);padding:.5rem .5rem .5rem 1.75rem;font-size:.85rem;color:var(--text);outline:none;transition:border-color .2s;}
.search-input:focus{border-color:var(--brown);}
.filter-btn{background:transparent;border:1px solid rgba(42,42,42,.2);padding:.4rem .85rem;font-size:.6rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;cursor:pointer;color:var(--muted);transition:all .2s;}
.filter-btn.active{background:var(--brown);border-color:var(--brown);color:#fff;}
.filter-btn:hover:not(.active){border-color:var(--brown);color:var(--brown);}
.admin-table-wrap{background:#fff;border:1px solid var(--border);overflow-x:auto;}
table.admin-table{width:100%;border-collapse:collapse;font-size:.85rem;}
table.admin-table th{text-align:left;font-size:.6rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);padding:.75rem 1.25rem;background:var(--bg);}
table.admin-table td{padding:.85rem 1.25rem;border-top:1px solid var(--border);}
table.admin-table tr:hover td{background:var(--bg);}
.action-link{font-size:.65rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--brown);cursor:pointer;}
.result-count{font-size:.75rem;color:var(--muted);letter-spacing:.08em;text-transform:uppercase;margin-bottom:1rem;}
@media(max-width:768px){.admin-sidebar{display:none;}.admin-main{padding:1.25rem;}}
</style>
@endsection

@section('content')
<div class="admin-wrap">
  @include('admin._sidebar')
  <div class="admin-main">
    <div class="admin-page-header">
      <span class="subtitle">Manajemen</span>
      <h1>Semua Pesanan</h1>
    </div>
    <div class="filter-bar">
      <div class="search-wrap">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="search" class="search-input" id="search-input" placeholder="Cari ID atau nama customer...">
      </div>
      <div id="status-filters" style="display:flex;gap:.5rem;flex-wrap:wrap">
        <button class="filter-btn active" data-status="">Semua</button>
        <button class="filter-btn" data-status="pending">Menunggu</button>
        <button class="filter-btn" data-status="paid">Dibayar</button>
        <button class="filter-btn" data-status="shipped">Dikirim</button>
        <button class="filter-btn" data-status="completed">Selesai</button>
        <button class="filter-btn" data-status="cancelled">Batal</button>
      </div>
    </div>
    <p class="result-count" id="result-count">&nbsp;</p>
    <div class="admin-table-wrap" id="orders-table">
      <div style="padding:1.5rem;display:flex;flex-direction:column;gap:.75rem">
        <div style="height:42px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
        <div style="height:42px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
        <div style="height:42px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
let allOrders = [];
let filterStatus = '';
function fmtDate(iso){ return iso ? new Date(iso).toLocaleDateString('id-ID',{day:'numeric',month:'short',year:'numeric'}) : '—'; }

function renderOrders() {
  const q = document.getElementById('search-input').value.trim().toLowerCase();
  const filtered = allOrders.filter(o => {
    const matchStatus = !filterStatus || o.status === filterStatus;
    const matchQ = !q || String(o.id).includes(q) || (o.customer?.user?.name||'').toLowerCase().includes(q);
    return matchStatus && matchQ;
  });
  document.getElementById('result-count').textContent = filtered.length + ' Pesanan';
  if (filtered.length === 0) {
    document.getElementById('orders-table').innerHTML = `<p style="padding:2rem;font-size:.85rem;color:var(--muted)">Tidak ada pesanan ditemukan.</p>`;
    return;
  }
  document.getElementById('orders-table').innerHTML = `
    <table class="admin-table">
      <thead><tr>
        <th>ID</th><th>Customer</th><th>Items</th><th>Total</th><th>Status</th><th>Tanggal</th><th></th>
      </tr></thead>
      <tbody>
        ${filtered.map(o => `<tr>
          <td style="font-family:monospace;font-size:.75rem;color:var(--muted)">#${String(o.id).padStart(5,'0')}</td>
          <td>${o.customer?.user?.name ?? '—'}</td>
          <td style="color:var(--muted);font-size:.8rem">${(o.order_items??o.orderItems??[]).length} item</td>
          <td style="font-weight:500">${o.total != null ? rupiah(o.total) : '—'}</td>
          <td><span class="badge ${ORDER_BADGE[o.status]??''}">${ORDER_STATUS[o.status]??o.status}</span></td>
          <td style="color:var(--muted);font-size:.8rem">${fmtDate(o.created_at)}</td>
          <td><span class="action-link" onclick="window.location='/admin/orders/${o.id}'">Kelola &rarr;</span></td>
        </tr>`).join('')}
      </tbody>
    </table>`;
}

document.querySelectorAll('#status-filters .filter-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('#status-filters .filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    filterStatus = btn.dataset.status;
    renderOrders();
  });
});
document.getElementById('search-input').addEventListener('input', renderOrders);

document.addEventListener('DOMContentLoaded', async () => {
  if (!Auth.getUser() || !Auth.isAdmin()) { window.location.href = '/login'; return; }
  document.getElementById('sidebar-name').textContent = Auth.getUser()?.name ?? '—';
  try {
    allOrders = await api('GET', '/admin/orders');
    renderOrders();
  } catch(e) {
    document.getElementById('orders-table').innerHTML = `<p style="padding:2rem;color:var(--muted)">Gagal memuat pesanan.</p>`;
  }
});
</script>
@endsection
