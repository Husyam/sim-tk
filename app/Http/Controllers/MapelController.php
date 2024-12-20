<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $mapels = Mapel::all();
        return view('pages.mapel.index', compact('mapels'));
    }

    public function create()
    {
        return view('pages.mapel.create');
    }

    public function store(Request $request)
    {
        $mapels = $request->all();
        Mapel::create($mapels);
        return redirect()->route('mapels.index');
    }

    public function edit($id)
    {
        $mapels = Mapel::find($id);
        return view('pages.mapel.edit', compact('mapels'));
    }

    public function update(Request $request, $id)
    {
        $mapels = Mapel::find($id);
        $mapels->update($request->all());
        return redirect()->route('mapels.index');
    }

    public function destroy($id)
    {
        $mapels = Mapel::find($id);
        $mapels->delete();
        return redirect()->route('mapels.index');
    }
}
