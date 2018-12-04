<?php

declare(strict_types=1);

namespace App\Middleware;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;
use Symfony\Component\Messenger\Stamp\ReceivedStamp;
use Symfony\Component\Messenger\Stamp\SentStamp;

class AuditMiddleware implements MiddlewareInterface
{
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        $message = $envelope->getMessage();
        $id = spl_object_id($message);

        echo "[$id] Handling: " . \get_class($message) . " <br/>\n";

        if (null !== $envelope->last(ReceivedStamp::class)) {
            echo "[$id] Received Message: " . \get_class($message) . " <br/>\n";
            return $stack->next()->handle($envelope, $stack);
        }

        $returnedEnvelope = $stack->next()->handle($envelope, $stack);

        if (null === $returnedEnvelope->last(SentStamp::class)) {
            echo "[$id] Message handle sync: " . \get_class($message) . " <br/>\n";
        } else {
            echo "[$id] Dispatched Message sent to rabbit mq: " . \get_class($message) . " <br/>\n";
        }



        return $returnedEnvelope;
    }
}
