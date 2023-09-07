<?php

namespace App\Http\Controllers;

use App\Models\Proprietario;
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
        $file = $request->file('foto_perfil');
        
        $file->storeAs('foto_proprietarios');

        $data = $request->all();
        $data['foto_perfil'] = $file->hashName();

        $this->create($data);

        $data = $request->all();
        Proprietario::create($data);

        return redirect()->route('proprietarios.index')->with('success', 'Proprietário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proprietario $proprietario)
    {
        //
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
    public function destroy(Proprietario $proprietario)
    {
        //
    }
}
