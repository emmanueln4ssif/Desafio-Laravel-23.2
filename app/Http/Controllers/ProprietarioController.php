<?php

namespace App\Http\Controllers;

use App\Models\Proprietario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProprietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');

        $proprietarios = Proprietario::paginate(10);

        if ($proprietarios->count() < 1) {
            $mensagem = 'Ainda não há proprietários cadastrados...';
            return view('admin.proprietarios.index', compact('mensagem', 'proprietarios', 'query'));
        }

        if ($query) {
            $proprietarios = Proprietario::where('nome', 'like', '%' . $query . '%')->paginate(10);
        } else {
            $proprietarios = Proprietario::paginate(10);
        }

        return view('/admin.proprietarios.index', compact('proprietarios', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proprietario = new Proprietario();
        return view('/admin.proprietarios.create', compact('proprietario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('foto_perfil')) {

            $file = $request->file('foto_perfil');
            $file->store('public/foto_proprietarios');
            $data['foto_perfil'] = $file->hashName();

        } else {
            $data['foto_perfil'] = null;
        }

        Proprietario::create($data);

        return redirect()->route('proprietarios.index')->with('success', 'Proprietário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $proprietario = Proprietario::find($id);

        $dataNascimento = Carbon::parse($proprietario->data_nascimento)->format('d/m/Y');

        if (!$proprietario) {
            return redirect()->route('proprietarios.index')->with('error', 'Proprietário não encontrado.');
        }
    
        return view('admin.proprietarios.show', compact('proprietario', 'dataNascimento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proprietario = Proprietario::find($id);

        $dataNascimento = Carbon::parse($proprietario->data_nascimento)->format('d/m/Y');

        return view('/admin.proprietarios.edit', compact('proprietario', 'dataNascimento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $user = Proprietario::find($id);

        $dataNascimento = Carbon::parse($user->data_nascimento)->format('Y/m/d');
        $data['data_nascimento'] = $dataNascimento;

        if ($request->hasFile('foto_perfil')) {

            $file = $request->file('foto_perfil');
            $file->store('foto_proprietarios');
            $data['foto_perfil'] = $file->hashName();

        } else {
            $data['foto_perfil'] = null;
        }

        $user->update($data);

        return redirect()->route('proprietarios.index')->with('success', 'Proprietário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proprietario = Proprietario::find($id);

        if (!$proprietario) {
            return redirect()->route('proprietarios.index')->with('error', 'Proprietário não encontrado.');
        }

        $proprietario->delete();

        return redirect()->route('proprietarios.index')->with('success', 'Proprietário excluído com sucesso!');
    }
}
