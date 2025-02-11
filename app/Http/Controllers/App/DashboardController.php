<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('app.pages.dashboard');
    }

    public function landing()
    {
        return view('app.pages.dashboard');
    }
}
