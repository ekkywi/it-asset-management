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
        $positions = Position::all();

        return view('app.pages.jabatan', compact('positions'));
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
            'name' => 'required|unique:positions|string|max:255',
            'tag' => 'required|unique:positions|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        Position::create($request->all());

        return redirect()->route('organisasi.jabatan')->with('success', 'Data jabatan berhasil ditambahkan.');
    }

    // Hapus Data Jabatan
    public function hapusJabatan(Position $position)
    {
        if (User::where('position_id', $position->id)->exists()) {
            return redirect()->route('organisasi.jabatan')->with('error', 'Data jabatan tidak bisa dihapus karena masih digunakan oleh pengguna.');
        }

        $position->delete();

        return redirect()->route('organisasi.jabatan')->with('success', 'Data jabatan berhasil dihapus.');
    }

    // View Form Edit Jabatan
    public function editJabatan(Position $position)
    {
        return view('app.forms.edit-jabatan', compact('position'));
    }

    // Update Data Jabatan
    public function updateJabatan(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $position->update($request->all());

        return redirect()->route('organisasi.jabatan')->with('info', 'Data jabatan berhasil diperbaharui.');
    }

    // View Halaman Peran
    public function peran()
    {
        $roles = Role::all();

        return view('app.pages.peran', compact('roles'));
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
            'name' => 'required|unique:roles|string|max:255',
            'tag' => 'required|unique:roles|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        Role::create($request->all());

        return redirect()->route('organisasi.peran')->with('success', 'Data peran berhasil ditambahkan.');
    }

    // Hapus Data Peran
    public function hapusPeran(Role $role)
    {
        if (User::where('role_id', $role->id)->exists()) {
            return redirect()->route('organisasi.peran')->with('error', 'Data peran tidak bisa dihapus karena masih digunakan oleh pengguna.');
        }

        $role->delete();

        return redirect()->route('organisasi.peran')->with('success', 'Data peran berhasil dihapus.');
    }

    // View Form Edit Peran
    public function editPeran(Role $role)
    {
        return view('app.forms.edit-peran', compact('role'));
    }

    // Update Data Peran
    public function updatePeran(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $role->update($request->all());

        return redirect()->route('organisasi.peran')->with('info', 'Data peran berhasil diperbaharui.');
    }
}
