<?php

declare(strict_types=1);

namespace App\Middleware;

use Symfony\Component\Messenger\Stamp\StampInterface;

class UuidStamp implements StampInterface
{
    private $uuid;

    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function __toString()
    {
        return $this->uuid;
    }
}
