<?php declare(strict_types=1);

namespace SokTechnical\Services\User\Authorization;

use SokTechnical\Models\User;
use SokTechnical\Repository\User\UserRepository;

class AuthorizationService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $email, string $password): ?User
    {
        return $this->userRepository->login($email, $password);
    }
}
