<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Siswa;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $siswa = Siswa::all();
        $matkul = Mapel::all();
        $nilai = Nilai::all();
        $nilai = Nilai::with(['siswa', 'mapel'])->get(); // Eager load the relationships
        return view('pages.nilai.index', compact('nilai', 'matkul', 'siswa'));
    }

    public function create(Request $request)
    {
        // Changed from User::all() to Siswa::all() to be consistent
        $siswa = Siswa::all();
        $matkul = Mapel::all();
        return view('pages.nilai.create', compact('siswa', 'matkul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',  // Add exists validation
            'mapel_id' => 'required|exists:mapels,id',  // Add exists validation
            'nilai' => 'required|numeric',
        ]);

        // Add error handling
        try {
            $nilai = Nilai::create([
                'siswa_id' => $request->siswa_id,
                'mapel_id' => $request->mapel_id,
                'nilai' => $request->nilai,
            ]);

            return redirect()->route('nilai.index')
                ->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();
        return redirect()->route('nilai.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
