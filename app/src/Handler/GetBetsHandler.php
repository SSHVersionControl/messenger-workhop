<?php

declare(strict_types=1);

namespace App\Handler;

use App\Message\GetRegisterBets;
use App\Repository\BetRepository;
use App\Repository\MemoryStorage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetBetsHandler implements MessageHandlerInterface
{
    private $storage;

    public function __construct(BetRepository $storage)
    {
        $this->storage = $storage;
    }

    public function __invoke(GetRegisterBets $getRegisterBets)
    {
        return $this->storage->findAll();
    }
}
