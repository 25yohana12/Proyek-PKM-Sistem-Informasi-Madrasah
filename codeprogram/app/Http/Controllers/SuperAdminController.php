<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Fasilitas;
use App\Models\Prestasi;
use App\Models\Ekstrakurikuler;
use App\Models\Acara;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        // Mengambil jumlah data untuk setiap kategori
        $guruCount = Guru::count();
        $siswaCount = Siswa::count();
        $fasilitasCount = Fasilitas::count();
        $prestasiCount = Prestasi::count();
        $ekstrakurikulerCount = Ekstrakurikuler::count();
        $acaraCount = Acara::count();
        $pendaftarCount = Pendaftaran::count(); // Jika ada tabel pendaftaran
        
        return view('dashboard', compact(
            'guruCount', 'siswaCount', 'fasilitasCount', 
            'prestasiCount', 'ekstrakurikulerCount', 'acaraCount', 'pendaftarCount'
        ));
    }
}
