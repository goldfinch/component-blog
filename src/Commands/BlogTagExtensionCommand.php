<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-blog:blogtag')]
class BlogTagExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog:blogtag';

    protected $description = 'Create BlogTag extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-blog category extension';

    protected $stub = 'blogtag-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
