@extends('layouts.siswa')

@section('title', 'Data Siswa | MIN Toba Samosir')

@section('content')
  <h2 class="text-center fw-bold my-4 text-success">SISWA</h2>

  <div class="students-wrap">
    <div class="students-grid">
      @forelse($siswas as $siswa)
        <article class="student-card">
          <div class="photo">
            <img src="{{ asset('images/siswa.jpg') }}" alt="Kelas {{ $siswa->kelas }}">
          </div>


          <div class="class-band">
            <h5>KELAS {{ strtoupper($siswa->kelas) }}</h5>
          </div>

            <div class="info">
            <p class="label">WALI KELAS : <span class="value">{{ $siswa->namaWali ?? '-' }}</span></p>
            <p class="acara-description"><strong>Wali Kelas :</strong> {{ $item->namaWali ?? '-' }}</p>
            <p class="acara-description"><strong>Jumlah Murid :</strong> {{ $item->jumlahMurid ?? 0 }}</p>
            <p class="acara-description"><strong>Jumlah Siswa :</strong> {{ $item->jumlahSiswa ?? 0 }}</p>
            <p class="acara-description"><strong>Jumlah Siswi :</strong> {{ $item->jumlahSiswi ?? 0 }}</p>
          </div>
        </article>
      @empty
        <p class="text-center">Belum ada data siswa.</p>
      @endforelse
    </div>
  </div>

  <div class="my-5"></div>
@endsection

@section('styles')
<style>
  /* Pembungkus utk batasi lebar & beri ruang kiri-kanan */
  .students-wrap{
    max-width: 1120px;
    margin: 0 auto 48px;
    padding: 0 16px;
  }

  /* Grid responsif: 3 kolom desktop, 2 tablet, 1 mobile */
  .students-grid{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px; /* jarak antar kartu seperti contoh */
  }
  @media (max-width: 992px){
    .students-grid{ grid-template-columns: repeat(2, 1fr); }
  }
  @media (max-width: 576px){
    .students-grid{ grid-template-columns: 1fr; }
  }

  /* Kartu */
  .student-card{
    background: #a8e6cf; /* transparan; warna kartu ada di bagian dalam */
    border-radius: 16px;
    box-shadow: 0 8px 18px rgba(0,0,0,.08);
    overflow: hidden; /* untuk merapikan shadow & rounded */
    padding: 0;       /* struktur internal yang atur padding */
  }

  /* Foto: tinggi konsisten, rounded dan ada margin dalam kartu */
  .photo {
    padding: 0; /* hilangkan padding */
   }
   .photo img {
    width: 100%;
    height: 190px;       /* tinggi gambar seragam */
    object-fit: cover;   /* potong rapi tanpa distorsi */
    display: block;
    }

  /* Pita hijau muda dengan judul kelas di tengah */
  .class-band{
    background: #a8e6cf;     /* hijau muda seperti contoh */
    color: #000;
    text-align: center;
    padding: 10px 12px;
  }
  .class-band h5{
    margin: 0;
    font-weight: 700;
    letter-spacing: .5px;
  }

  /* Info wali kelas & jumlah siswa */
  .info{
    background: #a8e6cf;     /* lanjutkan warna kartu */
    padding: 14px 18px 18px;
    border-bottom-left-radius: 16px;
    border-bottom-right-radius: 16px;
  }
  .info .label {
    margin: 0 0 6px;
    font-weight: 700; /* bold */
    color: #000;      /* hitam pekat */
}
.info .value {
    font-weight: 500;
    color: #000;
}
</style>
@endsection
