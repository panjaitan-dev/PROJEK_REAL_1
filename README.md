**Belum cukup Fer.** Di screenshot, isi `README.md` kamu terpotong baru sampai langkah 1, dan ada **format Markdown yang rusak** pada perintah `git clone`:

* **Error Format di Langkah 1:**
Terdapat tautan ganda `git clone [https://...](https://...)` yang membuat perintah bash di GitHub menjadi rusak/tidak bisa di-copy langsung.


* **Konten Belum Lengkap:**
Langkah 2 sampai selesai (setup `.env`, migrasi, kredensial login, dan fitur) belum masuk.



---

### Solusi Lengkap (Tinggal Copy-Paste)

Buka tombol edit (ikon pensil ✏️) di GitHub, hapus seluruh isinya, lalu paste kode Markdown utuh di bawah ini:

```markdown
# 🏔️ GeoToba — Geopark Danau Toba Admin System

Sistem informasi dan manajemen konten Geosite Danau Toba berbasis Laravel 12.

---

## 🚀 Cara Setup Setelah `git pull` / `git clone`

### 1. Clone atau Pull Kode dari GitHub

```bash
git clone [https://github.com/panjaitan-dev/PROJEK_REAL_1.git](https://github.com/panjaitan-dev/PROJEK_REAL_1.git)
cd PROJEK_REAL_1

```

> Jika sudah pernah clone sebelumnya, cukup jalankan:
> ```bash
> git pull origin main
> 
> ```
> 
> 

---

### 2. Install Dependencies PHP & Storage Link

```bash
composer install
php artisan storage:link

```

---

### 3. Salin File `.env`

```bash
copy .env.example .env

```

> Jika file `.env.example` belum ada, buat file `.env` baru dan isi sesuai panduan di bawah.

---

### 4. Generate App Key

```bash
php artisan key:generate

```

---

### 5. Konfigurasi Database & Email di `.env`

Buka file `.env` dan sesuaikan nilainya:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Pa1
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="GeoToba Admin"

```

> **Catatan Database:** Buat database kosong terlebih dahulu di phpMyAdmin atau MySQL:
> ```sql
> CREATE DATABASE Pa1;
> 
> ```
> 
> 
> *Opsional:* Jika ingin mengimpor database manual dari repositori, gunakan file `pa1.sql`.

---

### 6. Jalankan Migrasi + Seeder

```bash
php artisan migrate --seed

```

---

### 7. Jalankan Aplikasi

```bash
php artisan serve

```

Buka browser: **http://127.0.0.1:8000**

---

## 🔐 Login Admin Default

| Field | Nilai |
| --- | --- |
| **URL Login** | http://127.0.0.1:8000/login |
| **Email** | `admin@geotoba.com` |
| **Password** | `admin123` |

> ⚠️ **Penting:** Segera ganti password admin ini setelah login pertama kali.

---

## 📁 Perintah Penting

| Perintah | Fungsi |
| --- | --- |
| `php artisan migrate --seed` | Buat tabel + isi data awal |
| `php artisan migrate:fresh --seed` | Reset semua tabel + isi ulang data |
| `php artisan cache:clear` | Hapus cache aplikasi |
| `php artisan serve` | Jalankan server lokal |

---

## 🗂️ Fitur Admin

* 📊 **Dashboard** — Ringkasan statistik konten
* 🏠 **Home Manager** — Kelola tampilan halaman utama
* 🖼️ **Galeri & Berita** — Kelola foto dan berita
* 🗺️ **Destinasi & Geosite** — Kelola destinasi geosite
* 🛒 **UMKM & Penginapan** — Kelola data UMKM dan penginapan

```

Setelah ditempel, langsung klik tombol **Commit changes...** di bagian atas kanan GitHub.

```
