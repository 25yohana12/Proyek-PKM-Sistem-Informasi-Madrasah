<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\SuperAdmin;
use App\Models\Admin;
use App\Models\DataPendaftar;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('guest.login');
    }

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'sandi' => 'required|string'
    ]);

    $email = $request->email;
    $password = $request->sandi;

    // 1. Cek di SuperAdmin
    $superAdmin = \App\Models\SuperAdmin::where('email', $email)->first();
    if ($superAdmin) {
        if (Hash::check($password, $superAdmin->sandi)) {
            Session::put('user', $superAdmin);
            Session::put('role', 'superadmin');
            return redirect()->route('superadmin.dashboard');
        } else {
            return back()->withErrors(['sandi' => 'Kata sandi salah'])->withInput();
        }
    }

    // 2. Cek di Admin
    $admin = \App\Models\Admin::where('email', $email)->first();
    if ($admin) {
        if (Hash::check($password, $admin->sandi)) {
            Session::put('user', $admin);
            Session::put('role', 'admin');
            return redirect()->route('dashboard.admin');
        } else {
            return back()->withErrors(['sandi' => 'Kata sandi salah'])->withInput();
        }
    }

    // 3. Cek di Pendaftar (Siswa)
    $pendaftar = \App\Models\DataPendaftar::where('email', $email)->first();
    if ($pendaftar) {
        if (Hash::check($password, $pendaftar->sandi)) {
            Session::put('user', $pendaftar);
            Session::put('role', 'siswa');
            return redirect()->route('siswa.home');
        } else {
            return back()->withErrors(['sandi' => 'Kata sandi salah'])->withInput();
        }
    }

    // Jika email tidak ditemukan di ketiga tabel
    return back()->withErrors(['email' => 'Email tidak terdaftar'])->withInput();
}


    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('success', 'Berhasil logout');
    }
}
