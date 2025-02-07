<?php

namespace App\Http\Controllers\App;

use App\Models\Section;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;

class OrganisasiController extends Controller
{
    // View Halaman Bagian
    public function bagian()
    {
        $sections = Section::all();

        return view('app.pages.bagian', compact('sections'));
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
            'name' => 'required|unique:sections|string|max:255',
            'tag' => 'required|unique:sections|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        Section::create($request->all());

        return redirect()->route('organisasi.bagian')->with('success', 'Data bagian berhasil ditambahkan.');
    }


    // Hapus Data Bagian
    public function hapusBagian(Section $section)
    {
        if (User::where('section_id', $section->id)->exists()) {
            return redirect()->route('organisasi.bagian')->with('error', 'Data bagian tidak bisa dihapus karena masih digunakan oleh pengguna.');
        }

        $section->delete();

        return redirect()->route('organisasi.bagian')->with('success', 'Data bagian berhasil dihapus.');
    }


    // View Form Edit Bagian
    public function editBagian(Section $section)
    {
        return view('app.forms.edit-bagian', compact('section'));
    }


    // Update Data Bagian
    public function updateBagian(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $section->update($request->all());

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
        if (Pengguna::where('jabatan_id', $jabatan->id)->exists()) {
            return redirect()->route('organisasi.jabatan')->with('error', 'Data jabatan tidak bisa dihapus karena masih digunakan oleh pengguna.');
        }

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

    // View Halaman Peran
    public function peran()
    {
        $perans = Peran::all();

        return view('app.pages.peran', compact('perans'));
    }

    // View Halaman Tambah Peran
    public function tambahPeran()
    {
        return view('app.forms.tambah-peran');
    }

    // Simpan Data Peran
    public function simpanPeran(Request $request)
    {
        $request->validate([
            'nama_peran' => 'required|unique:peran|string|max:255',
            'tag_peran' => 'required|unique:peran|string|max:255',
            'warna_peran' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Peran::create($request->all());

        return redirect()->route('organisasi.peran')->with('success', 'Data peran berhasil ditambahkan.');
    }

    // Hapus Data Peran
    public function hapusPeran(Peran $peran)
    {
        if (Pengguna::where('peran_id', $peran->id)->exists()) {
            return redirect()->route('organisasi.peran')->with('error', 'Data peran tidak bisa dihapus karena masih digunakan oleh pengguna.');
        }

        $peran->delete();

        return redirect()->route('organisasi.peran')->with('success', 'Data peran berhasil dihapus.');
    }

    // View Form Edit Peran
    public function editPeran(Peran $peran)
    {
        return view('app.forms.edit-peran', compact('peran'));
    }

    // Update Data Peran
    public function updatePeran(Request $request, Peran $peran)
    {
        $request->validate([
            'nama_peran' => 'required|string|max:255',
            'tag_peran' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $peran->update($request->all());

        return redirect()->route('organisasi.peran')->with('info', 'Data peran berhasil diperbaharui.');
    }
}
