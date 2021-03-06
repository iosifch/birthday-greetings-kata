<?php

declare(strict_types=1);

namespace Tests\Greetings\Application;

use DateTimeImmutable;
use Greetings\Application\SendGreetings;
use Greetings\Domain\Employee;
use PHPUnit\Framework\TestCase;

final class SendGreetingsTest extends TestCase
{
    /** @test */
    public function itShouldSendGreetingsToAllEmployeesBornToday(): void
    {
        $employeeRepository = new InmemoryEmployeeRepository([
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'date_of_birth' => '2000-10-10',
                'email' => 'john@doe.com'
            ],
            [
                'firstname' => 'John',
                'lastname' => 'Doe Jr.',
                'date_of_birth' => '2020-01-01',
                'email' => 'john@doejr.com'
            ],
            [
                'firstname' => 'Gogu',
                'lastname' => 'Marcel',
                'date_of_birth' => '1990-10-10',
                'email' => 'gogu@marcel.com'
            ]
        ]);

        $calendar = new FrozenCalendar(new DateTimeImmutable('2020-10-10'));

        $fakeGreetEmployee = new FakeGreetEmployee();

        $sendGreetings = new SendGreetings(
            $employeeRepository,
            $calendar,
            $fakeGreetEmployee
        );

        $sendGreetings->toEmployeesBornToday();

        self::assertEquals(
            new Employee(
                'John',
                'Doe',
                new \DateTimeImmutable('2000-10-10'),
                'john@doe.com'
            ),
            $fakeGreetEmployee->greetedEmployees[0]
        );

        self::assertEquals(
            new Employee(
                'Gogu',
                'Marcel',
                new \DateTimeImmutable('1990-10-10'),
                'gogu@marcel.com'
            ),
            $fakeGreetEmployee->greetedEmployees[1]
        );
    }
}
