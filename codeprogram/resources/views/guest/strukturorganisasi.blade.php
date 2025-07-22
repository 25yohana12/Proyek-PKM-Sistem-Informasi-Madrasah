@extends('layouts.guest') {{-- layout publik Anda --}}
@section('title','Struktur Organisasi')

@section('content')
{{-- HEADER --}}
<div class="w-full">
    {{-- gambar header sekolah, ganti asset sesuai kebutuhan --}}
    <img src="{{ asset('images/header-sekolah.jpg') }}" class="w-full h-40 object-cover">
</div>

{{-- JUDUL --}}
<h1 class="text-center text-lg md:text-2xl font-bold text-green-700 my-4">
    STRUKTUR ORGANISASI
</h1>

@php
    $kepala = $items->firstWhere('jabatan','Kepala Sekolah');
    $grid   = $items->filter(fn($i) => $i->jabatan !== 'Kepala Sekolah');
@endphp

{{-- BLOK KEPALA SEKOLAH --}}
@if($kepala)
<article class="max-w-2xl mx-auto bg-green-50 p-4 rounded-lg shadow mb-6 flex gap-4">
    <img src="{{ asset('storage/'.$kepala->gambar) }}"
         alt="{{ $kepala->namaGuru }}" class="w-24 h-24 object-cover rounded">
    <div class="text-sm leading-relaxed">
        <p class="font-semibold uppercase text-center mb-1">Kepala Sekolah</p>
        <p><span class="font-medium">Nama</span>   : {{ $kepala->namaGuru }}</p>
        <p><span class="font-medium">NUPTK</span>  : {{ $kepala->nip }}</p>
        <p><span class="font-medium">Alamat</span> : {{ $kepala->alamat ?? '—' }}</p>
        <p><span class="font-medium">Tahun Jabatan</span> : {{ $kepala->tahun ?? '—' }}</p>
    </div>
</article>
@endif

{{-- GRID 3 kolom --}}
<div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
@foreach($grid as $item)
    <div class="bg-green-50 rounded shadow p-3 text-center">
        <p class="text-xs font-semibold tracking-wide mb-2 uppercase">
            {{ $item->jabatan }}
        </p>
        <img src="{{ asset('storage/'.$item->gambar) }}"
             alt="{{ $item->namaGuru }}" class="w-full h-40 object-cover mb-2 rounded">
        <p class="text-sm font-medium">Nama : {{ $item->namaGuru }}</p>
        <p class="text-sm">NIP  : {{ $item->nip }}</p>
    </div>
@endforeach
</div>
@endsection
