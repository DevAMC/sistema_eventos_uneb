<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participante;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckEventoLabel');
    }

    public function view(){

        $participantes = Participante::where('id_evento', session('id_evento'))->get();

        $participantes_presentes = Participante::join('presencas', 'presencas.id_participante', '=', 'participantes.identificador')
            ->where('presencas.id_label_evento', session('id_label_evento'))->get();

        $participantes_nao_presentes = Participante::whereNotIn('identificador', DB::table('presencas')
            ->where('id_label_evento', session('id_label_evento'))
            ->pluck('id_participante'))->get();

        $participantes_sorteados = Participante::join('presencas', 'presencas.id_participante', '=', 'participantes.identificador')
            ->join('sorteado_tabs', 'sorteado_tabs.id_participante', '=', 'participantes.identificador')
            ->where('presencas.id_label_evento', session('id_label_evento'))->get();


        return view('relatorio.home', compact('participantes', 'participantes_presentes', 'participantes_nao_presentes', 'participantes_sorteados'));
    }
}
