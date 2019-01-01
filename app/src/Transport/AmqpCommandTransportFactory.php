<?php

declare(strict_types=1);

namespace App\Transport;

use Symfony\Component\Messenger\Transport\TransportFactoryInterface;
use Symfony\Component\Messenger\Transport\TransportInterface;
use Symfony\Component\Serializer\SerializerInterface;

class AmqpCommandTransportFactory implements TransportFactoryInterface
{
    private $serializer;
    private $debug;

    public function __construct(SerializerInterface $serializer = null, bool $debug = false)
    {
        $this->serializer = $serializer ?? Serializer::create();
        $this->debug = $debug;
    }

    public function createTransport(string $dsn, array $options): TransportInterface
    {
        return new AmqpTransport(Connection::fromDsn($dsn, $options, $this->debug), $this->serializer);
    }

    public function supports(string $dsn, array $options): bool
    {
        return 0 === strpos($dsn, 'amqp://');
    }
}
