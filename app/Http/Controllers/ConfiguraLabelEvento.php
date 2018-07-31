<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento_label;
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

        return view('configuraLabel', compact('labels'));
    }

    public function configuraLabel($id)
    {
        session(['id_label_evento' => $id]);
        
        if(session('id_label_evento')){
            return redirect('/');
        }else{
            return redirect('/selecionaLabelEvento');
        }
    }


}
