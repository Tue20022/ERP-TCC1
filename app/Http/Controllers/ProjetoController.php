<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    public function index()
    {
        return view('projetos.index');
    }

    public function create()
    {
        return view('projetos.create');
    }
}
