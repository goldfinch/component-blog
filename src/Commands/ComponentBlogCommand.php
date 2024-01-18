<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-blog')]
class ComponentBlogCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog';

    protected $description = 'Populate goldfinch/component-blog components';

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-blog:blogitem',
        );
        $input = new ArrayInput(['name' => 'BlogItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-blog:blogcategory',
        );
        $input = new ArrayInput(['name' => 'BlogCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-blog:blogconfig',
        );
        $input = new ArrayInput(['name' => 'BlogConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-blog:blogblock',
        );
        $input = new ArrayInput(['name' => 'BlogBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-blog:templates');
        $input = new ArrayInput([]);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-blog:config');
        $input = new ArrayInput(['name' => 'component-blog']);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
