<?php declare(strict_types=1);

namespace LLKC\Services\Hobbies\Register;

use LLKC\Models\Hobbies;
use LLKC\Repository\Hobbies\HobbiesRepository;

class RegisterPDOHobbiesService
{
    private HobbiesRepository $hobbiesRepository;

    public function __construct(HobbiesRepository $hobbiesRepository)
    {
        $this->hobbiesRepository = $hobbiesRepository;
    }

    public function handle(RegisterPDOHobbiesRequest $request, int $userId): RegisterPDOHobbiesResponse
    {
        $hobbies = new Hobbies(
            $request->getDateFrom(),
            $request->getDateTo(),
            $request->getGender(),
            $request->getAge(),
            $request->getEmployment(),
            $request->getHobbies(),
            $userId,
        );

        $this->hobbiesRepository->save($hobbies, $userId);

        return new RegisterPDOHobbiesResponse($hobbies);
    }
}