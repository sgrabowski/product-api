<?php

namespace App\Domain\Entity\Id;

use Ramsey\Uuid\UuidInterface;

class Uuid implements Id
{
    private UuidInterface $internalId;

    public function __construct(UuidInterface $internalId)
    {
        $this->internalId = $internalId;
    }

    public static function fromString(string $uuid): self
    {
        return new self(\Ramsey\Uuid\Uuid::fromString($uuid));
    }

    public function toString(): string
    {
        return $this->internalId->toString();
    }
}
