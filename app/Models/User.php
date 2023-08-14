<?php declare(strict_types=1);

namespace LLKC\Models;

class User
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
    private ?int $userid;

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
        int    $userid = null
    )

    {
        $this->username = $username;
        $this->email = $email;
        $this->name = $name;
        $this->surname = $surname;
        $this->password = $password;
        $this->address = $address;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->phoneNumber = $phoneNumber;
        $this->comments = $comments;
        $this->userid = $userid;
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

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function setUserid(?int $userid): void
    {
        $this->userid = $userid;
    }
}
