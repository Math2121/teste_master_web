<?php


namespace App\Http\Repositories;

use App\Http\Interfaces\CartRepositoryInterface;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartRepositoryInterface
{
    public function __construct(private Cart $cart)
    {
    }
	public function cadastrarCart(array $data){
        DB::beginTransaction();
        try {
            $cart = $this->cart->create([
                'nome' => $data['nome'],
                'quantidade' => $data['quantidade'],

            ]);
            DB::commit();
            return $cart;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e->getMessage());
        }
    }
}
