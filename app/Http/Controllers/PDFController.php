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

        foreach ($consultas as $consulta){
            $dia = Carbon::parse($consulta->inicio)->format('d/m/Y');
            $hora = Carbon::parse($consulta->inicio)->format('H:i');
            $consulta->inicio = $dia . ' às ' . $hora;
        }

        $horarioAtual = Carbon::now($tz = 'America/Sao_Paulo');
        $dia = $horarioAtual->format('d/m/Y');
        $hora = $horarioAtual->format('H:i:s');

        //Pdf::setOption(['dpi' => 150, 'defaultFont' => 'verdana']);

        $datas = PDFController::ordenaData();
        //dd($datas);

        $pdf = PDF::loadView('admin.consultas.pdf', compact('autor', 'dia', 'hora', 'datas', 'consultas'))->setPaper('a4', 'portrait');

        return $pdf->setPaper('a4')->stream('Relatório Geral de Consultas');
    }

    public function ordenaData(){
        
        $eventos = Consulta::orderBy('inicio', 'asc')
        ->get()
        ->map(function($evento) {
            $evento->inicio = Carbon::parse($evento->inicio);
            return $evento;
        });

        $eventosPorMes = $eventos->groupBy(function($evento) {
            return $evento->inicio->format('m-Y');
        });

        $eventosPorMes = json_decode($eventosPorMes, true);

        $meses = []; // Um array para armazenar os dados dos meses de forma genérica

        foreach ($eventosPorMes as $mes => $eventos) {
            $meses[$mes] = $eventos;
        }

        return $eventosPorMes;

    }
}
