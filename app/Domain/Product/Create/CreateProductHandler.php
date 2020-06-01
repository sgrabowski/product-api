<?php

namespace App\Domain\Product\Create;

use App\Domain\Command\CreateProduct;
use App\Domain\Entity\Id\Uuid;
use App\Domain\Entity\Product\Product;
use App\Domain\Product\Create\Exception\IdNotUniqueException;
use App\Domain\Product\Create\Exception\ProductCreationException;
use App\Event\Product\ProductCreated;
use Psr\EventDispatcher\EventDispatcherInterface;

class CreateProductHandler
{
    private ProductStore $productStore;
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(ProductStore $productStore, EventDispatcherInterface $eventDispatcher)
    {
        $this->productStore = $productStore;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @throws IdNotUniqueException
     * @throws ProductCreationException
     */
    public function __invoke(CreateProduct $command): void
    {
        $product = new Product(
            Uuid::fromString($command->id),
            $command->name,
            $command->price
        );

        $this->productStore->store($product);

        $this->eventDispatcher->dispatch(new ProductCreated(
            $product->id->toString(),
            $product->name,
            $product->price
        ));
    }
}
