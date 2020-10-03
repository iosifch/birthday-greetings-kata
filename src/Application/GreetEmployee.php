<?php

declare(strict_types=1);

namespace Greetings\Application;

use Greetings\Domain\Employee;

interface GreetEmployee
{
    public function greet(Employee $employee): void;
}
