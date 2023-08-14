<?php declare(strict_types=1);

namespace LLKC\Services\User\Register;

use LLKC\Models\User;

class RegisterPDOUserResponse
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}

