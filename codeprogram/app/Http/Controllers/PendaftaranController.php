<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{

    public function registerAwal()
{
    return view('guest.registrasi');
}

public function storeAwal(Request $request)
{
    $validated = $request->validate([
        'namaPendaftar' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:dataPendaftar,email',
        'sandi' => 'required|string|min:6|confirmed',
    ]);

    $pendaftar = new DataPendaftar();
    $pendaftar->namaPendaftar = $validated['namaPendaftar'];
    $pendaftar->email = $validated['email'];
    $pendaftar->sandi = Hash::make($validated['sandi']);
    $pendaftar->save();

    return redirect()->route('guest.home')->with('success', 'Registrasi awal berhasil. Silakan lengkapi data!');
}

    // Menampilkan formulir pendaftaran
    public function create()
    {
        return view('siswa.formulirpendaftaran'); // Pastikan 'pendaftaran' adalah nama file Blade Anda
    }

    // Menyimpan data pendaftaran
    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'namaPendaftar' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:dataPendaftar,email',
            'sandi' => 'required|string|min:6',
            'nisn' => 'nullable|string|max:50',
            'kewarganegaraan' => 'required|in:Warga Negara Indonesia,Warga Negara Asing',
            'nik' => 'nullable|string|max:50',
            'tempatLahir' => 'nullable|string|max:255',
            'tanggalLahir' => 'nullable|date',
            'jenisKelamin' => 'nullable|in:Laki-laki,Perempuan',
            'jumlahSaudara' => 'nullable|integer',
            'anakKe' => 'nullable|integer',
            'agama' => 'nullable|in:Islam',
            'citaCita' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'hobi' => 'nullable|string|max:255',
            'pembiaya' => 'nullable|in:OrangTua,Wali Siswa',
            'kebutuhanKhusus' => 'nullable|in:Tuna Netra,Tuna Rungu,TunaWicara,Tuna Daksa,Tuna Grahita,Lainnya',
            'praSekolah' => 'nullable|in:Pernah PAUD,Pernah TK/RA',

            // Data Keluarga
            'noKartuKeluarga' => 'nullable|string|max:50',
            'kepalaKeluarga' => 'nullable|string|max:255',
            'fotoKartuKeluarga' => 'nullable|image',
            'fotoAkteLahir' => 'nullable|image',
            'fotoPendaftar' => 'nullable|image',

            // Data Ayah
            'namaAyah' => 'nullable|string|max:255',
            'statusAyah' => 'nullable|in:Hidup,Meninggal,Tidak Diketahui',
            'nikAyah' => 'nullable|string|max:50',
            'tempatLahirAyah' => 'nullable|string|max:100',
            'tanggalLahirAyah' => 'nullable|date',
            'pendidikanAyah' => 'nullable|in:SD,SMP,SMA,D1,D2,D3,D4/S1,S2,S3,Tidak Sekolah',
            'pekerjaanAyah' => 'nullable|string|max:255',
            'pendapatanAyah' => 'nullable|in:500.000 - 1.000.000,1.000.000 - 2.000.000,2.000.000 - 3.000.000,3.000.000 - 5.000.000,Lebih Dari 5.000.000,Tidak Ada',

            // Data Ibu
            'namaIbu' => 'nullable|string|max:255',
            'statusIbu' => 'nullable|in:Hidup,Meninggal',
            'nikIbu' => 'nullable|string|max:50',
            'tempatLahirIbu' => 'nullable|string|max:100',
            'tanggalLahirIbu' => 'nullable|date',
            'pendidikanIbu' => 'nullable|in:SD,SMP,SMA,D1,D2,D3,D4/S1,S2,S3',
            'pekerjaanIbu' => 'nullable|string|max:255',
            'pendapatanIbu' => 'nullable|in:500.000 - 1.000.000,1.000.000 - 2.000.000,2.000.000 - 3.000.000,3.000.000 - 5.000.000,Lebih Dari 5.000.000,Tidak Ada',

            // Data Wali
            'namaWali' => 'nullable|string|max:255',
            'statusWali' => 'nullable|in:Hidup,Meninggal',
            'nikWali' => 'nullable|string|max:50',
            'tempatLahirWali' => 'nullable|string|max:100',
            'tanggalLahirWali' => 'nullable|date',
            'pendidikanWali' => 'nullable|in:SD,SMP,SMA,D1,D2,D3,D4/S1,S2,S3',
            'pekerjaanWali' => 'nullable|string|max:255',
            'pendapatanWali' => 'nullable|in:500.000 - 1.000.000,1.000.000 - 2.000.000,2.000.000 - 3.000.000,3.000.000 - 5.000.000,Lebih Dari 5.000.000,Tidak Ada',

            // Alamat & Transport
            'provinsi' => 'nullable|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'statusRumah' => 'nullable|in:Milik Sendiri,Sewa/Kontrak,Rumah Dinas,Rumah Saudara',
            'kecamatan' => 'nullable|string|max:255',
            'desa' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'jarakRumah' => 'nullable|in:<5 Km,5 - 10 Km,11 - 20 Km,21 - 30 Km,>30 Km',
            'kendaraan' => 'nullable|in:Jalan Kaki,Sepeda,Sepeda Motor,Mobil Pribadi,Antar Jemput,Angkutan Umum',
            'waktuPerjalanan' => 'nullable|in:<1 - 10 menit,10 - 19 menit,20 - 29 menit,30 - 39 menit,1 - 2 jam',
        ]);

        // Simpan data pendaftar
        $pendaftar = new DataPendaftar();
        $pendaftar->fill($validated);

        // Enkripsi password sebelum disimpan
        $pendaftar->sandi = Hash::make($request->sandi);

        // Mengelola file upload
        if ($request->hasFile('fotoKartuKeluarga')) {
            $pendaftar->fotoKartuKeluarga = $request->file('fotoKartuKeluarga')->store('images');
        }

        if ($request->hasFile('fotoAkteLahir')) {
            $pendaftar->fotoAkteLahir = $request->file('fotoAkteLahir')->store('images');
        }

        if ($request->hasFile('fotoPendaftar')) {
            $pendaftar->fotoPendaftar = $request->file('fotoPendaftar')->store('images');
        }

        // Simpan data ke dalam database
        $pendaftar->save();

        // Redirect ke halaman sukses
        return redirect()->route('siswa.pendaftaran_success');
    }

    // Menampilkan halaman sukses
    public function success()
    {
        return view('siswa.pendaftaran_success');
    }
}
