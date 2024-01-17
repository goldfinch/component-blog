<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-blog-blogblock')]
class BlogBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog-blogblock';

    protected $description = 'Create BlogBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-blog block extension';

    protected $stub = 'blogblock-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
