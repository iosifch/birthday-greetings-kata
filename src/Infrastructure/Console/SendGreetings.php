<?php

declare(strict_types=1);

namespace Greetings\Infrastructure\Console;

use Greetings\Infrastructure\Calendar\SystemCalendar;
use Greetings\Infrastructure\EmployeesRepository\CsvEmployeeRepository;
use Greetings\Infrastructure\GreetEmployee\GreetEmployeeViaConsole;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class SendGreetings extends Command
{
    private string $csvFilePath;

    public function __construct(string $csvFilePath)
    {
        parent::__construct(null);
        $this->csvFilePath = $csvFilePath;
    }

    protected function configure(): void
    {
        $this
            ->setName('greetings');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $sendGreetings = new \Greetings\Application\SendGreetings(
            new CsvEmployeeRepository($this->csvFilePath),
            new SystemCalendar(),
            new GreetEmployeeViaConsole($output)
        );

        $sendGreetings->toEmployeesBornToday();

        return 0;
    }
}
