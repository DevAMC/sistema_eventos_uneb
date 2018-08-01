<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participante;
use App\SorteadoTab;

class SorteioController extends Controller
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
        return view('sorteio.home');
    }

    public function sortear(){
        $sorteado = Participante::inRandomOrder()
            ->join('presencas', 'presencas.id_participante', '=', 'participantes.id')
            ->where('presencas.id_label_evento', session('id_label_evento'))->get();

        //$sorteado = new SorteadoTab();


        return response()->json();
        
    }
}
