<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\InformasiPendaftaranController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Superadmin\PegawaiController; 
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotifikasiController;


// Public Routes
Route::get('/', function () {return view('guest.home');})->name('guest.home');
Route::get('/ProfilSekolah', function () { return view('guest.profilsekolah'); });
Route::get('/guru', [GuruController::class, 'guest'])->name('guest.guru');
Route::get('/kelas', [SiswaController::class, 'guest'])->name('guest.siswa');
Route::get('/perayaan', [AcaraController::class, 'guest'])->name('guest.acara');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('guest.pengumuman');
Route::get('/prestasi', [PrestasiController::class, 'guest'])->name('guest.prestasi');
Route::get('/fasilitas', [FasilitasController::class, 'guest'])->name('guest.fasilitas');
Route::get('/ekstrakurikuler', [EkstrakulikulerController::class, 'guest'])->name('guest.ekstrakulikuler');
Route::get('/galeri', [GaleriController::class, 'guest'])->name('guest.galeri');
Route::get('/strukturorganisasi', [StrukturOrganisasiController::class, 'guest'])->name('guest.strukturorganisasi');
Route::get('/registrasi', [PendaftaranController::class, 'registerAwal'])->name('siswa.register_awal');
Route::post('/registrasi', [PendaftaranController::class, 'storeAwal'])->name('siswa.store_awal');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Siswa Routes
Route::prefix('MIN')->name('siswa.')->middleware('auth:pendaftar')->group(function () {
    Route::get('/home', function () {return view('siswa.home');})->name('home');
    Route::get('/ProfilSekolah', function () { return view('siswa.profilsekolah');})->name('profilsekolah');
    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('create.pendaftaran');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('store.pendaftaran');
    Route::get('/guru', [GuruController::class, 'siswa'])->name('siswa.guru');
    Route::get('/kelas', [SiswaController::class, 'siswa'])->name('siswa.siswa');
    Route::get('/perayaan', [AcaraController::class, 'siswa'])->name('siswa.acara');
    Route::get('/pengumuman', [PengumumanController::class, 'siswa'])->name('siswa.pengumuman');
    Route::get('/prestasi', [PrestasiController::class, 'siswa'])->name('siswa.prestasi');
    Route::get('/fasilitas', [FasilitasController::class, 'siswa'])->name('siswa.fasilitas');
    Route::get('/ekstrakurikuler', [EkstrakulikulerController::class, 'siswa'])->name('siswa.ekstrakulikuler');
    Route::get('/galeri', [GaleriController::class, 'siswa'])->name('siswa.galeri');
    Route::get('/strukturorganisasi', [StrukturOrganisasiController::class, 'siswa'])->name('siswa.strukturorganisasi');
    Route::get('/pendaftaran/success', [PendaftaranController::class, 'success'])->name('success.pendaftaran');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminRoleController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [AdminRoleController::class, 'dashboard'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/guru', [AdminRoleController::class, 'guru'])->name('guru');
    Route::get('/siswa', [AdminRoleController::class, 'siswa'])->name('siswa');
    Route::get('/fasilitas', [AdminRoleController::class, 'fasilitas'])->name('fasilitas');
    Route::get('/prestasi', [AdminRoleController::class, 'prestasi'])->name('prestasi');
    Route::get('/ekstrakulikuler', [AdminRoleController::class, 'extrakulikuler'])->name('ekstrakulikuler');
    Route::get('/acara', [AdminRoleController::class, 'acara'])->name('acara');
    Route::get('/admin', [AdminRoleController::class, 'admin'])->name('admin');
    Route::get('/informasipendaftaran', [AdminRoleController::class, 'informasipendaftaran'])->name('informasipendaftaran');
    Route::get('/pendaftaran', [AdminRoleController::class, 'pendaftaran'])->name('pendaftaran');
    Route::get('/sekolah', [AdminRoleController::class, 'sekolah'])->name('sekolah');
    Route::get('/strukturorganisasi', [AdminRoleController::class, 'strukturorganisasi'])->name('strukturorganisasi');
    Route::get('/notifikasi', [NotifikasiController::class, 'adminIndex'])->name('notifikasi.index');
    Route::get('/notifikasi/{id}', [NotifikasiController::class, 'show'])->name('notifikasi.show');
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

        // Guru Routes
    Route::prefix('pegawai')->name('pegawai.')->group(function () {
        Route::get('/', [PegawaiController::class, 'index'])->name('index');       // list guru
        Route::get('/create', [PegawaiController::class, 'create'])->name('create'); // form tambah
        Route::post('/', [PegawaiController::class, 'store'])->name('store');        // simpan
        Route::get('{id}', [PegawaiController::class, 'show'])->name('show');        // detail guru
        Route::get('{id}/edit', [PegawaiController::class, 'edit'])->name('edit');   // form edit
        Route::put('{id}', [PegawaiController::class, 'update'])->name('update');    // update
        Route::delete('{id}', [PegawaiController::class, 'destroy'])->name('destroy'); // hapus
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

    // Prestasi
    Route::prefix('prestasi')->name('prestasi.')->group(function () {
        Route::get('/', [PrestasiController::class, 'index'])->name('index');
        Route::get('/create', [PrestasiController::class, 'create'])->name('create');
        Route::post('/', [PrestasiController::class, 'store'])->name('store');
        Route::get('/{id}', [PrestasiController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [PrestasiController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PrestasiController::class, 'update'])->name('update');
        Route::delete('/{id}', [PrestasiController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/delete-image', [PrestasiController::class, 'deleteImage'])->name('deleteImage');
        Route::get('/search/query', [PrestasiController::class, 'search'])->name('search');
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

    // Pendaftaran
    Route::prefix('pendaftaran')->name('pendaftaran.')->group(function () {
        Route::get('/', [PendaftaranController::class, 'index'])->name('index'); // Daftar semua pendaftar
        Route::get('/create', [PendaftaranController::class, 'create'])->name('create'); // Form input pendaftar (jika perlu)
        Route::post('/', [PendaftaranController::class, 'store'])->name('store'); // Simpan data baru
        Route::get('/{id}', [PendaftaranController::class, 'show'])->name('show'); // Detail pendaftar
        Route::get('/{id}/edit', [PendaftaranController::class, 'edit'])->name('edit'); // Edit pendaftar
        Route::put('/{id}', [PendaftaranController::class, 'update'])->name('update'); // Update
        Route::delete('/{id}', [PendaftaranController::class, 'destroy'])->name('destroy'); // Hapus
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
