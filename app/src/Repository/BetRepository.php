<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Bet;
use Doctrine\ORM\EntityRepository;

class BetRepository extends EntityRepository
{
    public function save(Bet $bet)
    {
        $this->getEntityManager()->persist($bet);
        $this->getEntityManager()->flush();
    }
}
