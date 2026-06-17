<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\DestinasiController as AdminDestinasiController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\PenginapanController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\GaleriGeositeController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\DetailGeositeController;
use App\Http\Controllers\Admin\InformasiGeositeController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController as PublicGaleriController;
use App\Http\Controllers\GeositeController;
use App\Http\Controllers\InformasiController as PublicInformasiController;
use Illuminate\Support\Facades\DB;

// ==================== FRONTEND ROUTES ====================

// Home
Route::get('/', [DestinasiController::class, 'indexX'])->name('home');

// Destinasi Routes
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi');
Route::get('/destinasi/alam', [DestinasiController::class, 'alam'])->name('destinasi.alam');
Route::get('/destinasi/buatan', [DestinasiController::class, 'buatan'])->name('destinasi.buatan');
Route::get('/destinasi/budaya', [DestinasiController::class, 'budaya'])->name('destinasi.budaya');
Route::get('/destinasi/{slug}', [DestinasiController::class, 'detail'])->name('destinasi.detail');

// Informasi (Halaman Sejarah Caldera Toba)
Route::get('/informasi', [PublicInformasiController::class, 'index'])->name('informasi');

// Galeri Publik
Route::get('/galeri', [PublicGaleriController::class, 'index'])->name('galeri');

// Detail Galeri
Route::get('/galeri/{slug}', function ($slug) {
    $galeri = App\Models\Galeri::where('slug', $slug)->firstOrFail();
    $galeri->increment('views');
    return view('pages.galeri-detail', compact('galeri'));
})->name('galeri.detail');

// Berita Publik
Route::get('/berita', function () {
    $berita = App\Models\Berita::where('status', true)->latest()->paginate(9);
    return view('pages.berita', compact('berita'));
})->name('berita');

// Detail Berita
Route::get('/berita/{slug}', function ($slug) {
    $berita = App\Models\Berita::where('slug', $slug)->where('status', true)->firstOrFail();
    $berita->increment('views');
    return view('pages.berita-detail', compact('berita'));
})->name('berita.detail');

// UMKM
Route::get('/umkm', [HomeController::class, 'umkm'])->name('umkm');

// Budaya
Route::get('/budaya', [HomeController::class, 'budaya'])->name('budaya');

// Kontak
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [HomeController::class, 'sendKontak'])->name('kontak.send');

// ==================== GEOSITE ROUTES ====================
Route::get('/geosite/batu_hoda_beach', [GeositeController::class, 'batu_hoda_beach'])->name('geosite.batu_hoda_beach');
Route::get('/geosite/museum_huta_bolon', [GeositeController::class, 'museum_huta_bolon'])->name('geosite.museum_huta_bolon');
Route::get('/geosite/batu_pasa_pantai', [GeositeController::class, 'batu_pasa_pantai'])->name('geosite.batu_pasa_pantai');

// ==================== AUTH ROUTES ====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Lupa Password Routes — OTP based
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

// OTP Verification
Route::get('/otp-verify', [AuthController::class, 'showOtpForm'])->name('password.otp.form');
Route::post('/otp-verify', [AuthController::class, 'verifyOtp'])->name('password.otp.verify');

// Reset Password (setelah OTP terverifikasi)
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->middleware(['auth'])->group(function () {
    
    Route::get('/', function () {
        $totalGaleri    = DB::table('galeri')->count();
        $totalBerita    = DB::table('berita')->count();
        $totalInformasi = DB::table('informasi')->count();
        $totalDestinasi = DB::table('destinasis')->count();
        $totalUmkm      = DB::table('umkm')->count();
        $totalPenginapan = DB::table('penginapan')->count();
        $totalFasilitas  = DB::table('fasilitas')->count();
        $totalGaleriGeosite = DB::table('galeri_geosite')->count();
        $totalKontak     = DB::table('kontak')->count();
        
        return view('admin.dashboard', compact(
            'totalGaleri', 'totalBerita', 'totalInformasi', 'totalDestinasi',
            'totalUmkm', 'totalPenginapan', 'totalFasilitas', 'totalGaleriGeosite',
            'totalKontak'
        ));
    })->name('admin.dashboard');
    


    
    Route::resource('galeri', GaleriController::class)->names('admin.galeri');
    Route::resource('berita', BeritaController::class)->names('admin.berita');
    Route::resource('informasi', InformasiController::class)->names('admin.informasi');
    Route::resource('destinasi', AdminDestinasiController::class)->names('admin.destinasi');
    Route::resource('umkm', UmkmController::class)->names('admin.umkm');
    Route::resource('penginapan', PenginapanController::class)->names('admin.penginapan');
    Route::resource('fasilitas', FasilitasController::class)->names('admin.fasilitas');
    Route::resource('galeri-geosite', GaleriGeositeController::class)->names('admin.galeri-geosite');
    Route::resource('informasi-geosite', InformasiGeositeController::class)->names('admin.informasi-geosite');
    Route::resource('kontak', KontakController::class)->names('admin.kontak');
    Route::post('galeri/toggle-status/{id}', [GaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');

    // Home Manager
    Route::get('home-settings', [HomeSettingController::class, 'index'])->name('admin.home-settings.index');
    Route::put('home-settings', [HomeSettingController::class, 'update'])->name('admin.home-settings.update');

    // Detail Geosite (Lokasi, Jam Buka, Harga Tiket)
Route::get('detail-geosite', [DetailGeositeController::class, 'index'])->name('admin.detail-geosite.index');
Route::get('detail-geosite/create', [DetailGeositeController::class, 'create'])->name('admin.detail-geosite.create');
Route::post('detail-geosite/store', [DetailGeositeController::class, 'store'])->name('admin.detail-geosite.store');
Route::get('detail-geosite/{geosite}/edit', [DetailGeositeController::class, 'edit'])->name('admin.detail-geosite.edit');
Route::put('detail-geosite/{geosite}', [DetailGeositeController::class, 'update']) ->name('admin.detail-geosite.update');
Route::delete('/admin/detail-geosite/{id}', [App\Http\Controllers\Admin\DetailGeositeController::class, 'destroy'])->name('admin.detail-geosite.destroy');
});