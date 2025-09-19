<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Tampilkan daftar kategori.
     */
    public function index()
    {
        // Ambil semua kategori dengan pagination
        $kategoris = Kategori::orderBy('id', 'asc')->paginate(10);

        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Tampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Simpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
            'keterangan'    => 'nullable|string|max:255',
        ]);

        // Simpan data
        Kategori::create([
            'nama_kategori' => $validated['nama_kategori'],
            'keterangan'    => $validated['keterangan'] ?? null,
        ]);

        // Reset ulang ID supaya selalu urut
        DB::statement("SET @count = 0");
        DB::statement("UPDATE kategoris SET id = @count:=@count+1 ORDER BY id");

        // Reset AUTO_INCREMENT supaya lanjut dari ID terakhir
        $maxId = DB::table('kategoris')->max('id');
        DB::statement("ALTER TABLE kategoris AUTO_INCREMENT = " . ((int) $maxId + 1));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit kategori.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update data kategori.
     */
    public function update(Request $request, Kategori $kategori)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori,' . $kategori->id,
            'keterangan'    => 'nullable|string|max:255',
        ]);

        // Update data
        $kategori->update($validated);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diubah!');
    }

    /**
     * Hapus kategori dari database.
     */
    public function destroy(Kategori $kategori)
    {
        // Hapus data
        $kategori->delete();

        // Reset ulang ID supaya selalu urut
        DB::statement("SET @count = 0");
        DB::statement("UPDATE kategoris SET id = @count:=@count+1 ORDER BY id");

        // Reset AUTO_INCREMENT supaya lanjut dari ID terakhir
        $maxId = DB::table('kategoris')->max('id');
        DB::statement("ALTER TABLE kategoris AUTO_INCREMENT = " . ((int) $maxId + 1));

        return back()->with('success', 'Kategori berhasil dihapus dan ID direset!');
    }
}
