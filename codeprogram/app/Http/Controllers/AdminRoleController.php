<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Fasilitas;
use App\Models\Prestasi;
use App\Models\Ekstrakulikuler;
use App\Models\Acara;
use Illuminate\Http\Request;
use App\Models\DataPendaftar;
use App\Models\Notifikasi;

class AdminRoleController extends Controller
{
    public function dashboard()
    {
        // Mengambil jumlah data untuk setiap kategori
        $guruCount = Guru::count();
        $siswaCount = Siswa::count();
        $fasilitasCount = Fasilitas::count();
        $prestasiCount = Prestasi::count();
        $ekstrakurikulerCount = Ekstrakulikuler::count();
        $acaraCount = Acara::count();
        $datapendaftarCount = DataPendaftar::count(); // Jika ada tabel pendaftaran
        $notifCount = Notifikasi::where('read', false)->count();
        $notifikasis = Notifikasi::orderBy('created_at', 'desc')->take(10)->get();
        
        return view('admin.dashboard', compact(
            'guruCount', 'siswaCount', 'fasilitasCount', 
            'prestasiCount', 'ekstrakurikulerCount', 'acaraCount', 'datapendaftarCount', 'notifCount', 'notifikasis'
        ));
    }

    public function acara()
    {
        $acaras = Acara::all();
        return view('admin.acara', compact('acaras'));
    }

        public function admin()
    {
        $admins = Admin::with('role')->get(); // Mengambil semua admin beserta relasi role
        return view('admin.admin', compact('admins')); // Menyesuaikan dengan folder struktur
    }

        public function extrakulikuler()
    {
        // Retrieve all extracurricular activities
        $ekstrakulikulers = Ekstrakulikuler::all();

        return view('admin.ekstrakulikuler', compact('ekstrakulikulers'));
    }

        public function fasilitas()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.fasilitas', compact('fasilitas'));
    }

    public function guru()
{
    $gurus = Guru::whereNotNull('nip')   // hanya yang nip tidak NULL
                 ->where('nip', '!=', '') // dan bukan string kosong
                 ->paginate(10);

    return view('admin.guru', compact('gurus'));
}

    public function informasipendaftaran()
    {
        $informasi = InformasiPendaftaran::first();
        
        // Jika belum ada data, buat data default
        if (!$informasi) {
            $informasi = InformasiPendaftaran::create([
                'tahunAjaran' => '2025/2026',
                'tanggalPendaftaran' => now(),
                'tanggalPengumuman' => now()->addDays(30),
                'tanggalPenutupan' => now()->addDays(60),
                'jumlahSiswa' => 100,
                'pengumuman' => 'Pendaftaran siswa baru akan segera dibuka.'
            ]);
        }
        
        return view('admin.informasipendaftaran', compact('informasi'));
    }

        public function pendaftaran()
    {
        // ambil semua data pendaftar
        $pendaftar = DataPendaftar::all();
        return view('admin.datapendaftar', compact('pendaftar'));
    }
    
        public function prestasi()
    {
        $prestasis = Prestasi::orderBy('created_at', 'desc')->get();
        return view('admin.prestasi', compact('prestasis'));
    }

        public function sekolah()
    {
        $sekolah = Sekolah::first(); // Hanya ambil satu data
        return view('admin.sekolah', compact('sekolah'));
    }

        public function siswa()
    {
        $siswa = Siswa::all();

        return view('admin.siswa', compact('siswa'));
    }

        public function strukturorganisasi()
    {
        $items = StrukturOrganisasi::with('superAdmin')
                  ->latest()->paginate(10);

        return view('admin.strukturorganisasi', compact('items'));
    }
}
