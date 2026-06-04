<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kontak', function (Blueprint $table) {
            $table->id();
            $table->string('tipe', 50); // alamat, telepon, email, sosmed, jam_operasional
            $table->string('judul', 255);
            $table->text('nilai');
            $table->string('nilai_tambahan', 255)->nullable();
            $table->string('icon', 100)->nullable();
            $table->text('tautan')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // Seed initial data
        DB::table('kontak')->insert([
            [
                'tipe' => 'alamat',
                'judul' => 'Alamat',
                'nilai' => "Geosite Danau Toba\nDesa Simanindo, Pulau Samosir\nSumatera Utara, Indonesia",
                'nilai_tambahan' => null,
                'icon' => 'fas fa-map-marker-alt',
                'tautan' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'telepon',
                'judul' => 'WhatsApp',
                'nilai' => '+62 853 6225 9937',
                'nilai_tambahan' => 'Zen M. Siboro - Co-Founder',
                'icon' => 'fab fa-whatsapp',
                'tautan' => 'https://wa.me/6285362259937',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'telepon',
                'judul' => 'Panggilan Langsung',
                'nilai' => '+62 853 6225 9937',
                'nilai_tambahan' => null,
                'icon' => 'fas fa-phone-alt',
                'tautan' => 'tel:+6285362259937',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'email',
                'judul' => 'Email',
                'nilai' => 'zenmarchelloboro@gmail.com',
                'nilai_tambahan' => null,
                'icon' => 'fas fa-envelope',
                'tautan' => 'mailto:zenmarchelloboro@gmail.com',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'sosmed',
                'judul' => 'Facebook',
                'nilai' => 'Batu Hoda Beach Official',
                'nilai_tambahan' => null,
                'icon' => 'fab fa-facebook-f',
                'tautan' => 'https://www.facebook.com/share/1EGJyH9J1T/',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'sosmed',
                'judul' => 'Instagram',
                'nilai' => '@batuhodabeachofficial',
                'nilai_tambahan' => null,
                'icon' => 'fab fa-instagram',
                'tautan' => 'https://www.instagram.com/batuhodabeachofficial?igsh=dG02YW0wNnNweDJ5',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'jam_operasional',
                'judul' => 'Senin – Jumat',
                'nilai' => '08:00 – 17:00 WIB',
                'nilai_tambahan' => null,
                'icon' => 'far fa-clock',
                'tautan' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipe' => 'jam_operasional',
                'judul' => 'Sabtu – Minggu',
                'nilai' => '08:00 – 18:00 WIB',
                'nilai_tambahan' => null,
                'icon' => 'far fa-clock',
                'tautan' => null,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak');
    }
};

