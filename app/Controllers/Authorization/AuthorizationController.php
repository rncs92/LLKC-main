<?php declare(strict_types=1);

namespace LLKC\Controllers\Authorization;

use LLKC\Core\Redirect;
use LLKC\Core\Session;
use LLKC\Core\TwigView;
use LLKC\Exceptions\LoginException;
use LLKC\Services\User\Authorization\AuthorizationService;
use LLKC\Validation\LoginValidator;

class AuthorizationController
{
    private AuthorizationService $authorizationService;
    private LoginValidator $validator;

    public function __construct
    (
        AuthorizationService $authorizationService,
        LoginValidator $validator
    )
    {
        $this->authorizationService = $authorizationService;
        $this->validator = $validator;
    }

    public function index(): TwigView
    {
        if(Session::get('user')){
            return new TwigView('Index/index', []);
        }
        return new TwigView('User/login', []);
    }

    public function login(): Redirect
    {
        try {
            $this->validator->validateLogin($_POST);
            $email = $_POST['email'];
            $password = $_POST['password'];


        $user = $this->authorizationService->execute($email, $password);

        Session::put('user', $user);

        return new Redirect('/index');
        } catch (LoginException $exception) {
            return new Redirect('/login');
        }
    }

    public function logout(): Redirect
    {
        Session::destroy();

        return new Redirect('/login');
    }
}
