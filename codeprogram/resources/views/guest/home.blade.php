<!-- resources/views/guest/home.blade.php -->
@extends('layouts.guest')

@section('content')
<section class="about-us">
    <h2>Tentang Kami</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
</section>

<section class="principal">
    <h2>Kepala Sekolah</h2>
    <div class="principal-content">
        <img src="{{ asset('images/principal.jpg') }}" alt="Principal" class="principal-img">
        <div class="principal-text">
            <p><strong>Dr. H. Rahmat T. P.</strong><br>Principal of MIN Toba Samosir</p>
        </div>
    </div>
</section>

<section class="extracurricular">
    <h2>Ekstrakurikuler & Achievement</h2>
    <div class="card-container">
        <div class="card">
            <img src="{{ asset('images/extracurricular.jpg') }}" alt="Extracurricular" class="card-image">
            <div class="card-text">
                <h3>Sports</h3>
                <p>Our school offers a wide range of extracurricular activities including sports.</p>
                <a href="#" class="button">Learn More</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/achievement.jpg') }}" alt="Achievement" class="card-image">
            <div class="card-text">
                <h3>Achievements</h3>
                <p>We are proud of our students' academic and extracurricular achievements.</p>
                <a href="#" class="button">Learn More</a>
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
                <h3>Facilities</h3>
                <p>Modern classrooms and sports facilities for all students.</p>
                <a href="#" class="button">Explore Facilities</a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('images/students.jpg') }}" alt="Students" class="card-image">
            <div class="card-text">
                <h3>Students</h3>
                <p>We take pride in nurturing our students for their future success.</p>
                <a href="{{ route('siswa.index') }}" class="button">Learn More</a>
            </div>
        </div>
    </div>
</section>

<section class="location">
    <h2>Lokasi & Kontak</h2>
    <div class="map-container">
        <img src="{{ asset('images/map.jpg') }}" alt="School Location" class="map-img">
    </div>
    <p>Contact us at: <a href="mailto:info@mintobasamosir.com">info@mintobasamosir.com</a></p>
</section>
@endsection
