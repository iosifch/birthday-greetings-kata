<?php

declare(strict_types=1);

namespace Tests\Greetings\Application;

use DateTimeImmutable;
use Greetings\Application\Clock;

final class FrozenClock implements Clock
{
    private DateTimeImmutable $now;

    public function __construct(DateTimeImmutable $now)
    {
        $this->now = $now;
    }

    public function now(): DateTimeImmutable
    {
        return $this->now;
    }
}
