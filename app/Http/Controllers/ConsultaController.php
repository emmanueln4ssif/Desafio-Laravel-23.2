<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Consulta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        
        $user = Auth::user()->id;

        if($user === 1){
            $consultas = Consulta::all();
        } else {
            $consultas = Consulta::where('user_id', $user)->get();
        }

        return view('/admin.consultas.index', compact('consultas', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consulta = new Consulta();
        $animais = Animal::all();
        $funcionario = Auth::user();

        return view('/admin.consultas.create', compact('consulta', 'animais', 'funcionario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Consulta::create($data);

        return redirect()->route('consultas.index')->with('success', 'Consulta agendada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $consulta = Consulta::find($id);

        $hora_inicio = Carbon::parse($consulta->inicio)->format('h:i A');
        $dia_inicio = Carbon::parse($consulta->inicio)->format('d-m-Y');

        $hora_termino = Carbon::parse($consulta->termino)->format('h:i A');
        $dia_termino = Carbon::parse($consulta->termino)->format('d-m-Y');

        if (!$consulta) {
            return redirect()->route('consultas.index')->with('error', 'Consulta não encontrada.');
        }
    
        return view('admin.consultas.show', compact('consulta', 'hora_inicio', 'dia_inicio', 'hora_termino', 'dia_termino'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulta $consulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consulta = Consulta::find($id);

        if (!$consulta = Consulta::find($id)) {
            return redirect()->route('consultas.index')->with('error', 'Consulta não encontrada.');
        }

        $consulta->delete();

        return redirect()->route('consultas.index')->with('success', 'Consulta excluída com sucesso!');
    }
}
