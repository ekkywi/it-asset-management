<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function daftarPengguna()
    {
        return view('app.pages.daftar-pengguna');
    }
}
