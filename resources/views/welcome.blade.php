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
            <li><a href="#">LIHAT SEMUA PRODUK</a></li>
            <!-- <li><a href="#">RUANG HIDUP</a></li>
            <li><a href="#">MEJA & MAKAN</a></li> -->
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
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0-kg9-Tw9srImrQvQCgRm2WTRp08T-bH6ZQzqPxEiHg&s=10" alt="Ruang Hidup">
                <div class="cat-label">DAPUR</div>
            </div>
            <div class="cat-card">
                <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&w=800&auto=format&fit=crop" alt="Meja & Makan">
                <div class="cat-label">RUANG KELUARGA</div>
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
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_shI6i7TLumNyXZoCxuyUkmKInkjPDCPOICTbq-6MCw&s=10" alt="Kursi Rattan">
                <div class="prod-info">
                    <span class="prod-cat">SEATING</span>
                    <h3>Meja Belajar Stanova</h3>
                    <p>Rp 3.480.000</p>
                </div>
            </div>
            <div class="prod-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6jw98UleeGCTIxQK-NAdo1hIDW7P5GZZcXBbmQN4sAQ&s" alt="Linen Throw">
                <div class="prod-info">
                    <span class="prod-cat">TEXTILE</span>
                    <h3>Linen Throw Nara</h3>
                    <p>Rp 680.000</p>
                </div>
            </div>
            <div class="prod-card">
                <img src="data:image/webp;base64,UklGRjA1AABXRUJQVlA4ICQ1AABw8gCdASpfAV8BPj0ejESiIaEiotEqEFAHiWVuVMDPM2oD0hT2xHSY3X9g/fVH3yr5mfXdJfDI6I/vecf1J50/+p68f696QHlt+xb91/U/+5fqs/+L1//3P0af8B12X969W7znf/d+4XxV/3Dzx832889mj5710GIO077op8O2n9g8RF6PzI9A6/Lwm+1/Rh/5vHG+3/+L2CP6X/h/WQ/5fMP+3+ov0wv3gFwH4f2kkIudw6jzTlnvcxz8zV9GX3WXQTxBABoPJrOdF4dBtGhGWm60IyxLAJwtj4WKfYFavaBOZozAIv9FzRL0uzblh9YNhbbyVqEdOuPRN4/p0n+vQ14ytHcwooqElDktMhnxobCsbDk6V9K5Ku0UBsKENMGeRQM2ekqTX7Fq+Adstmx01iNKea9PuksiZhjTQtZfIaY0g2WACPN0lixLznvjH1faaz/zW5i7fGoXl/RTE0UdMfBgqtcKrXk5xhVEGy5fbL1x9CtMeRFjqBcysp4HdiJfDQnLw2pZZFZ6ZTlWTouxVI9Eotf+ZimnHENA4K0nE423sXT8TlLNoyhVEbROAaaaDMsfQMlCVr8zZ+xc1KT8QfwaDfpDmywgYDZ8odgCoPlSEoCgCj/JWi9qc7rb/x6/E5WgV2rSP1b77da5TTp83Jd19aLY7WhPa6FFXxDRE3X2dYXhpnC2EuWtBUgC10LI2nG4ApXOaUcUmZjVYx9pjGDSZlyd71ImJMPymixe6c0d4MtPcYwM2vcf81WHCbkMYXTECiJkmgPTV66L00m4eQAMmpkr+7AVvzugVs6EXl3sarS5oQMmocdd3Js7DO2AHugS3ZOX336R59AUyBfhDNHudOSC7DiaWm01Nc1KYSHCCKf/VQiRi1w3x2/aHhmZHVrNdo91WFKfgc7HH674V3yN+2mNQLZKW42ohGGE6eQwHwoFZGEXG6pCV5UeCk0ByDgvMSkLQMejnvS8/zcy0bTCWt/GHtD1h3e24hK9ZkDWbE/05N/r9d2nsUAgcm8rWJEq3SOsZ0eZkGIHYbYLY/7AdlAnGpmuXtlikzCYXPomxEUelDuYtLxdcd4LfbxU1mP6V57bHfqYzVGffSVCJcGvVyl3vVfP6XeW8eCh4aCnq9/6KB+Gln5EBn/klWAplv3j/0S+GxHBFywR63ozS5jq7xOaYFSEdVkge8VpxlwbTAYJH9bgUIuCfvtortECjb0+44LygX2El458ahdRfPHcMAkPIh82dfmR27Nh0dMXhYRhkaJ+gj1WPs5eBelgMZXsUsgT6CFZTCjLmbYtQIcMiH/HWAMVdDlvH/6RffwrWCBLIuNq/6PqoGlBLhp2P1mHP4WC2O2AvLXOFfr/anR4pOSsFH+F0lRCNCQOCa4jJLhSyHp7hcDzpsbHhewI6/qIdRRtaXLScVxncgqpa+ZB+mGicElUEtKhibH5vTnrNL8MO9NU8PpL2cVa+xZSjmjc3Ht3DR/gWL9KXEd04jsAvumr1RpVt8uUfsZ4yvVFSw+Ku/MJWZkMX4+90gNQn6A6dsqdXjGmajwAhJ29rKhamaMo0MgU/6IuZ8xJAG/bKcePMJINoOexxTmNZBJKtKwcAnC4nzHydzN0aQUtqWogEWhSWbOhG3J1dHkmPz88bOX62wpBxACDl+unZhLKTp4S47YRw+ZaFm9z/Koj/lCFwKXdn1nKLkuUgdzWDsesGyZ5AJH6F0AIFYtTwUBl9eD06pazanxuNkfpg2UEjM6sJ2/9pI++BlJAc48yqsGWYVeJsMJEBld9l6gXtDVVfNF59B8pketHrV813xKO4ATzuYQxPTe6MAmNAnXbj0VKMUU3luX6uf7J8PEwbvulYF5PyQvmpRJUHMyX+OXGp7X/8xvhvrq+cJl2Xt3hxk+ELRekqYo08gy1AF+a9qZUXl+JyY+SAJlpCyuo5P9RFio8kCpyAn9SLhM85FML5CXs5wHsGKEleoPazv9WZmgSu2UbXlVuvjDgHxTvoYssZsXoJ9Uw7pckHm6zUNtL9b4I7S09j7nnopLWJWQo9riblxt1idbxAWQaEVKsWGrftAPIayEnt8k9Pf3uhLKhnrasokA9bdlrffhJ8Ofg/7Uy/SIS9hxmgvnPDe/zc1iYsK5O+6ekw6OwU8WJti/1WGvRlGBjPN7m3TDy5oyeGGplo0iCBM7mXBpsq7Gb/G7BZsFg+kCSyIZqHq462aYObGz4qLGQIsQAeM7vqFIMvdMp7a9bfgviTq9g6WPc9f26zc1p+Wheo4gFwn4ye4Eulz/30pHQ2eXL5KT1U6JMtEivK6l0pfLrQI0dyUrGI4lUow2osSAcVEv7X298GFsXjZ3MaVZE7J1v4is5rPItfuWHr10oCHoIbU3x1QAtcGYZyJKmzQRzikgh371DNqR3gTc+lqztBC6KS4KEVAXh6qgS9qBZjdC+/SoVcl1lz014HL4rD1nD0YTCyLyr+rQ24QTLFukjKrERY0BGQ3cdrlx6WZ1e4mXCFBQM6G4ldoVEADQbM8sw+u99bo3KXV1Wz/+wC+yYn//+58x/n4ysuOMpvvYJbLFkja4vk21d1ntT3/mrEtoy08kqAWQAAP7/zGLw5+ntPRwGCfZPP3/vn31NtdK3S0t2GhRCM0UlpbEshm7xtj+UfU5GqQaww/hgbwuR4xF5z/39uHHJWbN9yDyTn6yJVeWtwQwoaur4k9T9aN42g6xdO1czj6tLwy1qUqdxezPnwqOHM9p1X+X53BWFteZJ9dTMAz8SfgavkNjqtwUylFBClcBqidBdfMsSKgBr3gU0E7fe08OFi3aCn5QAVbSB8KRPIF4KfrWQ/oKJ2qcYvb7k5XWRddSZEe039v/2K9v5qf/EkH8NZCjtT5BvAqso2TYObu+dG1Is1XmalxEBzuTMSgFBO9miOqbLSMMdtvyCYW8WqwMa+ecVxcXKxGvt0yTmA20r4f8vUjO/umjZm70y28rnTmypt1kyU0MorBM1ZPCliZ59TMP5Q4XNOZT2q49timE644Jc6vPG7UScz1dcccY0D+W4jkdBp2G+EzMNcKH2C3MbLMjJtS3aKQm2lSAm0qEagKehvoY7KFcnUCOnCf2E/PGGuwPr6DQOhny2B7DKNX2xTqNF+qvMtZQOsxg00O7xm0n65MgouWMav5m/xW/KFamqAl5BsDz4ABXHrEjEA/2E2NEK0BNTDk2n4pAj/SXvwEfegJDNxPN97CvDB3+AUGMO68LFV23nOTgdAY3c0YZz99Xjxb8WvdNCfrN9DylbYGk28bcLCJFdnSIARfY7KOJBiI+YyvC4Dt5AjSY1vXlatT085+TvUvc8gjweMNAYbRSt2ymGPp5plVxyIK4D8yhVXL2+xmHsL1lk7BDymfDoW8H1ywbmt9O5uAVjQpUH1tvSE01ga65uMxBC+cY9Oytkpp6xVaCrwdcQR776Af6lklSz/REzS9aDV+fc0gNd6DgOuzEaE02SA4nZ76DRA+gnbR2lKDlHG8/ACcFKif+I3GsBMvw0upoFVTSTHBdUuB5BfoEUzQnZd4yDbSrjr7Qy5TGLVZfqdDiFY596tWdnnsYGgnHtkNn0QmFacjnB4NoGdjvaO5qwfE1ZPxakQ6f/qbfpmt99xFQRsMgwhKSylT4I7StHhPsD/u7rfochM3XBdP2DRmXuxnXp4G+lzs/4kupqpmu4Ugnyt4ki93V2mAXueIK8GRYcUnQRALUCco6rWKkNsWGQx1EBUDxG/YnVS6tKp9ashZhDsC/SiPXBX27gAvHJrM6NYla35UPlmoL4ADOxNCGA+r4v7kyDlj1hMWggQ+3YKCsmlEmh9GRLBMr1oCU2IGpDvDUAtD30mOb2ip3sWCsol3DKnIlhNgXyjbL8b8lB9yFw6zZnU2MlQeGmjFey2Srj7vHS0mCmANUUruxfO586YSldJh8Uqzt6xmq1VFINovSng7WiPOTIfi7vofksfKHe88J0Ld0SqNRe7XtEe+7FJ5FB0QMKPjskh50oUc20ctNMyVSjgQXLl4BXBAdLEkfoIhqGNiUMTWrUoJzZYkV2EXxIpQq4uc5BzU4xYakfWJpLQ6iOCD/09PsfZhh7sXCEjWvZBujflHqGkvSpNdOUhJA0oCRihcObD0qTtT6L4KYMfjj3fdSioGktKuDesAmsFaRqeTaHQzLNwuiL13xnksz3NbBtoOnkdBMPFWEjVB9YYR6GE6Z/aFvM8JHZ4CFTZyJr8wgMOyYGC2FrPkC9p7HsMLq8EYUII9k7FzP7Wt/17d16Am3ai97aMePt5Hwkafr4KMoG9kF1IRNsH6jtyIIIHeQ7kcA1di5N/lCBDXAgt3keh9c8sgDVGc1pR8BMdvolp31R8TNaZVp93y385aJz8WKhC11CYCjv6qB9adnwp4s6NDrlSmhlVCn+LYFHu23OP01/HTnX/VcR3e1mgUN9zCO4IXDGJkJbv3trbY/Ghn24EVFoFKT64niXTDBcApIu37n9/wN/bAHzYhW5MUueMoXI4OxXGIo0iyE5PF5v+NleWz8m1qBKgrXFU1aPGhg4f687FroldT76R2QxMkFzyeWjDUjwIzCg1LIl2R6y50UTb/a1IRnOebvJScUrfwuF5rwzwi9flAbe+woSaUeM/xammIFyFPEm2X1vG+kqJrjS5zP9zHCEeLpOA0KQwMarz9ddKVhl6kbC0klzJTdcdpDy40dLoBP6Lw8nP+bKFZjW9AwMvj1CEW7ZayaIexst6yL6Xdst22AcylTKmzw8DmIm1XFfXh1OQaRMZFxRI7+KOtNiQT/I5IoHRiA8iBuox2CIYokE/XRtHnMWgLzSW2NGnNgYJBXCV5wgZZMMLPWDTHCjsYIrXgpWo55QRZ0Nqf0qybYY6SL3m6ztYesjZ5Wx1EG2haBooHNMWRlVS3eoRZj4AZZZ1wIg4RihCcYg+ilN0NqXm+pTPdlnv+DfLlbk0D7WsOuWDO7iOFBSwELlfPGhVayba4MGttTVDHymp20IeEkPORM2R9cjX1V5TagRJHNlPZ0/zVe7FKCxa+VynxUxUeVUxvil96yiNLJneeUqQtaAkPD9cmiA4qfzxpB4obXBJeTaQqHKYvNl6CqXTxrUjv61xw8uCd8XhoQTxTev6hgINqxsxCLzBhgMeSFmoVTGtrHtUu365wBS7Iu6a+GeeKPn6eI/8Jq4hpPXl58u36za3JlYbYXqS3HnWu+Kwq2iLilxO5R9ms1bwwFkGiLTS/jzW0xACXp97y4neuZrmzIMlxJs8DczFNMfkDv5JaylxSLoZ3wgFqAt0pqrig/hwN5SBzAF9pp5NllZhr+v1DMG0bgmsI4eSUgbegvCct9PGN2U40CdTaJOp+SfFf2y3yU6W3QLV/oblFIuDxNA+VGAPXJogeHNWoZ1JNRBjUXkkgQzUz8JdbpxuJoDdAochmdZFvR0k/4J/YDLmR7IU2N+0OmS/UuzEO4o/ae/ezTS9fTPdcE8IodF+p5DPGJj0gUofLunIfT786uRHYJqZyZx0AwcbaD+yjXyW/XBEOcmHnJ30ivxtjVMFtjAE1bf9u5WaArnjmmR320AxYb8LbcWEdyrSz/+H+f0gl5TPcnfTcj1uLo0q5RbkRT4mmTaSImFXFmTUx/rREJ7bBXSC1DmR/KsetRjSo5GRf6Y20vd5TvTcaxO5hz+1VXnUIl9cJNm5oYD/3WnEaCobzpbx3bFJnK4/3L1IuldMSPh24xuST+ltsLAASgKFbFjeozeZTGNU0vTI+M31R2BN4Y2WrEiHJmWLh5+ntN/cn0VZZA0EsDRY5ZANwsgCez8w2C5tCmkinFqzqHVwAAgFoLG85esmI+TcontWdSkLf4NGxGeWfF/eYdxlG3qjEFenDFMqi8eqlAkNVTvn6xkf0yM9nyDYkosfs6SgU3KAuqZfuY91e7TgtM4bvEwN7hAedZi2rm4UBLpRbeG8CmTHuWF49nYpU1PMGT8SlfQ4FCP6suLYBBGbOBYM9GIoB0575qSU8BanaD8pfRow5dPvSTiE4H1atVc/uWbFyWez/aasiYD+DpdCbX3NpBsZv5Z+owmVrXLneD5JTGYSMAzP7G0q80I9afjVor1qpsPVoHtTXV1Azn0minxQMpoY9iz44wPauFFUNNpcdmgLdLo6z5yxGFfD8d9xzvc/PwD2RWq1BT77KPjKFqywODXnF2EqtUIZ3i7Y/GBn5G5ICOz81uYak+teGlodhv9z4osetWIjI+Tlh9kzr4PvwKpYQnNGZVEZ7Y9uGrTIfv3CLrbdF8ckkqHp8LoQFmm2wA0FuGV2q7oSutNyhAZ/k3FwDCao5Krycb8XagqoLYFHvpI2UyIRYbR/IbvPMPZCegbZ9riYklgmkzdX+Fm0Cj4ir4coxnIMRwJtSkEvxcCHYsgj2caAxNza0P4B3WKNI+DKuViELEuEdu4tPDXOa9w3SXicaWM7YtBOy5qSbFu/U/wgdw1v0R9JUIpDVQUiy10Mi8qKlJjUGtzjKCcbX8AD1DwwT+91sGHgUsiye+ad7NM5fWavCK7tThofLQi7G4dypjIqaNw7JekpG/8UIGYRSKOcfDLxM6l7UW/auR6YYn+vhMEqE5tEUkgUV2wXBEUmUTiybfvfWqJKAuEb4T611XG6PctOJ6qlAJ+pdik5ntMJutbNnzlBIdKgEifTylI17IgW7tNkOxVHeYBI/2JalqN6N551LADuFXHBSpTFBEoXAWPaTCc0Xf1huR7QappG1IdY8qiFaRrQG+9s+soVEKPX8pDz4OwrGH4/1neUNOOcupshGuCFHwA3d71lHnqsQKl2VRQ/7+hoi8M27SAMVti3YJQpvyDM/hoXVYDQt11biPN83Aq7+d8GIpnerEWhBep95DGGxHNRWyzH0NrmyQRBjZ7EWLExvojVKC8dmN4EodfZeldLfmIO8RD1cc9w+EO/lxHFUXe04jsVpNlALM2G4W1Os86kwC4iCOqHz6aG5kO/SWhioQbQV/WIWUpcnegDDpQN4DCOlSMqo//iH/zMW1FxqE0BbbFDHDSsXXgX/3jm/QyMrKUs1pXUbxXaNIBnzQaihD83xw82lm5GTARU8WSqvmwsvyx/mosQ6exSpoQG4t19mCQTG8044qN0yHH4pQEQAbsIJxm+dIyAVsNMPU70qRHoMj3Ut0iT10ea+D1ui0seywzFz44Udn1esr3ZrVa6T9tDdwu5qZzq6XRUXasS6cI9Eb4GhdO7jTOAl4aeKq04OeOqfSKg+UMGDo3e7pWLhU6vEUBcjepG909N4XX/6qC8/jQ+f86E/He7EEb8baODBOnDcJJ7nKhRPXdVOORTDqyIsHKIzDKzdAbY45yTC2Wun3XlKa+HqoFQP0q+0KW0YLx03iDjF75W0Tf6VPXgQVaSJOkhSoVaytryHk0ff9Xv2qKfkZZtlT9I6ZJ8mBOUr3dnrKNnE+C1Ct8F9yb8mTwiHQAEYD7riEby/YS1hjXJUp4XtlirOe5/ftlPymRCOc1xNs4vUoHn951U/jUImWD9/dBTT8LupmoL2S5CE0kYwHra2RVfoITY+WcVNrYZ9+mg/M+dgZ2M5WnPHksOTWzNSCuHB6Go0KZkNP3HyLO8DhVR+R9xFAa/VglXP0liEdWWkQob2FbmBvHV/+DxmB+YHqJHnyJv84Os7PBR5sALQn6RnLqmX3tgQYK5NEeDsNwTq9dad8F1Wv0zGxk3FM4bcaDEgrbJ8st+p4dXAMS083XkOKZ2zVSnn8Z2OFzcMFH+vfzlcOFiae6oTP2wq5EIzPLLTBXs8GEI6RSCh+vh1A90QU1//lKHRS3RmNHkHgx++ilDgsWLkWWT5lHzrZ2i6ilsH8PVbqddUBrJBKyejQnoQBCBNFRJOvqM8xY+D7VUj+ZAW+w4kFaYkoXuroFfW6nSArLIiQZBhhQytvu8TKj3DE2lBAfIJE/zR/XQmfx18zoFfvRltz17R8bOPr4Bw1a7pegWHKB/MNRk5ikWDoa18wfO/zjDs1EL0xY4sySNF/lFjHgA1+VkTl6k+aY/ojQ/FHlOjKjasndgG0a4N8V7z32l6lK6A+Xg4LrGHZ28eDgRiFwsrTp/j4M2Fl6qn0d9IAfWqYYSRfrZrLuxQljVw1zLhcOCdtjLdORgn89SgqR9/IuE7dkBApJTYx3L2XpFFdzAKjI70pDC3NZFuqQGy1TU8iQq6wP22S/CHZClOnvKU7rUiAUweRbJe1LM3vB/vaFxr2ndzuHgpnjyoIaRTa9Nlvn5sN2/La79KiT2Apv3OMfiPrFnUwCtUrtxmrBm/yiZ1P2dB1VHXosM6y7vwXjlUXoe3H/KcNJIcS9ZF77Cw5Vft8vw7ry3lOlqsZAdg7+7VAXqyVG/qKYXEY4WRe7c+ZVPJUr3DaW+aSeBau1q6GDLFu5ioqOuCWJoBwG/beLyTdJdMMrP2WkY0zylWSdlHr1BCLYbMx8wt1XV/SlfLdhH6+CsmviJnKZBdaJkk3qfvzlfmMucqYzrCf+h3ZW0z67wXWPXYxAeP8B5+RpH7xZOfJWOUBd5abAhOYMjV/NNJz3bOJnnLZzjS9U1d3Ex8AHB5VmKoHR9mgLPb5ZOwdTyR4guph5C42th+ypDGHuPuyZc689N5QlT5Tt8087WWCBb2M84quegrM+jQw5Xniz2MrDw+dJ1r3kZR2SXgpPuZa90JP5hA7vLAgVs5RHGeJVE68A5Ol2MDu85oZ0599XPlQVj/AqWBOKZc0xBT4YDFKFks1oOJCL8BDFG+7aYjU2woXzuY8TfOwW2aUwJF1OTwwtZxvD0C89wYdmkznvCYDCuxA+nB7+pM3OAHUBvtZ7/qfSjRQhUJzp50h9gurXIDfA8CyVqwz+6J3iFpDHiPVNuzTmWzvWm3L0vTytHlS71UlaC4QiLdymMY/625Vp/yH6s6UyUEa8A148wqJi7I2MyHm+AONrNnp20EaRxsCK0zex5CQSpOsk2XWDa6UCzcrUGzFrYPgkZbMaujJ9Oor9FzphfFlhVqjpjNcF/SjSxgqCDt+rvdnyxHqe2StoQMeoqRdcct3uGmHanvjllPE3ON+TdTlJ8XitO2suftnJhJPNTi0BrXZyLnzXMO45WFReDtCpsvBZcodzxO5MSdCwBjFfP0hZWCvxPOkxSKM8mW8CuOdaSZ36zBLi3YxQl+KN2x7XgTn8pMMdGL0/HciYjHn+jJkuGAvuV/MIjoEAU7yxr0Y2Ehca/VjR3nIjJA2GBWsNqaDZpz74j5iGiI/lSRUZSp8ffH9jyAN+ZMUQJbb7sOh9C6hiare7/6PsVdRvJ528lEPsUFGCeKn7s/XfTU3mwWIuqFu2gm/8dhlPAxLHHyztG5oRsJuzF85ebVEhYDKdj+oPosCMMKtKldIvlPSeVfdC+Ujcl4YtvlnSMNKTmBTnvSsRtBi1Q8foeI++IZkBvE0g7EMPftM0aWkp6gy495oeBmQY8FdiWTbuNIailFwzRxBIiEsbI4qOZtysErX+/IYE4czTWP/dsF06oTLwfffxpc5LgT8j9CiKRY8jVtCJrnDDi1IjBtQhRNzyU9BIpOsZc5uOt85CUx6FuK4UtBefzC2Xnzx5ocigkT/34QMypCzaeIBVtgnHoUpP0QJsBle/LrxYoo92fmrkByeYAXsat5JMJWogxGVHZeIO+h+0Z40QDn5JeDSPHQgGcqwqTaSs4Maad8LPkLP/TBbWTLHV2Q97ExLB54vA9OREaXa4BCSSks10dlReRbfUdPHjur0vbtuwb0iqbTavJr3ZwCYpPl/Oh4ggtj5a1bNFYFqTxh2QH2lgchW/7yJDsIPIbfYljKEryVEYBv015ssqTTRq9YOZ+ptqckGbovRM5rPepvlgkBh2UPbtM24eg/xbTDtdcSUf3CQJgW0/BWEYzzJW++rZfpHC2iryRWLcUcBUz18YL5AEh1LJOAbRj8xxhWk0NxUXgY5s1+Mdk4LD6zmF5jCqQjxy0Sd+ZBdNpJOlxRvhbdIfRBIMIz+fIHIoFOQC4S0osgVLqjurfPukgdIG5O53agQ3JpfMFbGPaDLPba3AlfHdUR/6Mgd/l2zw3OTi1LlOw7nXGNXIV11gL2LD8FxF1Uz4ErjY2stQmBHFfqbCDGpB2qp6YzA3HPXQ1z1lIYrA8y517yoMpIiTT4pJLe1Eo4YyiF/PI8kL+JSOa2Cagm388QW3wlH+P0dthpp2/WlBjL3rChyA/VjpExjfgeNUj+vIM/fteGha9UmTmrrSzufjCldUegJd+BjbMpBWjZg4303irWxnHkIHbFm51xJQmgm37WcZXczpoasVZMCReRPREFfiUmccqw7R05lIh26RyxxShoXLOtNbAHbWi1XQGW0GpaTlUFdFPvbwbKuFhxKx6OzW+QhWEqP6ch8yBqRUP3r3AhOozvXmBtyZkyLfFsBDOQzfvelov/HDyziWOCdNmh82IPmqXT+OvdVWz9cU2amDV+NCMnbWNIujZGtA8yUE9FZg32OY+2AEDL5q/PYTUs4aClYgJUk992LG3EiaW7jr/MQP1UdgUo+ZOr2WC/7WJWGV01Qjs1wnQME9XK9j3l9ywvWgVUOdbeQMV6/dSYjmG3/4guXivTF+9zzOtiVyHQlrBIeaK+pwpcIwXM5NkHJYRY329DhT61Kp0wE9g8hLI6nmXClLw70L72sQWqYHKChFJ85yQJdrn1nDNbMKNTE4hg+TX2VvW/d0GASrTQwSwwtLxoEPzYCX+Od81xXSqn929bcApUtHsHhm1W8F730/Ut4/f3ZOKEyqMQPf8Sf2vKS/Knk0yv0ZrRozr/RHnNd9N3/Jh6JpfXIMymzMjAQCd/kf+wzdifIZZyWCgAQeYrWajpb8bqA1OuiW3oK/mvI0F7iGNZ5BFQNh2Kzla8JxmQRC6/T8l+aPg8c2VTkLwdfDEwLIRrV+zvccClVVBN+nZN09cWBGeRBGn1tWU9r/pxYU0QtNm2Zl4QDCOINV6cyS2EXi6ViYX/Ax1sBMIczP981zqed2peSUyYpT+cIKFULdHHB0NhE7ESyJO3S0hrlszp82ERGdfmMmOAZnspp3YtXqOGlycAAtXtgqGJh+/YCi1JoqTG+eR/zu6VbopEfZUZE4Qcw+mY0dWIng2gvGPirafSMRhNerxAI6/LizFroL1yeIK8zxrPx6fmRexTNgMPJPWtiRwwshbEpuX9Pfj3kmsixk1KxISkmX2CXigF3W/QLbJJQvL0Aes1C3G3TLWVPGOHqOf0WhW3Up94EA2g5GTOW4qKGt7lKBfCy0R0DWmbUm00IFOsi2UJM15d/cBm5DfP5fOsRbSGRxSkrqKJtDm5h66mX0iTF2j6sd83GzsdTYTLxKo7M2Wqn6ZdBDkBSgLlIHd5Cvh/bTo2MfjI9lSCzIEZ1VSzWwgiPQFmR2BHN2jrzIMZPz2zxjvXH3COxPacyKpLrj5YCaMFf9vQDOW93L0BbTEatR8vmAYrmVsQJIvOyLVTZHO5vTq5U1BeLKDt8fYnRE0WRNwQhVn7POUdNMFTOwnXvBnpuEXvHVEvgJej/2/onF6xim3G5nJNOvxaef9aq0od4vz+4ybse0ftwwzkwE6UAPOy8R6XF6xGCY/tT2jnWbPvaqUz34bQU2kVesjnWkEhZ+3YW/MMX1v7QDni2A4iltD0JQqNv4sQBACM+J51bZHQq0Ei5rw2zvq1TyLP9nD2aKb1CbZNN6iyYhBJlSZ9ryPTG1z/7jiD9ZORUtuxHMWtAwqfk0KjtFiPaDyu8QjNlFjefw++eKgaMaBaCusJfZGNoQR0HM+hfQnB+ygA3INBhR+nOSVii5p7x8TSz4cpedKGQwd+zCq/bHn9ELx6wjS4VmvGu1zMYJtESjeTsHRtXiAewQPJP+sTV8Fzx0e2K5+r9DrD6Zi3ceHxmcOj9gNScD7qZJaMcvF0Hv1fnyCSfnF1Mzsqx0nJFDf3x2w+0WJ/AMW3yg5wgo2jLSy5QAleSgYcwnrS0txQzpkzHuSmRl5ssDPelx1853MzdAS6WX+bcJZ4JxK11GHOq7VF/GgHPWrgJmcztk2cP2gebtQEKslNWEqgjOdncYdln86/fo56b0mWe7UlGKF9e9XWvzUA0Bu3CMdiNRD2AUripdFKq6q7jLvtr0ooAcK/0ZtxGOebfl9XLai+LeXtIrnGGQXD8s7zpqvQWumGZvnJZEkgFNbxfMPa8RyEEQ6ILYkWduOcjRRNZ90URj3kYIIpIPxLm+Q6Eu/U6CwPPMMVAMRrVM0K6E7rHBffF0pJtAvh6F+6MyMGBiuu//d+bwfelSG0jItr+Mkl+16QTdayFg2PQzzKLgtzlAGPaUakbdmxtzXMb2Ol79RYQC/NUYCMZLbGTlzWQMN+LpAdtb2E3PrdtGo5+3eBzyk6EL4By9YzjF2l2n6C2v9adTIwNEYo11D7WpjHj3W9T1GroDJIAHPiK47SuAzuwWHc8Yf6NcHw+1cStYSp2X7EWsgkYp6BYCDSghcLLP5MTgGeE52BJFsYQirh3IhfBMtilSzby+PmV2Vy3u3CDtgbQt2CBAdK3RwxBJDLRBJgd4SKzA7PqkArokkmYOl0g6Gs3wB7tNIiYhbZY1P28eYmkHliRv+3sf9RhGUebOO1ka51DGGbIBLADcVZTC5rfKir9x7vXRUmBi3YK/PjCuxoXYc4XgUAWrf87jWYgSTfhDWSZeP4qD7Sln6feq1kbEubm0pWgfeKgie8VFw08xaY+m2ZaBonQenV/eAq9aw5HUB8So5/3W0FEt7oTPqoRUkQal4smYCqw3Lt2l7kzaE4cdS8ENx5WoZ20CaQaClf1ti2MDLJHjebkQ1/z6il7skLPqe2LGolKjrVp0KDcnynNRvdH2bVxU5a3qsuVtMZrnifKGeXSQRzksPdd1XivZmGXDmCkbBvX/mNomzKok3n3ASwwHWbQ2kEFQ+HkzPV8up/PyYkYzNuIAAiYzDL+u3tt2oV4x2tnZSISZa+4/YmtQReabRDksT8DTWVQjyaq84nMPjqLMiiqClY9iiPKxR+8EOh/rybURHq3ato6MvHCdBm2WElmPeJoiPLSWCMXXxBaVKDZ0aKjt/4c/IdOvEtCFAFuVPc0bAW/8hZJlI2+rJisnFuI7nr29foAqTaycLsn3Me6c+05Em4KQAoz/IxyqkdV59A0mcgW3rl1DmdHYQ+xJ9zAoeF9oIqDSdfmVkKvPveKtX0Ob1HGkWRWovJFvYqO/VyPalyR2iDKya3QkD1XElzvlD3aj4iWpf2jNowfqpKdtukMwDweugoveeC2U7POoquNBnT90rR5kzKkHnhdj1lh2x7vBX/sXU/AJ/AdtRB++CinQjjTba5Ni9uPdN66/GO5tAnocDnqi0BWe7lpAfo72SjLRHTxh+iaXA8in/fpiJGU0brd2N4veujMfbeU9JHUqX4JFTFgsKmSf9ygKx/e+7P+C5Pml2nAa9DpaPS9pgvBinU0ls8Wt7qwY1w19Ls9QeDO355FCXUtAYKMnNzPqIilZyEBtFhdxtQLvpov+/Dw3liXYav7G4Jmj5jRWt2dH5EajpzhtydZu1MZbK//RlagQfFtatRLC2GKn/TkHFdHCrQBIr45qH0HzBoUpSA612ZmR29Rhz4EhOyGriSVRq6QH2znYQihsVxTGbhRsSnHZ/saUtIQuqeqp+pazEByllHyUXytKLTZfIuAVClfh0+5nThGGunECiZhTqFF+taHoFpHEnRutbpnN3Fzs04JER4Ztf2nFEZjUd+7iQ2iMokDeObqI2OBE/ILtk05idyfN0rqHVApvnI5cp5bCUxB780Qfsk+M7S7hhm3EgCWzRNulzsC/6WVGhid7IUQje3s6AMcM23+SfKU8k8PnlYIO6GK9+Eoh+1jAGJqYrgTYPN3qiOt8O+GEdQo5Q1+swIGFV/FizkWY+9yT2ayS+fnEWxvWR3s7cZOzzSJd65nyL4qaOwIsyrFh3rawcbwyXEWgxvNA4Q21o6L0TxeVD69L+3qY2mbjf166tZxi88fZz3G+yOPb9xI6rprOSnJvPNxdYUzbH2rEhryPEJOOm/14Nqp9hsOcrL4h2fNwAJmqEstURgKS+FJ8vAsbBQJv95PLya1zMPEVtzdbzHV2DOfT+PVLlSv7oqr32goJmJtKmE6eZ5yOgFBSpr8zmZef62K/E4nGFzRSVljH2vgwbIX2rnVpbYBGAaQiiEqjYatUk7+PR4JQArQv9fnuSBL9l6Mq8A8t1EuoL+r1+JDKmBDp4GAFi981s0aYoT43mxI5UW60iPf+/jezjWYAh+5FlN/6gWHvtu0SUhE6dMLduBGjjBKE2FUyCZ5Kkep/VZfyYN3jaY/zZQwfMu4Ptb9B4OSzJy6tKtpOWcZYv8l6zmWsQvdZ/W/wUg1YR6h5pIB/JNPdyIwJsKx/vfvnKZqKVhNzb8m4+Yg9G4EIhSN5SiR2FvAgRKM4DiGvjwoPafyhmo/vjKWfFN/lJFDyuNP6Tx/lYlHRsWqYaGGqMf8Tf7ROHJJ1LcV64uOTfqkh2lmz7jYFdvI8YSuk93WKeFwWDHA6vgqhhbEl5h09vIDHBWnjw55cDVf8VOGVyYouc7JzGOgHYcASc1a5jlbqW7xGlmEO7fT6MdiOhb1VMf1dfSc2nDhqHE5oYXpboSFIZpLNdhkJrGKr6Q+S2KEvzxoTUnc1PGvyTy2Le6eiI6eGh79jIkXnK8DXEQXoogjcTusLzfdtbHAivThraqk+z1BUy4LDliR9Kg4gwulf+AAEvaDWDO9OWp4aEj6r0mWBoB55jNy3fmTgdvFqWT/WLa1A+FEBqFl5/JeGbCEbbIPz9DDW397Wjd+N8MbiUniSPXqc45sw/ZoiPw6t2vD3rilm48qTVzQh6cJJyKheIOlJo0YSFSA0SLBmrzhzJLsi7xTf862oh6SSoxe8tklO0H8lufv6Cc/dfe9/gt+FHZbP6OBkVj86kFYPyqG5wqAzDzZX1kUVNv3GZWrUh85WLlJj1tV7G1SsHdZ8bDzk2YwMzWodC/5a/FMCx8lU1mHP3JWU6CYu8PLLXbq/Q3Wsu3ELc806SfsazhY6pqeUjbm/P6TpE20sLJdtGqD7XtTABcXqmUrYVGytg1T9y9kSBrtyzMJm5z2Hspgw6ENATKEhwAZ3IjU0lzHSYSpZLgVzrThupmLmQJg1TsGwwIp/CRzuo6rhGIsI/v5ukM1DBUp3ln5bigjWH/lgMpY5GXWt0DiBWhTjtMj6+RmjPDIav00hiclfRLCaFDf24VmczBPzegCtIUIT7aK0SX1e34rVzKo035U3OhgXnXxkjkLrvCfJtCDC1UdAJvABskfiTq54RW+Rpvu9Xc9kbY3Wf9cT6txEN9n/hwby4Qz0DQuELU+BoQy8hFCkv3rn3CJOfQ+Q7T3y86mVXruh9nHItUpWyCC28kuRjJ51BPEOTHxa9o8kl06uj5/3Nx2eYSj36Tj9UThHvsAb6fIExWDwvU1wkHIHEaqh6ULOMInn4sspqg9oD/LAwYdxuRquGr3cFAgnN1733yizSqUCNXoEwBFQqOv3dFyp3zH1bxD7S2A/tK3NPxitRH2f6cSHmNibsDDeQCGiJOamjeBdflaHurFMC7C9XnN/LAA2wk/DPc952IO8xWWAyabTiYkkIa3ki5YYVYbEnimtlmK3wfaYvHLLIxHKTqrcnMxcyPPbtvHPrt/htLeJSqga6oK7HMexnAxxqkV/jT6CfCMwUg9/BWG4j2PeSeOWE2fOvQeoOrPtTLCf2z0yUM6AuTcq52imk1grMXOr7+sc4QLUPE5vxxDL0yTYL1Tb3Sse5u5kqXnoYOdVkUCLoJaPmfc1L5l+rnzbGc5K0t9jFvvQqFmPEnckAm2lrwAStR6h1+l5aThDa0aD53OC7zweXG01u3rb1GMTf4i9ky9ql6XbT5tCOKVwm5gVquG1o54cz+bzNytGk32ZJppa1qf4b+IBz/fwmTRUvOn47RLKVotkyv1I5qds2uYoRCt55J7SmxPoQ3zAj/60oMn529zidirXO3ZN/K72g3naWbLqKNphODdklV4F5YsjKUbYnPCu9UBWyEUdO9t9CVYbd54D/tn8wx1aGaQAnMumjgmE/Kl4yoVPW6uEtY+2+pYd5gg+KF5Z1ikf3D+P0hHMkwV+av2BLlI8QUtKyT/zdNJpgVbxhEGPKqwMAak5ajwSy+I0oSQLC2Ve6yHjLtXZnpQrlTml9yOQPebWx4Aq+oPDPLkXFRcs0nRYwKTmqlb3TUxKuYNpQvfTg2SRqfFuMqjDy84Y3R0gO0Kp/0mzRzNN92q+qBgX83R8yKbb8+kJzUl9Liezs4mhu4xOV7F8tGaB8kOJi2MhbPu7X3NFlYJhPtyQAN7SF13N93ijLnTan+P/6kPkCIW78lPDHE2wP988XkUEA60m8SFx8u9Md8MqN0ngzzTXS0zuCBLvwxPXmE+UAlfSd8G1zN2XypntmpuRLq3MLRzQCty8gqkSn0OUQ0KXT3O9puf9frRKw0lAvDf8j1O7BjrPIpgTdXwUw9kYOJZyNXJdPtR+HJPcjgX1sKNhGz7CqLoSBuWNG/Ifw5OC01FIOG0jMbiCxD0SY30jO9zmboxzXtNVsB/+k3orPRj+s79QFXArBH8EgOYQYq1sm93BKNEq4rSdizUwnrdnxOMKcKk/vijkbOnmeZg82nO0+FwNWgs1fw2ZuHEYdJtykIY6/V1eW/80steBCabX5fVcgJL+pUk9qj+fT47CEMbwDZsbq5pka/zRF/dN7NRGSCVkr5P6DczNR9+wZ0kJHTNj385BnlIqpX3jOdvFa5YCSk+/5olqxvifxR8uyyCaq0JilpEceIvvfycrmFygXdItbBgOvlte0P+zGKq4uHmrMMp1SknrRNNivTcQLmWEAIOLHyDL2CEN6NvDw4MmTUae9w+y4wOCTcfgGAlUirxv5IQFvg0YFTGx8GFlr0PnZG9NJ3kBgPAfGUTLT7VkEfR25PkstTgZFBo7108DEGXSGaK/8b9Nmisc4DMPK7VQsBJaQCdec+lBsMganvq1exnnTPEWC/Kr6KS3H0Hbk0Wf0c4uMhX7493N3LdkvKOECso3hPM+dRC5MUwZgj4k3ixeT8TEsi+qLKw0tkJccVdonmZKQ95Bs/BYfv8LfOUmqFAIZY0VOdtdABpW3GO2fY9daG5fSUnZeumlCH99Tm6dzpy36J1iEc+Z0BCUE64IW5Jjd7jo5w9oGwSGKgsfc7HBTvn6MgLAJtW7wTE59HNDRZWrtwHpMCX2PV7zYWzIHYh7cbQcNtJATJuXYhM6ggjHXNy6TqM7P74E5FwhlBEgaG/0FcR/fTu2QvSzyl9ujlkgDyZTjUJcnOnIBerfuaXwjdxHX2YQrgA6mvLvua/bXnLJgvU8mKQYj6krDDdcoayO8zzwTm9I8ILCeGeUIIqeEWA5iKmT70VvmHY5y/P8IqZSJvSJJCAvqzY/oGMBRktb6h7G2OneU/Bs3PdXtWk1kBXXzqEOVw6bu+xD3ZOBhaLmWzvdB2xC3zHkZCXQXh9sMGwvZH7QvmW0CWM2U7H4dduUJG9azRzahqnNKWszBVFsZdWKDuuqtRhJyWfHaXMnyKCQs1Vjag0Vu5tdrzxMZikC6Oh3+Tzba1XLVmU5Mmp5FS/ctIYUSxpWiPXcDgY6htko3FgLbV2gRWCJ6g7AlQvJOE/LOvTzVv9IR5vhpMNEMHRstdF76sGa/RNiwJOV9fIQs4QS1ciwJRvChCv+AZv6aijho7HLaZ3bfRXe82o7f8cfgG3JWVqTG15kbOJMxrjMtutHYpA28iXn1hdlDpZsfoH/0fI0BVi4BCY0HwScvrWnKSVmeHTOEBoxkdxp5wqEk/m+73uv+Sf3Cs+gcfgv86cRa4EFUj04qhB2mrNrkorPS+75hVsmfRKEDzD612Q4YtC2L2W0dXVFNC3ocZN/PLBe56d5ZVnPuFyrWRhKtU2b6+IKTHvmRPM3ks8D8V5Z2LOYyNAeP6Lin6fjbJ5xeYCOUYDDnLzjcooshrDBgdFpX3zc6sgx/TSQXem9o7KuG7kct5+EcjSw5DA1TuNXUG/5ytrLryDK3aIjxvnUlC/ADKgAAA==" alt="Lampu Batu">
                <div class="prod-info">
                    <span class="prod-cat">LIGHTING</span>
                    <h3>Lampu Tidur</h3>
                    <p>Rp 1.260.000</p>
                </div>
            </div>
            <div class="prod-card">
                <img src="data:image/jpeg;base64,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" alt="Vas Tanah">
                <div class="prod-info">
                    <span class="prod-cat">OBJECTS</span>
                    <h3>Vas Tanah Liat</h3>
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
                <p>Kursi Rotan Sofa dibuat untuk waktu yang berjalan lambat—membaca, beristirahat, atau sekadar duduk menikmati cahaya sore.</p>
            </div>
            <div class="banner-image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe3ggBbr2GbCGGuP1JMejeq4XRQC9HSWpqUOTPV5zwbQ&s=10" alt="Sofa melengkung">
                <div class="banner-caption">
                    <span>Kursi Rotan Sofa</span>
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