@extends('_layout')
@section('title', 'RUMASELI — Curated Home Living')

@section('head')
<style>
/* ── HERO ── */
.hero{display:grid;grid-template-columns:1fr 1fr;gap:4rem;padding:4rem 5%;align-items:center;}
.hero h1{font-size:4rem;line-height:1.1;margin-bottom:2rem;}
.hero p{font-size:1rem;margin-bottom:2.5rem;max-width:90%;}
.hero-image img{width:100%;aspect-ratio:4/5;object-fit:cover;}
/* ── CATEGORIES ── */
.categories{padding:6rem 5%;}
.category-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;}
.cat-card{position:relative;overflow:hidden;cursor:pointer;}
.cat-card img{width:100%;aspect-ratio:4/5;object-fit:cover;transition:transform .5s ease;display:block;}
.cat-card:hover img{transform:scale(1.05);}
.cat-card::after{content:'';position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.5),transparent);}
.cat-label{position:absolute;bottom:1.5rem;left:1.5rem;color:#fff;font-size:.75rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;z-index:1;}
/* ── PRODUCTS ── */
.products{padding:4rem 5%;}
.product-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1.5rem;}
.prod-card{cursor:pointer;}
.prod-card-img{position:relative;overflow:hidden;background:var(--banner);}
.prod-card-img img{width:100%;aspect-ratio:1/1;object-fit:cover;transition:transform .5s ease;display:block;}
.prod-card:hover .prod-card-img img{transform:scale(1.05);}
.prod-card-info{padding:.75rem 0;}
.prod-cat{font-size:.65rem;font-weight:600;color:var(--brown);letter-spacing:.1em;text-transform:uppercase;display:block;margin-bottom:.3rem;}
.prod-card-info h3{font-family:var(--sans);font-size:.9rem;font-weight:500;margin-bottom:.2rem;transition:color .2s;}
.prod-card:hover .prod-card-info h3{color:var(--brown);}
.prod-card-info p{font-size:.85rem;color:var(--muted);}
.prod-skel{background:var(--banner);border-radius:2px;}
.prod-skel-img{width:100%;aspect-ratio:1/1;}
.prod-skel-line{height:.75rem;margin:.5rem 0;border-radius:2px;}
/* ── BANNER ── */
.editor-banner{padding:4rem 5%;}
.banner-container{background:var(--banner);display:grid;grid-template-columns:1fr 1fr;gap:4rem;padding:4rem;align-items:center;}
.banner-content h2{font-size:3rem;margin-bottom:1.5rem;line-height:1.2;}
.banner-content p{font-size:1rem;max-width:90%;}
.banner-image img{width:100%;aspect-ratio:16/9;object-fit:cover;}
.banner-caption{display:flex;justify-content:space-between;margin-top:1rem;font-size:.85rem;font-weight:500;}
.banner-caption span:last-child{color:var(--muted);}
.banner-cta{margin-top:2rem;}
/* ── CTA STRIP ── */
.cta-strip{padding:5rem 5%;text-align:center;}
.cta-strip h2{font-size:2.5rem;margin-bottom:1.5rem;}
/* ── RESPONSIVE ── */
@media(max-width:992px){
  .hero,.banner-container{grid-template-columns:1fr;gap:2rem;}
  .banner-container{padding:2rem;}
  .hero h1{font-size:3rem;}
  .category-grid{grid-template-columns:repeat(2,1fr);}
  .product-grid{grid-template-columns:repeat(2,1fr);}
}
@media(max-width:768px){
  .category-grid,.product-grid{grid-template-columns:1fr;}
  .banner-content h2{font-size:2rem;}
}
</style>
@endsection

@section('content')
<!-- HERO -->
<section class="hero fade-in">
  <div class="hero-content">
    <span class="subtitle">KOLEKSI MUSIM KEMARAU '26</span>
    <h1>Rumah<br>yang terasa<br>seperti pulang.</h1>
    <p>Benda keseharian yang dipilih dengan saksama, menghadirkan ruang yang tenang, hangat, dan menyatu dengan hidup Anda.</p>
    <a href="/products" class="btn">Jelajahi Koleksi &rarr;</a>
  </div>
  <div class="hero-image">
    <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=1000&auto=format&fit=crop" alt="Ruang tamu minimalis" loading="lazy">
  </div>
</section>

<!-- CATEGORIES -->
<section class="categories fade-in">
  <div class="section-header">
    <h2>Belanja berdasarkan ruang.</h2>
    <span class="section-label">TIGA SUASANA, SATU RUMAH.</span>
  </div>
  <div class="category-grid">
    <a href="/products" class="cat-card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0-kg9-Tw9srImrQvQCgRm2WTRp08T-bH6ZQzqPxEiHg&s=10" alt="Dapur" loading="lazy">
      <div class="cat-label">DAPUR</div>
    </a>
    <a href="/products" class="cat-card">
      <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&w=800&auto=format&fit=crop" alt="Ruang Keluarga" loading="lazy">
      <div class="cat-label">RUANG KELUARGA</div>
    </a>
    <a href="/products" class="cat-card">
      <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=800&auto=format&fit=crop" alt="Kamar Beristirahat" loading="lazy">
      <div class="cat-label">KAMAR BERISTIRAHAT</div>
    </a>
  </div>
</section>

<!-- PRODUCTS -->
<section class="products fade-in">
  <div class="section-header">
    <h2>Pilihan untuk ditinggali.</h2>
    <a href="/products" class="section-label">04 OBJEK TERPILIH</a>
  </div>
  <div class="product-grid">
    <a href="/products" class="prod-card">
      <div class="prod-card-img">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_shI6i7TLumNyXZoCxuyUkmKInkjPDCPOICTbq-6MCw&s=10" alt="Meja Belajar Stanova" loading="lazy">
      </div>
      <div class="prod-card-info">
        <span class="prod-cat">SEATING</span>
        <h3>Meja Belajar Stanova</h3>
        <p>Rp 3.480.000</p>
      </div>
    </a>
    <a href="/products" class="prod-card">
      <div class="prod-card-img">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6jw98UleeGCTIxQK-NAdo1hIDW7P5GZZcXBbmQN4sAQ&s" alt="Linen Throw Nara" loading="lazy">
      </div>
      <div class="prod-card-info">
        <span class="prod-cat">TEXTILE</span>
        <h3>Linen Throw Nara</h3>
        <p>Rp 680.000</p>
      </div>
    </a>
    <a href="/products" class="prod-card">
      <div class="prod-card-img">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUAQVVYgJRpFYdnKemf8ti8qEGZOjJ1LJmmPgYecX44g&s=10" alt="Lampu Tidur" loading="lazy">
      </div>
      <div class="prod-card-info">
        <span class="prod-cat">LIGHTING</span>
        <h3>Lampu Tidur</h3>
        <p>Rp 1.260.000</p>
      </div>
    </a>
    <a href="/products" class="prod-card">
      <div class="prod-card-img">
        <img src="data:image/jpeg;base64,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" alt="Vas Tanah Liat" loading="lazy">
      </div>
      <div class="prod-card-info">
        <span class="prod-cat">OBJECTS</span>
        <h3>Vas Tanah Liat</h3>
        <p>Rp 540.000</p>
      </div>
    </a>
  </div>
</section>

<!-- EDITOR'S PICK BANNER -->
<section class="editor-banner fade-in">
  <div class="banner-container">
    <div class="banner-content">
      <span class="subtitle">PILIHAN EDITOR</span>
      <h2>Satu objek, banyak momen.</h2>
      <p>Kursi Rotan Sofa dibuat untuk waktu yang berjalan lambat—membaca, beristirahat, atau sekadar duduk menikmati cahaya sore.</p>
      <div class="banner-cta"><a href="/products" class="btn btn-outline">Lihat Produk &rarr;</a></div>
    </div>
    <div class="banner-image">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe3ggBbr2GbCGGuP1JMejeq4XRQC9HSWpqUOTPV5zwbQ&s=10" alt="Kursi Rotan Sofa" loading="lazy">
      <div class="banner-caption">
        <span>Kursi Rotan Sofa</span>
        <span>Rp 2.480.000</span>
      </div>
    </div>
  </div>
</section>

<!-- CTA STRIP -->
<section class="cta-strip fade-in">
  <span class="subtitle">Mulai dari sini</span>
  <h2>Temukan benda untuk rumah Anda.</h2>
  <a href="/products" class="btn btn-dark" style="margin-top:1.5rem;display:inline-block">Lihat Semua Produk</a>
</section>
@endsection

@section('scripts')
<script>
// Landing page — konten static, tidak ada pemanggilan API
</script>
@endsection
