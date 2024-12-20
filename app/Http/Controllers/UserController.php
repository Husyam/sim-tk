<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->paginate(5);
            // $users = User::all();
        return view('pages.user.index', compact('users'));

    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $users = $request->all();
        $users['password'] = Hash::make($request->input('password'));
        User::create($users);
        return redirect()->route('users.index')->with('success', 'User created successfully.');

    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('pages.user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('users.index');
    }
}
