<?php declare(strict_types=1);

use SokTechnical\Repository\User\PDOUserRepository;
use SokTechnical\Repository\User\UserRepository;

return [
    'classes' => [
        UserRepository::class => new PDOUserRepository(),
    ],
];
