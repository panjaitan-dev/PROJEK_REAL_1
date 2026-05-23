# 🏔️ GeoToba — Geopark Danau Toba Admin System

Sistem informasi dan manajemen konten Geosite Danau Toba berbasis Laravel 12.

---

## 🚀 Cara Setup Setelah `git pull` / `git clone`

### 1. Clone atau Pull Kode dari GitHub

```bash
git clone https://github.com/panjaitan-dev/PROJEK_REAL_1.git
cd PROJEK_REAL_1
```

> Jika sudah pernah clone sebelumnya, cukup jalankan:
> ```bash
> git pull origin main
> ```

---

### 2. Install Dependencies PHP

```bash
composer install
```

---

### 3. Salin File `.env`

```bash
copy .env.example .env
```

> Jika file `.env.example` belum ada, buat file `.env` baru dan isi sesuai contoh di bawah.

---

### 4. Generate App Key

```bash
php artisan key:generate
```

---

### 5. Konfigurasi Database di `.env`

Buka file `.env` dan sesuaikan dengan pengaturan MySQL lokal kamu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Pa1           ← sesuaikan nama database kamu
DB_USERNAME=root          ← sesuaikan username MySQL kamu
DB_PASSWORD=              ← isi password MySQL jika ada
```

> **Catatan:** Buat database kosong terlebih dahulu di phpMyAdmin atau MySQL:
> ```sql
> CREATE DATABASE Pa1;
> ```

---

### 6. Jalankan Migrasi + Seeder (Buat Semua Tabel + Data Awal)

```bash
php artisan migrate --seed
```

> Perintah ini akan:
> - Membuat semua tabel database secara otomatis
> - Mengisi data awal (admin, destinasi, galeri, UMKM, penginapan, dll.)

---

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Buka browser: **http://127.0.0.1:8000**

---

## 🔐 Login Admin Default

Setelah `php artisan migrate --seed`, gunakan kredensial ini untuk login:

| | Nilai |
|---|---|
| **URL Login** | http://127.0.0.1:8000/login |
| **Email** | `adminsimanindobatuhoda@gmail.com` |
| **Password** | `rpqpfqpsssjzhlwh` |

> ⚠️ **Penting:** Segera ganti password setelah login pertama kali melalui fitur **Lupa Password** di halaman login.

---

## 📧 Konfigurasi Email (OTP Reset Password)

Sistem ini menggunakan Gmail untuk mengirim kode OTP. Isi bagian ini di `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=adminsimanindobatuhoda@gmail.com
MAIL_PASSWORD=              ← isi App Password Gmail (bukan password biasa)
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=adminsimanindobatuhoda@gmail.com
MAIL_FROM_NAME="GeoToba Admin"
```

> Cara mendapatkan App Password Gmail:
> 1. Buka [myaccount.google.com/apppasswords](https://myaccount.google.com/apppasswords)
> 2. Pilih "Mail" → "Other (Custom name)" → beri nama "GeoToba"
> 3. Salin 16 karakter yang muncul → paste ke `MAIL_PASSWORD`

---

## 📁 Struktur Perintah Penting

| Perintah | Fungsi |
|---|---|
| `php artisan migrate --seed` | Buat tabel + isi data awal |
| `php artisan migrate:fresh --seed` | **Reset** semua tabel + isi ulang data |
| `php artisan db:seed --class=UserSeeder` | Seed ulang hanya akun admin |
| `php artisan cache:clear` | Hapus cache aplikasi |
| `php artisan config:clear` | Hapus cache konfigurasi |
| `php artisan serve` | Jalankan server lokal |

---

## 🗂️ Fitur Admin

- 📊 **Dashboard** — Ringkasan statistik konten
- 🏠 **Home Manager** — Kelola tampilan halaman utama
- 🖼️ **Galeri** — Kelola galeri foto
- 📰 **Berita** — Kelola artikel berita
- ℹ️ **Informasi / Sejarah** — Kelola halaman informasi
- 🗺️ **Destinasi** — Kelola destinasi wisata
- 📸 **Galeri Geosite** — Kelola foto geosite
- 🛒 **UMKM** — Kelola data UMKM per geosite
- 🏗️ **Fasilitas** — Kelola fasilitas wisata
- 🏨 **Penginapan** — Kelola data penginapan

---

## ⚠️ Catatan Penting

- File `.env` **tidak di-push** ke GitHub (sudah ada di `.gitignore`) — setiap anggota tim harus membuat file `.env` sendiri
- Folder `storage/app/public` berisi gambar — jalankan `php artisan storage:link` jika gambar tidak tampil
- Jika ada error setelah `git pull`, coba: `composer install` → `php artisan migrate` → `php artisan cache:clear`
