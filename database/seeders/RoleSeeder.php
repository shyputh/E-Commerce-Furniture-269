<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
// database/seeders/RoleSeeder.php
    public function run(): void
    {
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'admin']);
    }
}
