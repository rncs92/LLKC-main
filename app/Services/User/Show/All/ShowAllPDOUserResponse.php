<?php declare(strict_types=1);

namespace LLKC\Services\User\Show\All;

use LLKC\Models\User;

class ShowAllPDOUserResponse
{
    private string $userInfo;

    public function __construct(string $userInfo)
    {
        $this->userInfo = $userInfo;
    }

    public function getUserInfo(): string
    {
        return $this->userInfo;
    }
}