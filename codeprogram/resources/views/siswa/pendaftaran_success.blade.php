@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Pendaftaran Berhasil!</h2>
            <p>Terima kasih telah mendaftar. Data Anda telah berhasil disimpan.</p>
            <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">Kembali ke Formulir Pendaftaran</a>
        </div>
    </div>
</div>
@endsection
