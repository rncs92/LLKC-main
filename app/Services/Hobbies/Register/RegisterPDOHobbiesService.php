<?php declare(strict_types=1);

namespace LLKC\Services\Hobbies\Register;

use LLKC\Repository\Hobbies\HobbiesRepository;

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