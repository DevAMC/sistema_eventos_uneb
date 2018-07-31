<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presenca;
use App\Participante;
use Illuminate\Support\Facades\DB;

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

                //dados secundários
                $estatisticas = $this->receber_estatisticas();

                return response()->json(['status' => 'ok', 
                            'participante' => Participante::find($req->id),
                            'qnt_participante' => $estatisticas[0],
                            'qnt_participante_presentes' => $estatisticas[1],
                            'qnt_participante_nao_presentes' => $estatisticas[2],
                            ]);
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

    /**
     * Retorno
     * indice 0: Qnt de participantes
     * indice 1: Qnt de participantes presentes
     * indice 2: Qnt de participantes não presentes
     */
    public function receber_estatisticas(){
        $qnt_participantes = Participante::where('id_evento', session('id_evento'))->count();
        $qnt_participantes_presentes = Participante::join('presencas', 'presencas.id_participante', '=', 'participantes.id')
            ->where('presencas.id_label_evento', session('id_label_evento'))->get()->count();
        $qnt_participantes_nao_presentes = Participante::whereNotIn('id', DB::table('presencas')
                ->where('id_label_evento', session('id_label_evento'))
                ->pluck('id_participante')
            )->get()->count();
        
        return([$qnt_participantes, $qnt_participantes_presentes, $qnt_participantes_nao_presentes]);
    }
}
