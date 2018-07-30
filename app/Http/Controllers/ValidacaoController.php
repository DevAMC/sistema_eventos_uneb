<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presenca;

class ValidacaoController extends Controller
{
    //validar presença (os resultados desta operação ficarão gravados na tabela presenca)
    public function valida($id){
        if(!ja_validado(1,1)){
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
