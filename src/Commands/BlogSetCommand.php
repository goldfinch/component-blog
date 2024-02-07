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
        $command = $this->getApplication()->find('vendor:component-blog:ext:admin');
        $command->run(new ArrayInput(['name' => 'BlogAdmin']), $output);

        $command = $this->getApplication()->find('vendor:component-blog:ext:config');
        $command->run(new ArrayInput(['name' => 'BlogConfig']), $output);

        $command = $this->getApplication()->find('vendor:component-blog:ext:block');
        $command->run(new ArrayInput(['name' => 'BlogBlock']), $output);

        $command = $this->getApplication()->find('vendor:component-blog:ext:page');
        $command->run(new ArrayInput(['name' => 'Blog']), $output);

        $command = $this->getApplication()->find('vendor:component-blog:ext:controller');
        $command->run(new ArrayInput(['name' => 'BlogController']), $output);

        $command = $this->getApplication()->find('vendor:component-blog:ext:item');
        $command->run(new ArrayInput(['name' => 'BlogItem']), $output);

        $command = $this->getApplication()->find('vendor:component-blog:ext:category');
        $command->run(new ArrayInput(['name' => 'BlogCategory']), $output);

        $command = $this->getApplication()->find('vendor:component-blog:ext:tag');
        $command->run(new ArrayInput(['name' => 'BlogTag']), $output);

        $command = $this->getApplication()->find('vendor:component-blog:config');
        $command->run(new ArrayInput(['name' => 'component-blog']), $output);

        $command = $this->getApplication()->find('vendor:component-blog:templates');
        $command->run(new ArrayInput([]), $output);

        return Command::SUCCESS;
    }
}
