<?php

namespace App\Providers;

use App\Http\Interfaces\CartRepositoryInterface;
use App\Http\Interfaces\ProdutoRepositoryInterface;
use App\Http\Interfaces\ProdutoServiceInterface;
use App\Http\Repositories\CartRepository;
use App\Http\Repositories\ProdutoRepository;
use App\Http\Services\ProdutoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ProdutoServiceInterface::class, ProdutoService::class);
        $this->app->bind(ProdutoRepositoryInterface::class, ProdutoRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
