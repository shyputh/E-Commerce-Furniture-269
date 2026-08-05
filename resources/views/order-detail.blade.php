@extends('_layout')
@section('title', 'Detail Pesanan — RUMASELI')

@section('head')
<style>
.order-detail-wrap{padding:2.5rem 5% 5rem;}
.breadcrumb{font-size:.65rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);display:flex;gap:.5rem;align-items:center;flex-wrap:wrap;margin-bottom:2rem;}
.breadcrumb a{color:var(--muted);transition:color .2s;}.breadcrumb a:hover{color:var(--brown);}
.order-header{display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:1rem;margin-bottom:2.5rem;}
.order-header h1{font-size:2.2rem;}
.order-header .order-date{font-size:.8rem;color:var(--muted);margin-top:.35rem;}
.order-body{display:grid;grid-template-columns:1fr 360px;gap:2rem;align-items:start;}
/* Card */
.detail-card{background:#fff;border:1px solid var(--border);margin-bottom:1.5rem;}
.detail-card-header{padding:1rem 1.5rem;border-bottom:1px solid var(--border);}
.detail-card-header h2{font-family:var(--sans);font-size:.7rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);}
.detail-card-body{padding:1.5rem;}
/* Items table */
.items-table{width:100%;border-collapse:collapse;font-size:.85rem;}
.items-table th{text-align:left;font-size:.6rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);padding:.5rem 1rem .75rem;}
.items-table td{padding:.85rem 1rem;border-top:1px solid var(--border);vertical-align:middle;}
.item-row-img{width:44px;height:44px;object-fit:cover;background:var(--banner);}
.item-row-name{font-weight:500;}
.tfoot-row td{padding:.85rem 1rem;border-top:2px solid var(--border);font-weight:600;}
/* Specs grid */
.specs-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
.spec-item span:first-child{font-size:.6rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);display:block;margin-bottom:.2rem;}
.spec-item span:last-child{font-size:.85rem;}
/* Payment form */
.pay-method-list{display:flex;flex-direction:column;gap:.6rem;margin-bottom:1rem;}
.pay-method-opt{display:flex;align-items:center;gap:.75rem;padding:.75rem 1rem;border:1px solid var(--border);cursor:pointer;transition:border-color .2s;}
.pay-method-opt:has(input:checked){border-color:var(--brown);background:#fdf9f6;}
.pay-method-opt label{font-size:.85rem;font-weight:500;cursor:pointer;}
.pay-method-opt input{accent-color:var(--brown);}
.pay-error{font-size:.75rem;color:#c53030;margin-bottom:.75rem;display:none;}
/* Delivery badge */
.delivery-status{color:var(--brown);font-weight:600;}
@media(max-width:900px){.order-body{grid-template-columns:1fr;}}
@media(max-width:600px){.items-table th:nth-child(3),.items-table td:nth-child(3){display:none;}}
</style>
@endsection

@section('content')
<div class="order-detail-wrap">
  <div class="breadcrumb fade-in">
    <a href="/orders">Pesanan</a><span>/</span>
    <span id="bc-order">Memuat...</span>
  </div>
  <div id="order-detail-content">
    <!-- skeleton -->
    <div style="display:flex;flex-direction:column;gap:1rem;animation:shimmer 1.5s infinite;background-size:200% 100%;">
      <div style="height:2.5rem;background:var(--banner);width:40%;background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%);background-size:200% 100%;animation:shimmer 1.5s infinite;"></div>
      <div style="height:200px;background:var(--banner);background-image:linear-gradient(90deg,var(--banner) 25%,#ddd9d0 50%,var(--banner) 75%);background-size:200% 100%;animation:shimmer 1.5s infinite;"></div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
const ORDER_ID = {{ $id }};
let currentOrder = null;

function fmtDate(iso) {
  if (!iso) return '—';
  return new Date(iso).toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric',hour:'2-digit',minute:'2-digit'});
}

document.addEventListener('DOMContentLoaded', async () => {
  if (!Auth.getUser()) { window.location.href = '/login'; return; }
  await loadOrder();
});

async function loadOrder() {
  const wrap = document.getElementById('order-detail-content');
  try {
    const o = await api('GET', '/orders/' + ORDER_ID);
    currentOrder = o;
    document.title = 'Pesanan #' + String(o.id).padStart(5,'0') + ' — RUMASELI';
    document.getElementById('bc-order').textContent = '#' + String(o.id).padStart(5,'0');

    const items = o.order_items ?? o.orderItems ?? [];
    const subtotal = items.reduce((s,i) => s + i.qty * i.price_snapshot, 0);
    const discount = o.voucher?.discount_value ?? 0;
    const total = o.total ?? Math.max(subtotal - discount, 0);
    const isCustomer = Auth.isCustomer();

    wrap.innerHTML = `
      <div class="order-header fade-in">
        <div>
          <h1>Pesanan #${String(o.id).padStart(5,'0')}</h1>
          <p class="order-date">Dibuat pada ${fmtDate(o.created_at)}</p>
        </div>
        <span class="badge ${ORDER_BADGE[o.status] ?? ''}" style="font-size:.8rem;padding:.3rem 1rem">${ORDER_STATUS[o.status] ?? o.status}</span>
      </div>

      <div class="order-body fade-in">
        <!-- LEFT -->
        <div>
          <!-- Items -->
          <div class="detail-card">
            <div class="detail-card-header"><h2>Item Pesanan</h2></div>
            <table class="items-table">
              <thead><tr>
                <th></th><th>Produk</th><th>Harga</th><th>Qty</th><th style="text-align:right">Subtotal</th>
              </tr></thead>
              <tbody>
                ${items.map(i => `
                <tr>
                  <td><img class="item-row-img" src="${prodImg(i.product_id)}" alt="${i.product?.name??''}"></td>
                  <td class="item-row-name">${i.product?.name ?? '#'+i.product_id}</td>
                  <td>${rupiah(i.price_snapshot)}</td>
                  <td>${i.qty}</td>
                  <td style="text-align:right">${rupiah(i.price_snapshot * i.qty)}</td>
                </tr>`).join('')}
              </tbody>
              <tfoot>
                ${discount > 0 ? `<tr class="tfoot-row"><td colspan="4" style="text-align:right;color:#276749">Diskon Voucher</td><td style="text-align:right;color:#276749">− ${rupiah(discount)}</td></tr>` : ''}
                <tr class="tfoot-row">
                  <td colspan="4" style="text-align:right">Total</td>
                  <td style="text-align:right;font-family:var(--serif);font-size:1.1rem">${rupiah(total)}</td>
                </tr>
              </tfoot>
            </table>
          </div>

          <!-- Delivery -->
          ${o.delivery ? `
          <div class="detail-card">
            <div class="detail-card-header"><h2>Informasi Pengiriman</h2></div>
            <div class="detail-card-body">
              <div class="specs-grid">
                <div class="spec-item"><span>Kurir</span><span>${o.delivery.courier}</span></div>
                ${o.delivery.tracking_no ? `<div class="spec-item"><span>No. Resi</span><span style="font-family:monospace">${o.delivery.tracking_no}</span></div>` : ''}
                <div class="spec-item"><span>Status</span><span class="delivery-status">${DELIVERY_STATUS[o.delivery.status] ?? o.delivery.status}</span></div>
              </div>
            </div>
          </div>` : ''}
        </div>

        <!-- RIGHT -->
        <div>
          <!-- Price summary -->
          <div class="detail-card">
            <div class="detail-card-header"><h2>Ringkasan Harga</h2></div>
            <div class="detail-card-body">
              <div style="display:flex;flex-direction:column;gap:.75rem;font-size:.85rem">
                <div style="display:flex;justify-content:space-between"><span style="color:var(--muted)">Subtotal</span><span>${rupiah(subtotal)}</span></div>
                ${discount > 0 ? `<div style="display:flex;justify-content:space-between;color:#276749"><span>Diskon Voucher</span><span>− ${rupiah(discount)}</span></div>` : ''}
                <hr style="border:none;border-top:1px solid var(--border)">
                <div style="display:flex;justify-content:space-between;font-weight:700">
                  <span>Total</span>
                  <span style="font-family:var(--serif);font-size:1.1rem">${rupiah(total)}</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Payment -->
          <div class="detail-card" id="payment-card">
            <div class="detail-card-header"><h2>Pembayaran</h2></div>
            <div class="detail-card-body" id="payment-body">
              ${o.payment ? renderPaymentInfo(o.payment) : (
                o.status === 'pending' && isCustomer ? renderPaymentForm() : `<p style="font-size:.85rem;color:var(--muted)">Belum ada data pembayaran.</p>`
              )}
            </div>
          </div>
        </div>
      </div>`;
    initFadeIn();
  } catch(e) {
    wrap.innerHTML = `<div style="text-align:center;padding:4rem">
      <p style="color:var(--muted)">Pesanan tidak ditemukan.</p>
      <a href="/orders" class="btn" style="margin-top:1rem;display:inline-block">Kembali</a>
    </div>`;
  }
}

function renderPaymentInfo(pay) {
  const methodLabel = { transfer_bank:'Transfer Bank', cod:'Bayar di Tempat (COD)' };
  const statusClass = pay.status === 'paid' ? 'badge-completed' : pay.status === 'failed' ? 'badge-cancelled' : 'badge-pending';
  const statusLabel = pay.status === 'paid' ? 'Lunas' : pay.status === 'failed' ? 'Gagal' : 'Menunggu';
  return `<div class="specs-grid">
    <div class="spec-item"><span>Metode</span><span>${methodLabel[pay.method] ?? pay.method}</span></div>
    <div class="spec-item"><span>Status</span><span class="badge ${statusClass}">${statusLabel}</span></div>
  </div>`;
}

function renderPaymentForm() {
  return `<p style="font-size:.8rem;color:var(--muted);margin-bottom:1rem;line-height:1.7">
    Pilih metode pembayaran untuk melanjutkan pesanan Anda.
  </p>
  <div class="pay-method-list">
    <div class="pay-method-opt">
      <input type="radio" name="pay-method" id="pm-transfer" value="transfer_bank" checked>
      <label for="pm-transfer">Transfer Bank</label>
    </div>
    <div class="pay-method-opt">
      <input type="radio" name="pay-method" id="pm-cod" value="cod">
      <label for="pm-cod">Bayar di Tempat (COD)</label>
    </div>
  </div>
  <p class="pay-error" id="pay-error"></p>
  <button class="btn btn-full" id="pay-btn" onclick="handlePay()">Bayar Sekarang &rarr;</button>`;
}

async function handlePay() {
  const btn = document.getElementById('pay-btn');
  const errEl = document.getElementById('pay-error');
  errEl.style.display = 'none';
  btn.disabled = true; btn.textContent = 'Memproses...';
  try {
    const method = document.querySelector('input[name="pay-method"]:checked')?.value ?? 'transfer_bank';
    await api('POST', '/orders/' + ORDER_ID + '/payment', { method });
    showToast('Pembayaran berhasil dibuat!', 'success');
    await loadOrder(); // refresh
  } catch(e) {
    btn.disabled = false; btn.textContent = 'Bayar Sekarang →';
    errEl.textContent = e.data?.message || 'Gagal membuat pembayaran.';
    errEl.style.display = 'block';
  }
}
</script>
@endsection
