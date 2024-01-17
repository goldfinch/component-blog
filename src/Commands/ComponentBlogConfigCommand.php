<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'config:component-blog')]
class ComponentBlogConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'config:component-blog';

    protected $description = 'Create component-blog config';

    protected $path = 'app/_config';

    protected $type = 'component-blog yml config';

    protected $stub = 'blogconfig.stub';

    protected $extension = '.yml';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
