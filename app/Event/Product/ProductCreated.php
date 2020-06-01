<?php

namespace App\Event\Product;

class ProductCreated
{
    public string $id;
    public string $name;
    public int $price;

    public function __construct(string $id, string $name, int $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
}
