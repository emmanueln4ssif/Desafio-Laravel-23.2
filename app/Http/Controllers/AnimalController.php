<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Proprietario;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        
        $animais =  Animal::all();
        $animais = Animal::all();
       
        if ($animais->count() === 1) {
            $mensagem = 'Ainda não há animais cadastrados...';
            return view('admin.animais.index', compact('mensagem', 'animais', 'animais'));
        }

        if ($query) {
            $animais =  Animal::where('nome', 'like', '%' . $query . '%')->get();
        } else {
            $animais = Animal::all();
        }

        return view('/admin.animais.index', compact('animais', 'query', 'animais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animal = new Animal();
        $proprietarios = Proprietario::all();

        return view('/admin.animais.create', compact('animal', 'proprietarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Animal::create($data);

        return redirect()->route('animais.index')->with('success', 'Animal cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $animal = Animal::find($id);

        $dataNascimento = Carbon::parse($animal->data_nascimento)->format('d/m/Y');

        if (!$animal) {
            return redirect()->route('animais.index')->with('error', 'Animal não encontrado.');
        }
    
        return view('admin.animais.show', compact('animal', 'dataNascimento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $animal = Animal::find($id);

        $dataNascimento = Carbon::parse($animal->data_nascimento)->format('d/m/Y');

        return view('/admin.animais.edit', compact('animal', 'dataNascimento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $animal = Animal::find($id);

        $dataNascimento = Carbon::parse($animal->data_nascimento)->format('Y/m/d');
        $data['data_nascimento'] = $dataNascimento;

        $animal->update($data);

        return redirect()->route('animais.index')->with('success', 'Animal editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return redirect()->route('animais.index')->with('error', 'Animal não encontrado.');
        }

        $animal->delete();

        return redirect()->route('animais.index')->with('success', 'Animal excluído com sucesso!');
    }
}
