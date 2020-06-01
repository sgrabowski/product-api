<?php

namespace App\Providers;

use App\CommandBus\CommandBus;
use App\CommandBus\DirectCommandBus;
use App\Domain\Command\CreateProduct;
use App\Domain\Product\Create\CreateProductHandler;
use App\Domain\Product\Create\ProductStore;
use App\Infrastructure\Product\EloquentProductStore;
use Illuminate\Support\ServiceProvider;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductStore::class, EloquentProductStore::class);
        $this->app->bind(EventDispatcherInterface::class, EventDispatcher::class);
        $this->app->bind(CommandBus::class, DirectCommandBus::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CreateProductHandler $createProductHandler)
    {
        //@TODO: autodiscovery
        DirectCommandBus::registerHandler(CreateProduct::class, $createProductHandler);
    }
}
