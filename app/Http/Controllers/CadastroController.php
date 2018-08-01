<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Participante;

class CadastroController extends Controller
{
    public function view_participantes(){
        $this->middleware('auth');
        $this->middleware('CheckEventoLabel');

        $eventos = Evento::all();
        $participantes = Participante::where('id_evento', session('id_evento'))->get();
        return view('cadastro.participante', compact('eventos', 'participantes'));
    }

    public function view_eventos()
    {
        $this->middleware('auth');
        $eventos = Evento::all();
        return view('cadastro.evento', compact('eventos'));
    }

    public function cadastra_participante(Request $request){
        $request->validate([
            'identificador' => 'required|unique:participantes|max:255',
            'nome' => 'required|min:5|max:255',
            'campo' => 'required',
            'id_evento' => 'required',
        ]);
        $participante = Participante::create($request->all());
        return redirect('/cadastros/participantes')->with('status', 'Cadastrado com sucesso...');        
    }


    public function cadastra_evento(Request $request)
    {
        $request->validate([
            'evento' => 'required|unique:eventos|min:5|max:255',
        ]);
        $evento = Evento::create($request->all());
        return redirect('/cadastros/eventos')->with('status', 'Cadastrado com sucesso...');
    }
}
