<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\DataPendaftar;
use Exception;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            // Use stateless to avoid session state validation issues
            $googleUser = Socialite::driver('google')->stateless()->user();
            
            // Debug: Log Google user info
            \Log::info('Google User:', [
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail()
            ]);

            // Cari user berdasarkan email di tabel data_pendaftar
            $user = DataPendaftar::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Kalau belum ada, buat user baru sebagai pendaftar
                $user = DataPendaftar::create([
                    'namaPendaftar' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(str()->random(16)), // random password
                    'superAdmin_id' => 1, // default superadmin
                    'role_id' => 3, // role pendaftar
                    'konfirmasi' => 'Belum',
                ]);
                
                \Log::info('New user created:', ['user_id' => $user->pendaftar_id]);
            }

            // Login user dengan guard pendaftar
            Auth::guard('pendaftar')->login($user, true); // remember = true
            
            // Debug: Check if login was successful
            if (Auth::guard('pendaftar')->check()) {
                \Log::info('User logged in successfully:', ['user_id' => $user->pendaftar_id]);
                // Redirect ke halaman siswa setelah login
                return redirect()->route('siswa.home')->with('success', 'Login berhasil!');
            } else {
                \Log::error('Login failed after Google auth');
                return redirect('/login')->with('error', 'Login gagal setelah autentikasi Google.');
            }

        } catch (Exception $e) {
            // Handle the exception and redirect back to login with error
            \Log::error('Google Auth Error:', ['error' => $e->getMessage()]);
            return redirect('/login')->with('error', 'Google authentication failed. Please try again. Error: ' . $e->getMessage());
        }
    }
}
