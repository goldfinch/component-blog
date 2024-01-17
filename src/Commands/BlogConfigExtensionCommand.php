<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-blog-blogconfig')]
class BlogConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog-blogconfig';

    protected $description = 'Create BlogConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-blog config extension';

    protected $stub = 'blogconfig-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
