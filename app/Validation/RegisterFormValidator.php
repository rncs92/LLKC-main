<?php declare(strict_types=1);

namespace LLKC\Validation;

use LLKC\Exceptions\ValidationException;
use LLKC\Repository\User\UserRepository;

class RegisterFormValidator
{
    private array $errors = [];
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function validateForm(array $fields = []): void
    {
        if (strlen($fields['name']) < 2) {
            $this->errors['name'][] = 'Please enter your name!';
        }

        if (strlen($fields['surname']) < 2) {
            $this->errors['surname'][] = 'Please enter your surname!';
        }

        if (strlen($fields['username']) < 3) {
            $this->errors['username'][] = 'Username must be at least 3 symbols long!';
        }

        $username = $this->userRepository->byUsername($fields['username']);

        if ($username) {
            $this->errors['username'][] = 'This username is already taken!';
        }

       $email = $this->userRepository->byEmail($fields['email']);

        if ($email) {
            $this->errors['email'][] = 'User with this email already exists!';
        }

        if ($username !== null) {
            $this->errors['username'][] = 'This username has already been taken!';
        }

        if (strlen($fields['password']) < 7) {
            $this->errors['password'][] = 'Password must be at least 7 symbols long!';
        }

        if ($fields['password'] !== $fields['password_confirmation']) {
            $this->errors['password'][] = 'Passwords does not match!';
        }

        if (count($this->errors) > 0) {
            $_SESSION['errors'] = $this->errors;

            throw new ValidationException('Form validation has failed');
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
