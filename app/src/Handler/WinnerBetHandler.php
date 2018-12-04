<?php

declare(strict_types=1);

namespace App\Handler;

use App\Message\WinnerBet;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class WinnerBetHandler implements MessageHandlerInterface
{
    public function __invoke(WinnerBet $winnerBet)
    {
    }
}
