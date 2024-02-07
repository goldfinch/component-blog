<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-blog:ext:admin')]
class BlogAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog:ext:admin';

    protected $description = 'Create BlogAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/blogadmin-extension.stub';

    protected $suffix = 'Extension';
}
