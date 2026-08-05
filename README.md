# RUMASELI — E-Commerce Furniture

Aplikasi e-commerce furnitur single-seller yang dibangun dengan **Laravel 13** sebagai backend REST API sekaligus menampilkan frontend berbasis **Blade + Vanilla JS/CSS** dalam satu project yang sama. Di-deploy di [Railway](https://railway.app).

🌐 **Live:** https://portofolio269-production.up.railway.app

---

## Tech Stack

| Layer | Teknologi |
|---|---|
| Backend | Laravel 13, PHP 8.3+, MySQL |
| Autentikasi | Laravel Sanctum (token-based) |
| Frontend | Blade Templates, Vanilla JS, CSS (tanpa framework) |
| Deployment | Railway |

---

## Fitur

### Customer
- Daftar akun & login
- Browse produk berdasarkan kategori
- Tambah produk ke keranjang, ubah qty, hapus item
- Checkout dengan kode voucher diskon
- Pilih metode pembayaran (Transfer Bank / COD)
- Lihat riwayat & detail pesanan
- Tracking status pengiriman

### Admin
- Dashboard ringkasan (total pesanan, pendapatan, produk)
- Kelola semua pesanan — update status, konfirmasi pembayaran, input data pengiriman
- CRUD Produk, Kategori, dan Voucher

### Backend / Arsitektur
- Role-Based Access Control (Customer & Admin) via custom middleware
- `OrderService` — checkout dijalankan dalam satu DB transaction: validasi stok, kalkulasi total, potong voucher, snapshot harga produk, kurangi stok, hapus keranjang
- Price snapshot di `order_items` — histori harga tetap akurat meski harga produk berubah
- Resource-level authorization via Laravel Policy (customer hanya bisa akses order & cart miliknya)
- Gambar produk di-mapping di frontend (`PRODUCT_IMG_MAP`) — tidak disimpan di database, mudah diganti tanpa menyentuh data

---

## Struktur Project

```
app/
├── Http/
│   ├── Controllers/     # AuthController, ProductController, OrderController, dst.
│   ├── Middleware/      # EnsureUserHasRoles (role-based access)
│   ├── Requests/        # Form validation
│   └── Services/        # OrderService (checkout logic)
├── Models/              # User, Product, Category, Order, OrderItem, Payment, Delivery, Voucher
└── Policies/            # CartItemPolicy, OrderPolicy

database/
├── migrations/
└── seeders/
    ├── RoleSeeder.php       # customer, admin
    ├── CategorySeeder.php   # 6 kategori
    ├── VoucherSeeder.php    # 2 voucher default
    └── ProductSeeder.php    # 60 produk (10 per kategori)

resources/views/
├── _layout.blade.php        # Shared navbar, footer, CSS, JS helpers & PRODUCT_IMG_MAP
├── welcome.blade.php        # Landing page (static)
├── products.blade.php       # Katalog + filter + search
├── product-detail.blade.php # Detail produk + add to cart
├── login.blade.php
├── register.blade.php
├── cart.blade.php           # Keranjang + checkout
├── orders.blade.php         # Riwayat pesanan
├── order-detail.blade.php   # Detail pesanan + pembayaran
└── admin/
    ├── _sidebar.blade.php
    ├── dashboard.blade.php
    ├── orders.blade.php
    ├── order-detail.blade.php
    ├── products.blade.php
    ├── categories.blade.php
    └── vouchers.blade.php
    └── _layout_admin.blade.php

routes/
├── api.php    # REST API endpoints
└── web.php    # Web page routes (Blade views)
```

---

## Instalasi Lokal

### Prasyarat
- PHP 8.3+, Composer, MySQL (atau MariaDB via Laragon)

### Langkah

```bash
# 1. Clone repo
git clone <url-repo>
cd e-commerce-furniture-backend

# 2. Install dependencies
composer install

# 3. Buat file .env
cp .env.example .env

# 4. Isi koneksi database di .env
DB_DATABASE=rumaseli
DB_USERNAME=root
DB_PASSWORD=

# 5. Generate app key
php artisan key:generate

# 6. Jalankan migration + seeder
php artisan migrate --seed

# 7. Jalankan server
php artisan serve
```

Buka `http://localhost:8000` di browser.

---

## Seeder Default

| Seeder | Data |
|---|---|
| `RoleSeeder` | `customer`, `admin` |
| `CategorySeeder` | Ruang Tamu, Kamar Tidur, Dapur, Ruang Makan, Penyimpanan, Dekorasi |
| `ProductSeeder` | 60 produk — 10 per kategori |
| `VoucherSeeder` | `RUMASELI10` (Rp 50.000), `NEWHOME` (Rp 100.000) |

Untuk membuat akun admin secara manual setelah seeder berjalan:

```bash
php artisan tinker
```
```php
$user = User::create(['name' => 'Admin', 'email' => 'admin@rumaseli.com', 'password' => bcrypt('password')]);
$user->role_id = Role::where('name', 'admin')->first()->id;
$user->save();
```

---

## API Endpoints

Base URL: `/api`

### Auth
| Method | Endpoint | Akses |
|---|---|---|
| POST | `/register` | Public |
| POST | `/login` | Public |
| POST | `/logout` | Auth |
| GET | `/user` | Auth |

### Kategori
| Method | Endpoint | Akses |
|---|---|---|
| GET | `/categories` | Public |
| GET | `/categories/{id}` | Public |
| POST | `/categories` | Admin |
| PUT | `/categories/{id}` | Admin |
| DELETE | `/categories/{id}` | Admin |

### Produk
| Method | Endpoint | Akses |
|---|---|---|
| GET | `/products` | Public |
| GET | `/products/{id}` | Public |
| POST | `/products` | Admin |
| PUT | `/products/{id}` | Admin |
| DELETE | `/products/{id}` | Admin |

### Keranjang
| Method | Endpoint | Akses |
|---|---|---|
| GET | `/cartItem` | Auth |
| POST | `/cartItem` | Customer |
| PUT | `/cartItem/{id}` | Customer |
| DELETE | `/cartItem/{id}` | Customer |

### Pesanan
| Method | Endpoint | Akses |
|---|---|---|
| POST | `/orders` | Customer |
| GET | `/orders` | Customer |
| GET | `/orders/{id}` | Customer |
| GET | `/admin/orders` | Admin |
| PATCH | `/orders/{id}/status` | Admin |

### Pembayaran
| Method | Endpoint | Akses |
|---|---|---|
| POST | `/orders/{id}/payment` | Auth |
| PATCH | `/payments/{id}/status` | Admin |

### Pengiriman
| Method | Endpoint | Akses |
|---|---|---|
| POST | `/orders/{id}/delivery` | Admin |
| PUT | `/deliveries/{id}` | Admin |

### Voucher
| Method | Endpoint | Akses |
|---|---|---|
| GET | `/vouchers` | Admin |
| POST | `/vouchers` | Admin |
| PUT | `/vouchers/{id}` | Admin |
| DELETE | `/vouchers/{id}` | Admin |

---

## Mengganti Gambar Produk

Gambar produk tidak disimpan di database. Mapping gambar ada di satu tempat:

```
resources/views/_layout.blade.php → const PRODUCT_IMG_MAP
```

ID 1–10 → Ruang Tamu, ID 11–20 → Kamar Tidur, ID 21–30 → Dapur,
ID 31–40 → Ruang Makan, ID 41–50 → Penyimpanan, ID 51–60 → Dekorasi.

Cukup ganti URL pada ID yang diinginkan, semua halaman akan langsung menggunakan gambar baru.

---

## Deployment (Railway)

1. Push repo ke GitHub
2. Buat project baru di Railway → **Deploy from GitHub repo**
3. Tambah plugin **MySQL** di Railway
4. Set environment variables:

```
APP_KEY=
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=mysql
DB_HOST=<dari Railway MySQL>
DB_PORT=3306
DB_DATABASE=<dari Railway MySQL>
DB_USERNAME=<dari Railway MySQL>
DB_PASSWORD=<dari Railway MySQL>
```

5. Tambah **Start Command** di Railway:

```bash
php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=$PORT
```

---

## Halaman Web

| URL | Halaman |
|---|---|
| `/` | Landing page |
| `/products` | Katalog produk |
| `/products/{id}` | Detail produk |
| `/login` | Login |
| `/register` | Daftar akun |
| `/cart` | Keranjang belanja |
| `/orders` | Riwayat pesanan |
| `/orders/{id}` | Detail pesanan |
| `/admin` | Dashboard admin |
| `/admin/orders` | Manajemen pesanan |
| `/admin/orders/{id}` | Kelola detail pesanan |
| `/admin/products` | Manajemen produk |
| `/admin/categories` | Manajemen kategori |
| `/admin/vouchers` | Manajemen voucher |
