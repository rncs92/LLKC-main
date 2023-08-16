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
        //Username check
        if (strlen($fields['username']) < 3) {
            $this->errors['username'][] = 'Username must be at least 3 symbols long!';
        }

        $username = $this->userRepository->byUsername($fields['username']);

        if ($username) {
            $this->errors['username'][] = 'This username has already been taken!';
        }

        //Email check
        $email = $this->userRepository->byEmail($fields['email']);

        if ($email) {
            $this->errors['email'][] = 'User with this email already exists!';
        }

        //Name check
        if (strlen($fields['name']) < 2) {
            $this->errors['name'][] = 'Please enter your name!';
        }

        //Surname check
        if (strlen($fields['surname']) < 2) {
            $this->errors['surname'][] = 'Please enter your surname!';
        }

        //Password check
        if (strlen($fields['password']) < 7) {
            $this->errors['password'][] = 'Password must be at least 7 symbols long!';
        }

        if ($fields['password'] !== $fields['password_confirmation']) {
            $this->errors['password'][] = 'Passwords does not match!';
        }

        //Address check
        if (strlen($fields['address']) < 3) {
            $this->errors['address'][] = 'Please enter your address!';
        }

        if (strlen($fields['city']) < 2) {
            $this->errors['city'][] = 'Please enter city name!';
        }

        if (strlen($fields['postal_code']) < 3) {
            $this->errors['postal_code'][] = 'Please enter postal code!';
        }

        //Phone number
        if (strlen($fields['phone_number']) < 8) {
            $this->errors['phone_number'][] = 'Please enter a valid phone number!!';
        }

        //Date
        if (strlen($fields['date_from']) < 2) {
            $this->errors['date_from'][] = 'Please enter date!';
        }
        if (strlen($fields['date_to']) < 2) {
            $this->errors['date_to'][] = 'Please enter date!';
        }

        //Comments
        if (strlen($fields['comments']) < 3) {
            $this->errors['comments'][] = 'Please enter comments!';
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
