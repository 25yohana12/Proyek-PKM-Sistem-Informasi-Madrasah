@extends('layouts.guest')
@section('title','Struktur Organisasi')

@section('content')
<style>
    :root{
        --brand:#1b8f4b;           /* hijau judul */
        --card:#bfeacf;            /* warna kartu */
        --card-2:#aee3c3;          /* varian */
        --ink:#0f172a;             /* teks */
        --shadow:0 14px 34px rgba(16,185,129,.18);
        --radius:18px;
        --card-min:440px;          /* >>> lebar minimum setiap kartu (besar) */
    }

    /* reset ringan */
    *{box-sizing:border-box}
    img{display:block;max-width:100%;height:auto}
    body{font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,Arial;color:var(--ink)}
    h1,p{margin:0}

    /* container halaman diperlebar agar 3 kartu lebar muat */
    .page{
    max-width:1500px;
    }

    /* banner header */
    .banner{height:190px;border-radius:14px;overflow:hidden}
    .banner img{width:100%;height:100%;object-fit:cover}

    /* judul */
    .title{
        margin:22px 0 26px;text-align:center;color:var(--brand);
        font-weight:900;letter-spacing:.06em;text-transform:uppercase;
        font-size:clamp(26px,4.6vw,44px)
    }

    /* kepala sekolah */
    .head{
        display:flex;gap:22px;align-items:center;
        background:linear-gradient(180deg,var(--card),var(--card-2));
        border-radius:18px;padding:20px 22px;box-shadow:var(--shadow);
        max-width:980px;margin:0 auto 34px
    }
    .head-photo{position:relative;width:120px;height:120px;border-radius:14px;overflow:hidden;background:#e2e8f0;flex:0 0 120px}
    .head-photo img{width:100%;height:100%;object-fit:cover}
    .badge{position:absolute;left:10px;bottom:10px;background:#0ea5a0;color:#fff;font-weight:800;
        font-size:12px;letter-spacing:.05em;padding:6px 10px;border-radius:8px}
    .head-info{flex:1;min-width:0}
    .head-caption{font-weight:800;text-transform:uppercase;letter-spacing:.06em;text-align:center;margin:0 0 8px}
    .dl{display:grid;grid-template-columns:auto 1fr;gap:8px 14px;font-size:16px;line-height:1.6}
    .dt{font-weight:700;white-space:nowrap}
    .dd{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}

    /* panel putih pembungkus grid (seperti contoh) */
    .grid-wrap{
        background:#fff;
        border-radius:18px;
        box-shadow:0 10px 34px rgba(15,23,42,.06);
        justify-content: center;
    }

    /* GRID – kartu dipaksa LEBAR dengan minmax(var(--card-min),1fr) */
    .grid{display:grid;gap:36px}
    /* 1 kolom di HP */
    .grid{grid-template-columns:1fr;}
    /* 2 kolom lebar di tablet */
    @media(min-width:768px){
        .grid{grid-template-columns:repeat(2, minmax(var(--card-min), 1fr));}
    }
    /* 3 kolom lebar di desktop besar */
    @media(min-width:1280px){
        .grid{grid-template-columns:repeat(3, minmax(var(--card-min), 1fr));}
    }

    /* KARTU */
    .card{
        background:var(--card-2);
        border-radius:var(--radius);
        box-shadow:var(--shadow);
        width: 350px;
        display:flex;
        flex-direction:column;
        min-height:500px;
        margin:0 auto;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .card-title{
        text-transform:uppercase;font-size:14px;font-weight:800;letter-spacing:.10em;
        color:#0b3b22;margin-bottom:12px;text-align:center
    }

    /* FOTO: proporsi 4:3 (mirip contoh), besar & rapi */
    .photo-box{
        width:100%;
        aspect-ratio:4/3;
        min-height:340px;
        border-radius:12px;overflow:hidden;background:#e5e7eb;margin-bottom:12px
    }
    .photo{width:100%;height:100%;object-fit:cover}

    /* metadata */
    .meta{font-size:16px;line-height:1.7;padding:0 6px;margin-top:auto}
    .meta-row{display:grid;grid-template-columns:92px 1fr;gap:8px 10px;margin-top:4px}
    .label{font-weight:800;color:#0b3b22;white-space:nowrap}
    .value{white-space:nowrap}
    .num{font-variant-numeric:tabular-nums}

    @media print{.banner{height:140px}.card,.head,.grid-wrap{box-shadow:none}}
</style>
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
<div class="page">
    <h1 class="title">Struktur Organisasi</h1>

    @php
        $kepala = $items->firstWhere('jabatan','Kepala Sekolah');
        $grid   = $items->filter(fn($i) => $i->jabatan !== 'Kepala Sekolah');
    @endphp

    {{-- Kepala Sekolah --}}
    @if($kepala)
    <section class="head" aria-label="Kepala Sekolah">
        <div class="head-photo">
            <img src="{{ asset('storage/'.$kepala->gambar) }}" alt="{{ $kepala->namaGuru }}">
            <span class="badge">KEPALA SEKOLAH</span>
        </div>
        <div class="head-info">
            <div class="head-caption">Kepala Sekolah</div>
            <div class="dl">
                <div class="dt">Nama</div>          <div class="dd">{{ $kepala->namaGuru }}</div>
                <div class="dt">NUPTK</div>         <div class="dd num">{{ $kepala->nip }}</div>
                <div class="dt">Alamat</div>        <div class="dd">{{ $kepala->alamat ?? '—' }}</div>
                <div class="dt">Tahun Jabatan</div> <div class="dd">{{ $kepala->tahun ?? '—' }}</div>
            </div>
        </div>
    </section>
    @endif

    {{-- Grid Kartu --}}
    <div class="grid-wrap">
        <section class="grid" aria-label="Pengurus & Wali Kelas">
            @foreach($grid as $item)
            <article class="card">
                <h2 class="card-title">{{ $item->jabatan }}</h2>

                <div class="photo-box">
                    <img class="photo" src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->namaGuru }}">
                </div>

                <div class="meta">
                    <div class="meta-row">
                        <div class="label">Nama :</div>
                        <div class="value">{{ $item->namaGuru }}</div>
                    </div>
                    <div class="meta-row">
                        <div class="label">NUPTK :</div>
                        <div class="value num">{{ $item->nip }}</div>
                    </div>
                </div>
            </article>
            @endforeach
        </section>
    </div>
</div>
@endsection
