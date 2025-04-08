<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah sudah ada admin
        if (!User::where('email', 'admin@perpus.test')->exists()) {
            User::create([
                'name'        => 'Admin Perpustakaan',
                'email'       => 'admin@perpus.test',
                'password'    => Hash::make('admin123'), // bisa diganti
                'role'        => 'admin',
                'nim'         => null,
                'alamat'      => 'Alamat Admin',
                'no_telepon'  => '08123456789',
                'status' => 1, // 1 = aktif, 0 = nonaktif

            ]);
        }
    }
}
