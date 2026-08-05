<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Voucher;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   // database/seeders/VoucherSeeder.php
    public function run(): void
    {
        Voucher::create(['code' => 'RUMASELI10', 'discount_value' => 50000]);
        Voucher::create(['code' => 'NEWHOME', 'discount_value' => 100000]);
    }
}
