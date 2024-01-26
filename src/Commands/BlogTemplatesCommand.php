<?php

namespace Goldfinch\Component\Blog\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-blog:templates')]
class BlogTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-blog:templates';

    protected $description = 'Publish [goldfinch/component-blog] templates';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-blog');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPath = BASE_PATH . '/vendor/goldfinch/component-blog/templates/Goldfinch/Component/Blog/';
            $themePath = 'themes/' . $theme . '/templates/Goldfinch/Component/Blog/';

            $files = [
                [
                    'from' => $componentPath . 'Blocks/BlogBlock.ss',
                    'to' => $themePath . 'Blocks/BlogBlock.ss',
                ],
                [
                    'from' => $componentPath . 'Models/Nest/BlogItem.ss',
                    'to' => $themePath . 'Models/Nest/BlogItem.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Blog.ss',
                    'to' => $themePath . 'Pages/Nest/Blog.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
