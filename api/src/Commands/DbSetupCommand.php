<?php

declare(strict_types=1);

namespace App\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: "db:setup", description: "Sets up the database. Creates tables and inserts dummy data")]
class DbSetupCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("<comment>Running migration</comment>");

        chdir(API_DIR);
        shell_exec('php vendor/bin/phinx migrate');

        $output->writeln("<comment>Seeding database</comment>");

        chdir(API_DIR);
        shell_exec('php vendor/bin/phinx seed:run');

        $output->writeln("<info>Finished</info>");

        return Command::SUCCESS;
    }
}