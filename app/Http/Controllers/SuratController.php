<?php
namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $surats = Surat::with('kategori')->latest();

        if ($request->has('search')) {
            $surats->where('judul', 'like', '%' . $request->search . '%');
        }

        return view('surat.index', ['surats' => $surats->paginate(10)]);
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('surat.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|unique:surats,nomor_surat',
            'kategori' => 'required|exists:kategoris,id',
            'judul' => 'required|string',
            'file_surat' => 'required|mimes:pdf|max:10240',
        ]);

        $file = $request->file('file_surat');
        $filePath = $file->store('public/surat');

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori,
            'judul' => $request->judul,
            'file_path' => $filePath,
        ]);

        return redirect()->route('surat.index')->with('success', 'Data berhasil disimpan');
    }

    public function destroy(Surat $surat)
    {
        Storage::delete($surat->file_path);
        $surat->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    public function download(Surat $surat)
    {
        return Storage::download($surat->file_path, $surat->judul . '.pdf');
    }

    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }
}