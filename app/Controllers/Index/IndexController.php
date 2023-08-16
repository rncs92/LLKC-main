<?php declare(strict_types=1);

namespace LLKC\Controllers\Index;

use LLKC\Core\TwigView;

class IndexController
{
    public function welcome(): TwigView
    {
        return new TwigView('Index/welcome', []);
    }
}