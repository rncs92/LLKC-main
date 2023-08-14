<?php

use SokTechnical\Controllers\Authorization\AuthorizationController;
use SokTechnical\Controllers\Index\IndexController;
use SokTechnical\Controllers\User\UserController;

return [
    //Index
    ['GET', '/', [IndexController::class, 'welcome']],
    ['GET', '/index', [IndexController::class, 'index']],
    //Registration
    ['GET', '/register', [UserController::class, 'register']],
    ['POST', '/register', [UserController::class, 'store']],
    //Authorization
    ['GET', '/login', [AuthorizationController::class, 'index']],
    ['POST', '/login', [AuthorizationController::class, 'login']],
    ['POST', '/logout', [AuthorizationController::class, 'logout']],
];