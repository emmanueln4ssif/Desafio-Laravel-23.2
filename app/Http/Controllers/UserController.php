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
    public function index(Request $request)
    {
        $query = $request->input('search');

        $funcionarios = User::paginate(15);
       
        if ($funcionarios->count() === 1) {
            $mensagem = 'Ainda não há funcionários cadastrados...';
            return view('admin.funcionarios.index', compact('mensagem', 'funcionarios'));
        }

        if ($query) {
            $funcionarios = User::where('name', 'like', '%' . $query . '%')->paginate(15);;
        } else {
            $funcionarios = User::paginate(15);
        }

        return view('/admin.funcionarios.index', compact('funcionarios', 'query'));
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

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado com sucesso!');
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
    
        return view('admin.funcionarios.show', compact('user', 'dataNascimento'))->with('success', 'Funcionário editado com sucesso!');;
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

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('funcionarios.index')->with('error', 'Funcionário não encontrado.');
        }

        $user->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário excluído com sucesso!');
    }

}
