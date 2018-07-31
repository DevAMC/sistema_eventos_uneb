<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento_label;

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
        //retorn o label selecionado
        $label_selecionado = Evento_label::with('evento')->where('id',session('id_label_evento'))->get();

        return view('home', compact('label_selecionado'));
    }

    
}
