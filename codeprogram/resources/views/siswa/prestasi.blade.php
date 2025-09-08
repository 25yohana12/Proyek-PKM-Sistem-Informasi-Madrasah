@extends('layouts.siswa')

@section('title', 'Prestasi')

@section('content')
<style>
  :root{
    --brand:#1b8f4b; 
    --mint:#cfeedd;
    --paper:#f5fbf7;
    --radius:14px;
    --shadow:0 10px 28px rgba(16,185,129,.18);
  }

  .wrap{max-width:1100px;margin:0 auto;padding:36px 16px}
  .page-title{text-align:center;color:var(--brand);font-weight:800;font-style:italic;font-size:clamp(28px,5vw,40px);margin-bottom:28px}

  .stack > * + *{margin-top:56px}

  .ribbon{
    background:var(--mint);text-align:center;font-weight:700;
    padding:14px 18px;border-radius:12px 12px 0 0;
    font-size:clamp(18px,2.4vw,26px);box-shadow:0 4px 10px rgba(0,0,0,.08)
  }

  .card{
    display:flex;flex-direction:row;align-items:stretch;
    background:var(--paper);border-radius:0 0 var(--radius) var(--radius);
    box-shadow:var(--shadow);overflow:hidden;border:1px solid #e6f2ea;
    width: 1070px;
  }

  .card.reverse{flex-direction:row-reverse}

  .fig{flex:0 0 45%;min-height:260px;position:relative}
  .fig img{width:100%;height:100%;object-fit:cover;display:block}
  .no-img{width:100%;height:100%;display:grid;place-items:center;background:#eef2f1;color:#666}

  .body{flex:1;padding:22px}
  .body p{line-height:1.8;text-align:justify;font-size:16px}
  .award{margin-top:10px;color:#136c3a;font-weight:700}

  @media(max-width:900px){
    .card,.card.reverse{flex-direction:column}
    .fig{min-height:220px}
  }
</style>

<section class="wrap">
  <h1 class="page-title">Prestasi</h1>

  <div class="stack">
    @foreach($prestasi as $index => $item)
      <article>
        <h2 class="ribbon">{{ $item->judul }}</h2>

        @php
          $imagesRaw  = $item->gambar;
          $images     = is_array($imagesRaw) ? $imagesRaw : (json_decode($imagesRaw, true) ?: []);
          $firstImage = $images[0] ?? null;
        @endphp

        <div class="card {{ $index % 2 === 1 ? 'reverse' : '' }}">
          <!-- Kolom Gambar -->
          <figure class="fig">
            @if($firstImage)
              <img src="{{ Storage::url($firstImage) }}" alt="Foto Prestasi: {{ $item->judul }}">
            @else
              <div class="no-img"><i class="fas fa-image"></i> No Image</div>
            @endif
          </figure>

          <!-- Kolom Deskripsi -->
          <div class="body">
            <p>{{ $item->deskripsi }}</p>
            @if($item->penghargaan)
              <p class="award">Penghargaan: {{ $item->penghargaan }}</p>
            @endif
          </div>
        </div>
      </article>
    @endforeach
  </div>
</section>
@endsection
