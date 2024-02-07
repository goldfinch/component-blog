<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-blog:ext:page')]
class BlogExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog:ext:page';

    protected $description = 'Create Blog page extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/blog-extension.stub';

    protected $suffix = 'Extension';
}
