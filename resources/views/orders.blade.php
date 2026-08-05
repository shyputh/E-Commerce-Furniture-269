@extends('_layout')
@section('title', 'Pesanan Saya — RUMASELI')

@section('head')
<style>
.orders-wrap{padding:3rem 5% 5rem;}
.orders-wrap .subtitle{margin-bottom:.5rem;}
.orders-wrap h1{font-size:3rem;margin-bottom:2.5rem;}
.orders-list{border-top:1px solid var(--border);}
.order-row{display:flex;justify-content:space-between;align-items:center;gap:1rem;padding:1.5rem .5rem;border-bottom:1px solid var(--border);cursor:pointer;transition:background .2s;flex-wrap:wrap;}
.order-row:hover{background:rgba(234,230,223,.4);}
.order-left{display:flex;flex-direction:column;gap:.4rem;}
.order-id{font-size:.75rem;font-weight:600;letter-spacing:.08em;color:var(--text);}
.order-meta{font-size:.75rem;color:var(--muted);}
.order-right{display:flex;align-items:center;gap:2rem;flex-wrap:wrap;}
.order-total{font-size:.9rem;font-weight:500;}
.order-arrow{font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--brown);}
.empty-orders{padding:5rem 0;text-align:center;}
.empty-orders h2{font-family:var(--serif);font-size:2rem;margin-bottom:.75rem;}
.empty-orders p{color:var(--muted);margin-bottom:2rem;}
</style>
@endsection

@section('content')
<div class="orders-wrap fade-in">
  <span class="subtitle">Akun Anda</span>
  <h1>Pesanan Saya</h1>
  <div id="orders-content">
    <div style="display:flex;flex-direction:column;gap:1rem;">
      <div style="height:64px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
      <div style="height:64px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
      <div style="height:64px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
function fmtDate(iso) {
  if (!iso) return '—';
  return new Date(iso).toLocaleDateString('id-ID', {day:'numeric',month:'long',year:'numeric'});
}

document.addEventListener('DOMContentLoaded', async () => {
  if (!Auth.getUser()) { window.location.href = '/login'; return; }
  if (!Auth.isCustomer()) { window.location.href = '/'; return; }

  const wrap = document.getElementById('orders-content');
  try {
    const orders = await api('GET', '/orders');
    if (orders.length === 0) {
      wrap.innerHTML = `<div class="empty-orders">
        <h2>Belum ada pesanan.</h2>
        <p>Mulai belanja untuk menemukan benda yang tepat untuk ruang Anda.</p>
        <a href="/products" class="btn">Mulai Belanja &rarr;</a>
      </div>`;
      return;
    }
    wrap.innerHTML = `<div class="orders-list">` +
      orders.map(o => {
        const itemCount = o.order_items?.length ?? o.orderItems?.length ?? '—';
        return `
        <div class="order-row" onclick="window.location='/orders/${o.id}'">
          <div class="order-left">
            <div style="display:flex;align-items:center;gap:.75rem;flex-wrap:wrap;">
              <span class="order-id">#${String(o.id).padStart(5,'0')}</span>
              <span class="badge ${ORDER_BADGE[o.status] ?? ''}">${ORDER_STATUS[o.status] ?? o.status}</span>
            </div>
            <span class="order-meta">${fmtDate(o.created_at)} &middot; ${itemCount} item</span>
          </div>
          <div class="order-right">
            <span class="order-total">${o.total != null ? rupiah(o.total) : '—'}</span>
            <span class="order-arrow">Detail &rarr;</span>
          </div>
        </div>`;
      }).join('') + `</div>`;
  } catch(e) {
    wrap.innerHTML = `<p style="color:var(--muted);padding:2rem 0">Gagal memuat pesanan.</p>`;
  }
});
</script>
@endsection
