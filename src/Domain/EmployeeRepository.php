<?php

declare(strict_types=1);

namespace Greetings\Domain;

interface EmployeeRepository
{
    public function findAllBornOn(\DateTimeImmutable $dateOfBirth): iterable;
}
