<?php

namespace App\Domain\Entity\Product;

use App\Domain\Entity\Id\Id;

class Product
{
    public Id $id;
    public string $name;
    public int $price;

    public function __construct(Id $id, string $name, int $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
}
