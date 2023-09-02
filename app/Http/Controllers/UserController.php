<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = User::all();
        return view('/admin.funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('/admin.funcionarios.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        User::create($data);

        return redirect()->route('funcionarios.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $user = User::find($id);

        $dataNascimento = Carbon::parse($user->data_nascimento)->format('d/m/Y');

        if (!$user) {
            return redirect()->route('funcionarios.index')->with('error', 'Funcionário não encontrado.');
        }
    
        return view('admin.funcionarios.show', compact('user', 'dataNascimento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);

        $dataNascimento = Carbon::parse($user->data_nascimento)->format('d/m/Y');

        return view('/admin.funcionarios.edit', compact('user', 'dataNascimento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $user = User::find($id);

        $dataNascimento = Carbon::parse($user->data_nascimento)->format('Y/m/d');

        $data['data_nascimento'] = $dataNascimento;
        $data['password'] = Hash::make($data['password']);

        $user->update($data);

        return redirect()->route('funcionarios.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('funcionarios.index')->with('success', true);
    }
    
}
