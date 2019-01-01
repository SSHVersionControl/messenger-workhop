<?php

declare(strict_types=1);

namespace App\Transport;

use Guzzle\Http\Client;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\TransportInterface;
use Symfony\Component\Serializer\SerializerInterface;

class HttpTransport implements TransportInterface
{
    private $url;

    /**
     * @var
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer, string $url)
    {
        $this->url = $url;
        $this->serializer = $serializer;
    }

    /**
     * Receive some messages to the given handler.
     *
     * The handler will have, as argument, the received {@link \Symfony\Component\Messenger\Envelope} containing the message.
     * Note that this envelope can be `null` if the timeout to receive something has expired.
     */
    public function receive(callable $handler): void
    {
    }

    /**
     * Stop receiving some messages.
     */
    public function stop(): void
    {
    }

    /**
     * Sends the given envelope.
     */
    public function send(Envelope $envelope): Envelope
    {
        (new Client())->post(
            $this->url,
            [
                'json' => $this->serializer->serialize($envelope->getMessage(), 'json')
            ]
        )->send();
        return $envelope;
    }
}
