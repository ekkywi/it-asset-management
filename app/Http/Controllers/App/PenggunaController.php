<?php

namespace App\Http\Controllers\App;

use App\Models\Bagian;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function bagian()
    {
        $bagians = Bagian::all();


        return view('app.pages.bagian', compact('bagians'));
    }

    public function tambahBagian()
    {
        return view('app.forms.tambah-bagian');
    }

    public function simpanBagian(Request $request)
    {
        $request->validate([
            'nama_bagian' => 'required|unique:bagian|string|max:255',
            'tag_bagian' => 'required|unique:bagian|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Bagian::create($request->all());

        return redirect()->route('pengguna.bagian')->with('success', 'Data bagian berhasil ditambahkan.');
    }

    public function hapusBagian(Bagian $bagian)
    {
        $bagian->delete();

        return redirect()->route('pengguna.bagian')->with('success', 'Data bagian berhasil dihapus.');
    }

    public function editBagian(Bagian $bagian)
    {
        return view('app.forms.edit-bagian', compact('bagian'));
    }

    public function updateBagian(Request $request, Bagian $bagian)
    {
        $request->validate([
            'nama_bagian' => 'required|string|max:255',
            'tag_bagian' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $bagian->update($request->all());

        return redirect()->route('pengguna.bagian')->with('info', 'Data bagian berhasil diubah.');
    }
}
