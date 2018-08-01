<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participante;
use App\SorteadoTab;
use Illuminate\Support\Facades\DB;

class SorteioController extends Controller
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
        return view('sorteio.home');
    }

    public function sortear(){

        $sorteado_ok = false;

            $participante = Participante::inRandomOrder()
                ->join('presencas', 'presencas.id_participante', '=', 'participantes.id')
                ->where('presencas.id_label_evento', session('id_label_evento'))
                ->whereNotIn('participantes.id', DB::table('sorteado_tabs')
                    ->where('id_evento_label', session('id_label_evento'))
                    ->pluck('id_participante')
                )->limit(1)
                ->select('participantes.id')
                ->get();


                if(!empty($participante[0])){
                    $sorteado = new SorteadoTab();
                    $sorteado->id_participante = $participante[0]->id;
                    $sorteado->id_evento_label = session('id_label_evento');
                    $sorteado->save();
                    return response()->json(['status' => 'sorteio ok', 
                                            'participante' => $participante,
                                            'sorteado' => $sorteado]);
                }else{
                    return response()->json(['status' => 'nenhum participante']);
                }
            

        
    }
}
