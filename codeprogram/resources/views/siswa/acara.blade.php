@extends('layouts.siswa')

@section('title', 'Perayaan | MIN Toba Samosir')

@section('content')
<style>
  :root{
    --brand:#1b8f4b;      /* hijau utama judul */
    --mint:#d7f3e5;       /* latar kartu */
    --ink:#0f172a;
    --radius:18px;
    --shadow:0 14px 36px rgba(19,108,58,.15);
    --shadow-soft:0 8px 20px rgba(15,23,42,.08);
  }
  *{box-sizing:border-box} img{display:block;max-width:100%;height:auto}
  h1,h2,h3,p{margin:0} body{color:var(--ink)}

  /* layout page */
  .wrap{max-width:2000px;margin:10 auto;}

  /* page title */
  .page-title{
    text-align:center;color:var(--brand);font-weight:900;font-style:italic;
    letter-spacing:.05em;font-size:clamp(28px,5vw,44px);margin-bottom:28px;
  }

  /* card acara */
  .event-card{
    background:var(--mint);border-radius:var(--radius);box-shadow:var(--shadow);
    padding:22px 22px 24px;margin-bottom:28px;
  }
  .event-title{
    font-weight:900;text-transform:uppercase;color:#0b5f3b;
    letter-spacing:.02em;font-size:clamp(18px,2.2vw,26px);margin-bottom:14px;
  }

  /* strip foto */
  .thumbs{display:flex;gap:12px;align-items:center;margin-bottom:16px}
.thumb{
  position:relative;
  flex:0 0 30%;
  height:clamp(140px, 20vw, 220px); /* minimum 140px, ideal 20% lebar layar, maksimum 220px */
  border-radius:12px;
  overflow:hidden;
  box-shadow:var(--shadow-soft);
  background:#fff;
  border:1px solid #e9f3ee;
}
  .thumb img{width:100%;height:100%;object-fit:cover}
  .more-badge{
    position:absolute;inset:auto 8px 8px auto;background:rgba(0,0,0,.6);
    color:#fff;font-size:12px;padding:5px 10px;border-radius:999px;
    font-weight:700;letter-spacing:.03em;
  }

  /* teks */
  .meta{margin:6px 0 12px;font-weight:600}
  .desc{line-height:1.85;text-align:justify}
</style>

<div class="wrap">
  <h2 class="page-title">PERAYAAN</h2>

  @forelse ($acaras as $acara)
    <article class="event-card">
      <h3 class="event-title">{{ $acara->judul }}</h3>

      @php
        $images = $acara->gambar ? (json_decode($acara->gambar, true) ?: []) : [];
        $visible = array_slice($images, 0, 3);
        $more = max(count($images) - 3, 0);
      @endphp

      @if(count($images))
        <div class="thumbs">
          @foreach($visible as $i => $img)
            <div class="thumb">
              <img src="{{ Storage::url($img) }}" alt="foto acara">
              @if($loop->last && $more > 0)
                <span class="more-badge">+{{ $more }}</span>
              @endif
            </div>
          @endforeach
        </div>
      @endif

      <p class="meta">
        {{ optional(\Carbon\Carbon::parse($acara->tanggalAcara))->translatedFormat('d F Y') }}
      </p>

      <p class="desc">{!! nl2br(e($acara->deskripsi)) !!}</p>
    </article>
  @empty
    <p class="text-center text-muted">Belum ada data acara.</p>
  @endforelse
</div>
@endsection
