<?php declare(strict_types=1);

namespace LLKC\Controllers\User;

use LLKC\Core\Redirect;
use LLKC\Core\Session;
use LLKC\Core\TwigView;
use LLKC\Exceptions\ValidationException;
use LLKC\Models\User;
use LLKC\Services\Hobbies\Register\RegisterPDOHobbiesRequest;
use LLKC\Services\Hobbies\Register\RegisterPDOHobbiesService;
use LLKC\Services\User\Register\RegisterPDOUserRequest;
use LLKC\Services\User\Register\RegisterPDOUserService;
use LLKC\Services\User\Show\All\ShowAllPDOUserService;
use LLKC\Services\User\Show\ShowPDOUserRequest;
use LLKC\Services\User\Show\ShowPDOUserService;
use LLKC\Validation\RegisterFormValidator;

class UserController
{
    private RegisterPDOUserService $registerPDOUserService;
    private RegisterFormValidator $validator;
    private RegisterPDOHobbiesService $registerPDOHobbiesService;
    private ShowPDOUserService $showPDOUserService;
    private ShowAllPDOUserService $showAllPDOUserService;

    public function __construct(
        RegisterPDOUserService    $registerPDOUserService,
        RegisterPDOHobbiesService $registerPDOHobbiesService,
        ShowPDOUserService        $showPDOUserService,
        ShowAllPDOUserService     $showAllPDOUserService,
        RegisterFormValidator     $validator
    )
    {
        $this->registerPDOUserService = $registerPDOUserService;
        $this->validator = $validator;
        $this->registerPDOHobbiesService = $registerPDOHobbiesService;
        $this->showPDOUserService = $showPDOUserService;
        $this->showAllPDOUserService = $showAllPDOUserService;
    }

    public function register(): TwigView
    {
        return new TwigView('User/register', []);
    }

    public function store(): Redirect
    {
        try {
            $this->validator->validateForm($_POST);
            $user = $this->registerPDOUserService->handle(
                new RegisterPDOUserRequest(
                    $_POST['username'],
                    $_POST['email'],
                    $_POST['name'],
                    $_POST['surname'],
                    $_POST['password'],
                    $_POST['address'],
                    $_POST['city'],
                    $_POST['postal_code'],
                    $_POST['phone_number'],
                    $_POST['comments'],
                    $_POST['password_confirmation']
                )
            );

            $userId = $user->getUser()->getUserid();

            $this->registerPDOHobbiesService->handle(
                new RegisterPDOHobbiesRequest(
                    $_POST['date_from'],
                    $_POST['date_to'],
                    $_POST['gender'],
                    $_POST['age'],
                    $_POST['employment'],
                    $_POST['hobby'],
                ),
                $userId
            );

            $_SESSION['authid'] = $userId;

            return new Redirect("/");
        } catch (ValidationException $exception) {
            return new Redirect('/register');
        }
    }

    public function show(): TwigView
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

        $infoResponse = $this->showAllPDOUserService->handle();
        $info = json_decode($infoResponse->getUserInfo(), true);


        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['datatable'])) {
            header('Content-Type: application/json');
            echo json_encode($info);
            exit;
        }

        return new TwigView('Index/index', []);
    }
}
