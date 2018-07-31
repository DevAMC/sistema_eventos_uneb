<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presenca;
use App\Participante;

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
        if(Participante::find($req->id)){
            if(!$this->ja_validado($req->id, session('id_label_evento'))){
                $presenca = new Presenca();
                $presenca->id_participante = $req->id;
                $presenca->id_label_evento = session('id_label_evento');
                $presenca->save();
                return response()->json(['status' => 'ok']);
            }else{
                return response()->json(['erro' => "ja validado"]);
            }
        }else{
            return response()->json(['erro' => "nao encontrado"]);
        }
    }

    public function ja_validado($id_participante, $id_label){
            $v = Presenca::where('id_participante', $id_participante)
                                ->where('id_label_evento', $id_label)
                                ->get();
            return ($v->count() > 0) ? true : false;
    }
}
