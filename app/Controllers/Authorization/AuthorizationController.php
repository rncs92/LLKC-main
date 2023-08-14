<?php declare(strict_types=1);

namespace SokTechnical\Controllers\Authorization;

use SokTechnical\Core\Redirect;
use SokTechnical\Core\Session;
use SokTechnical\Core\TwigView;
use SokTechnical\Exceptions\LoginException;
use SokTechnical\Services\User\Authorization\AuthorizationService;
use SokTechnical\Validation\LoginValidator;

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
            return new TwigView('Errors/notAuthorized', []);
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
