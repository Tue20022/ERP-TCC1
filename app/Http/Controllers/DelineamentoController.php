<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DelineamentoController extends Controller
{
    public function index()
    {
        return view('delineamentos.index');
    }

    public function create()
    {
        return view('delineamentos.create');
    }
}
