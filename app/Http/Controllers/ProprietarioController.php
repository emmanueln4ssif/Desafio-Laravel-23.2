<?php

namespace App\Http\Controllers;

use App\Models\Proprietario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProprietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $proprietarios = Proprietario::all();

        //$query = $request->input('search');
        if ($proprietarios->count() === 0) {

            $mensagem = 'Ainda não há proprietários cadastrados...';
            return view('admin.proprietarios.index', compact('mensagem', 'proprietarios'));

        }

        return view('/admin.proprietarios.index', compact('proprietarios'));
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
            $file->store('foto_proprietarios');
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
    public function edit(Proprietario $proprietario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proprietario $proprietario)
    {
        //
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
