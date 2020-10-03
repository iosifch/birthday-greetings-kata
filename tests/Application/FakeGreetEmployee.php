<?php

declare(strict_types=1);

namespace Tests\Greetings\Application;

use Greetings\Application\GreetEmployee;
use Greetings\Domain\Employee;

final class FakeGreetEmployee implements GreetEmployee
{
    public array $greetedEmployees = [];

    public function greet(Employee $employee): void
    {
        $this->greetedEmployees[] = $employee;
    }
}
