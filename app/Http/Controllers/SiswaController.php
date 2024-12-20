<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswas = Siswa::all();
        return view('pages.siswa.index', compact('siswas'));
    }

    public function create(Request $request)
    {
        $kelas = Kelas::all();
        return view('pages.siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:255',
            'kelas_id' => 'required:exists:kelas,id',
        ]);

        $siswas = $request->all();
        Siswa::create($siswas);
        return redirect()->route('siswas.index', compact('siswas'))->with('success', 'Siswa created successfully.');
    }

    public function edit($id)
    {
        $siswas = Siswa::find($id);
        $kelas = Kelas::all();
        return view('pages.siswa.edit', compact('siswas', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $siswas = Siswa::find($id);
        $siswas->update($request->all());
        return redirect()->route('siswas.index');
    }
}
