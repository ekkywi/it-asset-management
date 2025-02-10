<?php

namespace App\Http\Controllers\App;

use App\Models\Section;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{

    // View Halaman Pengguna
    public function pengguna()
    {
        $users = User::all();

        return view('app.pages.pengguna', compact('users'));
    }

    // View Halaman Tambah Pengguna
    public function tambahPengguna()
    {
        $sections = Section::all();
        $positions = Position::all();
        $roles = Role::all();

        return view('app.forms.tambah-pengguna', compact('sections', 'positions', 'roles'));
    }

    // Simpan Data Pengguna
    public function simpanPengguna(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
            'section_id' => 'required|exists:sections,id',
            'position_id' => 'required|exists:positions,id',
            'role_id' => 'required|exists:roles,id',
            'login_application' => 'required|boolean',
        ]);

        User::create($request->all());

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Hapus Data Pengguna
    public function hapusPengguna(User $user)
    {
        $user->delete();

        return redirect()->route('pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }

    // View Halaman Edit Pengguna
    public function editPengguna(User $user)
    {
        $sections = Section::all();
        $positions = Position::all();
        $roles = Role::all();

        return view('app.forms.edit-pengguna', compact('user', 'sections', 'positions', 'roles'));
    }

    // Update Data Pengguna
    public function updatePengguna(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:8',
            'section_id' => 'required|exists:sections,id',
            'position_id' => 'required|exists:positions,id',
            'role_id' => 'required|exists:roles,id',
            'login_application' => 'required|boolean',
        ]);

        $user->update($request->all());

        return redirect()->route('pengguna')->with('info', 'Pengguna berhasil diupdate.');
    }
}
