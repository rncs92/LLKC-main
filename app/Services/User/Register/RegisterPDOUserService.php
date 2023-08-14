<?php declare(strict_types=1);

namespace LLKC\Services\User\Register;

use LLKC\Models\User;
use LLKC\Repository\User\UserRepository;

class RegisterPDOUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(RegisterPDOUserRequest $request): RegisterPDOUserResponse
    {
        $user = new User(
            $request->getUsername(),
            $request->getEmail(),
            $request->getName(),
            $request->getSurname(),
            $request->getPassword(),
            $request->getAddress(),
            $request->getCity(),
            $request->getPostalCode(),
            $request->getPhoneNumber(),
            $request->getComments(),

            password_hash($request->getPassword(), PASSWORD_DEFAULT)
        );

        $this->userRepository->save($user);

        return new RegisterPDOUserResponse($user);
    }
}
