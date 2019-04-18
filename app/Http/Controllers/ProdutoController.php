<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;

class ProdutoController extends Controller
{
    
    public function __construct()
    {}

    public function index()
    {
        $produtos = Produto::all();
        return $produtos->toJson();
    }

}
