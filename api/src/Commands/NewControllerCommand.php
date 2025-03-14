<?php

declare(strict_types=1);

namespace App\Commands;

use Nette\Utils\FileSystem;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'new:controller', description: 'Create a new controller')]
class NewControllerCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the controller');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        if (!$name) {
            $output->writeln('<error>You must provide a name for the controller</error>');
            return Command::FAILURE;
        }

        $className = ucfirst($name) . 'Controller';
        $filePath = sprintf('%s/Controllers/%s.php', API_DIR . 'src', $className);

        if (file_exists($filePath)) {
            $output->writeln(sprintf('<error>The file %s already exists</error>', $filePath));
            return Command::FAILURE;
        }

        $template = <<<PHP
<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Libraries\Database\Connection;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class %s implements RequestHandlerInterface
{
    public function __construct(private Connection \$connection)
    {
    }

    public function handle(ServerRequestInterface \$request): ResponseInterface
    {
        return new JsonResponse([
            'data' => [],
            'method' => \$request->getMethod(),
            'status' => 200
        ]);
    }
}
PHP;

        FileSystem::write($filePath, sprintf($template, $className, $name));

        $output->writeln(sprintf('<info>Controller %s created</info>', $className));
        return Command::SUCCESS;
    }
}