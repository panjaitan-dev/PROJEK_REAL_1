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
use App\Http\Controllers\Admin\NavbarItemController;
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
Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

// ==================== GEOSITE ROUTES ====================
Route::get('/geosite/batu_hoda_beach', [GeositeController::class, 'batu_hoda_beach'])->name('geosite.batu_hoda_beach');
Route::get('/geosite/museum_huta_bolon', [GeositeController::class, 'museum_huta_bolon'])->name('geosite.museum_huta_bolon');
Route::get('/geosite/batu_pasa_pantai', [GeositeController::class, 'batu_pasa_pantai'])->name('geosite.batu_pasa_pantai');

// ==================== AUTH ROUTES ====================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Lupa Password Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
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
        
        return view('admin.dashboard', compact(
            'totalGaleri', 'totalBerita', 'totalInformasi', 'totalDestinasi',
            'totalUmkm', 'totalPenginapan', 'totalFasilitas', 'totalGaleriGeosite'
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
    Route::resource('navbar-items', NavbarItemController::class)->names('admin.navbar-items');
    Route::post('galeri/toggle-status/{id}', [GaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');
    
});