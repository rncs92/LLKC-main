<?php declare(strict_types=1);

namespace SokTechnical\Repository\Hobbies;

use SokTechnical\Models\Hobbies;

interface HobbiesRepository
{
    public function save(Hobbies $hobbies): void;

}
