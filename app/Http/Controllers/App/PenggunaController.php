<?php

namespace App\Http\Controllers\App;

use App\Models\Bagian;
use App\Models\Jabatan;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function pengguna()
    {
        return view('app.pages.pengguna');
    }
}
