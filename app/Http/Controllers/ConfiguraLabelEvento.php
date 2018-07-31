<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento_label;
use App\Evento;
class ConfiguraLabelEvento extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function configuraLabelView()
    {
        $labels = Evento_label::all();
        $eventos = Evento::all();
        return view('configuraLabel', compact('labels', 'eventos'));
    }

    public function configuraLabel($id_label, $id_evento)
    {
        session(['id_label_evento' => $id_label , 'id_evento' => $id_evento]);
        if(session('id_label_evento') && session('id_evento')){
            return redirect('/');
        }else{
            return redirect('/selecionaLabelEvento');
        }
    }

    public function criaLabel(Request $request)
    {
        $label = new Evento_label();

        $label->create($request->all());

        return redirect('/selecionaLabelEvento');
    }


}
