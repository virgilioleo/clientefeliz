<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = cliente::all()->toArray();
        return view('cliente', compact('clientes'));
    }
    
    public function store(Request $request)
    {
        Cliente::create([
            'nome'  => $request->nome,
            'email' => $request->email,
        ]);

        return redirect('/clientes');
    }

    public function buscar()
    {
        $clientes = cliente::all()->toArray();
        return response()->json([
            'data' => $clientes,
            'recordsTotal' => count($clientes),
            'recordsFiltered' => count($clientes),
        ]);
    }
}
