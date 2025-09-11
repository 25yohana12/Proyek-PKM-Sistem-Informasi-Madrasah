@extends('layouts.guest')

@section('title', 'Ekstrakulikuler | MIN Toba Samosir')

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

  /* card item */
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
    height:clamp(140px, 20vw, 220px); /* min 140px, ideal 20vw, max 220px */
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
  <h2 class="page-title">EKSTRAKULIKULER</h2>

  @forelse ($ekstrakulikulers as $item)
    <article class="event-card">
      <h3 class="event-title">{{ $item->namaekstrakulikuler }}</h3>

      @php
        // ==== Normalisasi kolom gambar agar fleksibel ====
        $images = [];
        if (!empty($item->gambar)) {
            $decoded = json_decode($item->gambar, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                // Bisa ["path1","path2"] atau array of objects
                foreach ($decoded as $val) {
                    if (is_array($val)) {
                        $path = $val['url'] ?? $val['path'] ?? (is_string(reset($val)) ? reset($val) : null);
                        if ($path) $images[] = (string)$path;
                    } else {
                        $images[] = (string)$val;
                    }
                }
            } else {
                // Bukan JSON valid -> string tunggal / dipisah koma
                $parts = preg_split('/\s*,\s*/', $item->gambar, -1, PREG_SPLIT_NO_EMPTY);
                $images = $parts ?: [$item->gambar];
            }
        }

        // Bersihkan nilai kosong/whitespace
        $images = array_values(array_filter($images, fn($v) => trim((string)$v) !== ''));

        // Ambil 3 gambar pertama untuk strip
        $visible = array_slice($images, 0, 3);
        $more = max(count($images) - 3, 0);

        // Helper untuk konversi ke URL final
        $toSrc = function($path) {
          return \Illuminate\Support\Str::startsWith($path, ['http://','https://','/storage/'])
            ? $path
            : \Illuminate\Support\Facades\Storage::url($path);
        };
      @endphp

      @if(count($visible))
        <div class="thumbs">
          @foreach($visible as $img)
            @php $src = $toSrc($img); @endphp
            <div class="thumb">
              <img src="{{ $src }}" alt="foto ekstrakulikuler {{ $item->namaekstrakulikuler }}">
              @if($loop->last && $more > 0)
                <span class="more-badge">+{{ $more }}</span>
              @endif
            </div>
          @endforeach
        </div>
      @endif

      {{-- Tidak ada tanggal pada tabel ekstrakulikuler, jadi bagian meta tanggal tidak ditampilkan --}}
      <p class="desc">{!! nl2br(e($item->deskripsi)) !!}</p>
    </article>
  @empty
    <p class="text-center text-muted">Belum ada data ekstrakulikuler.</p>
  @endforelse
</div>
@endsection
