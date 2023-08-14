<?php declare(strict_types=1);

namespace LLKC\Controllers\User;

use LLKC\Core\Redirect;
use LLKC\Core\TwigView;
use LLKC\Exceptions\ValidationException;
use LLKC\Services\Hobbies\Register\RegisterPDOHobbiesRequest;
use LLKC\Services\Hobbies\Register\RegisterPDOHobbiesService;
use LLKC\Services\User\Register\RegisterPDOUserRequest;
use LLKC\Services\User\Register\RegisterPDOUserService;
use LLKC\Validation\RegisterFormValidator;

class UserController
{
    private RegisterPDOUserService $registerPDOUserService;
    private RegisterFormValidator $validator;
    private RegisterPDOHobbiesService $registerPDOHobbiesService;

    public function __construct(
        RegisterPDOUserService $registerPDOUserService,
        RegisterPDOHobbiesService $registerPDOHobbiesService,
        RegisterFormValidator $validator
    )
    {
        $this->registerPDOUserService = $registerPDOUserService;
        $this->validator = $validator;
        $this->registerPDOHobbiesService = $registerPDOHobbiesService;
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
                    $_POST['post_code'],
                    $_POST['phone_number'],
                    $_POST['comments'],
                    $_POST['password_confirmation']
                )
            );
            $_SESSION['authid'] = $user->getUser()->getUserid();

            $this->registerPDOHobbiesService->handle(
                new RegisterPDOHobbiesRequest(
                    $_POST['date_from'],
                    $_POST['date_to'],
                    $_POST['gender'],
                    $_POST['age'],
                    $_POST['employment'],
                    $_POST['hobbies'],
                )
            );

            return new Redirect("/");
        } catch (ValidationException $exception) {
            return new Redirect('/register');
        }
    }
}