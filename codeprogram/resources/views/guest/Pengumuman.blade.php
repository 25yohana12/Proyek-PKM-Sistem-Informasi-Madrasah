@extends('layouts.guest')

@section('content')
<style>
  :root{
    --brand:#1b8f4b;
    --mint:#eaf7f1;
    --mint-strong:#dff2e8;
    --ink:#0f172a;
    --muted:#667085;
    --radius:18px;
    --shadow:0 14px 34px rgba(18,107,58,.14);
    --shadow-soft:0 8px 20px rgba(15,23,42,.08);
  }
  *{box-sizing:border-box}
  body{color:var(--ink)}
  h1,h2,h3,p{margin:0}
  .wrap{margin:28px auto;padding:0 16px}
  .card{
    background:#fff;
    border-radius:var(--radius);
    box-shadow:var(--shadow);
    padding:24px 26px;
    margin:28px auto;
    border:1px solid #eef3ef;
    max-width: 1000px;
    width: 100%;
  }
  .card.mint{background:var(--mint)}
  .title-center{
    text-align:center;color:var(--brand);font-weight:900;letter-spacing:.04em;
    font-size:clamp(22px,3.6vw,30px);
  }
  .subtext{margin-top:10px;line-height:1.7;color:var(--ink);font-size:16px}
  .info-list{margin-top:16px;display:grid;gap:10px}
  .info-item{display:flex;align-items:flex-start;gap:12px;color:var(--ink)}
  .info-icon{
    flex:0 0 28px;height:28px;border-radius:999px;background:var(--mint-strong);
    display:grid;place-items:center;box-shadow:var(--shadow-soft);
    border:1px solid #e1efe6;
  }
  .info-icon svg{width:16px;height:16px;fill:var(--brand)}
  .info-label{font-weight:800;color:var(--brand);margin-right:6px}
  .info-text{color:var(--ink)}
  .muted{color:var(--muted)}
  .strip{
    background:var(--mint-strong);padding:14px;border-radius:14px;margin-top:16px;
    border:1px solid #e1efe6
  }
  .proc-title{
    text-align:center;color:var(--brand);font-weight:900;
    letter-spacing:.05em;font-size:clamp(22px,3.6vw,30px);margin-bottom:12px
  }
  .steps{display:grid;gap:14px;margin-top:12px}
  .step{
    background:#fff;border-radius:16px;border:1px solid #e1efe6;
    box-shadow:var(--shadow-soft);padding:16px 18px
  }
  .step-head{display:flex;align-items:center;gap:12px;margin-bottom:6px}
  .num-badge{
    background:var(--mint-strong);color:#0b5f3b;font-weight:900;
    border-radius:10px;padding:6px 10px;letter-spacing:.04em;border:1px solid #d6e9df
  }
  .step-title{
    color:#0b5f3b;font-weight:900;text-transform:uppercase;letter-spacing:.02em
  }
  .step-desc{color:var(--ink);line-height:1.8;margin-left:2px}
  @media (max-width:520px){
    .card{padding:18px}
    .step{padding:14px}
  }
</style>

<div class="wrap">

  <!-- PENGUMUMAN -->
  <section class="card mint">
    <h2 class="title-center">PENGUMUMAN</h2>

    <p class="subtext">
      MIN Toba Samosir membuka pendaftaran siswa baru untuk tahun ajaran
      <strong>{{ $informasi->tahunAjaran ?? '-' }}</strong>. Berikut jadwal penting yang perlu diperhatikan:
    </p>

    <div class="info-list">
      <!-- Jadwal Pendaftaran -->
      <div class="info-item">
        <div class="info-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M7 2h2v2h6V2h2v2h3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h4V2zm14 8H3v10h18V10zM3 8h18V6H3v2z"/></svg>
        </div>
        <div class="info-text">
          <span class="info-label">Jadwal Pendaftaran:</span>
          <strong>
            {{ $informasi && $informasi->tanggalPendaftaran ? \Carbon\Carbon::parse($informasi->tanggalPendaftaran)->translatedFormat('d F Y') : '-' }}
          </strong>
        </div>
      </div>

      <!-- Waktu -->
      <div class="info-item">
        <div class="info-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M12 1a11 11 0 1 0 .001 22.001A11 11 0 0 0 12 1zm1 11V6h-2v8h7v-2h-5z"/></svg>
        </div>
        <div class="info-text">
          <span class="info-label">Waktu:</span>
          Pukul 09.00 – 14.00 WIB <span class="muted">(hari kerja)</span>
        </div>
      </div>

      <!-- Tempat -->
      <div class="info-item">
        <div class="info-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5z"/></svg>
        </div>
        <div class="info-text">
          <span class="info-label">Tempat:</span>
          Kantor MIN Toba Samosir atau melalui formulir online di website resmi
        </div>
      </div>
    </div>

    <!-- Pengumuman hasil & daftar ulang -->
    <div class="strip">
      <div class="info-list">
        <div class="info-item">
          <div class="info-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M3 10v4a1 1 0 0 0 1 1h2l6 4V5L6 9H4a1 1 0 0 0-1 1zM20 5l-5 3v8l5 3V5z"/></svg>
          </div>
          <div class="info-text">
            <span class="info-label">Pengumuman Hasil Seleksi:</span>
            <strong>
              {{ $informasi && $informasi->tanggalPengumuman ? \Carbon\Carbon::parse($informasi->tanggalPengumuman)->translatedFormat('d F Y') : '-' }}
            </strong>
            <span class="muted"> • Diumumkan melalui papan pengumuman sekolah dan website resmi MIN Toba Samosir.</span>
          </div>
        </div>

        <div class="info-item">
          <div class="info-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M17 1l4 4-4 4V6H7a3 3 0 0 0-3 3v1H2V9a5 5 0 0 1 5-5h10V1zm-5 17H7v3l-4-4 4-4v3h10a3 3 0 0 0 3-3v-1h2v1a5 5 0 0 1-5 5z"/></svg>
          </div>
          <div class="info-text">
            <span class="info-label">Daftar Ulang:</span>
            <strong>
              {{ $informasi && $informasi->tanggalPenutupan ? \Carbon\Carbon::parse($informasi->tanggalPenutupan)->translatedFormat('d F Y') : '-' }}
            </strong>
            <span class="muted"> • Kantor MIN Toba Samosir</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Statistik singkat & isi pengumuman -->
    <div class="info-list" style="margin-top:16px">
      <div class="info-item">
        <div class="info-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24"><path d="M16 11a4 4 0 1 0-4-4 4 4 0 0 0 4 4zM8 13a4 4 0 1 0-4-4 4 4 0 0 0 4 4zm8 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zM8 15c-2.67 0-8 1.34-8 4v2h8v-2a5.27 5.27 0 0 1 1.29-3.34A10.43 10.43 0 0 0 8 15z"/></svg>
        </div>
        <div class="info-text">
          <span class="info-label">Jumlah Siswa yang Diterima:</span>
          <strong>{{ $informasi->jumlahSiswa ?? '-' }} siswa</strong>
        </div>
      </div>
    </div>

    <div class="strip" style="margin-top:16px">
      <h3 class="step-title" style="margin-bottom:6px">Pengumuman</h3>
      <p class="subtext" style="margin-top:0">{{ $informasi->pengumuman ?? '-' }}</p>
    </div>
  </section>

  <!-- PROSEDUR PENDAFTARAN -->
  <section class="card mint">
    <h2 class="proc-title">PROSEDUR PENDAFTARAN</h2>

    <div class="steps">
      <article class="step">
        <div class="step-head">
          <span class="num-badge">1 MENGISI FORMULIR PENDAFTARAN</span>
        </div>
        <p class="step-desc">
          Calon orang tua atau wali diminta untuk mengisi formulir pendaftaran yang tersedia di website. Formulir ini mencakup data diri calon siswa, data orang tua/wali, dan kontak yang dapat dihubungi.
        </p>
      </article>

      <article class="step">
        <div class="step-head">
          <span class="num-badge">2 MENGUNGGAH DOKUMEN PERSYARATAN</span>
        </div>
        <p class="step-desc">
          Setelah mengisi data, calon pendaftar wajib mengunggah dokumen pendukung: Fotokopi Akta Kelahiran, Kartu Keluarga, pas foto 3x4, fotokopi KTP Orang Tua/Wali, dan Surat Keterangan Lulus dari TK/RA (jika ada).
        </p>
      </article>

      <article class="step">
        <div class="step-head">
          <span class="num-badge">3 VERIFIKASI DAN SELEKSI OLEH ADMIN</span>
        </div>
        <p class="step-desc">
          Data dan dokumen yang masuk akan diverifikasi oleh admin atau panitia pendaftaran. Proses seleksi dilakukan berdasarkan kelengkapan dan validitas data.
        </p>
      </article>

      <article class="step">
        <div class="step-head">
          <span class="num-badge">4 PENGUMUMAN HASIL SELEKSI</span>
        </div>
        <p class="step-desc">
          Hasil seleksi diumumkan secara online melalui halaman pengumuman di website. Calon siswa dapat mengecek status kelulusan dengan memasukkan nama lengkap atau nomor pendaftaran.
        </p>
      </article>

      <article class="step">
        <div class="step-head">
          <span class="num-badge">5 DAFTAR ULANG BAGI PESERTA YANG LULUS</span>
        </div>
        <p class="step-desc">
          Peserta yang dinyatakan lulus wajib melakukan daftar ulang pada jadwal yang telah ditentukan. Daftar ulang dilakukan secara langsung di sekolah dengan membawa dokumen asli untuk verifikasi.
        </p>
      </article>
    </div>
  </section>

</div>
@endsection