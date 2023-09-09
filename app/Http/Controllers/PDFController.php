<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function geraPDF(){

        $autor = Auth::user();

        $consultas = Consulta::all();

        $now = Carbon::now($tz = 'America/Sao_Paulo');
        $dia = $now->format('d/m/Y');
        $hora = $now->format('H:i:s');

        $pdf = PDF::loadView('admin.consultas.pdf', compact('autor', 'dia', 'hora', 'consultas'))->setPaper('a4', 'portrait');

        return $pdf->setPaper('a4')->stream('Relatório Geral de Consultas');
    }
}
