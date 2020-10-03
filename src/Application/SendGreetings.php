<?php

declare(strict_types=1);

namespace Greetings\Application;

use Greetings\Domain\EmployeesRepository;

final class SendGreetings
{
    private EmployeesRepository $employeesRepository;

    private Clock $clock;

    private GreetEmployee $greetEmployee;

    public function __construct(
        EmployeesRepository $employeesRepository,
        Clock $clock,
        GreetEmployee $greetEmployee
    ) {
        $this->employeesRepository = $employeesRepository;
        $this->clock = $clock;
        $this->greetEmployee = $greetEmployee;
    }

    public function toEmployeesBornToday(): void
    {
        $employees = $this->employeesRepository->findAllBornOn(
            $this->clock->now()
        );

        foreach ($employees as $employee) {
            $this->greetEmployee->greet($employee);
        }
    }
}
