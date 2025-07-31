@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Formulir Pendaftaran</h2>
            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Data Pribadi -->
                <h4>Data Pribadi</h4>

                <div class="form-group">
                    <label for="namaPendaftar">Nama Lengkap</label>
                    <input type="text" name="namaPendaftar" id="namaPendaftar" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="sandi">Password</label>
                    <input type="password" name="sandi" id="sandi" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nisn">Nomor Induk Siswa Nasional (NISN)</label>
                    <input type="text" name="nisn" id="nisn" class="form-control">
                </div>

                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
                        <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                        <option value="Warga Negara Asing">Warga Negara Asing</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                    <input type="text" name="nik" id="nik" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tempatLahir">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" class="form-control">
                </div>

                <div class="form-group">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlahSaudara">Jumlah Saudara</label>
                    <input type="number" name="jumlahSaudara" id="jumlahSaudara" class="form-control">
                </div>

                <div class="form-group">
                    <label for="anakKe">Anak ke-</label>
                    <input type="number" name="anakKe" id="anakKe" class="form-control">
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control">
                        <option value="Islam">Islam</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="citaCita">Cita-cita</label>
                    <input type="text" name="citaCita" id="citaCita" class="form-control">
                </div>

                <div class="form-group">
                    <label for="telepon">Nomor HP/WA</label>
                    <input type="text" name="telepon" id="telepon" class="form-control">
                </div>

                <div class="form-group">
                    <label for="hobi">Hobi</label>
                    <input type="text" name="hobi" id="hobi" class="form-control">
                </div>

                <div class="form-group">
                    <label for="pembiaya">Yang Membiayai Sekolah</label>
                    <select name="pembiaya" id="pembiaya" class="form-control">
                        <option value="OrangTua">Orang Tua</option>
                        <option value="Wali Siswa">Wali Siswa</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kebutuhanKhusus">Kebutuhan Khusus</label>
                    <select name="kebutuhanKhusus" id="kebutuhanKhusus" class="form-control">
                        <option value="Tidak">Tidak</option>
                        <option value="Tuna Netra">Tuna Netra</option>
                        <option value="Tuna Rungu">Tuna Rungu</option>
                        <option value="TunaWicara">Tuna Wicara</option>
                        <option value="Tuna Daksa">Tuna Daksa</option>
                        <option value="Tuna Grahita">Tuna Grahita</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="praSekolah">Pra Sekolah</label>
                    <select name="praSekolah" id="praSekolah" class="form-control">
                        <option value="Pernah PAUD">Pernah PAUD</option>
                        <option value="Pernah TK/RA">Pernah TK/RA</option>
                    </select>
                </div>

                <hr>

                <!-- Data Keluarga -->
                <h4>Data Keluarga</h4>

                <div class="form-group">
                    <label for="noKartuKeluarga">Nomor Kartu Keluarga</label>
                    <input type="text" name="noKartuKeluarga" id="noKartuKeluarga" class="form-control">
                </div>

                <div class="form-group">
                    <label for="kepalaKeluarga">Nama Kepala Keluarga</label>
                    <input type="text" name="kepalaKeluarga" id="kepalaKeluarga" class="form-control">
                </div>

                <div class="form-group">
                    <label for="fotoKartuKeluarga">Foto Kartu Keluarga</label>
                    <input type="file" name="fotoKartuKeluarga" id="fotoKartuKeluarga" class="form-control">
                </div>

                <div class="form-group">
                    <label for="fotoAkteLahir">Foto Akte Kelahiran</label>
                    <input type="file" name="fotoAkteLahir" id="fotoAkteLahir" class="form-control">
                </div>

                <div class="form-group">
                    <label for="fotoPendaftar">Foto Pendaftar</label>
                    <input type="file" name="fotoPendaftar" id="fotoPendaftar" class="form-control">
                </div>

                <hr>

                <!-- Data Ayah -->
                <h4>Data Ayah</h4>

                <div class="form-group">
                    <label for="namaAyah">Nama Ayah</label>
                    <input type="text" name="namaAyah" id="namaAyah" class="form-control">
                </div>

                <div class="form-group">
                    <label for="statusAyah">Status Ayah</label>
                    <select name="statusAyah" id="statusAyah" class="form-control">
                        <option value="Hidup">Hidup</option>
                        <option value="Meninggal">Meninggal</option>
                        <option value="Tidak Diketahui">Tidak Diketahui</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nikAyah">NIK Ayah</label>
                    <input type="text" name="nikAyah" id="nikAyah" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tempatLahirAyah">Tempat Lahir Ayah</label>
                    <input type="text" name="tempatLahirAyah" id="tempatLahirAyah" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tanggalLahirAyah">Tanggal Lahir Ayah</label>
                    <input type="date" name="tanggalLahirAyah" id="tanggalLahirAyah" class="form-control">
                </div>

                <div class="form-group">
                    <label for="pendidikanAyah">Pendidikan Ayah</label>
                    <select name="pendidikanAyah" id="pendidikanAyah" class="form-control">
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4/S1">D4/S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pekerjaanAyah">Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaanAyah" id="pekerjaanAyah" class="form-control">
                </div>

                <div class="form-group">
                    <label for="pendapatanAyah">Pendapatan Ayah</label>
                    <select name="pendapatanAyah" id="pendapatanAyah" class="form-control">
                        <option value="500.000 - 1.000.000">500.000 - 1.000.000</option>
                        <option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
                        <option value="2.000.000 - 3.000.000">2.000.000 - 3.000.000</option>
                        <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                        <option value="Lebih Dari 5.000.000">Lebih Dari 5.000.000</option>
                        <option value="Tidak Ada">Tidak Ada</option>
                    </select>
                </div>

                <hr>

                <!-- Alamat & Transport -->
                <h4>Alamat & Transport</h4>

                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="form-control">
                </div>

                <div class="form-group">
                    <label for="kabupaten">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="form-control">
                </div>

                <div class="form-group">
                    <label for="statusRumah">Status Rumah</label>
                    <select name="statusRumah" id="statusRumah" class="form-control">
                        <option value="Milik Sendiri">Milik Sendiri</option>
                        <option value="Sewa/Kontrak">Sewa/Kontrak</option>
                        <option value="Rumah Dinas">Rumah Dinas</option>
                        <option value="Rumah Saudara">Rumah Saudara</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="form-control">
                </div>

                <div class="form-group">
                    <label for="desa">Desa</label>
                    <input type="text" name="desa" id="desa" class="form-control">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>

                <div class="form-group">
                    <label for="jarakRumah">Jarak Rumah</label>
                    <select name="jarakRumah" id="jarakRumah" class="form-control">
                        <option value="<5 Km">&lt;5 Km</option>
                        <option value="5 - 10 Km">5 - 10 Km</option>
                        <option value="11 - 20 Km">11 - 20 Km</option>
                        <option value="21 - 30 Km">21 - 30 Km</option>
                        <option value=">30 Km">&gt;30 Km</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kendaraan">Kendaraan</label>
                    <select name="kendaraan" id="kendaraan" class="form-control">
                        <option value="Jalan Kaki">Jalan Kaki</option>
                        <option value="Sepeda">Sepeda</option>
                        <option value="Sepeda Motor">Sepeda Motor</option>
                        <option value="Mobil Pribadi">Mobil Pribadi</option>
                        <option value="Antar Jemput">Antar Jemput</option>
                        <option value="Angkutan Umum">Angkutan Umum</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="waktuPerjalanan">Waktu Perjalanan</label>
                    <select name="waktuPerjalanan" id="waktuPerjalanan" class="form-control">
                        <option value="<1 - 10 menit">&lt;1 - 10 menit</option>
                        <option value="10 - 19 menit">10 - 19 menit</option>
                        <option value="20 - 29 menit">20 - 29 menit</option>
                        <option value="30 - 39 menit">30 - 39 menit</option>
                        <option value="1 - 2 jam">1 - 2 jam</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
