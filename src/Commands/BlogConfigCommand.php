<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-blog:config')]
class BlogConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog:config';

    protected $description = 'Create Blog YML config';

    protected $path = 'app/_config';

    protected $type = 'config';

    protected $stub = './stubs/config.stub';

    protected $extension = '.yml';
}
