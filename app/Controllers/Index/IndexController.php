<?php declare(strict_types=1);

namespace LLKC\Controllers\Index;

use LLKC\Core\Session;
use LLKC\Core\TwigView;

class IndexController
{
    public function welcome(): TwigView
    {
        return new TwigView('Index/welcome', []);
    }

    public function index(): TwigView
    {
        if(!Session::get('user')){
            return new TwigView('Errors/notAuthorized', []);
        }

        return new TwigView('Index/index', []);
    }


}