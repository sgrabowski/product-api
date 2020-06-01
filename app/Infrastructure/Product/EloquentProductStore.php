<?php

namespace App\Infrastructure\Product;

use App\Domain\Entity\Product\Product;
use App\Domain\Product\Create\ProductStore;
use App\Product as ProductActiveRecord;

class EloquentProductStore implements ProductStore
{
    public function store(Product $product): void
    {
        $productActiveRecord = new ProductActiveRecord();
        $productActiveRecord->name = $product->name;
        $productActiveRecord->price = $product->price;
        $productActiveRecord->save();
    }
}
