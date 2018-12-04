<?php

declare(strict_types=1);

namespace App\Handler;

use App\Message\LoserBet;
use App\Message\ReportGame;
use App\Message\WinnerBet;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

abstract class BetResultHandler implements MessageSubscriberInterface
{
    /**
     * Returns a list of messages to be handled.
     *
     * It returns a list of messages like in the following example:
     *
     *     yield MyMessage::class;
     *
     * It can also change the priority per classes.
     *
     *     yield FirstMessage::class => ['priority' => 0];
     *     yield SecondMessage::class => ['priority => -10];
     *
     * It can also specify a method, a priority and/or a bus per message:
     *
     *     yield FirstMessage::class => ['method' => 'firstMessageMethod'];
     *     yield SecondMessage::class => [
     *         'method' => 'secondMessageMethod',
     *         'priority' => 20,
     *         'bus' => 'my_bus_name',
     *     ];
     *
     * The benefit of using `yield` instead of returning an array is that you can `yield` multiple times the
     * same key and therefore subscribe to the same message multiple times with different options.
     *
     * The `__invoke` method of the handler will be called as usual with the message to handle.
     */
    public static function getHandledMessages(): iterable
    {
        yield LoserBet::class => [
                'bus' => 'event_bus'
        ];
        yield WinnerBet::class => [
            'bus' => 'event_bus'
        ];
        yield ReportGame::class => [
            'bus' => 'event_bus'
        ];
    }
}
