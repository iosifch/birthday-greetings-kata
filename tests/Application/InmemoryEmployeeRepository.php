<?php

declare(strict_types=1);

namespace Tests\Greetings\Application;

use DateTimeImmutable;
use Greetings\Domain\Employee;
use Greetings\Domain\EmployeeRepository;

final class InmemoryEmployeeRepository implements EmployeeRepository
{
    private array $employees;

    public function __construct(array $employees)
    {
        $this->employees = $employees;
    }

    public function findAllBornOn(DateTimeImmutable $dateOfBirth): iterable
    {
        return array_map(
            static fn (array $employee) => new Employee(
                $employee['firstname'],
                $employee['lastname'],
                new DateTimeImmutable($employee['date_of_birth']),
                $employee['email'],
            ),
            array_filter(
                $this->employees,
                static fn (array $row) => (new DateTimeImmutable($row['date_of_birth']))->format('m-d') === $dateOfBirth->format('m-d')
            )
        );
    }
}
