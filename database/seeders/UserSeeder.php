<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Update atau buat admin dengan credentials terbaru (tanpa truncate agar tidak error FK)
        User::updateOrCreate(
            ['email' => 'admina246@gmail.com'],
            [
                'name'     => 'Admin GeoToba',
                'email'    => 'adminsimanindobatuhoda@gmail.com',
                'password' => Hash::make('rpqpfqpsssjzhlwh'),
            ]
        );

        // Juga pastikan kalau tidak ada email lama, buat baru
        User::updateOrCreate(
            ['email' => 'adminsimanindobatuhoda@gmail.com'],
            [
                'name'     => 'Admin GeoToba',
                'password' => Hash::make('rpqpfqpsssjzhlwh'),
            ]
        );

        echo "✅ Admin seeded: adminsimanindobatuhoda@gmail.com\n";
    }
}