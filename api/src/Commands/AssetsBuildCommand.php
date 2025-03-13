<?php

declare(strict_types=1);

namespace App\Commands;

use Nette\Utils\FileSystem;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: "assets:build", description: "Build assets for production. Needs NPM installed on the system.")]
class AssetsBuildCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("<comment>Building assets</comment>");

        chdir(FRONTEND_DIR);
        shell_exec('npm run build');

        $output->writeln("<comment>Assets built</comment>");

        chdir(PUBLIC_DIR . 'dist');

        // delete index.html
        FileSystem::delete('index.html');

        $output->writeln("<info>Finished</info>");

        return Command::SUCCESS;
    }
}