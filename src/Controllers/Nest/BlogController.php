<?php

namespace Goldfinch\Component\Blog\Controllers\Nest;

use Goldfinch\Nest\Controllers\NestController;
use Goldfinch\Component\Blog\Configs\BlogConfig;

class BlogController extends NestController
{
    public function NestedList()
    {
        if ($this->NestedObject) {
            $cfg = $this->NestedObject::config();
            $cfgDB = BlogConfig::current_config();
            if ($cfgDB->ItemsPerPage) {
                $cfg->set('nestedListPageLength', $cfgDB->ItemsPerPage);
            }
        }

        return parent::NestedList();
    }
}
