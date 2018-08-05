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

    public function view_sorteio_labels(){
        return view('sorteio.sortear_label');
    }

    public function view_sorteio_todos()
    {
        return view('sorteio.sortear_todos');
    }

    public function sortear(){
        $participante = Participante::inRandomOrder()
            ->join('presencas', 'presencas.id_participante', '=', 'participantes.identificador')
            ->where('presencas.id_label_evento', session('id_label_evento'))
            ->whereNotIn('participantes.identificador', DB::table('sorteado_tabs')
                ->where('id_evento_label', session('id_label_evento'))
                ->pluck('id_participante')
            )->limit(1)
            ->select('participantes.identificador')
            ->addSelect('participantes.nome')
            ->addSelect('participantes.campo')
            ->get();

            if(!empty($participante[0])){
                $sorteado = new SorteadoTab();
                $sorteado->id_participante = $participante[0]->identificador;
                $sorteado->id_evento_label = session('id_label_evento');
                $sorteado->save();

                return response()->json(['status' => 'sorteio ok', 
                                        'participante' => $participante,
                                        'sorteado' => $sorteado]);
            }else{
                return response()->json(['status' => 'nenhum participante']);
            }
    }


    public function sortear_todos_participantes()
    {
        $participante = Participante::inRandomOrder()
            ->select('participantes.identificador')
            ->addSelect('participantes.nome')
            ->addSelect('participantes.campo')
            ->get();

        if (!empty($participante[0])) {
            $sorteado = new SorteadoTab();
            $sorteado->id_participante = $participante[0]->identificador;
            $sorteado->id_evento_label = session('id_label_evento');
            $sorteado->save();

            return response()->json([
                'status' => 'sorteio ok',
                'participante' => $participante,
                'sorteado' => $sorteado
            ]);
        } else {
            return response()->json(['status' => 'nenhum participante']);
        }
    }
}
