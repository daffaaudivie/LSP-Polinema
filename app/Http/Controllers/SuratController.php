<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    // Tampilkan semua surat
    public function index(Request $request)
    {
        $query = Surat::with('kategori');

        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $surat = $query->get();

        return view('surat.index', compact('surat'));
    }

    // Form tambah surat
    public function create()
    {
        $kategori = Kategori::all();
        return view('surat.create', compact('kategori'));
    }

    // Simpan surat baru
    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required|unique:surat,nomor|max:50',
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        // Simpan file PDF ke storage
        $filePath = $request->file('file')->store('surat', 'public');

        Surat::create([
            'nomor' => $request->nomor,
            'judul' => $request->judul,
            'file' => $filePath,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan!');
    }

    // Lihat detail surat
    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    // Form edit
    public function edit(Surat $surat)
    {
        $kategori = Kategori::all();
        return view('surat.edit', compact('surat', 'kategori'));
    }

    // Update surat
    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'nomor' => 'required|max:50|unique:surat,nomor,' . $surat->id,
            'judul' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($surat->file && Storage::disk('public')->exists($surat->file)) {
                Storage::disk('public')->delete($surat->file);
            }

            $data['file'] = $request->file('file')->store('surat', 'public');
        }

        $surat->update($data);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diupdate!');
    }

    // Hapus surat
    public function destroy(Surat $surat)
    {
        if ($surat->file && Storage::disk('public')->exists($surat->file)) {
            Storage::disk('public')->delete($surat->file);
        }

        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus!');
    }

    // Unduh surat
    public function download(Surat $surat)
    {
        return Storage::disk('public')->download($surat->file, $surat->judul . ".pdf");
    }
}
