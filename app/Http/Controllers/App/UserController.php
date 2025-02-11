<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Section;
use App\Models\Position;
use App\Models\Role;

class UserController extends Controller
{
    // View Halaman Pengguna
    public function index()
    {
        $users = User::all();

        return view('app.pages.pengguna', compact('users'));
    }

    // View Halaman Tambah Pengguna
    public function create()
    {
        $sections = Section::all();
        $positions = Position::all();
        $roles = Role::all();

        return view('app.forms.tambah-pengguna', compact('sections', 'positions', 'roles'));
    }

    // Simpan Data Pengguna
    public function store(Request $request)
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

        return redirect()->route('user')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Hapus Data Pengguna
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user')->with('success', 'Pengguna berhasil dihapus.');
    }

    // View Halaman Edit Pengguna
    public function edit(User $user)
    {
        $sections = Section::all();
        $positions = Position::all();
        $roles = Role::all();

        return view('app.forms.edit-pengguna', compact('user', 'sections', 'positions', 'roles'));
    }

    // Update Data Pengguna
    public function update(Request $request, User $user)
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

        return redirect()->route('user')->with('info', 'Pengguna berhasil diupdate.');
    }
}
