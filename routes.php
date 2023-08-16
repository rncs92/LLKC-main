<?php

use LLKC\Controllers\Authorization\AuthorizationController;
use LLKC\Controllers\Index\IndexController;
use LLKC\Controllers\User\UserController;

return [
    //Index
    ['GET', '/', [IndexController::class, 'welcome']],
    ['GET', '/index', [UserController::class, 'showAll']],
    ['GET', '/info', [UserController::class, 'showAdditionalInformation']],
    //Registration
    ['GET', '/register', [UserController::class, 'register']],
    ['POST', '/register', [UserController::class, 'store']],
    //Authorization
    ['GET', '/login', [AuthorizationController::class, 'index']],
    ['POST', '/login', [AuthorizationController::class, 'login']],
    ['POST', '/logout', [AuthorizationController::class, 'logout']],
];