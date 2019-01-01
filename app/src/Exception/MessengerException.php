<?php

declare(strict_types=1);

namespace App\Exception;

use Symfony\Component\Messenger\Transport\AmqpExt\Exception\RejectMessageExceptionInterface;

/**
 * Messenger exception. Nice message then default
 * Can create a middleware to catch so command can still run
 */
class MessengerException extends \RuntimeException implements RejectMessageExceptionInterface
{
}
