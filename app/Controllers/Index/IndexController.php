<?php declare(strict_types=1);

namespace SokTechnical\Controllers\Index;

use SokTechnical\Core\Session;
use SokTechnical\Core\TwigView;

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