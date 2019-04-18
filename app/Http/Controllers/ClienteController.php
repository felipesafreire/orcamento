<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct()
    { }

    public function index()
    {
        $clientes = Cliente::all();
        return $clientes->toJson();
    }

    public function salvar(Request $request)
    {
        $nome = $request->input('nome');
        if(empty($nome)){
            return response()->json(['errors' => ["Nome obrigatório."]], 400);
        }
        $cliente = new Cliente();
        $cliente->nome = $nome;
        $cliente->save();
        return $cliente->toJson();
    }
}
