<?php

declare(strict_types=1);

namespace App\Transport;

use Symfony\Component\Messenger\Transport\TransportFactoryInterface;
use Symfony\Component\Messenger\Transport\TransportInterface;
use Symfony\Component\Serializer\SerializerInterface;

class HttpTransportFactory implements TransportFactoryInterface
{
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function createTransport(string $dsn, array $options): TransportInterface
    {
        return new HttpTransport($this->serializer, $dsn);
    }

    public function supports(string $dsn, array $options): bool
    {
        return 0 === strpos($dsn, 'http://');
    }
}
