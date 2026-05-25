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
                'password' => Hash::make('PA6J@ya666'),
            ]
        );

        echo "✅ Admin seeded: adminsimanindobatuhoda@gmail.com (Password: PA6J@ya666)\n";
    }
}