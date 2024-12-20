<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::all();
        return view('pages.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('pages.kelas.create');
    }

    public function store(Request $request)
    {
        $kelas = $request->all();
        Kelas::create($kelas);
        return redirect()->route('kelas.index')->with('success', 'Kelas created successfully.');
    }

    public function destroy($id)
    {
        return redirect()->route('kelas.index');
    }


}
