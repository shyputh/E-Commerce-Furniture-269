@extends('_layout')
@section('title', 'Kelola Pesanan — Admin RUMASELI')
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
.breadcrumb{font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);display:flex;gap:.5rem;align-items:center;flex-wrap:wrap;margin-bottom:1.5rem;}
.breadcrumb a{color:var(--muted);transition:color .2s;}.breadcrumb a:hover{color:var(--brown);}
.order-header{display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:1rem;margin-bottom:2rem;}
.order-header h1{font-size:2rem;}
.order-header .order-date{font-size:.8rem;color:var(--muted);margin-top:.35rem;}
.flash-msg{padding:.7rem 1rem;font-size:.8rem;font-weight:500;margin-bottom:1.25rem;display:none;}
.flash-msg.ok{background:#f0fff4;color:#276749;border:1px solid #9ae6b4;}
.flash-msg.err{background:#fff5f5;color:#c53030;border:1px solid #feb2b2;}
.order-body{display:grid;grid-template-columns:1fr 320px;gap:1.5rem;align-items:start;}
.detail-card{background:#fff;border:1px solid var(--border);margin-bottom:1.25rem;}
.detail-card-header{padding:.85rem 1.25rem;border-bottom:1px solid var(--border);}
.detail-card-header h2{font-family:var(--sans);font-size:.65rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);}
.detail-card-body{padding:1.25rem;}
table.admin-table{width:100%;border-collapse:collapse;font-size:.83rem;}
table.admin-table th{text-align:left;font-size:.58rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);padding:.65rem 1rem;background:var(--bg);}
table.admin-table td{padding:.8rem 1rem;border-top:1px solid var(--border);}
.item-row-img{width:40px;height:40px;object-fit:cover;background:var(--banner);}
.specs-grid{display:grid;grid-template-columns:1fr 1fr;gap:.85rem;}
.spec-item span:first-child{font-size:.58rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);display:block;margin-bottom:.2rem;}
.spec-item span:last-child{font-size:.82rem;}
.radio-list{display:flex;flex-direction:column;gap:.5rem;margin-bottom:1rem;}
.radio-opt{display:flex;align-items:center;gap:.65rem;padding:.6rem .85rem;border:1px solid var(--border);cursor:pointer;transition:border-color .2s;font-size:.82rem;}
.radio-opt:has(input:checked){border-color:var(--brown);background:#fdf9f6;}
.radio-opt input{accent-color:var(--brown);}
@media(max-width:900px){.order-body{grid-template-columns:1fr;}}
@media(max-width:768px){.admin-sidebar{display:none;}.admin-main{padding:1.25rem;}}
</style>
@endsection

@section('content')
<div class="admin-wrap">
  @include('admin._sidebar')
  <div class="admin-main">
    <div class="breadcrumb">
      <a href="/admin/orders">Pesanan</a><span>/</span>
      <span id="bc-id">Memuat...</span>
    </div>
    <div id="order-content">
      <div style="display:flex;flex-direction:column;gap:1rem;">
        <div style="height:2.5rem;background:var(--banner);width:40%;animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
        <div style="height:200px;background:var(--banner);animation:shimmer 1.5s infinite;background-size:200% 100%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%)"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
const ORDER_ID = {{ $id }};
let currentOrder = null;
function fmtDate(iso){ return iso ? new Date(iso).toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric',hour:'2-digit',minute:'2-digit'}) : '—'; }
function flash(msg, type='ok'){ const el=document.getElementById('flash'); el.textContent=msg; el.className='flash-msg '+type; el.style.display='block'; setTimeout(()=>el.style.display='none',3500); }

document.addEventListener('DOMContentLoaded', async () => {
  if (!Auth.getUser() || !Auth.isAdmin()) { window.location.href='/login'; return; }
  document.getElementById('sidebar-name').textContent = Auth.getUser()?.name ?? '—';
  await loadOrder();
});

async function loadOrder() {
  const wrap = document.getElementById('order-content');
  try {
    const o = await api('GET', '/orders/' + ORDER_ID);
    currentOrder = o;
    document.title = 'Kelola #' + String(o.id).padStart(5,'0') + ' — Admin';
    document.getElementById('bc-id').textContent = '#' + String(o.id).padStart(5,'0');
    const items = o.order_items ?? o.orderItems ?? [];
    const subtotal = items.reduce((s,i) => s + i.qty * i.price_snapshot, 0);
    const discount = o.voucher?.discount_value ?? 0;
    const total = o.total ?? Math.max(subtotal - discount, 0);
    const STATUSES = ['pending','paid','shipped','completed','cancelled'];
    const DELIVERY_STATUSES = ['preparing','shipped','delivered'];
    const DELIVERY_LABEL = { preparing:'Diproses', shipped:'Dikirim', delivered:'Terkirim' };

    wrap.innerHTML = `
      <div class="order-header">
        <div>
          <h1>Pesanan #${String(o.id).padStart(5,'0')}</h1>
          <p class="order-date">${fmtDate(o.created_at)}</p>
        </div>
        <span class="badge ${ORDER_BADGE[o.status]??''}" style="font-size:.8rem;padding:.3rem 1rem">${ORDER_STATUS[o.status]??o.status}</span>
      </div>
      <p class="flash-msg" id="flash"></p>
      <div class="order-body">
        <div>
          <!-- Customer -->
          <div class="detail-card">
            <div class="detail-card-header"><h2>Info Customer</h2></div>
            <div class="detail-card-body">
              <div class="specs-grid">
                <div class="spec-item"><span>Nama</span><span>${o.customer?.user?.name ?? '—'}</span></div>
                <div class="spec-item"><span>Telepon</span><span>${o.customer?.phone ?? '—'}</span></div>
                <div class="spec-item" style="grid-column:1/-1"><span>Alamat</span><span>${o.customer?.address ?? '—'}</span></div>
              </div>
            </div>
          </div>
          <!-- Items -->
          <div class="detail-card">
            <div class="detail-card-header"><h2>Item Pesanan</h2></div>
            <table class="admin-table">
              <thead><tr><th></th><th>Produk</th><th>Harga</th><th>Qty</th><th style="text-align:right">Subtotal</th></tr></thead>
              <tbody>
                ${items.map(i=>`<tr>
                  <td><img class="item-row-img" src="${prodImg(i.product_id)}" alt="${i.product?.name??''}"></td>
                  <td style="font-weight:500">${i.product?.name ?? '#'+i.product_id}</td>
                  <td style="color:var(--muted)">${rupiah(i.price_snapshot)}</td>
                  <td style="color:var(--muted)">${i.qty}</td>
                  <td style="text-align:right;font-weight:500">${rupiah(i.price_snapshot*i.qty)}</td>
                </tr>`).join('')}
              </tbody>
              <tfoot>
                ${discount>0?`<tr><td colspan="4" style="text-align:right;color:#276749;padding:.8rem 1rem;border-top:2px solid var(--border);font-size:.8rem">Diskon Voucher</td><td style="text-align:right;color:#276749;padding:.8rem 1rem;border-top:2px solid var(--border)">− ${rupiah(discount)}</td></tr>`:''}
                <tr><td colspan="4" style="text-align:right;font-weight:700;padding:.8rem 1rem;border-top:2px solid var(--border)">Total</td>
                <td style="text-align:right;font-family:var(--serif);font-size:1.1rem;font-weight:600;padding:.8rem 1rem;border-top:2px solid var(--border)">${rupiah(total)}</td></tr>
              </tfoot>
            </table>
          </div>
          <!-- Delivery -->
          <div class="detail-card">
            <div class="detail-card-header"><h2>${o.delivery ? 'Update Pengiriman' : 'Tambah Pengiriman'}</h2></div>
            <div class="detail-card-body">
              ${!o.delivery ? `
                <div class="form-group">
                  <label class="form-label">Kurir</label>
                  <input type="text" class="form-input" id="courier-input" placeholder="JNE, TIKI, SiCepat...">
                </div>
                <button class="btn btn-sm" onclick="handleDelivery()">Buat Pengiriman</button>
              ` : `
                <div class="form-group">
                  <label class="form-label">No. Resi</label>
                  <input type="text" class="form-input" id="tracking-input" value="${o.delivery.tracking_no??''}" placeholder="Nomor resi">
                </div>
                <div class="form-group" style="margin-top:.75rem">
                  <label class="form-label">Status Pengiriman</label>
                  <div style="display:flex;gap:.5rem;flex-wrap:wrap;margin-top:.35rem">
                    ${DELIVERY_STATUSES.map(s=>`
                    <button class="filter-btn ${o.delivery.status===s?'active':''}" data-dstatus="${s}" onclick="setDeliveryStatus(this)">${DELIVERY_LABEL[s]}</button>`).join('')}
                  </div>
                </div>
                <button class="btn btn-sm" onclick="handleDelivery()">Simpan Pengiriman</button>
              `}
            </div>
          </div>
        </div>

        <div>
          <!-- Order status -->
          <div class="detail-card">
            <div class="detail-card-header"><h2>Status Pesanan</h2></div>
            <div class="detail-card-body">
              <div class="radio-list">
                ${STATUSES.map(s=>`
                <div class="radio-opt">
                  <input type="radio" name="order-status" id="os-${s}" value="${s}" ${o.status===s?'checked':''}>
                  <label for="os-${s}">${ORDER_STATUS[s]??s}</label>
                </div>`).join('')}
              </div>
              <button class="btn btn-sm btn-full" onclick="saveOrderStatus()">Simpan Status</button>
            </div>
          </div>
          <!-- Payment -->
          ${o.payment ? `
          <div class="detail-card">
            <div class="detail-card-header"><h2>Status Pembayaran</h2></div>
            <div class="detail-card-body">
              <p style="font-size:.8rem;margin-bottom:.85rem;color:var(--muted)">Metode: <strong>${o.payment.method==='transfer_bank'?'Transfer Bank':'COD'}</strong></p>
              <div class="radio-list">
                ${['pending','paid','failed'].map(s=>`
                <div class="radio-opt">
                  <input type="radio" name="pay-status" id="ps-${s}" value="${s}" ${o.payment.status===s?'checked':''}>
                  <label for="ps-${s}">${s==='paid'?'Lunas':s==='failed'?'Gagal':'Menunggu'}</label>
                </div>`).join('')}
              </div>
              <button class="btn btn-sm btn-full" onclick="savePayStatus(${o.payment.id})">Simpan Pembayaran</button>
            </div>
          </div>` : ''}
        </div>
      </div>`;
  } catch(e) {
    wrap.innerHTML = `<div style="text-align:center;padding:3rem"><p style="color:var(--muted)">Pesanan tidak ditemukan.</p><a href="/admin/orders" class="btn" style="margin-top:1rem;display:inline-block">Kembali</a></div>`;
  }
}

function setDeliveryStatus(btn) {
  document.querySelectorAll('[data-dstatus]').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
}

async function saveOrderStatus() {
  const status = document.querySelector('input[name="order-status"]:checked')?.value;
  if (!status) return;
  try {
    await api('PATCH', '/orders/' + ORDER_ID + '/status', { status });
    flash('Status pesanan diperbarui.', 'ok');
    await loadOrder();
  } catch(e) { flash(e.data?.message || 'Gagal.', 'err'); }
}

async function savePayStatus(payId) {
  const status = document.querySelector('input[name="pay-status"]:checked')?.value;
  if (!status) return;
  try {
    await api('PATCH', '/payments/' + payId + '/status', { status });
    flash('Status pembayaran diperbarui.', 'ok');
    await loadOrder();
  } catch(e) { flash(e.data?.message || 'Gagal.', 'err'); }
}

async function handleDelivery() {
  try {
    if (!currentOrder.delivery) {
      const courier = document.getElementById('courier-input')?.value.trim();
      if (!courier) { flash('Kurir wajib diisi.', 'err'); return; }
      await api('POST', '/orders/' + ORDER_ID + '/delivery', { courier });
    } else {
      const tracking_no = document.getElementById('tracking-input')?.value.trim();
      const status = document.querySelector('[data-dstatus].active')?.dataset.dstatus;
      await api('PUT', '/deliveries/' + currentOrder.delivery.id, { tracking_no: tracking_no || undefined, status });
    }
    flash('Pengiriman disimpan.', 'ok');
    await loadOrder();
  } catch(e) { flash(e.data?.message || 'Gagal.', 'err'); }
}
</script>
@endsection
