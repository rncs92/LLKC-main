<?php declare(strict_types=1);

namespace LLKC\Services\Hobbies\Show;

class ShowAllPDOHobbiesResponse
{
    private string $hobbies;

    public function __construct(string $hobbies)
    {
        $this->hobbies = $hobbies;
    }

    public function getHobbies(): string
    {
        return $this->hobbies;
    }
}