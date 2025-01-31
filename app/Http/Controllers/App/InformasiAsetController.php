<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiAsetController extends Controller
{
    public function kategoriAset()
    {
        return view('app.pages.kategori-aset');
    }

    public function merekAset()
    {
        return view('app.pages.merek-aset');
    }

    public function modelAset()
    {
        return view('app.pages.model-aset');
    }

    public function supplierAset()
    {
        return view('app.pages.supplier-aset');
    }
}
