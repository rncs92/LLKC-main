<?php declare(strict_types=1);

namespace SokTechnical\Services\Hobbies\Register;

use SokTechnical\Repository\Hobbies\HobbiesRepository;

class RegisterPDOHobbiesService
{
    private HobbiesRepository $hobbiesRepository;

    public function __construct(HobbiesRepository $hobbiesRepository)
    {
        $this->hobbiesRepository = $hobbiesRepository;
    }

    public function handle()
    {

    }
}