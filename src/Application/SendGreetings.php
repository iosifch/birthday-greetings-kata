<?php

declare(strict_types=1);

namespace Greetings\Application;

use Greetings\Domain\EmployeeRepository;

final class SendGreetings
{
    private EmployeeRepository $employeesRepository;
    private Calendar $clock;
    private GreetEmployee $greetEmployee;

    public function __construct(
        EmployeeRepository $employeeRepository,
        Calendar $clock,
        GreetEmployee $greetEmployee
    ) {
        $this->employeesRepository = $employeeRepository;
        $this->clock = $clock;
        $this->greetEmployee = $greetEmployee;
    }

    public function toEmployeesBornToday(): void
    {
        $employees = $this->employeesRepository->findAllBornOn(
            $this->clock->today()
        );

        foreach ($employees as $employee) {
            $this->greetEmployee->greet($employee);
        }
    }
}
