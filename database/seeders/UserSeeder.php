<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Update atau buat admin dengan credentials terbaru
        User::updateOrCreate(
            ['email' => 'adminsimanindobatuhoda@gmail.com'],
            [
                'name'     => 'Admin GeoToba',
                'password' => Hash::make('admin123'),
            ]
        );

        echo "✅ Admin seeded: adminsimanindobatuhoda@gmail.com (Password: admin123)\n";
    }
}