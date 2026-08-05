<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUMASELI — Curated Home Living</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Lora:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    
    <!-- INTERNAL CSS -->
    <style>
        /* --- Variables & Reset --- */
        :root {
            --bg-color: #F8F7F3;
            --text-main: #2A2A2A;
            --text-light: #7A7A7A;
            --accent-brown: #AF8B6E;
            --banner-bg: #EAE6DF;
            --footer-bg: #1A1A1A;
            --font-serif: 'Lora', serif;
            --font-sans: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: var(--font-sans);
            line-height: 1.6;
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* --- Typography --- */
        h1, h2 {
            font-family: var(--font-serif);
            font-weight: 400;
            color: var(--text-main);
        }

        .subtitle {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            color: var(--accent-brown);
            text-transform: uppercase;
            display: block;
            margin-bottom: 1.5rem;
        }

        /* --- Navigation --- */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 5%;
            background-color: var(--bg-color);
        }

        .logo {
            font-family: var(--font-serif);
            font-size: 1.5rem;
            letter-spacing: 0.05em;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-main);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .nav-icons {
            display: flex;
            gap: 1.5rem;
            cursor: pointer;
        }

        /* --- Hero Section --- */
        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            padding: 4rem 5%;
            align-items: center;
        }

        .hero h1 {
            font-size: 4rem;
            line-height: 1.1;
            margin-bottom: 2rem;
        }

        .hero p {
            font-size: 1rem;
            color: var(--text-main);
            margin-bottom: 2.5rem;
            max-width: 90%;
        }

        .btn {
            display: inline-block;
            background-color: var(--accent-brown);
            color: #fff;
            text-decoration: none;
            padding: 0.8rem 2rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            transition: opacity 0.3s ease;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .hero-image img {
            width: 100%;
            aspect-ratio: 4/5;
            object-fit: cover;
        }

        /* --- Categories Section --- */
        .categories {
            padding: 6rem 5%;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 2rem;
            border-bottom: 1px solid #E0DFD8;
            padding-bottom: 1rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
        }

        .section-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--accent-brown);
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .cat-card {
            position: relative;
            overflow: hidden;
        }

        .cat-card img {
            width: 100%;
            aspect-ratio: 4/5;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .cat-card:hover img {
            transform: scale(1.05);
        }

        .cat-label {
            position: absolute;
            bottom: 1.5rem;
            left: 1.5rem;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        /* --- Products Section --- */
        .products {
            padding: 4rem 5%;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .prod-card img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .prod-info .prod-cat {
            font-size: 0.65rem;
            font-weight: 600;
            color: var(--accent-brown);
            letter-spacing: 0.1em;
            text-transform: uppercase;
            display: block;
            margin-bottom: 0.3rem;
        }

        .prod-info h3 {
            font-family: var(--font-sans);
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.2rem;
        }

        .prod-info p {
            font-size: 0.85rem;
            color: var(--text-light);
        }

        /* --- Editor Banner Section --- */
        .editor-banner {
            padding: 4rem 5%;
        }

        .banner-container {
            background-color: var(--banner-bg);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            padding: 4rem;
            align-items: center;
        }

        .banner-content h2 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .banner-content p {
            font-size: 1rem;
            color: var(--text-main);
            max-width: 90%;
        }

        .banner-image {
            position: relative;
        }

        .banner-image img {
            width: 100%;
            aspect-ratio: 16/9;
            object-fit: cover;
        }

        .banner-caption {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .banner-caption span:last-child {
            color: var(--text-light);
        }

        /* --- Footer --- */
        footer {
            background-color: var(--footer-bg);
            color: #F8F7F3;
            padding: 4rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 4rem;
        }

        .footer-left h2 {
            color: #F8F7F3;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .footer-left p {
            font-size: 0.85rem;
            color: #A0A0A0;
        }

        .footer-right {
            display: flex;
            gap: 2rem;
        }

        .footer-feature {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
        }

        /* --- Animations & Responsiveness --- */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 992px) {
            .hero, .banner-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            .banner-container {
                padding: 2rem;
            }
            .hero h1 {
                font-size: 3rem;
            }
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            .category-grid, .product-grid {
                grid-template-columns: 1fr;
            }
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 2rem;
            }
        }
    </style>
</head>
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
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
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
                <p>Kursi Rattan Sora dibuat untuk waktu yang berjalan lambat—membaca, beristirahat, atau sekadar duduk menikmati cahaya sore.</p>
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

    <!-- INTERNAL JAVASCRIPT -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const fadeElements = document.querySelectorAll('.fade-in');

            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            fadeElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>
</html>