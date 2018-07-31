<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
