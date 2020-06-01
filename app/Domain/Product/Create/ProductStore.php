<?php

namespace App\Domain\Product\Create;

use App\Domain\Entity\Product\Product;
use App\Domain\Product\Create\Exception\IdNotUniqueException;
use App\Domain\Product\Create\Exception\ProductCreationException;

interface ProductStore
{
    /**
     * @throws IdNotUniqueException
     * @throws ProductCreationException
     */
    public function store(Product $product): void;
}
