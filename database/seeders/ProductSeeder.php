<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil id tiap kategori berdasarkan nama
        $cat = Category::pluck('id', 'name');

        // Format setiap baris: [nama, harga, stok, material, berat_kg, url_gambar]
        $data = [

            // ── RUANG TAMU ────────────────────────────────────────────────────────
            'Ruang Tamu' => [
                ['Sofa 3 Dudukan Minimalis',   2850000, 8,  'Busa & Kain Linen',     32, 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=600&auto=format&fit=crop'],
                ['Sofa L-Shape Abu',           4200000, 5,  'Busa Premium & Fabric', 55, 'https://images.unsplash.com/photo-1567016432779-094069958ea5?q=80&w=600&auto=format&fit=crop'],
                ['Meja Kopi Kayu Jati',        1350000, 12, 'Kayu Jati Solid',       18, 'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?q=80&w=600&auto=format&fit=crop'],
                ['Rak TV Minimalis Putih',     1750000, 10, 'MDF & PVC',             25, 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&w=600&auto=format&fit=crop'],
                ['Kursi Rotan Santai',          980000, 15, 'Rotan Alam',             8, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe3ggBbr2GbCGGuP1JMejeq4XRQC9HSWpqUOTPV5zwbQ&s=10'],
                ['Meja Samping Bundar Kayu',    450000, 20, 'Kayu Mahoni',            5, 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=600&auto=format&fit=crop'],
                ['Karpet Bulu Tebal Krem',      650000, 18, 'Bulu Sintetis',          3, 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=600&auto=format&fit=crop'],
                ['Lampu Lantai Arc Modern',     875000,  9, 'Besi & Kaca',            6, 'https://images.unsplash.com/photo-1507149129528-662589e4ec30?q=80&w=600&auto=format&fit=crop'],
                ['Bantal Sofa Set 4pcs',        320000, 25, 'Katun Premium',          2, 'https://images.unsplash.com/photo-1616047006789-b7af5afb8c20?q=80&w=600&auto=format&fit=crop'],
                ['Cermin Dinding Oval Emas',    560000, 14, 'Kaca & Besi',            4, 'https://images.unsplash.com/photo-1592078615290-033ee584e267?q=80&w=600&auto=format&fit=crop'],
            ],

            // ── KAMAR TIDUR ───────────────────────────────────────────────────────
            'Kamar Tidur' => [
                ['Tempat Tidur Minimalis 160x200', 3200000, 6,  'Kayu Jati & MDF',   45, 'https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=600&auto=format&fit=crop'],
                ['Kasur Memory Foam 160x200',      2100000, 8,  'Memory Foam',        28, 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=600&auto=format&fit=crop'],
                ['Lemari Pakaian 3 Pintu',         2750000, 5,  'Kayu Mahoni',        60, 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=600&auto=format&fit=crop'],
                ['Meja Rias dengan Cermin',        1450000, 7,  'MDF & Kaca',         22, 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&w=600&auto=format&fit=crop'],
                ['Nakas Kayu Rustic',               380000, 20, 'Kayu Pinus',          6, 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?q=80&w=600&auto=format&fit=crop'],
                ['Bantal Tidur Mewah Set 2pcs',     220000, 30, 'Kapas & Bulu',        1, 'https://images.unsplash.com/photo-1592435873989-2dcaa52bcf05?q=80&w=600&auto=format&fit=crop'],
                ['Lampu Tidur Sentuh LED',           175000, 25, 'Plastik ABS',         1, 'https://images.unsplash.com/photo-1507149129528-662589e4ec30?q=80&w=600&auto=format&fit=crop'],
                ['Cermin Full Body Standing',        650000, 10, 'Kaca & Aluminium',   12, 'https://images.unsplash.com/photo-1585412727339-54e4bae3bbf9?q=80&w=600&auto=format&fit=crop'],
                ['Rak Buku Kayu Minimalis',          480000, 15, 'Kayu Jati',           8, 'https://images.unsplash.com/photo-1588854337236-6889d631faa8?q=80&w=600&auto=format&fit=crop'],
                ['Karpet Kamar Tidur Lembut',        390000, 18, 'Bulu Mikro',          3, 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=600&auto=format&fit=crop'],
            ],

            // ── DAPUR ─────────────────────────────────────────────────────────────
            'Dapur' => [
                ['Meja Makan 4 Kursi Minimalis', 2400000, 5,  'Kayu Jati & Besi',  40, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_shI6i7TLumNyXZoCxuyUkmKInkjPDCPOICTbq-6MCw&s=10'],
                ['Kursi Bar Kayu Tinggi',          450000, 12, 'Kayu Mahoni',         5, 'https://images.unsplash.com/photo-1519947486511-46149fa0a254?q=80&w=600&auto=format&fit=crop'],
                ['Rak Dapur Dinding Stainless',    680000, 10, 'Stainless Steel',     4, 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?q=80&w=600&auto=format&fit=crop'],
                ['Kitchen Cabinet Atas 60cm',      850000,  8, 'MDF HPL',            12, 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=600&auto=format&fit=crop'],
                ['Tempat Sampah Pedal 10L',        125000, 30, 'Plastik PP',           2, 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=600&auto=format&fit=crop'],
                ['Tempat Bumbu Set Keramik',       210000, 20, 'Keramik',              2, 'https://images.unsplash.com/photo-1556228841-a3c527ebefe5?q=80&w=600&auto=format&fit=crop'],
                ['Tikar Karet Anti-Slip Dapur',    145000, 25, 'Karet & Busa',         2, 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?q=80&w=600&auto=format&fit=crop'],
                ['Lampu Gantung Dapur Industrial', 540000,  9, 'Besi & Kaca',          5, 'https://images.unsplash.com/photo-1565183997392-2f6f122e5912?q=80&w=600&auto=format&fit=crop'],
                ['Mangkuk Salad Kayu Ukir Set',    320000, 15, 'Kayu Kelapa',          3, 'https://images.unsplash.com/photo-1556228720-da6474490b18?q=80&w=600&auto=format&fit=crop'],
                ['Talenan Kayu Jati Tebal',        185000, 22, 'Kayu Jati',            2, 'https://images.unsplash.com/photo-1610701596007-11502861dcfa?q=80&w=600&auto=format&fit=crop'],
            ],

            // ── RUANG MAKAN ───────────────────────────────────────────────────────
            'Ruang Makan' => [
                ['Meja Makan Marmer 6 Kursi',    5800000, 3,  'Marmer & Besi',      65, 'https://images.unsplash.com/photo-1617806118233-18e1de247200?q=80&w=600&auto=format&fit=crop'],
                ['Kursi Makan Skandinavia Set 4', 1600000, 7,  'Kayu Beech & Kain', 20, 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=600&auto=format&fit=crop'],
                ['Meja Makan Lipat Kayu',          850000, 10, 'Kayu Pinus',         15, 'https://images.unsplash.com/photo-1538688525198-9b88f6f53126?q=80&w=600&auto=format&fit=crop'],
                ['Rak Piring Dinding Kayu',        380000, 18, 'Kayu Mahoni',         5, 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?q=80&w=600&auto=format&fit=crop'],
                ['Runner Meja Linen Krem',         125000, 30, 'Linen 100%',           1, 'https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?q=80&w=600&auto=format&fit=crop'],
                ['Tempat Lilin Besi Hitam Set 3',  275000, 20, 'Besi Tempa',           3, 'https://images.unsplash.com/photo-1574180566232-aaad1b5b8450?q=80&w=600&auto=format&fit=crop'],
                ['Lampu Gantung Rotan Bulat',      620000,  8, 'Rotan Alam',           4, 'https://images.unsplash.com/photo-1565183997392-2f6f122e5912?q=80&w=600&auto=format&fit=crop'],
                ['Set Gelas Kaca Premium 6pcs',    350000, 15, 'Kaca Borosilikat',     3, 'https://images.unsplash.com/photo-1559181567-c3190bac4d52?q=80&w=600&auto=format&fit=crop'],
                ['Taplak Meja Katun 150x210',      195000, 25, 'Katun 100%',           1, 'https://images.unsplash.com/photo-1556228841-a3c527ebefe5?q=80&w=600&auto=format&fit=crop'],
                ['Serbet Meja Set 4 Warna',         95000, 40, 'Katun & Linen',        1, 'https://images.unsplash.com/photo-1592892132332-cf1cf4f4e10f?q=80&w=600&auto=format&fit=crop'],
            ],

            // ── PENYIMPANAN ───────────────────────────────────────────────────────
            'Penyimpanan' => [
                ['Lemari Serbaguna 5 Rak',        1250000, 8,  'MDF & Melamine',    20, 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=600&auto=format&fit=crop'],
                ['Laci Plastik 3 Susun',            185000, 25, 'Plastik PP',         5, 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=600&auto=format&fit=crop'],
                ['Rak Sepatu Kayu 5 Susun',         420000, 15, 'Kayu Pinus',         8, 'https://images.unsplash.com/photo-1588854337236-6889d631faa8?q=80&w=600&auto=format&fit=crop'],
                ['Kotak Penyimpanan Rotan Set 3',   340000, 20, 'Rotan & Kain',       3, 'https://images.unsplash.com/photo-1592078615290-033ee584e267?q=80&w=600&auto=format&fit=crop'],
                ['Keranjang Laundry Bambu',         195000, 22, 'Bambu Alam',          3, 'https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?q=80&w=600&auto=format&fit=crop'],
                ['Box Organizer Tutup Kain Set 6',  225000, 18, 'Kain Non-Woven',     2, 'https://images.unsplash.com/photo-1574180566232-aaad1b5b8450?q=80&w=600&auto=format&fit=crop'],
                ['Rak Dinding Mengambang 80cm',     280000, 20, 'Kayu Mahoni',         4, 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=600&auto=format&fit=crop'],
                ['Lemari Besi Locker 2 Pintu',     1650000,  5, 'Besi CRCA',          30, 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?q=80&w=600&auto=format&fit=crop'],
                ['Gantungan Baju Kayu Portable',    145000, 30, 'Kayu Jati',           3, 'https://images.unsplash.com/photo-1592435873989-2dcaa52bcf05?q=80&w=600&auto=format&fit=crop'],
                ['Tempat Majalah Besi Rosegold',    210000, 15, 'Besi',                2, 'https://images.unsplash.com/photo-1563861826100-9cb868fdbe1c?q=80&w=600&auto=format&fit=crop'],
            ],

            // ── DEKORASI ──────────────────────────────────────────────────────────
            'Dekorasi' => [
                ['Vas Keramik Putih Tinggi',         245000, 20, 'Keramik',            2, 'https://images.unsplash.com/photo-1613977257363-707ba9348227?q=80&w=600&auto=format&fit=crop'],
                ['Pot Tanaman Terracotta Set 3',     195000, 25, 'Tanah Liat',         3, 'https://images.unsplash.com/photo-1610701596007-11502861dcfa?q=80&w=600&auto=format&fit=crop'],
                ['Bingkai Foto Kayu Set 5',          285000, 18, 'Kayu Pinus',         2, 'https://images.unsplash.com/photo-1513519245088-0e12902e5a38?q=80&w=600&auto=format&fit=crop'],
                ['Lilin Aromaterapi Lemongrass',      95000, 40, 'Parafin & Wax',      1, 'https://images.unsplash.com/photo-1547393947-1849a9bc45f4?q=80&w=600&auto=format&fit=crop'],
                ['Lampu String Fairy Light 5m',      135000, 35, 'Kawat Tembaga',      1, 'https://images.unsplash.com/photo-1513569771920-c9e1d31714af?q=80&w=600&auto=format&fit=crop'],
                ['Tanaman Hias Artificial Monstera', 325000, 15, 'Plastik PE',         3, 'https://images.unsplash.com/photo-1598880940942-e43af8fad781?q=80&w=600&auto=format&fit=crop'],
                ['Jam Dinding Kayu Nordic',          220000, 20, 'Kayu & Kaca',        2, 'https://images.unsplash.com/photo-1563861826100-9cb868fdbe1c?q=80&w=600&auto=format&fit=crop'],
                ['Patung Abstrak Resin Gold',         310000, 12, 'Resin & Cat Gold',  2, 'https://images.unsplash.com/photo-1574180566232-aaad1b5b8450?q=80&w=600&auto=format&fit=crop'],
                ['Lukisan Kanvas Abstrak 60x80',      750000,  8, 'Kanvas & Akrilik',  3, 'https://images.unsplash.com/photo-1561214115-f2f134cc4912?q=80&w=600&auto=format&fit=crop'],
                ['Diffuser Rotan Aroma Lavender',     175000, 28, 'Rotan & Minyak',    1, 'https://images.unsplash.com/photo-1559181567-c3190bac4d52?q=80&w=600&auto=format&fit=crop'],
            ],
        ];

        // Insert semua produk
        foreach ($data as $categoryName => $items) {
            foreach ($items as [$name, $price, $stock, $material, $weight, $imageUrl]) {
                Product::create([
                    'category_id' => $cat[$categoryName],
                    'name'        => $name,
                    'price'       => $price,
                    'stock'       => $stock,
                    'material'    => $material,
                    'weight'      => $weight,
                    // $imageUrl ditampilkan di frontend via PRODUCT_IMG_MAP,
                    // tidak disimpan ke database.
                ]);
            }
        }
    }
}
