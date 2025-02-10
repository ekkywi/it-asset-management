<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            if ($user->login_application) {
                Auth::login($user);
                return redirect()->route('dashboard')->with('success', 'Selamat Datang ' . $user->name);
            } else {
                return redirect()->back()->with('error', 'Akun Anda tidak memiliki akses ke aplikasi ini');
            }
        } else {
            return redirect()->back()->with('error', 'Username atau Password Salah');
        }
    }

    // Proses Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Telah Logout');
    }
}
