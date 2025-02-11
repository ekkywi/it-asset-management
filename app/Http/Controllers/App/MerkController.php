<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function merk()
    {
        return view('app.pages.merk');
    }
}
