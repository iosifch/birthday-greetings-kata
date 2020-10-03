<?php

declare(strict_types=1);

namespace Greetings\Infrastructure\Calendar;

use DateTimeImmutable;
use Greetings\Application\Calendar;

final class SystemCalendar implements Calendar
{
    public function today(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
