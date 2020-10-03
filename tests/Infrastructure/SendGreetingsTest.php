<?php

declare(strict_types=1);

namespace Tests\Greetings\Infrastructure;

use Greetings\Infrastructure\Console\SendGreetings;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

final class SendGreetingsTest extends TestCase
{
    protected function setUp(): void
    {
        $data = [
            ['firstname', 'lastname', 'date_of_birth', 'email'],
            ['John', 'Doe', '2000-10-03', 'john@doe.com'],
        ];

        $fileHandler = fopen(__DIR__ . '/../../var/employees.csv', 'wb');

        foreach ($data as $row) {
            fputcsv($fileHandler, $row);
        }

        fclose($fileHandler);
    }

    protected function tearDown(): void
    {
        unlink(__DIR__ . '/../../var/employees.csv');
    }

    /** @test */
    public function itShouldSendGreetingsViaConsole(): void
    {
        $command = new SendGreetings(
            __DIR__ . '/../../var/employees.csv'
        );

        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        $output = $commandTester->getDisplay();
        self::assertStringContainsString('Happy birthday, dear John!', $output);
    }
}
