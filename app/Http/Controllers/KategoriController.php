<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index(Request $request)
{
    $query = Kategori::query();

    // Jika ada pencarian
    if ($request->filled('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('keterangan', 'like', '%' . $request->search . '%');
    }

    // gunakan paginate, bukan get
    $kategori = $query->paginate(10);

    return view('kategori.index', compact('kategori'));
}


    // Form tambah
    public function create()
    {
        return view('kategori.create');
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'keterangan' => 'nullable',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Form edit
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    // Update kategori
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'keterangan' => 'nullable',
        ]);

        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate!');
    }

    // Hapus kategori
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
