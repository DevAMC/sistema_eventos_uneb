<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presenca;

class ValidacaoController extends Controller
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


    //validar presença (os resultados desta operação ficarão gravados na tabela presenca)
    public function valida(Request $req){
        if(!ja_validado(dd($req->id), session('id_label_evento'))){
            $presenca = new Presenca();
            return response()->json($presenca);
        }else{
            return response()->json(['erro' => "ja validado"]);
        }
    }

    public function ja_validado($id_participante, $id_label){
        $v = Presenca::where('id_participante', $id)
        ->where('id_label_evento', $id_label)
        ->get();
        return ($v->count>1) ? true : false;
    }
}
