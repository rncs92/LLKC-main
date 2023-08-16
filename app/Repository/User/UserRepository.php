<?php declare(strict_types=1);

namespace LLKC\Repository\User;

use LLKC\Models\User;

interface UserRepository
{
    public function save(User $user): void;
    public function byId(int $userId): string;
    public function byEmail(string $email): ?User;
    public function byUsername(string $username): ?User;
    public function authenticate(User $user): bool;
    public function login(string $email, string $password): ?User;
}
