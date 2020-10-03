<?php

declare(strict_types=1);

namespace Greetings\Infrastructure\GreetEmployee;

use Greetings\Application\GreetEmployee;
use Greetings\Domain\Employee;
use Symfony\Component\Console\Output\OutputInterface;

final class GreetEmployeeViaConsole implements GreetEmployee
{
    private OutputInterface $output;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    public function greet(Employee $employee): void
    {
        $this->output->writeln('Happy birthday!');
        $this->output->writeln(sprintf(
            'Happy birthday, dear %s!',
            $employee->firstname()
        ));
    }
}
