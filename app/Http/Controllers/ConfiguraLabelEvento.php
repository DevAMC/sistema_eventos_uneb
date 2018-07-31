<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguraLabelEvento extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function configuraLabelView()
    {
        return view('configuraLabel');
    }


}
