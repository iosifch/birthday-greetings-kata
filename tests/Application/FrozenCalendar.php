<?php

declare(strict_types=1);

namespace Tests\Greetings\Application;

use DateTimeImmutable;
use Greetings\Application\Calendar;

final class FrozenCalendar implements Calendar
{
    private DateTimeImmutable $now;

    public function __construct(DateTimeImmutable $now)
    {
        $this->now = $now;
    }

    public function today(): DateTimeImmutable
    {
        return $this->now;
    }
}
