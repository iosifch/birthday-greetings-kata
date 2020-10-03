<?php

declare(strict_types=1);

namespace Greetings\Infrastructure\EmployeesRepository;

use DateTimeImmutable;
use Greetings\Domain\Employee;
use Greetings\Domain\EmployeeRepository;

final class CsvEmployeeRepository implements EmployeeRepository
{
    private string $csvFilePath;

    public function __construct(string $csvFilePath)
    {
        $this->csvFilePath = $csvFilePath;
    }

    public function findAllBornOn(DateTimeImmutable $dateOfBirth): iterable
    {
        $fileHandler = fopen($this->csvFilePath, 'rb');

        while ($line = fgetcsv($fileHandler)) {
            if ('firstname' === $line[0]) {
                continue;
            }

            $employeeBirthday = new DateTimeImmutable($line[2]);

            if ($employeeBirthday->format('m-d') !== $dateOfBirth->format('m-d')) {
                continue;
            }

            yield new Employee(
                $line[0],
                $line[1],
                new DateTimeImmutable($line[2]),
                $line[3],
            );
        }

        fclose($fileHandler);
    }
}
