<?php

declare(strict_types=1);

namespace Greetings\Application;

interface Calendar
{
    public function today(): \DateTimeImmutable;
}
