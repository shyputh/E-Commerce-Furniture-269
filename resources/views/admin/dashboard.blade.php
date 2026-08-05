@extends('_layout')
@section('title', 'Dashboard Admin — RUMASELI')

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
.admin-page-header{margin-bottom:2rem;}
.admin-page-header .subtitle{margin-bottom:.35rem;}
.admin-page-header h1{font-size:2.5rem;}
/* Stats */
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.25rem;margin-bottom:2.5rem;}
.stat-card{background:#fff;border:1px solid var(--border);padding:1.5rem;cursor:pointer;transition:border-color .2s;}
.stat-card:hover{border-color:var(--brown);}
.stat-card .stat-label{font-size:.6rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);margin-bottom:.5rem;}
.stat-card .stat-val{font-family:var(--serif);font-size:1.6rem;color:var(--text);margin-bottom:.3rem;}
.stat-card .stat-sub{font-size:.7rem;color:var(--muted);}
/* Table */
.admin-table-wrap{background:#fff;border:1px solid var(--border);overflow-x:auto;}
.admin-table-header{display:flex;justify-content:space-between;align-items:center;padding:1rem 1.5rem;border-bottom:1px solid var(--border);}
.admin-table-header h2{font-family:var(--sans);font-size:.75rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;}
.admin-table-header a{font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--brown);}
table.admin-table{width:100%;border-collapse:collapse;font-size:.85rem;}
table.admin-table th{text-align:left;font-size:.6rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);padding:.75rem 1.25rem;background:var(--bg);}
table.admin-table td{padding:.85rem 1.25rem;border-top:1px solid var(--border);}
table.admin-table tr:hover td{background:var(--bg);}
.action-link{font-size:.65rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:var(--brown);cursor:pointer;}
.action-link.danger{color:#e53e3e;}
@media(max-width:900px){.stats-grid{grid-template-columns:1fr 1fr;}}
@media(max-width:768px){
  .admin-sidebar{display:none;}
  .admin-main{padding:1.5rem;}
}
</style>
@endsection

@section('content')
<div class="admin-wrap">
  <!-- Sidebar -->
  <aside class="admin-sidebar">
    <div class="admin-sidebar-top">
      <p>Admin Panel</p>
      <p id="sidebar-name">—</p>
    </div>
    <nav class="admin-nav">
      <a href="/admin" class="active">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
        Dashboard
      </a>
      <a href="/admin/orders">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/></svg>
        Pesanan
      </a>
      <a href="/admin/products">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/></svg>
        Produk
      </a>
      <a href="/admin/categories">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        Kategori
      </a>
      <a href="/admin/vouchers">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>
        Voucher
      </a>
    </nav>
    <div class="admin-logout">
      <button onclick="authLogout()">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        Keluar
      </button>
    </div>
  </aside>

  <!-- Main -->
  <div class="admin-main">
    <div class="admin-page-header">
      <span class="subtitle">Overview</span>
      <h1>Dashboard</h1>
    </div>

    <div class="stats-grid" id="stats-grid">
      <div class="stat-card skeleton" style="height:100px"></div>
      <div class="stat-card skeleton" style="height:100px"></div>
      <div class="stat-card skeleton" style="height:100px"></div>
    </div>

    <div class="admin-table-wrap">
      <div class="admin-table-header">
        <h2>Pesanan Terbaru</h2>
        <a href="/admin/orders">Lihat Semua &rarr;</a>
      </div>
      <div id="recent-orders-table">
        <div style="padding:1.5rem;display:flex;flex-direction:column;gap:.75rem">
          <div style="height:42px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
          <div style="height:42px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
          <div style="height:42px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
function fmtDate(iso){ return iso ? new Date(iso).toLocaleDateString('id-ID',{day:'numeric',month:'short',year:'numeric'}) : '—'; }

document.addEventListener('DOMContentLoaded', async () => {
  if (!Auth.getUser() || !Auth.isAdmin()) { window.location.href = '/login'; return; }
  document.getElementById('sidebar-name').textContent = Auth.getUser()?.name ?? '—';

  try {
    const [orders, products] = await Promise.all([
      api('GET', '/admin/orders'),
      api('GET', '/products'),
    ]);

    const revenue = orders.filter(o => o.status !== 'cancelled').reduce((s,o) => s + (o.total ?? 0), 0);
    const pending = orders.filter(o => o.status === 'pending').length;
    const lowStock = products.filter(p => p.stock <= 3).length;

    document.getElementById('stats-grid').innerHTML = [
      { label:'Total Pesanan', val: orders.length, sub: pending + ' menunggu pembayaran', href:'/admin/orders' },
      { label:'Total Pendapatan', val: rupiah(revenue), sub: 'Dari pesanan aktif', href:'/admin/orders' },
      { label:'Total Produk', val: products.length, sub: lowStock + ' stok hampir habis', href:'/admin/products' },
    ].map(s => `
      <div class="stat-card" onclick="window.location='${s.href}'">
        <p class="stat-label">${s.label}</p>
        <p class="stat-val">${s.val}</p>
        <p class="stat-sub">${s.sub}</p>
      </div>`).join('');

    const recent = orders.slice(0, 6);
    if (recent.length === 0) {
      document.getElementById('recent-orders-table').innerHTML = `<p style="padding:2rem;font-size:.85rem;color:var(--muted)">Belum ada pesanan.</p>`;
    } else {
      document.getElementById('recent-orders-table').innerHTML = `
        <table class="admin-table">
          <thead><tr>
            <th>ID</th><th>Customer</th><th>Total</th><th>Status</th><th>Tanggal</th><th></th>
          </tr></thead>
          <tbody>
            ${recent.map(o => `<tr>
              <td style="font-family:monospace;font-size:.75rem;color:var(--muted)">#${String(o.id).padStart(5,'0')}</td>
              <td>${o.customer?.user?.name ?? '—'}</td>
              <td style="font-weight:500">${o.total != null ? rupiah(o.total) : '—'}</td>
              <td><span class="badge ${ORDER_BADGE[o.status]??''}">${ORDER_STATUS[o.status]??o.status}</span></td>
              <td style="color:var(--muted);font-size:.8rem">${fmtDate(o.created_at)}</td>
              <td><span class="action-link" onclick="window.location='/admin/orders/${o.id}'">Kelola &rarr;</span></td>
            </tr>`).join('')}
          </tbody>
        </table>`;
    }
  } catch(e) {
    document.getElementById('stats-grid').innerHTML = `<p style="color:var(--muted);font-size:.85rem">Gagal memuat data.</p>`;
  }
});
</script>
@endsection
