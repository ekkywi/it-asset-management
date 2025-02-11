<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Section;
use App\Models\User;

class SectionController extends Controller
{
    // View Halaman Bagian
    public function index()
    {
        $sections = Section::all();

        return view('app.pages.bagian', compact('sections'));
    }


    // View Halaman Tambah Bagian
    public function create()
    {
        return view('app.forms.tambah-bagian');
    }


    // Simpan Data Bagian
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sections|string|max:255',
            'tag' => 'required|unique:sections|string|max:255',
            'color' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        Section::create($request->all());

        return redirect()->route('section')->with('success', 'Data bagian berhasil ditambahkan.');
    }


    // Hapus Data Bagian
    public function destroy(Section $section)
    {
        if (User::where('section_id', $section->id)->exists()) {
            return redirect()->route('section')->with('error', 'Data bagian tidak bisa dihapus karena masih digunakan oleh pengguna.');
        }

        $section->delete();

        return redirect()->route('section')->with('success', 'Data bagian berhasil dihapus.');
    }


    // View Form Edit Bagian
    public function edit(Section $section)
    {
        return view('app.forms.edit-bagian', compact('section'));
    }


    // Update Data Bagian
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $section->update($request->all());

        return redirect()->route('section')->with('info', 'Data bagian berhasil diperbaharui.');
    }
}
