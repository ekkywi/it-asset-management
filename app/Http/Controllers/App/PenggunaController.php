<?php

namespace App\Http\Controllers\App;

use App\Models\Bagian;
use App\Models\Jabatan;
use App\Models\Peran;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{

    // View Halaman Pengguna
    public function pengguna()
    {
        $penggunas = Pengguna::all();

        return view('app.pages.pengguna', compact('penggunas'));
    }

    // View Halaman Tambah Pengguna
    public function tambahPengguna()
    {
        $bagians = Bagian::all();
        $jabatans = Jabatan::all();
        $perans = Peran::all();

        return view('app.forms.tambah-pengguna', compact('bagians', 'jabatans', 'perans'));
    }

    // Simpan Data Pengguna
    public function simpanPengguna(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:pengguna,username',
            'password' => 'required|string|min:8',
            'bagian_id' => 'required|exists:bagian,id',
            'jabatan_id' => 'required|exists:jabatan,id',
            'peran_id' => 'required|exists:peran,id',
            'login_aplikasi' => 'required|boolean',
        ]);

        Pengguna::create($request->all());

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Hapus Data Pengguna
    public function hapusPengguna(Pengguna $pengguna)
    {
        $pengguna->delete();

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
