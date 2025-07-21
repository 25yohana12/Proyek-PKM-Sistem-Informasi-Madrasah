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
use App\Http\Controllers\InformasiPendaftaranController;
use App\Http\Controllers\PendaftarController; 
use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('guest.home');});
Route::get('/ProfilSekolah', function () {return view('guest.profilsekolah');});
Route::get('/guru', [GuruController::class, 'guest'])->name('data.guru');
Route::get('/siswa', function () {return view('guest.siswa');});
Route::get('/siswa', [SiswaController::class, 'guest'])->name('guest.siswa');
Route::get('/perayaan', [AcaraController::class, 'guest'])->name('guest.acara');
Route::get('/prestasi', [PrestasiController::class, 'guest'])->name('guest.prestasi');
Route::get('/fasilitas', [FasilitasController::class, 'guest'])->name('guest.Fasilitas');
Route::get('/galeri', [GaleriController::class, 'guest']) ->name('galeri.guest');

Route::prefix('superadmin')->group(function () {
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('dashboard');
    Route::get('/guru', [GuruController::class, 'index'])->name('data.guru');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index'); // Menampilkan semua galeri
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create'); // Menampilkan form tambah galeri
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store'); // Menyimpan galeri baru
    Route::get('/galeri/{galeri}', [GaleriController::class, 'show'])->name('galeri.show'); // Menampilkan detail galeri
    Route::get('/galeri/{galeri}/edit', [GaleriController::class, 'edit'])->name('galeri.edit'); // Menampilkan form edit galeri
    Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])->name('galeri.update'); // Memperbarui galeri
    Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('galeri.destroy'); // Menghapus galeri
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/sekolah/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::get('/informasipendaftaran', [InformasiPendaftaranController::class, 'index'])->name('informasi.index');
    Route::get('/informasipendaftaran/{id}/edit', [InformasiPendaftaranController::class, 'edit'])->name('informasi.edit');
    Route::put('/informasipendaftaran/{id}', [InformasiPendaftaranController::class, 'update'])->name('informasi.update');
    Route::get('/daftar-pendaftar', [PendaftarController::class, 'index'])->name('daftar-pendaftar.index');
    Route::get('/daftar-pendaftar/create', [PendaftarController::class, 'create'])->name('daftar-pendaftar.create');
    Route::post('/daftar-pendaftar', [PendaftarController::class, 'store'])->name('daftar-pendaftar.store');
    Route::get('/daftar-pendaftar/{id}', [PendaftarController::class, 'show'])->name('daftar-pendaftar.show');
    Route::get('/daftar-pendaftar/{id}/edit', [PendaftarController::class, 'edit'])->name('daftar-pendaftar.edit');
    Route::put('/daftar-pendaftar/{id}', [PendaftarController::class, 'update'])->name('daftar-pendaftar.update');
    Route::delete('/daftar-pendaftar/{id}', [PendaftarController::class, 'destroy'])->name('daftar-pendaftar.destroy');
    Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakulikuler.index'); // Menampilkan daftar ekstrakurikuler
    Route::get('/ekstrakulikuler/create', [EkstrakulikulerController::class, 'create'])->name('ekstrakulikuler.create'); // Menampilkan form tambah ekstrakurikuler
    Route::post('/ekstrakulikuler', [EkstrakulikulerController::class, 'store'])->name('ekstrakulikuler.store'); // Menyimpan ekstrakurikuler baru
    Route::get('/ekstrakulikuler/{ekstrakulikuler}', [EkstrakulikulerController::class, 'show'])->name('ekstrakulikuler.show'); // Menampilkan detail ekstrakurikuler
    Route::get('/ekstrakulikuler/{ekstrakulikuler}/edit', [EkstrakulikulerController::class, 'edit'])->name('ekstrakulikuler.edit'); // Menampilkan form edit ekstrakurikuler
    Route::put('/ekstrakulikuler/{ekstrakulikuler}', [EkstrakulikulerController::class, 'update'])->name('ekstrakulikuler.update'); // Memperbarui ekstrakurikuler
    Route::delete('/ekstrakulikuler/{ekstrakulikuler}', [EkstrakulikulerController::class, 'destroy'])->name('ekstrakulikuler.destroy'); // Menghapus ekstrakurikuler
    Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakulikuler.index'); // Show all Ekstrakurikuler
    Route::get('/ekstrakulikuler/create', [EkstrakulikulerController::class, 'create'])->name('ekstrakulikuler.create'); // Show form to create Ekstrakurikuler
    Route::post('/ekstrakulikuler', [EkstrakulikulerController::class, 'store'])->name('ekstrakulikuler.store'); // Store new Ekstrakurikuler
    Route::get('/ekstrakulikuler/{ekstrakulikuler}/edit', [EkstrakulikulerController::class, 'edit'])->name('ekstrakulikuler.edit'); // Show form to edit Ekstrakurikuler
    Route::put('/ekstrakulikuler/{ekstrakulikuler}', [EkstrakulikulerController::class, 'update'])->name('ekstrakulikuler.update'); // Update Ekstrakurikuler
    Route::delete('/ekstrakulikuler/{ekstrakulikuler}', [EkstrakulikulerController::class, 'destroy'])->name('ekstrakulikuler.destroy'); // Delete Ekstrakurikuler
    Route::get('/ekstrakulikuler/{ekstrakulikuler}', [EkstrakulikulerController::class, 'show'])->name('ekstrakulikuler.show');
    // Menampilkan semua acara
    Route::get('/acara', [AcaraController::class, 'index'])->name('acara.index'); 

    // Menampilkan form untuk menambah acara
    Route::get('/acara/create', [AcaraController::class, 'create'])->name('acara.create'); 

    // Menyimpan acara baru
    Route::post('/acara', [AcaraController::class, 'store'])->name('acara.store'); 

    // Menampilkan detail acara
    Route::get('/acara/{acara}', [AcaraController::class, 'show'])->name('acara.show'); 

    // Menampilkan form untuk mengedit acara
    Route::get('/acara/{acara}/edit', [AcaraController::class, 'edit'])->name('acara.edit'); 

    // Memperbarui acara
    Route::put('/acara/{acara}', [AcaraController::class, 'update'])->name('acara.update'); 

    // Menghapus acara
    Route::delete('/acara/{acara}', [AcaraController::class, 'destroy'])->name('acara.destroy'); 

    // Display a list of facilities
    Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');

    // Show the form to create a new facility
    Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');

    // Store a newly created facility
    Route::post('/fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');

    // Display the details of a specific facility
    Route::get('/fasilitas/{fasilitas}', [FasilitasController::class, 'show'])->name('fasilitas.show');

    // Show the form to edit a specific facility
    Route::get('/fasilitas/{fasilitas}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');

    // Update a specific facility
    Route::put('/fasilitas/{fasilitas}', [FasilitasController::class, 'update'])->name('fasilitas.update');

    // Delete a specific facility
    Route::delete('/fasilitas/{fasilitas}', [FasilitasController::class, 'destroy'])->name('superadmin.destroyfasilitas');

    // Menampilkan daftar prestasi
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');

    // Menampilkan form untuk menambah prestasi
    Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');

    // Menyimpan data prestasi
    Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');

    // Menampilkan detail prestasi
    Route::get('/prestasi/{id}', [PrestasiController::class, 'show'])->name('prestasi.show');

    // Menampilkan form untuk mengedit prestasi
    Route::get('/prestasi/{id}/edit', [PrestasiController::class, 'edit'])->name('prestasi.edit');

    // Memperbarui data prestasi
    Route::put('/prestasi/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');

    // Menghapus data prestasi
    Route::delete('/prestasi/{id}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');

    Route::get('/prestasi/{id}', [PrestasiController::class, 'show'])->name('prestasi.show');

    Route::get('/prestasi/{id}/edit', [PrestasiController::class, 'edit'])->name('prestasi.edit');
    
    Route::put('/prestasi/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');

    // Display all admin users
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
    // Display the form for creating a new admin
    Route::get('/admincreate', [AdminController::class, 'create'])->name('admin.create');
    
    // Store a new admin
    Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
    
    // Display the form to edit an existing admin
    Route::get('admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    
    // Update an admin
    Route::put('admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    
    // Delete an admin
    Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});