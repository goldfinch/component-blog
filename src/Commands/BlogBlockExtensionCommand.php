<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-blog:ext:block')]
class BlogBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog:ext:block';

    protected $description = 'Create BlogBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/blogblock-extension.stub';

    protected $prefix = 'Extension';
}
