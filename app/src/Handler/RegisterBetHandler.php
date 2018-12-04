<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Bet;
use App\Message\RegisterBet;
use App\Repository\BetRepository;
use App\Repository\MemoryStorage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class RegisterBetHandler implements MessageHandlerInterface
{
    private $storage;

    public function __construct(BetRepository $storage)
    {
        $this->storage = $storage;
    }

    public function __invoke(RegisterBet $registerBet)
    {
        $bet = new Bet();
        $bet->setUserName($registerBet->getUsername());
        $bet->setGameName($registerBet->getGameName());
        $bet->setLeftScore($registerBet->getLeftScore());
        $bet->setRightScore($registerBet->getRightScore());

        $this->storage->save($bet);
    }
}
