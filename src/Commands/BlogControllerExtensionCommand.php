<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-blog:ext:controller')]
class BlogControllerExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog:ext:controller';

    protected $description = 'Create BlogController extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/blogcontroller-extension.stub';

    protected $suffix = 'Extension';
}
