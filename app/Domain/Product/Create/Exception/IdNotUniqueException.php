<?php

namespace App\Domain\Product\Create\Exception;

use App\Domain\Entity\Id\Id;
use Throwable;

/**
 * Thrown when product with given id already exists in the store
 */
class IdNotUniqueException extends ProductCreationException
{
    public Id $productId;

    private $reason = 'Product with id "%s" already exists in the store';

    public function __construct(Id $productId, $code = 0, Throwable $previous = null)
    {
        parent::__construct(sprintf($this->reason, $productId->toString()), $code, $previous);
    }
}
