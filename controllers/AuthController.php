<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\repositories\UserRepository;


class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];

        if (App::call()->usersRepository->Auth($login, $pass)) {
            header("Location: /");
            die();
        } else {
            die("Не верный логин пароль");
        }
    }

    public function actionLogout() {
        session_regenerate_id();
        session_destroy();
        header("Location: /");
        die();
    }

}