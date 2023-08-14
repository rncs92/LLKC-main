<?php declare(strict_types=1);

namespace LLKC\Services\Hobbies\Register;

class RegisterPDOHobbiesRequest
{
    private string $date_from;
    private string $date_to;
    private string $gender;
    private string $age;
    private string $employment;
    private array $hobbies;


    public function __construct
    (
        string $date_from,
        string $date_to,
        string $gender,
        string $age,
        string $employment,
        array  $hobbies
    )
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->gender = $gender;
        $this->age = $age;
        $this->employment = $employment;
        $this->hobbies = $hobbies;
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

    public function getHobbies(): array
    {
        return $this->hobbies;
    }
}