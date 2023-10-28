<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index() 
    {
        // $clienteservice = new ClienteService;
        // $clientes = $clienteservice->buscarClientes();
        $clientes = cliente::all()->toArray();
        return view('cliente',compact('clientes'));
    }
    public function store(Request $request)
    {
        // $nome = $request->nome;
        // $email = $request->email;
        // print_r($nome);
        // echo "<br>";
        // print_r($email);
        Cliente::create([
            'nome'  => $request->nome,
            'email' => $request->email
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