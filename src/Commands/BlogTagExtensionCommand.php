<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-blog:ext:tag')]
class BlogTagExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog:ext:tag';

    protected $description = 'Create BlogTag extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/blogtag-extension.stub';

    protected $prefix = 'Extension';
}
