@extends('layouts.guest')

@section('content')
  <div class="position-relative">
    <img src="{{ asset('images/bg-school.jpg') }}" class="img-fluid w-100"
         style="height: 600px; margin-bottom: 30px; object-fit: cover; filter: brightness(70%);"
         alt="Background Sekolah">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-start px-4">
      <div class="d-flex align-items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="100" class="me-3">
        <div>
          <h1 class="text-white fw-bold mb-0" style="font-size: 3rem;">MIN TOBA SAMOSIR</h1>
          <p class="text-white fst-italic mb-0">Madrasah, Tempat Belajar, Tempat Beramal</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="guru-wrapper">
    <h2 class="text-center">Tenaga Pengajar</h2>

    <div class="guru-grid">
      @foreach($gurus as $guru)
        <div class="guru-card">
          <div class="img-wrap">
            <img
              src="{{ $guru->gambar ? asset('storage/'.$guru->gambar) : asset('images/guru.jpg') }}"
              alt="Foto {{ $guru->namaGuru }}"
              class="guru-img">
          </div>

          <div class="guru-text">
            <p><strong>Nama :</strong> {{ $guru->namaGuru }}</p>
            <p><strong>NIP  :</strong> {{ $guru->nip }}</p>
            <p><strong>Posisi :</strong> {{ $guru->posisi }}</p>
            <p><strong>Deskripsi :</strong> {{ $guru->deskripsi }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection

@section('styles')
<style>
  /* WRAPPER */
  .guru-wrapper{
    max-width:1200px;
    margin:24px auto 64px;
    padding:0 16px;
  }
  h2{
    color:#00796b;
    font-weight:700;
    margin:8px 0 20px;
  }

  .guru-grid{
    display:grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap:18px;               
    margin-top:20px;
    align-items: stretch;
  }

  .guru-card{
    background:#a8e6cf;
    border-radius:14px;
    padding:12px 12px 16px;
    box-shadow:0 4px 12px rgba(0,0,0,.08);
    max-width:260px;        
    width:100%;
    margin:0 auto;
    display: flex;           /* ✅ isi card jadi fleksibel */
    flex-direction: column;  /* susun ke bawah */
    height: 100%;            /* isi penuh tinggi grid */          
  }

  .img-wrap{
    width:210px;            
    height:260px;
    margin:6px auto 12px;   
    border-radius:16px;
    overflow:hidden;        
    background:#fff;
    flex-shrink: 0;
  }

  .guru-img{
    width:100%;
    height:100%;
    object-fit:cover;       
    display:block;
  }

  .guru-text{
    width:90%;
    max-width:240px;        
    margin:0 auto;
    font-size:14px;
    line-height:1.55;
    color:#000;
    text-align:left;
    flex-grow: 1;            /* ✅ isi ruang tersisa */
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
  }
  .guru-text p{ margin:6px 0; }

  /* RESPONSIF */
  @media (max-width: 992px){
    .guru-grid{ grid-template-columns: repeat(2, 1fr); }
  }
  @media (max-width: 560px){
    .guru-grid{ grid-template-columns: 1fr; }
    .img-wrap{ width:200px; height:245px; } 
  }
</style>
@endsection
