<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUMASELI — Curated Home Living</title>
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Lora:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">></head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="logo">RUMASELI</div>
        <ul class="nav-links">
            <li><a href="#">BARU</a></li>
            <li><a href="#">RUANG HIDUP</a></li>
            <li><a href="#">MEJA & MAKAN</a></li>
        </ul>
        <div class="nav-icons">
            <!-- Search Icon -->
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <!-- Cart Icon -->
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero fade-in">
        <div class="hero-content">
            <span class="subtitle">KOLEKSI MUSIM KEMARAU '26</span>
            <h1>Rumah<br>yang terasa<br>seperti pulang.</h1>
            <p>Benda keseharian yang dipilih dengan saksama, menghadirkan ruang yang tenang, hangat, dan menyatu dengan hidup Anda.</p>
            <a href="#" class="btn">SIGN IN &rarr;</a>
        </div>
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=1000&auto=format&fit=crop" alt="Ruang tamu minimalis">
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories fade-in">
        <div class="section-header">
            <h2>Belanja berdasarkan ruang.</h2>
            <span class="section-label">TIGA SUASANA, SATU RUMAH.</span>
        </div>
        <div class="category-grid">
            <div class="cat-card">
                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=800&auto=format&fit=crop" alt="Ruang Hidup">
                <div class="cat-label">RUANG HIDUP</div>
            </div>
            <div class="cat-card">
                <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&w=800&auto=format&fit=crop" alt="Meja & Makan">
                <div class="cat-label">MEJA & MAKAN</div>
            </div>
            <div class="cat-card">
                <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=800&auto=format&fit=crop" alt="Kamar Beristirahat">
                <div class="cat-label">KAMAR BERISTIRAHAT</div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products fade-in">
        <div class="section-header">
            <h2>Pilihan untuk ditinggali.</h2>
            <span class="section-label">04 OBJEK TERPILIH</span>
        </div>
        <div class="product-grid">
            <div class="prod-card">
                <img src="https://images.unsplash.com/photo-1592078615290-033ee584e267?q=80&w=600&auto=format&fit=crop" alt="Kursi Rattan">
                <div class="prod-info">
                    <span class="prod-cat">SEATING</span>
                    <h3>Kursi Rattan Sora</h3>
                    <p>Rp 2.480.000</p>
                </div>
            </div>
            <div class="prod-card">
                <img src="https://images.unsplash.com/photo-1616047006789-b7af5afb8c20?q=80&w=600&auto=format&fit=crop" alt="Linen Throw">
                <div class="prod-info">
                    <span class="prod-cat">TEXTILE</span>
                    <h3>Linen Throw Nara</h3>
                    <p>Rp 680.000</p>
                </div>
            </div>
            <div class="prod-card">
                <img src="https://images.unsplash.com/photo-1507149129528-662589e4ec30?q=80&w=600&auto=format&fit=crop" alt="Lampu Batu">
                <div class="prod-info">
                    <span class="prod-cat">LIGHTING</span>
                    <h3>Lampu Batu Nusa</h3>
                    <p>Rp 1.260.000</p>
                </div>
            </div>
            <div class="prod-card">
                <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?q=80&w=600&auto=format&fit=crop" alt="Vas Tanah">
                <div class="prod-info">
                    <span class="prod-cat">OBJECTS</span>
                    <h3>Vas Tanah Kala</h3>
                    <p>Rp 540.000</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Editor's Pick Banner -->
    <section class="editor-banner fade-in">
        <div class="banner-container">
            <div class="banner-content">
                <span class="subtitle">PILIHAN EDITOR</span>
                <h2>Satu objek, banyak momen.</h2>
                <p>Kursi Rattan Sora dibuat untuk waktu yang berjalan lambat—dibaca, beristirahat, atau sekadar duduk menikmati cahaya sore.</p>
            </div>
            <div class="banner-image">
                <img src="https://images.unsplash.com/photo-1592078615290-033ee584e267?q=80&w=800&auto=format&fit=crop" alt="Sofa melengkung">
                <div class="banner-caption">
                    <span>Kursi Rattan Sora</span>
                    <span>Rp 2.480.000</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-left">
            <h2>RUMASELI</h2>
            <p>Benda yang merawat ruang, dan waktu.</p>
        </div>
        <div class="footer-right">
            <div class="footer-feature">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                <span>Pengiriman aman</span>
            </div>
            <div class="footer-feature">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                <span>Dipilih dengan teliti</span>
            </div>
        </div>
    </footer>

<script src="{{ asset('script.js') }}"></script></body>
</html>