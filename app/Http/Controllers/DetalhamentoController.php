<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetalhamentoController extends Controller
{
    public function index()
    {
        return view('detalhamentos.index');
    }   

    public function create()
    {
        return view('detalhamentos.create');
    }
}
