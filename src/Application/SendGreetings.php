<?php

declare(strict_types=1);

namespace Greetings\Application;

use Greetings\Domain\EmployeesRepository;

final class SendGreetings
{
    private EmployeesRepository $employeesRepository;

    private Calendar $clock;

    private GreetEmployee $greetEmployee;

    public function __construct(
        EmployeesRepository $employeesRepository,
        Calendar $clock,
        GreetEmployee $greetEmployee
    ) {
        $this->employeesRepository = $employeesRepository;
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
