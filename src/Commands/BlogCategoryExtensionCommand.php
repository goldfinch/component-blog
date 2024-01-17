<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-blog-blogcategory')]
class BlogCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog-blogcategory';

    protected $description = 'Create BlogCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-blog category extension';

    protected $stub = 'blogcategory-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
