<?php declare(strict_types=1);

namespace LLKC\Controllers\Show;

use LLKC\Core\Session;
use LLKC\Core\TwigView;
use LLKC\Services\Hobbies\Show\ShowAllPDOHobbiesService;
use LLKC\Services\User\Show\All\ShowAllPDOUserService;
use LLKC\Services\User\Show\ShowPDOUserRequest;
use LLKC\Services\User\Show\ShowPDOUserService;

class ShowController
{

    private ShowPDOUserService $showPDOUserService;
    private ShowAllPDOUserService $showAllPDOUserService;
    private ShowAllPDOHobbiesService $showAllPDOHobbiesService;

    public function __construct
    (
        ShowPDOUserService       $showPDOUserService,
        ShowAllPDOUserService    $showAllPDOUserService,
        ShowAllPDOHobbiesService $showAllPDOHobbiesService
    )
    {
        $this->showPDOUserService = $showPDOUserService;
        $this->showAllPDOUserService = $showAllPDOUserService;
        $this->showAllPDOHobbiesService = $showAllPDOHobbiesService;
    }

    public function showSingle(): TwigView
    {
        $user = Session::get('user');
        if (!$user) {
            return new TwigView('Errors/notAuthorized', []);
        }

        $userId = $user->getUserid();

        $infoResponse = $this->showPDOUserService->handle(new ShowPDOUserRequest((int)$userId));
        $info = json_decode($infoResponse->getUserInfo(), true);

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['datatable'])) {
            header('Content-Type: application/json');
            echo json_encode([$info]);
            exit;
        }

        return new TwigView('Index/index', []);
    }

    public function showAll(): TwigView
    {
        $user = Session::get('user');
        if (!$user) {
            return new TwigView('Errors/notAuthorized', []);
        }

        $userResponse = $this->showAllPDOUserService->handle();
        $user = json_decode($userResponse->getUserInfo(), true);


        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['datatable'])) {
            header('Content-Type: application/json');
            echo json_encode($user);
            exit;
        }

        return new TwigView('Index/index', []);
    }

    public function showAdditionalInformation(): TwigView
    {
        $user = Session::get('user');
        if (!$user) {
            return new TwigView('Errors/notAuthorized', []);
        }

        $hobbiesResponse = $this->showAllPDOHobbiesService->handle();
        $hobbies = json_decode($hobbiesResponse->getHobbies(), true);

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['datatable'])) {
            header('Content-Type: application/json');
            echo json_encode($hobbies);
            exit;
        }

        return new TwigView('Index/info', []);
    }
}