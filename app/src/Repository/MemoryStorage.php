<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Bet;

class MemoryStorage
{
    private $data;

    public function save(Bet $bet)
    {
        $this->data[] = $bet;
    }

    public function findAll()
    {
        return $this->data;
    }
}
