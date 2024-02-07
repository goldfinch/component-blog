<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-blog:ext:category')]
class BlogCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog:ext:category';

    protected $description = 'Create BlogCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/blogcategory-extension.stub';

    protected $prefix = 'Extension';
}
