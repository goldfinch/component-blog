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

            $componentPathTemplates = BASE_PATH . '/vendor/goldfinch/component-blog/templates/';
            $componentPath = $componentPathTemplates . 'Goldfinch/Component/Blog/';
            $themeTemplates = 'themes/' . $theme . '/templates/';
            $themePath = $themeTemplates . 'Goldfinch/Component/Blog/';

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
                    'from' => $componentPath . 'Models/Nest/BlogCategory.ss',
                    'to' => $themePath . 'Models/Nest/BlogCategory.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Blog.ss',
                    'to' => $themePath . 'Pages/Nest/Blog.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/BlogByCategory.ss',
                    'to' => $themePath . 'Pages/Nest/BlogByCategory.ss',
                ],
                [
                    'from' => $componentPath . 'Partials/BlogFilter.ss',
                    'to' => $themePath . 'Partials/BlogFilter.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Blog/Models/Nest/BlogCategory.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Blog/Models/Nest/BlogCategory.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Blog/Models/Nest/BlogItem.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Blog/Models/Nest/BlogItem.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
