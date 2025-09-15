<!-- resources/views/guest/home.blade.php -->
@extends('layouts.guest')

@section('content')
    <!-- Hero Section -->
    <div class="position-relative"> <!-- offset for fixed navbar -->
        <img src="{{ asset('images/bg-school.jpg') }}" class="img-fluid w-100" style="height: 600px; margin-bottom: 30px;  object-fit: cover; filter: brightness(70%);" alt="Background Sekolah">
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
    
<section class="about-us">
    <h2>Tentang Kami</h2>
    <p>Bismillahirrahmanirrahim<br>

    Assalamu'alaikum warahmatullahi wabarakatuh<br>
    Madrasah Ibtidaiyah Negeri (MIN) adalah satuan pendidikan dasar yang dikelola oleh Kementerian Agama (Kemenag) dan berciri khas agama Islam. MIN setara dengan Sekolah Dasar (SD) dan ditempuh dalam waktu 6 tahun, mulai dari kelas 1 sampai kelas 6.<br>
    Kurikulum MIN sama dengan SD, namun dengan porsi pelajaran agama Islam yang lebih banyak. Selain pelajaran umum seperti matematika, bahasa Indonesia, dan IPA, di MIN juga terdapat pelajaran-pelajaran seperti: Alquran Hadits, Aqidah Akhlaq, Fiqih, Sejarah Kebudayaan Islam, Bahasa Arab. Lulusan MIN dapat melanjutkan pendidikan ke madrasah tsanawiyah (MTs) atau Sekolah Menengah Pertama.<br>

    MIN 6 Bandar Lampung dibawah naungan kementerian Agama Kota Bandar Lampung yang terletak di Jalan Kimaja No 50 Wayhalim Bandar Lampung dengan Visi Misi Unggul dalam Prestasi Berakhlak mulia dan Peduli Lingkungan.</p>
</section>

<section class="principal">
    <h2>Kepala Sekolah</h2>
    <div class="principal-content">
        <img src="{{ asset('images/kepalasekolah.jpg') }}" alt="Principal" class="principal-img">
        <div class="principal-text">
            <p>Nama Kepala Madrasah : <strong>DHj. Syukriani, S.Pd.I., M.Pd</strong><br>Pendidikan Terakhir : S2 – Pendidikan Agama Islam, Magister Pendidikan (M.Pd) di UIN Ar-Raniry Banda Aceh. <br>Moto : <strong>“ Berkolaborasi Membangun Generasi Emas Berilmu, Beriman, dan Berdaya Saing Untuk Mewujudkan Madrasah Bermutu, Maju, dan Mendunia.“</strong></p>
            <p>Assalamu'alaikum warahmatullahi wabarakatuh
            Madrasah Ibtidaiyah Negeri (MIN) adalah satuan pendidikan dasar yang dikelola oleh Kementerian Agama (Kemenag) dan berciri khas agama Islam. MIN setara dengan Sekolah Dasar (SD) dan ditempuh dalam waktu 6 tahun, mulai dari kelas 1 sampai kelas 6.
            Kurikulum MIN sama dengan SD, namun dengan porsi pelajaran agama Islam yang lebih banyak. Selain pelajaran umum seperti matematika, bahasa Indonesia, dan IPA, di MIN juga terdapat pelajaran-pelajaran seperti: Alquran Hadits, Aqidah Akhlaq, Fiqih, Sejarah Kebudayaan Islam, Bahasa Arab. Lulusan MIN dapat melanjutkan pendidikan ke madrasah tsanawiyah (MTs) atau Sekolah Menengah Pertama.</p>
        </div>
    </div>
</section>

<section class="extracurricular">
    <h2>Ekstrakurikuler & Prestasi</h2>
    <div class="card-container">
        <div class="card">
            <img src="{{ asset('images/extracurricular.jpg') }}" alt="Extracurricular" class="card-image">
            <div class="card-text">
                <h3>Ekstrakurikuler</h3>
                <p style="text-align: justify;">Ekstrakurikuler merupakan bagian yang tak terpisahkan dari kegiatan pendidikan yang bertujuan untuk mengembangkan keterampilan dan minat siswa di luar kurikulum utama. Kegiatan ekstrakurikuler di sekolah memberikan kesempatan bagi siswa untuk mengeksplorasi bakat, memperluas wawasan, dan membangun karakter. Melalui berbagai kegiatan, seperti olahraga, seni, dan klub-klub lainnya, siswa dapat belajar bekerja sama, berkompetisi secara sehat, dan mengembangkan kemampuan kepemimpinan.</p>
                <a href="{{ route('guest.siswa') }}" class="button">Lainnya</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/achievement.jpg') }}" alt="Achievement" class="card-image">
            <div class="card-text">
                <h3>Prestasi</h3>
                <p style="text-align: justify;">Prestasi adalah hasil yang dicapai melalui usaha, dedikasi, dan kerja keras. Dalam konteks pendidikan, prestasi tidak hanya diukur dari nilai akademik, tetapi juga dari berbagai bidang lainnya, seperti olahraga, seni, dan kegiatan sosial. Prestasi yang diraih oleh siswa menjadi bukti dari potensi yang dimiliki, serta mencerminkan kemampuan untuk berkompetisi, berinovasi, dan berkolaborasi. Penghargaan terhadap prestasi siswa tidak hanya memberikan kebanggaan bagi individu, tetapi juga memotivasi rekan-rekan lainnya untuk terus berusaha memberikan yang terbaik.</p>
                <a href="{{ route('guest.prestasi') }}" class="button">Lainnya</a>
            </div>
        </div>
    </div>
</section>

<section class="facilities">
    <h2>Fasilitas & Siswa</h2>
    <div class="card-container">
        <div class="card">
            <img src="{{ asset('images/facilities.jpg') }}" alt="Facilities" class="card-image">
            <div class="card-text">
                <h3>Fasilitas</h3>
                <p style="text-align: justify;">Fasilitas yang ada di sebuah lembaga pendidikan sangat mempengaruhi kenyamanan dan kualitas pengalaman belajar bagi para siswa. Fasilitas yang memadai tidak hanya mencakup ruang kelas yang nyaman, tetapi juga sarana dan prasarana pendukung seperti laboratorium, perpustakaan, area olahraga, dan ruang seni. Dengan fasilitas yang baik, siswa memiliki kesempatan lebih untuk mengembangkan potensi mereka, baik dalam aspek akademik maupun non-akademik. Fasilitas yang lengkap dan terpelihara juga mendukung proses belajar mengajar yang lebih efektif, memberikan ruang bagi kreativitas, serta mendukung kegiatan ekstrakurikuler yang beragam. Sebuah sekolah yang dilengkapi dengan fasilitas yang memadai adalah investasi bagi masa depan siswa dalam menciptakan generasi yang unggul dan siap bersaing.</p>
                <a href="{{ route('guest.fasilitas') }}" class="button">Lainnya</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/students.jpg') }}" alt="Students" class="card-image">
            <div class="card-text">
                <h3>Murid</h3>
                <p style="text-align: justify;">Murid atau siswa adalah individu yang tengah menjalani proses pendidikan untuk mengembangkan diri baik secara intelektual maupun emosional. Setiap siswa memiliki potensi yang unik dan beragam yang perlu dipupuk dan dikembangkan melalui berbagai pengalaman belajar. Sebagai bagian dari komunitas pendidikan, siswa tidak hanya berfokus pada pencapaian akademik, tetapi juga pada pengembangan karakter, keterampilan sosial, dan kecakapan hidup. Melalui berbagai kegiatan di sekolah, baik di dalam kelas maupun di luar kelas, siswa diajak untuk belajar bekerja sama, menghargai perbedaan, serta mengasah kemampuan diri agar siap menghadapi tantangan di masa depan. Peran siswa sangat penting dalam menciptakan lingkungan belajar yang dinamis dan penuh inovasi, sehingga mereka dapat tumbuh menjadi pribadi yang berkualitas dan siap berkontribusi pada masyarakat.</p>
                <a href="{{ route('guest.siswa') }}" class="button">Lainnya</a>
            </div>
        </div>
    </div>
</section>

<section class="location">
    <h2>Lokasi & Kontak</h2>
    <div class="location-container">
        <!-- Kolom Map -->
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.207156655624!2d99.1580544!3d2.4379086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031ff5c945a4f05%3A0xe7d0ca51722789db!2sMIN%20Toba%20Samosir!5e0!3m2!1sid!2sid!4v1754143344734!5m2!1sid!2sid" 
                width="100%" height="350" style="border:0;" 
                allowfullscreen="" loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Kolom Kontak -->
        <div class="contact-container">
            @if($sekolah->count() > 0)
                @foreach($sekolah as $item)
                    <div class="contact-box">
                        <h3>{{ $item->namaSekolah }}</h3>
                        <p><strong>Alamat:</strong> {{ $item->alamat }}</p>
                        <p><strong>Email:</strong> 
                            <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                        </p>
                        <p><strong>Telepon:</strong> 
                            <a href="tel:{{ $item->telepon }}">{{ $item->telepon }}</a>
                        </p>
                        <p><strong>Instagram:</strong> 
                            <a href="https://instagram.com/{{ $item->instagram }}" target="_blank">
                                {{ $item->instagram }}
                            </a>
                        </p>
                        <p><strong>Facebook:</strong> 
                            <a href="https://facebook.com/{{ $item->facebook }}" target="_blank">
                                {{ $item->facebook }}
                            </a>
                        </p>
                        <hr>
                    </div>
                @endforeach
            @else
                <p>Data sekolah belum tersedia.</p>
            @endif
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
:root {
    --primary: #28a745;
    --primary-dark: #218838;
    --secondary: #006400;
    --bg-light: #f8fff8;
    --text-dark: #333;
    --text-gray: #555;
}

/* ======= Global Style ======= */
body {
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background-color: #fdfdfd;
    color: var(--text-dark);
}

h2 {
    font-size: 2.2rem;
    color: var(--secondary);
    text-align: center;
    margin: 0 0 25px;
    font-weight: 700;
    letter-spacing: 1px;
    position: relative;
}
h2::after {
    content: "";
    width: 60px;
    height: 4px;
    background-color: var(--primary);
    display: block;
    margin: 10px auto 0;
    border-radius: 2px;
}

/* ======= Section Umum ======= */
section {
    background:#fdfdfd;
    background: #b6fab6;
    padding: 50px 20px;
    margin: 0 auto 40px;
    max-width: 12000px;
}

/* ======= Tentang Kami ======= */
.about-us {
    background:#b6fab6;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    max-width: 1200px;
    
}
.about-us p {
    font-size: 1.05rem;
    line-height: 1.8;
    color: var(--text-gray);
}

/* ======= Kepala Sekolah ======= */
.principal {
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    max-width: 1200px;
}
.principal-content {
    display: flex;
    align-items: center;
    gap: 30px;
    flex-wrap: wrap;
}
.principal-img {
    width: 280px;
    height: 280px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
}
.principal-img:hover {
    transform: scale(1.05);
}
.principal-text {
    flex: 1;
    font-size: 1.05rem;
    line-height: 1.8;
    color: var(--text-gray);
    text-align: justify;
}

.facilities{
    background: #b6fab6;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    max-width: 1200px;
}

.extracurricular{
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    max-width: 1200px;
}

.location{
    background: #b6fab6;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    max-width: 1200px;
}
/* ======= Card Layout ======= */
.card-container {
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 10px;
}
.card {
    background-color: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}
.card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}
.card-text {
    padding: 20px;
    color: var(--text-gray);
}
.card-text h3 {
    margin-bottom: 10px;
    color: var(--secondary);
}

/* ======= Tombol ======= */
.button {
    display: inline-block;
    background-color: var(--primary);
    color: white;
    padding: 10px 22px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
}
.button:hover {
    background-color: var(--primary-dark);
}

/* ======= Lokasi ======= */
.location-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    align-items: flex-start;
    justify-content: center;
}

.map-container {
    flex: 1 1 55%;
    min-width: 300px;
}

.contact-container {
    flex: 1 1 40%;
    min-width: 280px;
    background: #fff;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
}

.contact-box h3 {
    margin-bottom: 15px;
    color: var(--secondary);
}

.contact-box p {
    margin: 6px 0;
    font-size: 1rem;
    color: var(--text-gray);
}

.contact-box a {
    color: var(--primary);
    font-weight: 600;
}


/* ======= Responsif ======= */
@media (max-width: 768px) {
    .principal-content {
        text-align: center;
    }
    .principal-img {
        margin: 0 auto;
    }
}
</style>
@endsection
