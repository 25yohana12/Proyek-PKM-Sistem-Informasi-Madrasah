<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
            'email'         => [
                'required','string','email','max:255',
                Rule::unique((new DataPendaftar)->getTable(), 'email'),
            ],
            // pastikan ada input bernama sandi_confirmation di form register awal
            'sandi'         => 'required|string|min:6|confirmed',
        ]);

        $pendaftar = new DataPendaftar();
        $pendaftar->namaPendaftar = $validated['namaPendaftar'];
        $pendaftar->email         = $validated['email'];
        $pendaftar->sandi         = Hash::make($validated['sandi']);
        // biarkan kolom default dari DB: superAdmin_id=1, role_id=3, konfirmasi=Belum
        $pendaftar->save();

        return redirect()
            ->route('guest.home')
            ->with('success', 'Registrasi awal berhasil. Silakan lengkapi data!');
    }

    // Menampilkan formulir pendaftaran lengkap
    public function create()
    {
        return view('siswa.formulirpendaftaran');
    }

    // Menyimpan data pendaftaran lengkap
public function store(Request $request)
{
    $validated = $request->validate([
        'namaPendaftar'   => 'required|string|max:255',
        'email'           => [
            'required','string','email','max:255',
            Rule::unique((new DataPendaftar)->getTable(), 'email'),
        ],
        'sandi'           => 'required|string|min:6',

        'nisn'            => 'nullable|string|max:50',
        'kewarganegaraan' => 'required|in:Warga Negara Indonesia,Warga Negara Asing',
        'nik'             => 'nullable|string|max:50',
        'tempatLahir'     => 'nullable|string|max:255',

        // ⬇️ VALIDASI: umur minimal 5 tahun
        'tanggalLahir'    => [
            'nullable',
            'date',
            'before_or_equal:' . now()->subYears(6)->format('Y-m-d'),
        ],

        'jenisKelamin'    => 'nullable|in:Laki-laki,Perempuan',
        'jumlahSaudara'   => 'nullable|integer',
        'anakKe'          => 'nullable|integer',
        'agama'           => 'nullable|in:Islam',
        'citaCita'        => 'nullable|string|max:255',
        'telepon'         => 'nullable|string|max:50',
        'hobi'            => 'nullable|string|max:255',
        'pembiaya'        => 'nullable|in:OrangTua,Wali Siswa',

        'kebutuhanKhusus' => 'nullable|in:Tidak,Tuna Netra,Tuna Rungu,TunaWicara,Tuna Daksa,Tuna Grahita,Lainnya',
        'praSekolah'      => 'nullable|in:Pernah PAUD,Pernah TK/RA',

        // File
        'noKartuKeluarga'   => 'nullable|string|max:50',
        'kepalaKeluarga'    => 'nullable|string|max:255',
        'fotoKartuKeluarga' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        'fotoAkteLahir'     => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        'fotoPendaftar'     => 'nullable|mimes:jpg,jpeg,png|max:2048',

        // Ayah
        'namaAyah'         => 'nullable|string|max:255',
        'statusAyah'       => 'nullable|in:Hidup,Meninggal,Tidak Diketahui',
        'nikAyah'          => 'nullable|string|max:50',
        'tempatLahirAyah'  => 'nullable|string|max:100',
        'tanggalLahirAyah' => 'nullable|date',
        'pendidikanAyah'   => 'nullable|in:SD,SMP,SMA,D1,D2,D3,D4/S1,S2,S3,Tidak Sekolah',
        'pekerjaanAyah'    => 'nullable|string|max:255',
        'pendapatanAyah'   => 'nullable|in:500.000 - 1.000.000,1.000.000 - 2.000.000,2.000.000 - 3.000.000,3.000.000 - 5.000.000,Lebih Dari 5.000.000,Tidak Ada',

        // Ibu
        'namaIbu'          => 'nullable|string|max:255',
        'statusIbu'        => 'nullable|in:Hidup,Meninggal',
        'nikIbu'           => 'nullable|string|max:50',
        'tempatLahirIbu'   => 'nullable|string|max:100',
        'tanggalLahirIbu'  => 'nullable|date',
        'pendidikanIbu'    => 'nullable|in:SD,SMP,SMA,D1,D2,D3,D4/S1,S2,S3',
        'pekerjaanIbu'     => 'nullable|string|max:255',
        'pendapatanIbu'    => 'nullable|in:500.000 - 1.000.000,1.000.000 - 2.000.000,2.000.000 - 3.000.000,3.000.000 - 5.000.000,Lebih Dari 5.000.000,Tidak Ada',

        // Wali
        'namaWali'         => 'nullable|string|max:255',
        'statusWali'       => 'nullable|in:Hidup,Meninggal',
        'nikWali'          => 'nullable|string|max:50',
        'tempatLahirWali'  => 'nullable|string|max:100',
        'tanggalLahirWali' => 'nullable|date',
        'pendidikanWali'   => 'nullable|in:SD,SMP,SMA,D1,D2,D3,D4/S1,S2,S3',
        'pekerjaanWali'    => 'nullable|string|max:255',

        // ⚠️ konsistenkan opsi, hilangkan spasi sebelum "Tidak Ada"
        'pendapatanWali'   => 'nullable|in:500.000 - 1.000.000,1.000.000 - 2.000.000,2.000.000 - 3.000.000,3.000.000 - 5.000.000,Lebih Dari 5.000.000,Tidak Ada',

        // Alamat & Transport
        'provinsi'         => 'nullable|string|max:255',
        'kabupaten'        => 'nullable|string|max:255',
        'statusRumah'      => 'nullable|in:Milik Sendiri,Sewa/Kontrak,Rumah Dinas,Rumah Saudara',
        'kecamatan'        => 'nullable|string|max:255',
        'desa'             => 'nullable|string|max:255',
        'alamat'           => 'nullable|string|max:255',
        'jarakRumah'       => 'nullable|in:<5 Km,5 - 10 Km,11 - 20 Km,21 - 30 Km,>30 Km',
        'kendaraan'        => 'nullable|in:Jalan Kaki,Sepeda,Sepeda Motor,Mobil Pribadi,Antar Jemput,Angkutan Umum',
        'waktuPerjalanan'  => 'nullable|in:<1 - 10 menit,10 - 19 menit,20 - 29 menit,30 - 39 menit,1 - 2 jam',
    ], [
        // pesan khusus
        'tanggalLahir.before_or_equal' => 'Umur minimal harus 5 tahun.',
    ]);

    $pendaftar = new DataPendaftar();
    $pendaftar->fill($validated);

    // hash password
    $pendaftar->sandi = Hash::make($request->sandi);

    // upload ke storage/app/public/pendaftar
    if ($request->hasFile('fotoKartuKeluarga')) {
        $pendaftar->fotoKartuKeluarga = $request->file('fotoKartuKeluarga')->store('pendaftar', 'public');
    }
    if ($request->hasFile('fotoAkteLahir')) {
        $pendaftar->fotoAkteLahir = $request->file('fotoAkteLahir')->store('pendaftar', 'public');
    }
    if ($request->hasFile('fotoPendaftar')) {
        $pendaftar->fotoPendaftar = $request->file('fotoPendaftar')->store('pendaftar', 'public');
    }

    $pendaftar->save();

    return redirect()->route('siswa.pendaftaran_success');
}

    public function success()
    {
        return view('siswa.pendaftaran_success');
    }
}
