<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Orcamento;
use App\Models\Cliente;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\OrcamentoProduto;

class OrcamentoController extends Controller
{

    public function __construct()
    { }

    public function index()
    {
        $orcamento = Orcamento::with('cliente', 'vendedor', 'itens.produto')->get();
        //  ::with(['itens', 'cliente', 'vendedor'])->get();
        return $orcamento->toJson();
    }

    public function salvar(Request $request)
    {

        try {

            $this->validate(
                $request,
                [
                    'cliente' => 'required',
                    'vendedor' => 'required',
                    'total' => 'required',
                    'produtos' => 'required|array|min:1'
                ],
                [
                    'required' => "Campo :attribute obrigatório",
                    'produtos.array' => "Produto tem que ser uma lista.",
                    'produtos.min' => "Obrigatório pelo menos um produto."
                ]
            );

            return $this->insereOrcamento($request->input());
        } catch (ValidationException $e) {

            $errors = [];
            $getErrors = $e->errors();
            foreach ($getErrors as $error) {
                foreach ($error as $e) {
                    array_push($errors, $e);
                }
            }
            return response()->json(['errors' => $errors], 400);
        }
    }

    private function insereOrcamento($dados)
    {

        DB::beginTransaction();

        try {

            $totalProdutos = 0;
            $produtos = [];

            foreach ($dados["produtos"] as $produto) {
                $orcamentoProduto = new OrcamentoProduto();
                $totalProdutos += $produto["valor"] * $produto["quantidade"];
                $orcamentoProduto->valor = $produto["valor"];
                $orcamentoProduto->quantidade = $produto["quantidade"];
                $produtos[] = $orcamentoProduto;
            }

            $orcamento = new Orcamento();
            $orcamento->cliente_id =  $dados['cliente'];
            $orcamento->vendedor_id =  $dados['vendedor'];
            $orcamento->total =  $totalProdutos;
            $orcamento->data =  date('Y-m-d h:m:s');
            $orcamento->save();
            $orcamento->produtos = $orcamento->itens()->saveMany($produtos);
            DB::commit();
            return $orcamento->toJson();
        } catch (Exception $e) {
            //DB::rollBack();
            return response()->toJson(['error' => "Erro ao inserir orçamento."], 400);
        }
    }
}
