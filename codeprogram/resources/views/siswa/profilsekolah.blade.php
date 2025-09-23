@extends('layouts.siswa')

@section('title', 'Profil Sekolah')

@section('content')
<style>
:root{
  --brand:#1b8f4b; --ink:#0f172a; --card:#e9f7f0; --card-2:#d9f1e6;
  --radius:16px; --shadow:0 12px 30px rgba(16,185,129,.16);
  --shadow-soft:0 10px 26px rgba(15,23,42,.08);
}

/* reset ringkas */
*{box-sizing:border-box} img{display:block;max-width:100%;height:auto}
h1,h2,h3,p{margin:0} body{color:var(--ink)}

/* halaman: lebih dekat ke pinggir */
.page{
  width:100%;
  height: 100%;
  margin:0 auto;      /* center horizontal */
  padding:0 12px;     /* jarak aman kiri-kanan */
}

/* judul seksi */
.section-title{
  text-align:center;color:var(--brand);font-weight:900;letter-spacing:.06em;
  text-transform:uppercase;font-size:clamp(22px,4.4vw,30px);margin:12px 0 16px;
}

/* kartu umum */
.card{
  background:var(--card);border-radius:var(--radius);box-shadow:var(--shadow);
  padding:18px 22px;   max-width: 1000px;
  margin: 0 auto; width: 1000px; margin-bottom: 30px;
}

/* ===================== PROFIL ===================== */
.profil-row{
  display:flex;align-items:stretch;gap:18px;justify-content:space-between;
}
.profil-card{flex:1}
.profil-list{display:grid;gap:8px;line-height:1.7}
.profil-list strong{min-width:155px;display:inline-block}

/* logo di luar card, sisi kanan (proporsional) */
.logo-wrap{
  flex:0 0 360px; /* lebar kolom logo */
  display:flex;align-items:center;justify-content:center;
}
.logo{
  width:100%;max-width:360px;aspect-ratio:4/3; /* kotak rapi */
  background:#fff;border:1px solid #eaf1f0;border-radius:14px;padding:14px;
  box-shadow:var(--shadow-soft);
}
.logo img{width:100%;height:100%;object-fit:contain} /* jangan kepanjangan */

/* CSS */
.diamond-clip{
  width: 300px;             /* ubah ukuran di sini */
  aspect-ratio: 1/1;        /* kotak */
  clip-path: polygon(50% 0, 100% 50%, 50% 100%, 0 50%); /* belah ketupat */
  overflow: hidden;
  box-shadow: 0 10px 24px rgba(0,0,0,.18);
  border-radius: 10px;      /* opsional: sudut sedikit membulat */
}
.diamond-clip img{
  width: 100%; height: 100%;
  object-fit: cover;        /* isi penuh tanpa gepeng */
  transform: scale(1.05);   /* sedikit zoom biar sudut aman */
}

/* ===================== VISI MISI ===================== */
.visi-wrap{display:grid;gap:14px;}
.visi-intro{
  background:var(--card-2);border-radius:12px;padding:14px 16px;
  box-shadow:var(--shadow-soft);text-align:center;line-height:1.6;font-weight:600;
}
.misi{margin:0;padding-left:0;list-style:none;counter-reset:misi;display:grid;gap:10px}
.misi li{
  background:#fff;border:1px solid #e6efe9;border-radius:12px;
  padding:10px 14px 10px 56px;min-height:52px;line-height:1.65;position:relative;
  box-shadow:var(--shadow-soft);
}
.misi li::before{
  counter-increment:misi;content:counter(misi);
  position:absolute;left:12px;top:50%;transform:translateY(-50%);
  width:34px;height:34px;border-radius:10px;background:var(--card-2);
  display:flex;align-items:center;justify-content:center;font-weight:800;color:#0b3b22;
  box-shadow:inset 0 0 0 1px rgba(0,0,0,.05);
}

/* ===================== SEJARAH ===================== */
.sejarah-grid{
  display:grid;gap:16px;margin-bottom:12px;
  grid-template-columns:1fr 52px 1fr;align-items:center;
}
.photo-box{
  background:#fff;border-radius:12px;overflow:hidden;
  box-shadow:var(--shadow-soft);border:1px solid #eef2f7;aspect-ratio:4/3;
  display: block;
  max-width: 100%;
  height: 325px;
}
.arrow{
  width:52px;height:52px;border-radius:99px;background:var(--card-2);
  box-shadow:var(--shadow);display:flex;align-items:center;justify-content:center;margin:0 auto;
}
.arrow::after{content:'➜';font-size:26px;color:#0b3b22;line-height:1}

/* spasi antar blok */
.stack > * + *{margin-top:22px}

.img1 {
  display: block;
  max-width: 100%;
  height: 325px;
}

/* responsif */
@media (max-width: 900px){
  .profil-row{flex-direction:column;gap:12px}
  .logo-wrap{flex:0 0 auto}
  .logo{max-width:260px;aspect-ratio:1/1}
}
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
  
<div class="page stack">

  {{-- PROFIL SEKOLAH --}}
  <h2 class="section-title">Profil Sekolah</h2>
  <div class="profil-row">
    <div class="card profil-card">
      <div class="profil-list">
        <p><strong>Nama Sekolah</strong>: SD N 173653 Parparean</p>
        <p><strong>NPSN</strong>: 000000--</p>
        <p><strong>Alamat</strong>: Jl. Siswa Narumonda IV, Parparean II, Kec. Porsea, Toba, Sumatera Utara</p>
        <p><strong>Kode Pos</strong>: 22384</p>
      </div>
    </div>

    <!-- LOGO DI LUAR CARD, SAMPING KANAN -->
    <div class="logo-wrap">
        <div class="diamond-clip">
            <img src="{{ asset('images/logo.png') }}" alt="MIN Toba Samosir">
        </div>
    </div>
  </div>

  {{-- VISI & MISI --}}
  <h2 class="section-title">Visi & Misi</h2>
  <div class="card">
    <div class="visi-wrap">
      <div class="visi-intro">
        Menjadi madrasah unggul dalam prestasi, berlandaskan nilai-nilai keislaman dan kearifan lokal.
      </div>
      <ol class="misi">
        <li>Menyelenggarakan pendidikan dasar berbasis Islam secara optimal.</li>
        <li>Mewujudkan lingkungan belajar yang kondusif dan menyenangkan.</li>
        <li>Menumbuhkan karakter religius, disiplin, dan nasionalisme.</li>
        <li>Mengembangkan potensi peserta didik secara akademik dan non-akademik.</li>
        <li>Menjalin kemitraan dengan orang tua dan masyarakat dalam mendukung pendidikan.</li>
      </ol>
    </div>
  </div>

  {{-- SEJARAH --}}
  <h2 class="section-title">Sejarah</h2>
  <div class="card">
    <div class="sejarah-grid">
      <div class="photo-box">
        <img src="{{ asset('images/dulu.png') }}" class="photo-box" alt="Foto lama sekolah">
      </div>
      <div class="arrow"></div>
      <div class="photo-box">
        <img src="{{ asset('images/bg-school.jpg') }}" alt="Foto sekolah sekarang">
      </div>
    </div>
    <div style="line-height:1.8">
      <p>Madrasah Ibtidaiyah Negeri (MIN) Toba Samosir didirikan pada tahun 1995 sebagai bentuk komitmen pemerintah dalam menyediakan pendidikan dasar berbasis nilai-nilai Islam di wilayah Kabupaten Toba Samosir, Sumatera Utara. Pada awal berdirinya, sekolah ini hanya memiliki 3 ruang kelas, 1 kantor guru, dan jumlah siswa yang sangat sedikit.</p>
      <p>Seiring waktu, MIN Toba Samosir mengalami berbagai perkembangan, baik dari segi jumlah siswa, sarana dan prasarana, maupun kualitas pendidikan. Dukungan dari masyarakat, pemerintah daerah, dan orang tua murid turut mendorong kemajuan madrasah ini.</p>
      <p>Kini, MIN Toba Samosir telah menjadi salah satu madrasah unggulan di wilayahnya, yang tidak hanya berkualitas di bidang akademis tetapi juga non-akademis, serta tetap menjunjung tinggi akhlak mulia dan kearifan lokal.</p>
    </div>
  </div>

</div>
@endsection
