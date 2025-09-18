<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notifikasi;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Bagikan notifikasi untuk semua view siswa
        View::composer('*', function ($view) {
            $pendaftar = auth()->guard('pendaftar')->user();

            if ($pendaftar && !empty($pendaftar->tanggal_lahir)) {
                $notifikasi = Notifikasi::where('data_id', $pendaftar->pendaftar_id)
                                         ->orderBy('created_at', 'desc')
                                         ->get();
            } else {
                $notifikasi = collect();
            }

            $view->with('notifikasi', $notifikasi);
        });
    }
}
