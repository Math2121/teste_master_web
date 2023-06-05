<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\EletroServiceInterface;
use App\Http\Interfaces\ProdutoServiceInterface;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditandoEletroRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    //

    public function __construct(private ProdutoServiceInterface $produtoService){}
    public function criandoProduto(CreateProductRequest $request){

        $eletro = $this->produtoService->cadastrarProduto($request->all());

        return response()->json($eletro, Response::HTTP_CREATED);
    }
    public function recuperarProduto(){

        $eletro = $this->produtoService->recuperaProdutos();

        return response()->json($eletro, Response::HTTP_CREATED);
    }
}
