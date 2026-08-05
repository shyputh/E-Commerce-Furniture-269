# RUMASELI

REST API backend untuk e-commerce furniture single-seller, dibangun dengan Laravel + MySQL.

## Tech Stack
- Laravel 13, PHP 8.5.3, MySQL, Laravel Sanctum

## Fitur
- Auth berbasis role (customer/admin) dengan Sanctum
- Manajemen produk & kategori
- Keranjang belanja
- Checkout dengan validasi stok & voucher
- Tracking status order, pembayaran, dan pengiriman

## Instalasi
1. `composer install`
2. `cp .env.example .env`, sesuaikan koneksi database
3. `php artisan migrate`
4. Seed role: `php artisan tinker` → `Role::create(['name' => 'customer']); Role::create(['name' => 'admin']);`
5. `php artisan serve`

## Dokumentasi API
Import `[nama-file].json` (export dari Bruno) ke Bruno/Postman untuk mencoba semua endpoint.

## Arsitektur
MVC + Service layer untuk logic checkout ('OrderService') + Policy untuk otorisasi resource-level (customer hanya bisa akses order/cart miliknya sendiri).