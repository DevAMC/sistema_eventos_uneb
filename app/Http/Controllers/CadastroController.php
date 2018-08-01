<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Participante;

class CadastroController extends Controller
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
        $eventos = Evento::all();
        $participantes = Participante::where('id_evento', session('id_evento'))->get();

        return view('cadastro.home', compact('eventos', 'participantes'));
    }

    public function cadastra_participante(Request $request){

        $request->validate([
            'identificador' => 'required|unique:participantes|max:255',
            'nome' => 'required|min:5|max:255',
            'campo' => 'required',
            'id_evento' => 'required',
        ]);

        $participante = Participante::create($request->all());

        return redirect('/cadastros')->with('status', 'Cadastrado com sucesso...');        
    }
}
