<?php

declare(strict_types=1);

namespace App\Entity;

class Uuid
{
    /**
     * @var \Ramsey\Uuid\UuidInterface
     */
    private $uuid;

    public function __construct(string $uuid = null)
    {
        $this->uuid = $uuid ? \Ramsey\Uuid\Uuid::fromString($uuid) : \Ramsey\Uuid\Uuid::uuid4();
    }

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getUuid(): \Ramsey\Uuid\UuidInterface
    {
        return $this->uuid;
    }
}
