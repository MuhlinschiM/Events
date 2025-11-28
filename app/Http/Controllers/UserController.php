<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }


    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        User::create($request->all());

        return redirect()->route('users.index');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users.index');
    }
}
