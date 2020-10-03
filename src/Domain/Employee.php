<?php

declare(strict_types=1);

namespace Greetings\Domain;

final class Employee
{
    private string $firstname;
    private string $lastname;
    private \DateTimeImmutable $dateOfBirth;
    private string $email;

    public function __construct(
        string $firstname,
        string $lastname,
        \DateTimeImmutable $dateOfBirth,
        string $email
    ) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->dateOfBirth = $dateOfBirth;
        $this->email = $email;
    }

    public function firstname(): string
    {
        return $this->firstname;
    }

    public function lastname(): string
    {
        return $this->lastname;
    }

    public function dateOfBirth(): \DateTimeImmutable
    {
        return $this->dateOfBirth;
    }

    public function email(): string
    {
        return $this->email;
    }
}
