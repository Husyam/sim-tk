<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index(Request $request)
    {
        $fasilitas = DB::table('fasilitas')
            ->when($request->input('name_fasilitas'), function ($query, $name_fasilitas) {
                return $query->where('name_fasilitas', 'like', '%' . $name_fasilitas . '%');
            })
            ->paginate(5);
        return view('pages.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('pages.fasilitas.create');
    }

    public function store(Request $request)
    {
        //filename
        $filename = time() . '.' . $request->image->extension();
        //upload image
        $request->image->storeAs('public/fasilitas', $filename);

        $fasilitas = new Fasilitas();
        $fasilitas->name_fasilitas = $request->name_fasilitas;
        $fasilitas->description = $request->description;
        $fasilitas->image = $filename;
        $fasilitas->save();

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $fasilitas = Fasilitas::find($id);
        return view('pages.fasilitas.edit', compact('fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->name_fasilitas = $request->name_fasilitas;
        $fasilitas->description = $request->description;

        //delete old image if new image uploaded
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/fasilitas', $filename);
            $fasilitas->image = $filename;
        }
        $fasilitas->save();

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil diubah');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);
        //delete image
        Storage::delete('public/fasilitas/' . $fasilitas->image);
        $fasilitas->delete();
        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil dihapus');
    }
}
