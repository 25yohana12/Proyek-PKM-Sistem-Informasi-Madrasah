@extends('layouts.superadmin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Detail Pendaftar</h2>
    @if($pendaftar)
        <table class="table table-bordered">
            <tr><th>Nama</th><td>{{ $pendaftar->namaPendaftar }}</td></tr>
            <tr><th>Email</th><td>{{ $pendaftar->email }}</td></tr>
            <tr><th>NISN</th><td>{{ $pendaftar->nisn }}</td></tr>
            <tr><th>Telepon</th><td>{{ $pendaftar->telepon }}</td></tr>
            <tr><th>Tempat Lahir</th><td>{{ $pendaftar->tempatLahir }}</td></tr>
            <tr><th>Tanggal Lahir</th><td>{{ $pendaftar->tanggalLahir }}</td></tr>
            <tr><th>Jenis Kelamin</th><td>{{ $pendaftar->jenisKelamin }}</td></tr>
            <tr><th>Alamat</th><td>{{ $pendaftar->alamat }}</td></tr>
            <tr><th>Kewarganegaraan</th><td>{{ $pendaftar->kewarganegaraan }}</td></tr>
            <tr><th>Agama</th><td>{{ $pendaftar->agama }}</td></tr>
            <tr><th>Cita-cita</th><td>{{ $pendaftar->citaCita }}</td></tr>
            <tr><th>Hobi</th><td>{{ $pendaftar->hobi }}</td></tr>
            <tr><th>Pembiaya</th><td>{{ $pendaftar->pembiaya }}</td></tr>
            <tr><th>Kebutuhan Khusus</th><td>{{ $pendaftar->kebutuhanKhusus }}</td></tr>
            <tr><th>Pra Sekolah</th><td>{{ $pendaftar->praSekolah }}</td></tr>
            <tr><th>No. KK</th><td>{{ $pendaftar->noKartuKeluarga }}</td></tr>
            <tr><th>Kepala Keluarga</th><td>{{ $pendaftar->kepalaKeluarga }}</td></tr>
            <tr>
                <th>Foto Kartu Keluarga</th>
                <td>
                    @if($pendaftar->fotoKartuKeluarga)
                        <a href="{{ asset('storage/'.$pendaftar->fotoKartuKeluarga) }}" target="_blank">
                            <img src="{{ asset('storage/'.$pendaftar->fotoKartuKeluarga) }}" alt="KK" style="max-width:120px;max-height:120px;">
                        </a>
                    @else
                        <span class="text-muted">Belum diupload</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Foto Akte Lahir</th>
                <td>
                    @if($pendaftar->fotoAkteLahir)
                        <a href="{{ asset('storage/'.$pendaftar->fotoAkteLahir) }}" target="_blank">
                            <img src="{{ asset('storage/'.$pendaftar->fotoAkteLahir) }}" alt="Akte" style="max-width:120px;max-height:120px;">
                        </a>
                    @else
                        <span class="text-muted">Belum diupload</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Foto Pendaftar</th>
                <td>
                    @if($pendaftar->fotoPendaftar)
                        <a href="{{ asset('storage/'.$pendaftar->fotoPendaftar) }}" target="_blank">
                            <img src="{{ asset('storage/'.$pendaftar->fotoPendaftar) }}" alt="Foto" style="max-width:120px;max-height:120px;">
                        </a>
                    @else
                        <span class="text-muted">Belum diupload</span>
                    @endif
                </td>
            </tr>
            <tr><th>Nama Ayah</th><td>{{ $pendaftar->namaAyah }}</td></tr>
            <tr><th>Status Ayah</th><td>{{ $pendaftar->statusAyah }}</td></tr>
            <tr><th>NIK Ayah</th><td>{{ $pendaftar->nikAyah }}</td></tr>
            <tr><th>Tempat Lahir Ayah</th><td>{{ $pendaftar->tempatLahirAyah }}</td></tr>
            <tr><th>Tanggal Lahir Ayah</th><td>{{ $pendaftar->tanggalLahirAyah }}</td></tr>
            <tr><th>Pendidikan Ayah</th><td>{{ $pendaftar->pendidikanAyah }}</td></tr>
            <tr><th>Pekerjaan Ayah</th><td>{{ $pendaftar->pekerjaanAyah }}</td></tr>
            <tr><th>Pendapatan Ayah</th><td>{{ $pendaftar->pendapatanAyah }}</td></tr>
            <tr><th>Nama Ibu</th><td>{{ $pendaftar->namaIbu }}</td></tr>
            <tr><th>Status Ibu</th><td>{{ $pendaftar->statusIbu }}</td></tr>
            <tr><th>NIK Ibu</th><td>{{ $pendaftar->nikIbu }}</td></tr>
            <tr><th>Tempat Lahir Ibu</th><td>{{ $pendaftar->tempatLahirIbu }}</td></tr>
            <tr><th>Tanggal Lahir Ibu</th><td>{{ $pendaftar->tanggalLahirIbu }}</td></tr>
            <tr><th>Pendidikan Ibu</th><td>{{ $pendaftar->pendidikanIbu }}</td></tr>
            <tr><th>Pekerjaan Ibu</th><td>{{ $pendaftar->pekerjaanIbu }}</td></tr>
            <tr><th>Pendapatan Ibu</th><td>{{ $pendaftar->pendapatanIbu }}</td></tr>
            <tr><th>Nama Wali</th><td>{{ $pendaftar->namaWali }}</td></tr>
            <tr><th>Status Wali</th><td>{{ $pendaftar->statusWali }}</td></tr>
            <tr><th>NIK Wali</th><td>{{ $pendaftar->nikWali }}</td></tr>
            <tr><th>Tempat Lahir Wali</th><td>{{ $pendaftar->tempatLahirWali }}</td></tr>
            <tr><th>Tanggal Lahir Wali</th><td>{{ $pendaftar->tanggalLahirWali }}</td></tr>
            <tr><th>Pendidikan Wali</th><td>{{ $pendaftar->pendidikanWali }}</td></tr>
            <tr><th>Pekerjaan Wali</th><td>{{ $pendaftar->pekerjaanWali }}</td></tr>
            <tr><th>Pendapatan Wali</th><td>{{ $pendaftar->pendapatanWali }}</td></tr>
            <tr><th>Provinsi</th><td>{{ $pendaftar->provinsi }}</td></tr>
            <tr><th>Kabupaten</th><td>{{ $pendaftar->kabupaten }}</td></tr>
            <tr><th>Status Rumah</th><td>{{ $pendaftar->statusRumah }}</td></tr>
            <tr><th>Kecamatan</th><td>{{ $pendaftar->kecamatan }}</td></tr>
            <tr><th>Desa</th><td>{{ $pendaftar->desa }}</td></tr>
            <tr><th>Jarak Rumah</th><td>{{ $pendaftar->jarakRumah }}</td></tr>
            <tr><th>Kendaraan</th><td>{{ $pendaftar->kendaraan }}</td></tr>
            <tr><th>Waktu Perjalanan</th><td>{{ $pendaftar->waktuPerjalanan }}</td></tr>
        </table>
    @else
        <div class="alert alert-warning">Data pendaftar tidak ditemukan.</div>
    @endif
</div>
<div class="container py-4">
    <h2 class="mb-4">Detail Pendaftar</h2>
    @if($pendaftar)
        <table class="table table-bordered">
            <!-- ...semua baris data pendaftar seperti sebelumnya... -->
        </table>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">
            &larr; Kembali ke Dashboard
        </a>
    @else
        <div class="alert alert-warning">Data pendaftar tidak ditemukan.</div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">
            &larr; Kembali ke Dashboard
        </a>
    @endif
</div>
@endsection