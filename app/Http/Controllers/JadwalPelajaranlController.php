<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\User;

class JadwalPelajaranlController extends Controller
{
    public function index(Request $request)
    {
        $jadwal_pelajarans = JadwalPelajaran::all();
        $mapels = Mapel::all();
        return view('pages.jadwal.index', compact('jadwal_pelajarans', 'mapels'));
    }
    // $userId = auth()->id; // Correctly calling the id() method

    public function create()
    {
        $mapels = Mapel::all();
        $kelas = Kelas::all();
        return view('pages.jadwal.create', compact('mapels', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string|max:255',
            'jam' => 'required|string|max:255',
            'ruang' => 'required|string|max:255',
            'mapel' => 'required|exists:mapels,id',
            'kelas_ke' => 'required|exists:kelas,id',
        ]);

        $userId = auth()->id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a schedule.');
        }

        JadwalPelajaran::create([
            'user_id' => $userId,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'ruang' => $request->ruang,
            'mapel_id' => $request->mapel,  // Changed from mapel to mapel_id
            'kelas_ke' => $request->kelas_ke,
        ]);

        return redirect()->route('jadwals.index')->with('success', 'Schedule created successfully.');
    }

    public function edit($id)
    {
        $jadwal_pelajarans = JadwalPelajaran::find($id);
        $kelas = Kelas::all();  // Get all Kelas records
        $mapel = Mapel::all();  // Add this line to get all Mapel records
        return view('pages.jadwal.edit', compact('jadwal_pelajarans', 'kelas', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $jadwal_pelajarans = JadwalPelajaran::find($id);
        $jadwal_pelajarans->update($request->all());
        return redirect()->route('jadwals.index');
    }

    public function destroy($id)
    {
        $jadwal_pelajarans = JadwalPelajaran::find($id);
        $jadwal_pelajarans->delete();
        return redirect()->route('jadwals.index');
    }
}
