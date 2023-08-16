<?php declare(strict_types=1);

namespace LLKC\Services\Hobbies\Show;

use LLKC\Repository\Hobbies\HobbiesRepository;

class ShowAllPDOHobbiesService
{
    private HobbiesRepository $hobbiesRepository;

    public function __construct(HobbiesRepository $hobbiesRepository)
    {
        $this->hobbiesRepository = $hobbiesRepository;
    }

    public function handle(): ShowAllPDOHobbiesResponse
    {
        $hobbies = $this->hobbiesRepository->all();

        return new ShowAllPDOHobbiesResponse($hobbies);
    }
}