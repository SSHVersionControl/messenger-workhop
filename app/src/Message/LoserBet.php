<?php

declare(strict_types=1);

namespace App\Message;

use App\Entity\Bet;
use App\Handler\BetResultHandler;

final class LoserBet
{
    private $bet;

    public function __construct(Bet $bet)
    {
        $this->bet = $bet;
    }

    /**
     * @return array
     */
    public function getBet(): Bet
    {
        return $this->bet;
    }

    /**
     * @param Bet $bet
     */
    public function setBet(Bet $bet): void
    {
        $this->bet = $bet;
    }
}
