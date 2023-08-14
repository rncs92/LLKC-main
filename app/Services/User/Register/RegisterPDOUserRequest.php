<?php declare(strict_types=1);

namespace LLKC\Services\User\Register;

class RegisterPDOUserRequest
{
    private string $username;
    private string $email;
    private string $name;
    private string $surname;
    private string $password;
    private string $address;
    private string $city;
    private string $postalCode;
    private string $phoneNumber;
    private string $comments;
    private string $confirmPassword;

    public function __construct(
        string $username,
        string $email,
        string $name,
        string $surname,
        string $password,
        string $address,
        string $city,
        string $postalCode,
        string $phoneNumber,
        string $comments,
        string $confirmPassword
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->phoneNumber = $phoneNumber;
        $this->comments = $comments;
        $this->confirmPassword = $confirmPassword;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getComments(): string
    {
        return $this->comments;
    }

    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }
}
