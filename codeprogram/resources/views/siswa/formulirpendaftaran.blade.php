@extends('layouts.siswa')

@section('content')
<style>
  :root{
    --brand:#34C759;        /* tombol/aksen */
    --accent:#48b470;       /* hijau navbar kamu */
    --ink:#194d2b;
    --muted:#6c757d;
    --danger:#dc3545;
    --surface:#ffffff;
    --border:#e8f4ec;
  }
  .form-wrap{max-width:1100px;margin:0 auto;}
  .form-card{
    background:var(--surface);
    border:1px solid var(--border);
    border-radius:16px;
    box-shadow:0 8px 22px rgba(0,0,0,.06);
    padding:24px;
  }
  .section-title{
    font-weight:700;color:var(--ink);
    border-left:6px solid var(--accent);
    padding-left:10px;margin:24px 0 12px;
  }
  .form-label{font-weight:600}
  .form-label .req{color:var(--danger);margin-left:4px;}
  .note{color:var(--muted);font-size:.9rem}
  .btn-submit{
    background:var(--brand);border:0;color:#000;
    padding:10px 16px;border-radius:12px;font-weight:600;
  }
  .btn-submit:hover{background:#28a745;color:#fff}
  .invalid-feedback{display:block}
  .help-hint{font-size:.85rem;color:var(--muted)}
  /* bikin jarak antar kolom pas */
  .row.g-3 > [class^="col"]{margin-top:.35rem}
</style>

<div class="container py-4 form-wrap">
  <h2 class="mb-2">Formulir Pendaftaran</h2>
  <p class="note mb-3">Kolom bertanda <span class="req" style="color:#dc3545">*</span> wajib diisi.</p>

  {{-- Alert validasi --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <div class="fw-bold mb-1">Periksa kembali input berikut:</div>
      <ul class="mb-0">
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="form-card">
    <form action="{{ route('siswa.store_awal') }}" method="POST" enctype="multipart/form-data" class="row g-3">
      @csrf

      {{-- default dari DB (opsional) --}}
      <input type="hidden" name="superAdmin_id" value="{{ old('superAdmin_id', 1) }}">
      <input type="hidden" name="role_id" value="{{ old('role_id', 3) }}">
      <input type="hidden" name="konfirmasi" value="{{ old('konfirmasi', 'Belum') }}">

      {{-- ===================== DATA PRIBADI ===================== --}}
      <div class="col-12"><div class="section-title">Data Pribadi</div></div>

      <div class="col-md-6">
        <label class="form-label">Nama Lengkap <span class="req">*</span></label>
        <input type="text" name="namaPendaftar" class="form-control @error('namaPendaftar') is-invalid @enderror"
               value="{{ old('namaPendaftar') }}" required aria-required="true" placeholder="Nama sesuai dokumen">
        @error('namaPendaftar') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-6">
        <label class="form-label">Email <span class="req">*</span></label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}" autocomplete="email" required aria-required="true" placeholder="nama@email.com">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-6">
        <label class="form-label">Kata Sandi <span class="req">*</span></label>
        <input type="password" name="sandi" class="form-control @error('sandi') is-invalid @enderror"
               required aria-required="true" placeholder="Min. 8 karakter">
        @error('sandi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        <div class="help-hint">Simpan baik-baik. Akan di-hash saat disimpan.</div>
      </div>

      <div class="col-md-6">
        <label class="form-label">NISN <span class="req">*</span></label>
        <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror"
               value="{{ old('nisn') }}" inputmode="numeric" placeholder="Opsional">
        @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-6">
        <label class="form-label">Kewarganegaraan <span class="req">*</span></label>
        <select name="kewarganegaraan" class="form-select @error('kewarganegaraan') is-invalid @enderror" required aria-required="true">
          <option value="" disabled {{ old('kewarganegaraan') ? '' : 'selected' }}>-- Pilih --</option>
          <option value="Warga Negara Indonesia" {{ old('kewarganegaraan')=='Warga Negara Indonesia'?'selected':'' }}>Warga Negara Indonesia</option>
          <option value="Warga Negara Asing" {{ old('kewarganegaraan')=='Warga Negara Asing'?'selected':'' }}>Warga Negara Asing</option>
        </select>
        @error('kewarganegaraan') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-6">
        <label class="form-label">NIK <span class="req">*</span></label>
        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
               value="{{ old('nik') }}" inputmode="numeric" placeholder="16 digit (opsional)">
        @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-4">
        <label class="form-label">Tempat Lahir <span class="req">*</span></label>
        <input type="text" name="tempatLahir" class="form-control @error('tempatLahir') is-invalid @enderror"
               value="{{ old('tempatLahir') }}">
        @error('tempatLahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-4">
        <label class="form-label">Tanggal Lahir <span class="req">*</span></label>
        <input type="date" name="tanggalLahir" id="tanggalLahir"
              class="form-control @error('tanggalLahir') is-invalid @enderror"
              value="{{ old('tanggalLahir') }}">
        @error('tanggalLahir') 
          <div class="invalid-feedback">{{ $message }}</div> 
        @enderror
      </div>

      <div class="col-md-4">
        <label class="form-label">Jenis Kelamin <span class="req">*</span></label>
        <select name="jenisKelamin" class="form-select @error('jenisKelamin') is-invalid @enderror">
          <option value="" disabled {{ old('jenisKelamin') ? '' : 'selected' }}>-- Pilih --</option>
          <option value="Laki-laki" {{ old('jenisKelamin')=='Laki-laki'?'selected':'' }}>Laki-laki</option>
          <option value="Perempuan" {{ old('jenisKelamin')=='Perempuan'?'selected':'' }}>Perempuan</option>
        </select>
        @error('jenisKelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-3">
        <label class="form-label">Jumlah Saudara <span class="req">*</span></label>
        <input type="number" name="jumlahSaudara" min="0" class="form-control @error('jumlahSaudara') is-invalid @enderror"
               value="{{ old('jumlahSaudara') }}">
        @error('jumlahSaudara') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-3">
        <label class="form-label">Anak Ke <span class="req">*</span></label>
        <input type="number" name="anakKe" min="1" class="form-control @error('anakKe') is-invalid @enderror"
               value="{{ old('anakKe') }}">
        @error('anakKe') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-3">
        <label class="form-label">Agama <span class="req">*</span></label>
        <select name="agama" class="form-select @error('agama') is-invalid @enderror">
          <option value="" disabled {{ old('agama') ? '' : 'selected' }}>-- Pilih --</option>
          <option value="Islam" {{ old('agama')=='Islam'?'selected':'' }}>Islam</option>
          <option value="kristen" {{ old('agama')=='Islam'?'selected':'' }}>Kristen</option>
          <option value="Katolik" {{ old('agama')=='Islam'?'selected':'' }}>Katolik</option>
          <option value="Hindu" {{ old('agama')=='Islam'?'selected':'' }}>Hindu</option>
          <option value="Buddha" {{ old('agama')=='Islam'?'selected':'' }}>Buddha</option>
          <option value="Konghucu" {{ old('agama')=='Islam'?'selected':'' }}>Konghucu</option>
        </select>
        @error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-3">
        <label class="form-label">Telepon/HP <span class="req">*</span></label>
        <div class="input-group">
          <select name="kode_negara" class="form-select" style="max-width: 100px;">
            <option value="+62" selected>+62</option>
            <option value="+60">+60</option>
            <option value="+65">+65</option>
            <option value="+63">+63</option>
            <option value="+66">+66</option>
            <option value="+84">+84</option>
            <option value="+95">+95</option>
            <option value="+673">+673</option>
            <option value="+856">+856</option>
            <option value="+855">+855</option>
            <option value="+94">+94</option>
            <option value="+91">+91</option>
            <option value="+92">+92</option>
            <option value="+880">+880</option>
            <option value="+977">+977</option>
            <option value="+960">+960</option>
            <option value="+93">+93</option>
            <option value="+98">+98</option>
            <option value="+964">+964</option>
            <option value="+962">+962</option>
            <option value="+965">+965</option>
            <option value="+966">+966</option>
            <option value="+971">+971</option>
            <option value="+968">+968</option>
            <option value="+974">+974</option>
            <option value="+973">+973</option>
            <option value="+972">+972</option>
            <option value="+90">+90</option>
            <option value="+86">+86</option>
            <option value="+81">+81</option>
            <option value="+82">+82</option>
            <option value="+850">+850</option>
            <option value="+976">+976 </option>
            <option value="+7">+7</option>
            <option value="+996">+996</option>
            <option value="+992">+992</option>
            <option value="+993">+993</option>
            <option value="+998">+998</option>
          </select>
          <input type="tel" name="telepon" 
                class="form-control @error('telepon') is-invalid @enderror"
                value="{{ old('telepon') }}" inputmode="tel" placeholder="8123456789">
          @error('telepon') 
            <div class="invalid-feedback">{{ $message }}</div> 
          @enderror
        </div>
      </div>

      <div class="col-md-6">
        <label class="form-label">Cita-cita <span class="req">*</span></label>
        <input type="text" name="citaCita" class="form-control @error('citaCita') is-invalid @enderror"
               value="{{ old('citaCita') }}">
        @error('citaCita') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-6">
        <label class="form-label">Hobi <span class="req">*</span></label>
        <input type="text" name="hobi" class="form-control @error('hobi') is-invalid @enderror"
               value="{{ old('hobi') }}">
        @error('hobi') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-6">
        <label class="form-label">Pembiaya <span class="req">*</span></label>
        <select name="pembiaya" class="form-select @error('pembiaya') is-invalid @enderror">
          <option value="" disabled {{ old('pembiaya') ? '' : 'selected' }}>-- Pilih --</option>
          <option value="OrangTua" {{ old('pembiaya')=='OrangTua'?'selected':'' }}>Orang Tua</option>
          <option value="Wali Siswa" {{ old('pembiaya')=='Wali Siswa'?'selected':'' }}>Wali Siswa</option>
        </select>
        @error('pembiaya') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-6">
        <label class="form-label">Kebutuhan Khusus <span class="req">*</span></label>
        <select name="kebutuhanKhusus" class="form-select @error('kebutuhanKhusus') is-invalid @enderror">
          <option value="" disabled {{ old('kebutuhanKhusus') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach (['Tidak','Tuna Netra','Tuna Rungu','TunaWicara','Tuna Daksa','Tuna Grahita','Lainnya'] as $opt)
            <option value="{{ $opt }}" {{ old('kebutuhanKhusus')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
        @error('kebutuhanKhusus') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-6">
        <label class="form-label">Pra Sekolah <span class="req">*</span></label>
        <select name="praSekolah" class="form-select @error('praSekolah') is-invalid @enderror">
          <option value="" disabled {{ old('praSekolah') ? '' : 'selected' }}>-- Pilih --</option>
          <option value="Pernah PAUD" {{ old('praSekolah')=='Pernah PAUD'?'selected':'' }}>Pernah PAUD</option>
          <option value="Pernah TK/RA" {{ old('praSekolah')=='Pernah TK/RA'?'selected':'' }}>Pernah TK/RA</option>
        </select>
        @error('praSekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-4">
        <label class="form-label">No. Kartu Keluarga <span class="req">*</span></label>
        <input type="text" name="noKartuKeluarga" class="form-control @error('noKartuKeluarga') is-invalid @enderror"
               value="{{ old('noKartuKeluarga') }}" inputmode="numeric">
        @error('noKartuKeluarga') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-8">
        <label class="form-label">Nama Kepala Keluarga <span class="req">*</span></label>
        <input type="text" name="kepalaKeluarga" class="form-control @error('kepalaKeluarga') is-invalid @enderror"
               value="{{ old('kepalaKeluarga') }}">
        @error('kepalaKeluarga') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-4">
        <label class="form-label">Foto Kartu Keluarga (jpg/png/pdf) <span class="req">*</span></label>
        <input type="file" name="fotoKartuKeluarga" class="form-control @error('fotoKartuKeluarga') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">
        @error('fotoKartuKeluarga') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-4">
        <label class="form-label">Foto Akte Lahir (jpg/png/pdf) <span class="req">*</span></label>
        <input type="file" name="fotoAkteLahir" class="form-control @error('fotoAkteLahir') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">
        @error('fotoAkteLahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-4">
        <label class="form-label">Foto Pendaftar (jpg/png) <span class="req">*</span></label>
        <input type="file" name="fotoPendaftar" class="form-control @error('fotoPendaftar') is-invalid @enderror" accept=".jpg,.jpeg,.png">
        @error('fotoPendaftar') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      {{-- ===================== ORANG TUA & WALI ===================== --}}
      <div class="col-12"><div class="section-title">Data Orang Tua</div></div>

      {{-- Ayah --}}
      <div class="col-md-6">
        <label class="form-label">Nama Ayah <span class="req">*</span></label>
        <input type="text" name="namaAyah" class="form-control" value="{{ old('namaAyah') }}">
      </div>
      <div class="col-md-3">
        <label class="form-label">Status Ayah <span class="req">*</span></label>
        <select name="statusAyah" class="form-select">
          <option value="" disabled {{ old('statusAyah') ? '' : 'selected' }}>-- Pilih --</option>
          <option value="Hidup" {{ old('statusAyah')=='Hidup'?'selected':'' }}>Hidup</option>
          <option value="Meninggal" {{ old('statusAyah')=='Meninggal'?'selected':'' }}>Meninggal</option>
          <option value="Tidak Diketahui" {{ old('statusAyah')=='Tidak Diketahui'?'selected':'' }}>Tidak Diketahui</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">NIK Ayah <span class="req">*</span></label>
        <input type="text" name="nikAyah" class="form-control" value="{{ old('nikAyah') }}" inputmode="numeric">
      </div>
      <div class="col-md-4">
        <label class="form-label">Tempat Lahir Ayah <span class="req">*</span></label>
        <input type="text" name="tempatLahirAyah" class="form-control" value="{{ old('tempatLahirAyah') }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Tanggal Lahir Ayah <span class="req">*</span></label>
        <input type="date" name="tanggalLahirAyah" class="form-control" value="{{ old('tanggalLahirAyah') }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Pendidikan Ayah <span class="req">*</span></label>
        <select name="pendidikanAyah" class="form-select">
          <option value="" disabled {{ old('pendidikanAyah') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach (['SD','SMP','SMA','D1','D2','D3','D4/S1','S2','S3','Tidak Sekolah'] as $opt)
            <option value="{{ $opt }}" {{ old('pendidikanAyah')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Pekerjaan Ayah <span class="req">*</span></label>
        <input type="text" name="pekerjaanAyah" class="form-control" value="{{ old('pekerjaanAyah') }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Pendapatan Ayah <span class="req">*</span></label>
        @php $gaji = ['500.000 - 1.000.000','1.000.000 - 2.000.000','2.000.000 - 3.000.000','3.000.000 - 5.000.000','Lebih Dari 5.000.000','Tidak Ada']; @endphp
        <select name="pendapatanAyah" class="form-select">
          <option value="" disabled {{ old('pendapatanAyah') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach ($gaji as $opt)
            <option value="{{ $opt }}" {{ old('pendapatanAyah')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>

      {{-- Ibu --}}
      <div class="col-12"><div class="section-title">Data Ibu</div></div>
      <div class="col-md-6">
        <label class="form-label">Nama Ibu <span class="req">*</span></label>
        <input type="text" name="namaIbu" class="form-control" value="{{ old('namaIbu') }}">
      </div>
      <div class="col-md-3">
        <label class="form-label">Status Ibu <span class="req">*</span></label>
        <select name="statusIbu" class="form-select">
          <option value="" disabled {{ old('statusIbu') ? '' : 'selected' }}>-- Pilih --</option>
          <option value="Hidup" {{ old('statusIbu')=='Hidup'?'selected':'' }}>Hidup</option>
          <option value="Meninggal" {{ old('statusIbu')=='Meninggal'?'selected':'' }}>Meninggal</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">NIK Ibu <span class="req">*</span></label>
        <input type="text" name="nikIbu" class="form-control" value="{{ old('nikIbu') }}" inputmode="numeric">
      </div>
      <div class="col-md-4">
        <label class="form-label">Tempat Lahir Ibu <span class="req">*</span></label>
        <input type="text" name="tempatLahirIbu" class="form-control" value="{{ old('tempatLahirIbu') }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Tanggal Lahir Ibu <span class="req">*</span></label>
        <input type="date" name="tanggalLahirIbu" class="form-control" value="{{ old('tanggalLahirIbu') }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Pendidikan Ibu <span class="req">*</span></label>
        <select name="pendidikanIbu" class="form-select">
          <option value="" disabled {{ old('pendidikanIbu') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach (['SD','SMP','SMA','D1','D2','D3','D4/S1','S2','S3'] as $opt)
            <option value="{{ $opt }}" {{ old('pendidikanIbu')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Pekerjaan Ibu <span class="req">*</span></label>
        <input type="text" name="pekerjaanIbu" class="form-control" value="{{ old('pekerjaanIbu') }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Pendapatan Ibu <span class="req">*</span></label>
        <select name="pendapatanIbu" class="form-select">
          <option value="" disabled {{ old('pendapatanIbu') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach ($gaji as $opt)
            <option value="{{ $opt }}" {{ old('pendapatanIbu')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>

      {{-- ===================== WALI (OPSIONAL) ===================== --}}
      <div class="col-12"><div class="section-title">Data Wali (Opsional)</div></div>
      <div class="col-md-6">
        <label class="form-label">Nama Wali</label>
        <input type="text" name="namaWali" class="form-control" value="{{ old('namaWali') }}">
      </div>
      <div class="col-md-3">
        <label class="form-label">Status Wali</label>
        <select name="statusWali" class="form-select">
          <option value="" disabled {{ old('statusWali') ? '' : 'selected' }}>-- Pilih --</option>
          <option value="Hidup" {{ old('statusWali')=='Hidup'?'selected':'' }}>Hidup</option>
          <option value="Meninggal" {{ old('statusWali')=='Meninggal'?'selected':'' }}>Meninggal</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">NIK Wali</label>
        <input type="text" name="nikWali" class="form-control" value="{{ old('nikWali') }}" inputmode="numeric">
      </div>
      <div class="col-md-4">
        <label class="form-label">Tempat Lahir Wali</label>
        <input type="text" name="tempatLahirWali" class="form-control" value="{{ old('tempatLahirWali') }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Tanggal Lahir Wali</label>
        <input type="date" name="tanggalLahirWali" class="form-control" value="{{ old('tanggalLahirWali') }}">
      </div>
      <div class="col-md-4">
        <label class="form-label">Pendidikan Wali</label>
        <select name="pendidikanWali" class="form-select">
          <option value="" disabled {{ old('pendidikanWali') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach (['SD','SMP','SMA','D1','D2','D3','D4/S1','S2','S3'] as $opt)
            <option value="{{ $opt }}" {{ old('pendidikanWali')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Pekerjaan Wali</label>
        <input type="text" name="pekerjaanWali" class="form-control" value="{{ old('pekerjaanWali') }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Pendapatan Wali</label>
        <select name="pendapatanWali" class="form-select">
          <option value="" disabled {{ old('pendapatanWali') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach ($gaji as $opt)
            <option value="{{ $opt }}" {{ old('pendapatanWali')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>

      {{-- ===================== ALAMAT & TRANSPORT ===================== --}}
      <div class="col-12"><div class="section-title">Alamat & Transportasi</div></div>

      <div class="col-md-4">
        <label class="form-label">Provinsi <span class="req">*</span></label>
        <input type="text" name="provinsi" class="form-control" value="{{ old('provinsi') }}">
      </div>

      <div class="col-md-4">
        <label class="form-label">Kabupaten/Kota <span class="req">*</span></label>
        <input type="text" name="kabupaten" class="form-control" value="{{ old('kabupaten') }}">
      </div>

      <div class="col-md-4">
        <label class="form-label">Status Rumah <span class="req">*</span></label>
        <select name="statusRumah" class="form-select">
          <option value="" disabled {{ old('statusRumah') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach (['Milik Sendiri','Sewa/Kontrak','Rumah Dinas','Rumah Saudara'] as $opt)
            <option value="{{ $opt }}" {{ old('statusRumah')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Kecamatan <span class="req">*</span></label>
        <input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan') }}">
      </div>

      <div class="col-md-4">
        <label class="form-label">Desa/Kelurahan <span class="req">*</span></label>
        <input type="text" name="desa" class="form-control" value="{{ old('desa') }}">
      </div>

      <div class="col-md-4">
        <label class="form-label">Alamat Lengkap <span class="req">*</span></label>
        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}">
      </div>

      <div class="col-md-4">
        <label class="form-label">Jarak Rumah ke Sekolah <span class="req">*</span></label>
        <select name="jarakRumah" class="form-select">
          <option value="" disabled {{ old('jarakRumah') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach (['<5 Km','5 - 10 Km','11 - 20 Km','21 - 30 Km','>30 Km'] as $opt)
            <option value="{{ $opt }}" {{ old('jarakRumah')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Transportasi ke Sekolah <span class="req">*</span></label>
        <select name="kendaraan" class="form-select">
          <option value="" disabled {{ old('kendaraan') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach (['Jalan Kaki','Sepeda','Sepeda Motor','Mobil Pribadi','Antar Jemput','Angkutan Umum'] as $opt)
            <option value="{{ $opt }}" {{ old('kendaraan')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-4">
        <label class="form-label">Waktu Perjalanan <span class="req">*</span></label>
        <select name="waktuPerjalanan" class="form-select">
          <option value="" disabled {{ old('waktuPerjalanan') ? '' : 'selected' }}>-- Pilih --</option>
          @foreach (['<1 - 10 menit','10 - 19 menit','20 - 29 menit','30 - 39 menit','1 - 2 jam'] as $opt)
            <option value="{{ $opt }}" {{ old('waktuPerjalanan')==$opt?'selected':'' }}>{{ $opt }}</option>
          @endforeach
        </select>
      </div>

      {{-- ===================== AKSI ===================== --}}
      <div class="col-12 mt-2">
        <button type="submit" class="btn btn-submit">Kirim Pendaftaran</button>
      </div>

    </form>
  </div>
</div>

<script>
(function () {
  const input = document.getElementById('tanggalLahir');

  function setMax6YearsAgo() {
    const cutoff = new Date();
    cutoff.setHours(0,0,0,0);
    cutoff.setFullYear(cutoff.getFullYear() - 6);
    input.max = cutoff.toISOString().split('T')[0];
    return cutoff;
  }

  function validate() {
    const cutoff = setMax6YearsAgo();
    const val = input.value;

    input.setCustomValidity('');

    if (!val) return;

    const picked = new Date(val + 'T00:00:00');

    if (picked > cutoff) {
      const msg = `Umur minimal harus 6 tahun (tanggal maksimal: ${cutoff.toISOString().split('T')[0]}).`;
      input.setCustomValidity(msg);
      input.reportValidity(); // tampilkan pesan bawaan browser
    }
  }

  setMax6YearsAgo();
  validate();

  input.addEventListener('change', validate);
  input.addEventListener('input', validate);
})();
</script>
@endsection
