<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Position;
use App\Models\User;

class PositionController extends Controller
{
    // View Halaman Jabatan
    public function index()
    {
        $positions = Position::all();

        return view('app.pages.jabatan', compact('positions'));
    }

    // View Halaman Tambah Jabatan
    public function create()
    {
        return view('app.forms.tambah-jabatan');
    }

    // Simpan Data Jabatan
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:positions|string|max:255',
            'tag' => 'required|unique:positions|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        Position::create($request->all());

        return redirect()->route('position')->with('success', 'Data jabatan berhasil ditambahkan.');
    }

    // Hapus Data Jabatan
    public function destroy(Position $position)
    {
        if (User::where('position_id', $position->id)->exists()) {
            return redirect()->route('position')->with('error', 'Data jabatan tidak bisa dihapus karena masih digunakan oleh pengguna.');
        }

        $position->delete();

        return redirect()->route('position')->with('success', 'Data jabatan berhasil dihapus.');
    }

    // View Form Edit Jabatan
    public function edit(Position $position)
    {
        return view('app.forms.edit-jabatan', compact('position'));
    }

    // Update Data Jabatan
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $position->update($request->all());

        return redirect()->route('position')->with('info', 'Data jabatan berhasil diperbaharui.');
    }
}
