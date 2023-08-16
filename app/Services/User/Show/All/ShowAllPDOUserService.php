<?php declare(strict_types=1);

namespace LLKC\Services\User\Show\All;

use LLKC\Repository\User\UserRepository;

class ShowAllPDOUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    public function handle(): ShowAllPDOUserResponse
    {
        $userInfo = $this->userRepository->all();

        return new ShowAllPDOUserResponse($userInfo);
    }
}