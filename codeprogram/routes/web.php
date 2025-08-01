<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\InformasiPendaftaranController;
use App\Http\Controllers\PendaftaranController; 
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () { return view('guest.home'); });
Route::get('/ProfilSekolah', function () { return view('guest.profilsekolah'); });
Route::get('/guru', [GuruController::class, 'guest'])->name('guest.guru');
Route::get('/siswa', [SiswaController::class, 'guest'])->name('guest.siswa');
Route::get('/perayaan', [AcaraController::class, 'guest'])->name('guest.acara');
Route::get('/prestasi', [PrestasiController::class, 'guest'])->name('guest.prestasi');
Route::get('/fasilitas', [FasilitasController::class, 'guest'])->name('guest.fasilitas');
Route::get('/galeri', [GaleriController::class, 'guest'])->name('guest.galeri');
Route::get('/strukturorganisasi', [StrukturOrganisasiController::class, 'guest'])->name('guest.strukturorganisasi');
Route::get('/pendaftaran', [InformasiPendaftaranController::class, 'guest'])->name('guest.pendaftaran');

// Siswa Routes
Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('create.pendaftaran');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('store.pendaftaran');
    Route::get('/pendaftaran/success', [PendaftaranController::class, 'success'])->name('success.pendaftaran');
});

// Super Admin Routes
Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('dashboard');
    
    // Guru Routes
    Route::prefix('guru')->name('guru.')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('index');
        Route::get('/create', [GuruController::class, 'create'])->name('create');
        Route::post('/', [GuruController::class, 'store'])->name('store');
        Route::get('{id}/edit', [GuruController::class, 'edit'])->name('edit');
        Route::put('{id}', [GuruController::class, 'update'])->name('update');
        Route::delete('{id}', [GuruController::class, 'destroy'])->name('destroy');
    });

    // Galeri Routes
    Route::prefix('galeri')->name('galeri.')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('index');
        Route::get('/create', [GaleriController::class, 'create'])->name('create');
        Route::post('/', [GaleriController::class, 'store'])->name('store');
        Route::get('{galeri}', [GaleriController::class, 'show'])->name('show');
        Route::get('{galeri}/edit', [GaleriController::class, 'edit'])->name('edit');
        Route::put('{galeri}', [GaleriController::class, 'update'])->name('update');
        Route::delete('{galeri}', [GaleriController::class, 'destroy'])->name('destroy');
    });

    // Siswa Routes
    Route::prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('index');
        Route::get('/create', [SiswaController::class, 'create'])->name('create');
        Route::post('/', [SiswaController::class, 'store'])->name('store');
        Route::get('{id}/edit', [SiswaController::class, 'edit'])->name('edit');
        Route::put('{id}', [SiswaController::class, 'update'])->name('update');
        Route::delete('{id}', [SiswaController::class, 'destroy'])->name('destroy');
    });

    // Sekolah Routes
    Route::prefix('sekolah')->name('sekolah.')->group(function () {
        Route::get('/', [SekolahController::class, 'index'])->name('index');
        Route::get('{id}/edit', [SekolahController::class, 'edit'])->name('edit');
        Route::put('{id}', [SekolahController::class, 'update'])->name('update');
    });

    // Informasi Pendaftaran Routes
    Route::prefix('informasipendaftaran')->name('informasipendaftaran.')->group(function () {
        Route::get('/', [InformasiPendaftaranController::class, 'index'])->name('index');
        Route::get('{id}/edit', [InformasiPendaftaranController::class, 'edit'])->name('edit');
        Route::put('{id}', [InformasiPendaftaranController::class, 'update'])->name('update');
    });

    // Ekstrakurikuler Routes
    Route::prefix('ekstrakurikuler')->name('ekstrakurikuler.')->group(function () {
        Route::get('/', [EkstrakulikulerController::class, 'index'])->name('index');
        Route::get('/create', [EkstrakulikulerController::class, 'create'])->name('create');
        Route::post('/', [EkstrakulikulerController::class, 'store'])->name('store');
        Route::get('{ekstrakulikuler}/edit', [EkstrakulikulerController::class, 'edit'])->name('edit');
        Route::put('{ekstrakulikuler}', [EkstrakulikulerController::class, 'update'])->name('update');
        Route::delete('{ekstrakulikuler}', [EkstrakulikulerController::class, 'destroy'])->name('destroy');
    });

    // Struktur Organisasi Routes
    Route::prefix('strukturorganisasi')->name('strukturorganisasi.')->group(function () {
        Route::get('/', [StrukturOrganisasiController::class, 'index'])->name('index');
        Route::get('/create', [StrukturOrganisasiController::class, 'create'])->name('create');
        Route::post('/', [StrukturOrganisasiController::class, 'store'])->name('store');
        Route::get('{strukturOrganisasi}/edit', [StrukturOrganisasiController::class, 'edit'])->name('edit');
        Route::put('{strukturOrganisasi}', [StrukturOrganisasiController::class, 'update'])->name('update');
        Route::delete('{strukturOrganisasi}', [StrukturOrganisasiController::class, 'destroy'])->name('destroy');
    });

    // Acara Routes
    Route::prefix('acara')->name('acara.')->group(function () {
        Route::get('/', [AcaraController::class, 'index'])->name('index');
        Route::get('/create', [AcaraController::class, 'create'])->name('create');
        Route::post('/', [AcaraController::class, 'store'])->name('store');
        Route::get('{acara}', [AcaraController::class, 'show'])->name('show');
        Route::get('{acara}/edit', [AcaraController::class, 'edit'])->name('edit');
        Route::put('{acara}', [AcaraController::class, 'update'])->name('update');
        Route::delete('{acara}', [AcaraController::class, 'destroy'])->name('destroy');
    });

    // Fasilitas Routes
    Route::prefix('fasilitas')->name('fasilitas.')->group(function () {
        Route::get('/', [FasilitasController::class, 'index'])->name('index');
        Route::get('/create', [FasilitasController::class, 'create'])->name('create');
        Route::post('/', [FasilitasController::class, 'store'])->name('store');
        Route::get('{fasilitas}', [FasilitasController::class, 'show'])->name('show');
        Route::get('{fasilitas}/edit', [FasilitasController::class, 'edit'])->name('edit');
        Route::put('{fasilitas}', [FasilitasController::class, 'update'])->name('update');
        Route::delete('{fasilitas}', [FasilitasController::class, 'destroy'])->name('destroy');
    });

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/store', [AdminController::class, 'store'])->name('store');
        Route::get('{id}/edit', [AdminController::class, 'edit'])->name('edit');
        Route::put('{id}', [AdminController::class, 'update'])->name('update');
        Route::delete('{id}', [AdminController::class, 'destroy'])->name('destroy');
    });
});
