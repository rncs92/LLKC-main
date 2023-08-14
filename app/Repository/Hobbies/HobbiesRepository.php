<?php declare(strict_types=1);

namespace LLKC\Repository\Hobbies;

use LLKC\Models\Hobbies;

interface HobbiesRepository
{
    public function save(Hobbies $hobbies): void;

}
