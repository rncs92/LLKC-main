<?php declare(strict_types=1);

namespace LLKC\Services\User\Show;

class ShowPDOUserRequest
{
    private int $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}