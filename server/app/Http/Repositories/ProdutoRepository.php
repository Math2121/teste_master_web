<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProdutoRepositoryInterface;

use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoRepository implements ProdutoRepositoryInterface
{

    public function __construct(private Produto $produto)
    {
    }

    public function recuperar()
    {
        return $this->produto->all();
    }

}
