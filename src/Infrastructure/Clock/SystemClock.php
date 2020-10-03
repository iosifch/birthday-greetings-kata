<?php

declare(strict_types=1);

namespace Greetings\Infrastructure\Clock;

use DateTimeImmutable;
use Greetings\Application\Clock;

final class SystemClock implements Clock
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
