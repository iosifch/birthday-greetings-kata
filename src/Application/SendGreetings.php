<?php

declare(strict_types=1);

namespace Greetings\Application;

use Greetings\Domain\EmployeeRepository;

final class SendGreetings
{
    private EmployeeRepository $employeesRepository;
    private Calendar $calendar;
    private GreetEmployee $greetEmployee;

    public function __construct(
        EmployeeRepository $employeeRepository,
        Calendar $calendar,
        GreetEmployee $greetEmployee
    ) {
        $this->employeesRepository = $employeeRepository;
        $this->calendar = $calendar;
        $this->greetEmployee = $greetEmployee;
    }

    public function toEmployeesBornToday(): void
    {
        $employees = $this->employeesRepository->findAllBornOn(
            $this->calendar->today()
        );

        foreach ($employees as $employee) {
            $this->greetEmployee->greet($employee);
        }
    }
}
