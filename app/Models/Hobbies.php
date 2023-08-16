<?php declare(strict_types=1);

namespace LLKC\Models;

class Hobbies
{
    private string $date_from;
    private string $date_to;
    private string $gender;
    private string $age;
    private string $employment;
    private string $hobbies;
    private ?int $userId;

    public function __construct
    (
        string $date_from,
        string $date_to,
        string $gender,
        string $age,
        string $employment,
        string  $hobbies,
        int    $userId = null
    )
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->gender = $gender;
        $this->age = $age;
        $this->employment = $employment;
        $this->hobbies = $hobbies;
        $this->userId = $userId;
    }

    public function getDateFrom(): string
    {
        return $this->date_from;
    }

    public function getDateTo(): string
    {
        return $this->date_to;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function getEmployment(): string
    {
        return $this->employment;
    }

    public function getHobbies(): string
    {
        return $this->hobbies;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): void
    {
        $this->userId = $userId;
    }
}