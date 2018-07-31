<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento_label;
use App\Participante;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retorna o label selecionado
        $label_selecionado = Evento_label::with('evento')->where('id',session('id_label_evento'))->get();

        $qnt_participantes = Participante::where('id_evento', session('id_evento'));

        return view('home', compact('label_selecionado', 'qnt_participantes'));
    }

    
}
