<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Bet;
use App\Message\LoserBet;
use App\Message\ReportGame;
use App\Message\WinnerBet;
use App\Repository\BetRepository;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class ReportGameHandler implements MessageHandlerInterface
{
    private $messageBus;

    private $betRepository;

    public function __construct(
        MessageBusInterface $eventBus,
        BetRepository $betRepository
    ) {
        $this->messageBus = $eventBus;
        $this->betRepository = $betRepository;
    }

    public function __invoke(ReportGame $reportGame)
    {
        /** @var Bet[] $bets */
        $bets = $this->betRepository->findAll();

        echo "Proccessing <br/>\n";


        foreach ($bets as $bet) {
            if ($bet->getGameName() === $reportGame->getGameName()) {
                continue;
            }

            if ((int)$bet->getLeftScore() === (int)$reportGame->getLeftScore()
                && (int)$bet->getRightScore() === (int)$reportGame->getRightScore()) {
                $winnerBet = new WinnerBet($bet);

                $this->messageBus->dispatch($winnerBet);
                continue;
            }

            $loserBets = new LoserBet($bet);
            $this->messageBus->dispatch($loserBets);
        }
    }
}
