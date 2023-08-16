<?php declare(strict_types=1);

namespace LLKC\Services\User\Show;

use LLKC\Repository\User\UserRepository;

class ShowPDOUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    public function handle(ShowPDOUserRequest $request): ShowPDOUserResponse
    {
        $userId = $request->getUserId();
        $userInfo = $this->userRepository->byId($userId);

        return new ShowPDOUserResponse($userInfo);
    }
}