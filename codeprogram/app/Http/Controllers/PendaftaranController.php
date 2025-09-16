<?php

namespace App\Http\Controllers;

use App\Models\DataPendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Notifikasi;

class PendaftaranController extends Controller
{
    // Menampilkan semua data pendaftar (untuk superadmin)
    public function index()
    {
        $pendaftar = DataPendaftar::all();
        return view('superadmin.datapendaftar', compact('pendaftar'));
    }

    // Registrasi awal (guest)
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
            'sandi'         => 'required|string|min:6|confirmed',
        ]);

        $pendaftar = new DataPendaftar();
        $pendaftar->namaPendaftar = $validated['namaPendaftar'];
        $pendaftar->email         = $validated['email'];
        $pendaftar->sandi         = Hash::make($validated['sandi']);
        // Kolom default: superAdmin_id=1, role_id=3, konfirmasi=Belum
        $pendaftar->save();

        return redirect()
            ->route('guest.home')
            ->with('success', 'Registrasi awal berhasil. Silakan lengkapi data!');
    }

    // Formulir pendaftaran lengkap (siswa)
    public function create()
    {
        $user = Auth::guard('pendaftar')->user();
        return view('siswa.formulirpendaftaran', compact('user'));
    }

    // Menyimpan data pendaftaran lengkap
    public function store(Request $request)
    {
        $user = Auth::guard('pendaftar')->user();

        $validated = $request->validate([
            // ...validasi field seperti sebelumnya...
        ], [
            'tanggalLahir.before_or_equal' => 'Umur minimal harus 5 tahun.',
        ]);

        // cari data pendaftar berdasarkan akun login
        $pendaftar = DataPendaftar::where('email', $user->email)->first();

        if ($pendaftar) {
            $pendaftar->fill($validated);
        } else {
            $pendaftar = new DataPendaftar($validated);
            $pendaftar->email = $user->email;
            $pendaftar->sandi = $user->sandi;
        }

        // upload file jika ada
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

        // Notifikasi ke admin (user_id = null)
        Notifikasi::create([
            'judul' => 'Pendaftaran Baru',
            'pesan' => 'Siswa baru mendaftar: ' . $pendaftar->namaPendaftar,
            'read' => false,
            'data_id' => $pendaftar->pendaftar_id,
            'user_id' => null, // khusus admin
        ]);

        return redirect()->route('siswa.success.pendaftaran');
    }

    public function success()
    {
        return view('siswa.pendaftaran_success');
    }

    // TERIMA PENDAFTAR (ADMIN)
    public function terima($id)
    {
        $pendaftar = DataPendaftar::findOrFail($id);
        $pendaftar->konfirmasi = 'Diterima';
        $pendaftar->save();

        // Notifikasi ke siswa (user_id = id siswa)
        Notifikasi::create([
            'judul' => 'Status Pendaftaran',
            'pesan' => 'Selamat, pendaftaran Anda telah DITERIMA.',
            'read' => false,
            'data_id' => $pendaftar->pendaftar_id,
            'user_id' => $pendaftar->user_id,
        ]);

        return redirect()->back()->with('success', 'Pendaftar diterima dan notifikasi dikirim.');
    }

    // TOLAK PENDAFTAR (ADMIN)
    public function tolak($id)
    {
        $pendaftar = DataPendaftar::findOrFail($id);
        $pendaftar->konfirmasi = 'Ditolak';
        $pendaftar->save();

        // Notifikasi ke siswa (user_id = id siswa)
        Notifikasi::create([
            'judul' => 'Status Pendaftaran',
            'pesan' => 'Maaf, pendaftaran Anda DITOLAK.',
            'read' => false,
            'data_id' => $pendaftar->pendaftar_id,
            'user_id' => $pendaftar->user_id,
        ]);

        return redirect()->back()->with('success', 'Pendaftar ditolak dan notifikasi dikirim.');
    }

    // KOMENTAR ADMIN KE PENDAFTAR
    public function komentar(Request $request, $id)
    {
        $pendaftar = DataPendaftar::findOrFail($id);
        $komentar = $request->input('komentar');

        // Notifikasi ke siswa (user_id = id siswa)
        Notifikasi::create([
            'judul' => 'Komentar Admin',
            'pesan' => $komentar,
            'read' => false,
            'data_id' => $pendaftar->pendaftar_id,
            'user_id' => $pendaftar->user_id,
        ]);

        return redirect()->back()->with('success', 'Komentar dikirim ke siswa.');
    }
}