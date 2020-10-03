<?php

declare(strict_types=1);

namespace Greetings\Domain;

interface EmployeesRepository
{
    public function findAllBornOn(\DateTimeImmutable $dateOfBirth): iterable;
}
