<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $cadd = User::create($request->all());
        return redirect()->route('users.index')->with('success', 'Usuário creado com suceso!');
    }

    public function edit(String $id)
    {
        //$user = User::where('id', '=', $id)->first();
        if(!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'Usúario não encontrado!');
        }

        return view('admin.user.edit', compact('user'));
    }

    public function update(String $id ,Request $request)
    {
        if (!$user = User::find($id)) {
            return back()->with('message', 'User not was encontrado!');
        }
        $user->update($request->only([
            'name',
            'email',
        ]));

        return redirect()
            ->route('users.index')
            ->with('Success', 'User update with success');
    }

    public function show(String $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'User dont encontrado!');
        }
        return view('admin.user.show', compact('user'));
    }

    public function destroy(String $id)
    {
        #Verify if dont is admin
        /*if (Gate::denies('is-admin')) {
            return redirect()
            ->back()
            ->with('message', 'You dont is admin!');
        }*/

        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('message', 'User dont was destroy');
        }

        //Imposible that the user logado destroy Auth::user()->id or auth()->user()->id 
        if (Auth::user()->id === $user->id) {
            return redirect()
                ->back()
                ->with('message', 'Não pode deletar o User logado!');
        }

        $user->delete();
        return redirect()
            ->route('users.index')
            ->with('message', 'User destroy with sucess');
    }
}
