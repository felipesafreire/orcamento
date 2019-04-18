<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Vendedor;

class VendedorController extends Controller
{
    
    public function __construct()
    {}

    public function index()
    {
        $vendedores = Vendedor::all();
        return $vendedores->toJson();
    }

}
