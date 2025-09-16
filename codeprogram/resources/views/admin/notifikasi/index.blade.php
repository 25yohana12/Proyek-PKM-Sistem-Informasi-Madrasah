@php
    $notifikasis = \App\Models\Notifikasi::whereNull('user_id')->orderBy('created_at', 'desc')->get();
@endphp
@extends('layouts.superadmin')
@section('title', 'Notifikasi')
@section('content')
<div class="container py-4">
    <h2 class="mb-4">Daftar Notifikasi</h2>
    <ul class="list-group">
        @forelse($notifikasis as $notif)
            <li class="list-group-item {{ $notif->read ? '' : 'list-group-item-warning' }}">
                <strong>{{ $notif->judul }}</strong><br>
                <span>{{ $notif->pesan }}</span>
                <span class="text-muted float-end">{{ $notif->created_at->format('d M Y H:i') }}</span>
            </li>
        @empty
            <li class="list-group-item">Belum ada notifikasi.</li>
        @endforelse
    </ul>
</div>
@endsection