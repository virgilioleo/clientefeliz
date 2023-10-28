<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() 
    {
        $dados = [];
        return view('welcome', compact('dados'));
    }
    
}