<?php

namespace App\Http\Services;

use App\Http\Interfaces\CartRepositoryInterface;
use App\Http\Interfaces\EletroRepositoryInterface;
use App\Http\Interfaces\ProdutoRepositoryInterface;
use App\Http\Interfaces\ProdutoServiceInterface;

class ProdutoService implements ProdutoServiceInterface
{

    public function __construct(private ProdutoRepositoryInterface $produtoRepository, private CartRepositoryInterface $cartRepository)
    {
    }
    public function cadastrarProduto(array $data)
    {
        $cart = $this->cartRepository->cadastrarCart($data);

        return $cart;
    }

    public function recuperaProdutos()
    {
        return $this->produtoRepository->recuperar();
    }

}
