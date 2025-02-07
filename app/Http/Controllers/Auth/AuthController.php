<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Log;



class AuthController extends Controller
{

    // Menampilkan Halaman Login
    public function showLoginPage()
    {
        return view('auth.pages.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        try {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect()->route('dashboard')->with('success', 'Selamat Datang');
            } else {
                return redirect()->route('login')->with('error', 'Username atau password salah');
            }
        } catch (\Exception $e) {
            Log::error('Error Login: ' . $e->getMessage());
        }

        return redirect()->route('login')->with('error', 'Terjadi kesalahan saat login');
    }
}
