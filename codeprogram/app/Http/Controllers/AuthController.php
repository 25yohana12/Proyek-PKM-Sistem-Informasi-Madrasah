<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\SuperAdmin;
use App\Models\Admin;
use App\Models\DataPendaftar;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('guest.login');
    }

    // Login handler
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'sandi' => 'required|string',
    ]);

    $credentials = ['email' => $request->email, 'password' => $request->sandi];

    // SuperAdmin
    if (Auth::guard('superadmin')->attempt($credentials)) {
        Session::put('role', 'superadmin');
        return redirect()->route('superadmin.dashboard');
    }

    // Admin
    if (Auth::guard('admin')->attempt($credentials)) {
        Session::put('role', 'admin');
        return redirect()->route('admin.home');
    }

    // Pendaftar / Siswa
    if (Auth::guard('pendaftar')->attempt($credentials)) {
        Session::put('role', 'siswa');
        return redirect()->route('siswa.home');
    }

    return back()->withErrors(['email' => 'Email atau sandi salah'])->withInput();
}



    // Logout dari semua guard
    public function logout()
    {
        Session::flush();

        Auth::guard('superadmin')->logout();
        Auth::guard('admin')->logout();
        Auth::guard('pendaftar')->logout();
        Auth::guard('web')->logout(); // opsional

        return redirect()->route('login')->with('success', 'Berhasil logout');
    }
}
