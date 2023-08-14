<?php declare(strict_types=1);

use LLKC\Repository\Hobbies\HobbiesRepository;
use LLKC\Repository\Hobbies\PDOHobbiesRepository;
use LLKC\Repository\User\PDOUserRepository;
use LLKC\Repository\User\UserRepository;

return [
    'classes' => [
        UserRepository::class => new PDOUserRepository(),
        HobbiesRepository::class => new PDOHobbiesRepository(),
    ],
];
