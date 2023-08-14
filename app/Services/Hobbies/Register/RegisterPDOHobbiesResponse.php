<?php declare(strict_types=1);

namespace LLKC\Services\Hobbies\Register;

use LLKC\Models\Hobbies;

class RegisterPDOHobbiesResponse
{
    private Hobbies $hobbies;

    public function __construct(Hobbies $hobbies)
    {
        $this->hobbies = $hobbies;
    }

    public function getHobbies(): Hobbies
    {
        return $this->hobbies;
    }
}