<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class StrukturOrganisasiController extends Controller
{
    /**
     * Satu‑satunya sumber kebenaran daftar enum "jabatan".
     * Pastikan migration ENUM, validasi, dan <select> di view
     * semuanya mengambil data dari properti ini.
     */
    private array $opsiJabatan = [
        'Kepala Sekolah',
        'Wakil Kepala Sekolah',
        'Guru Mata Pelajaran',
        'Guru Wali Kelas',
        'Guru Ketertiban',
        'Tata Usaha',
        'Staf Lainnya',
        'Kebersihan',
        'Satpam',
    ];

    /* ───────────────────────── INDEX ───────────────────────── */
    public function index()
    {
        $items = StrukturOrganisasi::with('superAdmin')
                  ->latest()->paginate(10);

        return view('superadmin.strukturorganisasi', compact('items'));
    }

    /* ───────────────────────── CREATE ──────────────────────── */
    public function create()
    {
        return view('superadmin.createstrukturorganisasi', [
            'opsiJabatan' => $this->opsiJabatan,
        ]);
    }

    /* ───────────────────────── STORE ───────────────────────── */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'superAdmin_id' => ['nullable', 'exists:superAdmin,superAdmin_id'],
            'namaGuru'      => ['required', 'string', 'max:255'],
            'nip'           => ['required', 'string', 'max:50',
                                'unique:strukturOrganisasi,nip'],
            'jabatan'       => ['required', Rule::in($this->opsiJabatan)],
            'gambar'        => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $validated['gambar'] = $request->file('gambar')
                                       ->store('struktur_organisasi', 'public');
        $validated['superAdmin_id'] = $validated['superAdmin_id'] ?? 1;

        StrukturOrganisasi::create($validated);

        return redirect()->route('strukturOrganisasi.index')
                         ->with('success', 'Data berhasil ditambahkan.');
    }

    /* ───────────────────────── SHOW ───────────────────────── */
    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('superadmin.showstrukturorganisasi', compact('strukturOrganisasi'));
    }

    /* ───────────────────────── EDIT ───────────────────────── */
    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('superadmin.editstrukturorganisasi', [
            'strukturOrganisasi' => $strukturOrganisasi,
            'opsiJabatan'        => $this->opsiJabatan,
        ]);
    }

    /* ───────────────────────── UPDATE ─────────────────────── */
    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        $validated = $request->validate([
            'superAdmin_id' => ['nullable', 'exists:superAdmin,superAdmin_id'],
            'namaGuru'      => ['required', 'string', 'max:255'],
            'nip'           => ['required', 'string', 'max:50',
                                Rule::unique('strukturOrganisasi', 'nip')
                                    ->ignore($strukturOrganisasi->jabatan_id, 'jabatan_id')],
            'jabatan'       => ['required', Rule::in($this->opsiJabatan)],
            'gambar'        => ['sometimes', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // ganti gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            if ($strukturOrganisasi->gambar &&
                Storage::disk('public')->exists($strukturOrganisasi->gambar)) {
                Storage::disk('public')->delete($strukturOrganisasi->gambar);
            }

            $validated['gambar'] = $request->file('gambar')
                                           ->store('struktur_organisasi', 'public');
        }

        $validated['superAdmin_id'] = $validated['superAdmin_id'] ?? 1;

        $strukturOrganisasi->update($validated);

        return redirect()->route('strukturOrganisasi.index')
                         ->with('success', 'Data berhasil diperbarui.');
    }

    /* ───────────────────────── DESTROY ────────────────────── */
    public function destroy(StrukturOrganisasi $strukturOrganisasi)
    {
        if ($strukturOrganisasi->gambar &&
            Storage::disk('public')->exists($strukturOrganisasi->gambar)) {
            Storage::disk('public')->delete($strukturOrganisasi->gambar);
        }

        $strukturOrganisasi->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function guest()
{
    // urutan kustom
    $order = [
        'Kepala Sekolah',
        'Wakil Kepala Sekolah',
        'Guru Ketertiban',
        'Guru Mata Pelajaran',
        'Guru Wali Kelas',
        'Kebersihan',
        'Satpam',
        'Staf Lainnya',
    ];

    $items = StrukturOrganisasi::orderByRaw(
                "FIELD(jabatan, '".implode("','", $order)."')"
             )->get();

    return view('guest.strukturorganisasi', compact('items'));
}
}
