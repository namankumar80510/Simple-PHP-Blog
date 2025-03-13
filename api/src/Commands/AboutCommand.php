<?php

declare(strict_types=1);

namespace App\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: "app:about", description: "Learn about this application.")]
class AboutCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $config = config("app");
        $appName = $config['name'];

        $output->writeln("<comment>Running app</comment> $appName on <info>PHP Version: " . phpversion() . "</info>");

        return Command::SUCCESS;
    }
}