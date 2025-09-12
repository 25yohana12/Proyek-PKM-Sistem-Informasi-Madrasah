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

class SuperAdminController extends Controller
{
    public function index()
    {
        // Mengambil jumlah data untuk setiap kategori
        $guruCount = Guru::count();
        $siswaCount = Siswa::count();
        $fasilitasCount = Fasilitas::count();
        $prestasiCount = Prestasi::count();
        $ekstrakurikulerCount = Ekstrakulikuler::count();
        $acaraCount = Acara::count();
        $datapendaftarCount = DataPendaftar::count(); // Jika ada tabel pendaftaran
        
        return view('superadmin.dashboard', compact(
            'guruCount', 'siswaCount', 'fasilitasCount', 
            'prestasiCount', 'ekstrakurikulerCount', 'acaraCount', 'datapendaftarCount',
        ));
    }
}
