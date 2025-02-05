<?php

namespace App\Http\Controllers\App;

use App\Models\Bagian;
use App\Models\Jabatan;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    // View Halaman Bagian
    public function bagian()
    {
        $bagians = Bagian::all();


        return view('app.pages.bagian', compact('bagians'));
    }


    // View Halaman Tambah Bagian
    public function tambahBagian()
    {
        return view('app.forms.tambah-bagian');
    }


    // Simpan Data Bagian
    public function simpanBagian(Request $request)
    {
        $request->validate([
            'nama_bagian' => 'required|unique:bagian|string|max:255',
            'tag_bagian' => 'required|unique:bagian|string|max:255',
            'warna_bagian' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Bagian::create($request->all());

        return redirect()->route('organisasi.bagian')->with('success', 'Data bagian berhasil ditambahkan.');
    }


    // Hapus Data Bagian
    public function hapusBagian(Bagian $bagian)
    {
        $bagian->delete();

        return redirect()->route('organisasi.bagian')->with('success', 'Data bagian berhasil dihapus.');
    }


    // View Form Edit Bagian
    public function editBagian(Bagian $bagian)
    {
        return view('app.forms.edit-bagian', compact('bagian'));
    }


    // Update Data Bagian
    public function updateBagian(Request $request, Bagian $bagian)
    {
        $request->validate([
            'nama_bagian' => 'required|string|max:255',
            'tag_bagian' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $bagian->update($request->all());

        return redirect()->route('organisasi.bagian')->with('info', 'Data bagian berhasil diperbaharui.');
    }

    // View Halaman Jabatan
    public function jabatan()
    {
        $jabatans = Jabatan::all();

        return view('app.pages.jabatan', compact('jabatans'));
    }

    // View Halaman Tambah Jabatan
    public function tambahJabatan()
    {
        return view('app.forms.tambah-jabatan');
    }

    // Simpan Data Jabatan
    public function simpanJabatan(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|unique:jabatan|string|max:255',
            'tag_jabatan' => 'required|unique:jabatan|string|max:255',
            'warna_jabatan' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Jabatan::create($request->all());

        return redirect()->route('organisasi.jabatan')->with('success', 'Data jabatan berhasil ditambahkan.');
    }

    // Hapus Data Jabatan
    public function hapusJabatan(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->route('organisasi.jabatan')->with('success', 'Data jabatan berhasil dihapus.');
    }

    // View Form Edit Jabatan
    public function editJabatan(Jabatan $jabatan)
    {
        return view('app.forms.edit-jabatan', compact('jabatan'));
    }

    // Update Data Jabatan
    public function updateJabatan(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'tag_jabatan' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $jabatan->update($request->all());

        return redirect()->route('organisasi.jabatan')->with('info', 'Data jabatan berhasil diperbaharui.');
    }
}
