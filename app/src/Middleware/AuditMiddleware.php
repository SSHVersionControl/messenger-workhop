<?php

declare(strict_types=1);

namespace App\Middleware;

use Ramsey\Uuid\Uuid;
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

        $uuidStamp = $envelope->last(UuidStamp::class);
        if (null === $uuidStamp) {
            $uuidStamp = new UuidStamp((string)Uuid::uuid4());
            $envelope = $envelope->with($uuidStamp);
        }

        if (null !== $envelope->last(ReceivedStamp::class)) {
            echo "[$uuidStamp)] Received Message: " . \get_class($message) . " <br/>\n";

            return $stack->next()->handle($envelope, $stack);
        }

        echo "[$uuidStamp] Handling: " . \get_class($message) . " <br/>\n";

        $returnedEnvelope = $stack->next()->handle($envelope, $stack);

        if (null === $returnedEnvelope->last(SentStamp::class)) {
            echo "[$uuidStamp] Message handle sync: " . \get_class($message) . " <br/>\n";
        } else {
            echo "[$uuidStamp] Dispatched Message sent to rabbit mq: " . \get_class($message) . " <br/>\n";
        }

        return $returnedEnvelope;
    }
}
