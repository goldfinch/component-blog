<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-blog')]
class BlogSetCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog';

    protected $description = 'Set of all [goldfinch/component-blog] commands';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-blog:ext:admin',
        );
        $input = new ArrayInput(['name' => 'BlogAdmin']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-blog:ext:config',
        );
        $input = new ArrayInput(['name' => 'BlogConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-blog:ext:block',
        );
        $input = new ArrayInput(['name' => 'BlogBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-blog:ext:page',
        );
        $input = new ArrayInput(['name' => 'Blog']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-blog:ext:controller',
        );
        $input = new ArrayInput(['name' => 'BlogController']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-blog:ext:item',
        );
        $input = new ArrayInput(['name' => 'BlogItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-blog:ext:category',
        );
        $input = new ArrayInput(['name' => 'BlogCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-blog:ext:tag',
        );
        $input = new ArrayInput(['name' => 'BlogTag']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-blog:config');
        $input = new ArrayInput(['name' => 'component-blog']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-blog:templates');
        $input = new ArrayInput([]);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
