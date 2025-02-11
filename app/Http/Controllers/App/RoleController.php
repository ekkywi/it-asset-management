<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    // View Halaman Peran
    public function index()
    {
        $roles = Role::all();

        return view('app.pages.peran', compact('roles'));
    }

    // View Halaman Tambah Peran
    public function create()
    {
        return view('app.forms.tambah-peran');
    }

    // Simpan Data Peran
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|string|max:255',
            'tag' => 'required|unique:roles|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        Role::create($request->all());

        return redirect()->route('role')->with('success', 'Data peran berhasil ditambahkan.');
    }

    // Hapus Data Peran
    public function destroy(Role $role)
    {
        if (User::where('role_id', $role->id)->exists()) {
            return redirect()->route('role')->with('error', 'Data peran tidak bisa dihapus karena masih digunakan oleh pengguna.');
        }

        $role->delete();

        return redirect()->route('role')->with('success', 'Data peran berhasil dihapus.');
    }

    // View Form Edit Peran
    public function edit(Role $role)
    {
        return view('app.forms.edit-peran', compact('role'));
    }

    // Update Data Peran
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $role->update($request->all());

        return redirect()->route('role')->with('info', 'Data peran berhasil diperbaharui.');
    }
}
