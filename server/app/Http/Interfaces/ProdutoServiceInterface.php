<?php


namespace App\Http\Interfaces;
interface ProdutoServiceInterface
{
	public function cadastrarProduto(array $data);
    public function recuperaProdutos();

}
