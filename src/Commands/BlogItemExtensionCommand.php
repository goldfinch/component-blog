<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-blog-blogitem')]
class BlogItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog-blogitem';

    protected $description = 'Create BlogItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-blog item extension';

    protected $stub = 'blogitem-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
