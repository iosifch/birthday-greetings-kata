<?php

declare(strict_types=1);

namespace Greetings\Application;

interface Clock
{
    public function now(): \DateTimeImmutable;
}
