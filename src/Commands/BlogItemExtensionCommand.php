<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-blog:ext:item')]
class BlogItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog:ext:item';

    protected $description = 'Create BlogItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/blogitem-extension.stub';

    protected $prefix = 'Extension';
}
