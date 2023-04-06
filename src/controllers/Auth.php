<?php
namespace Controllers;

session_start();

use \Models\UserModel;

class Auth
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel;
    }

    public function signin()
    {
        view('Auth/signin', $this->login());
    }

    public function signup()
    {
        view('Auth/signup');
    }


    // CREATE new user
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->userModel->createUser($_POST['first_name'], $_POST['last_name'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT)))
            header('location: ' . URLROOT . '/auth/signup', true, 303);
        else
            die(USER_NOT_CREATED);
    }

    public function login(): array
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->userModel->getByEmail($_POST['email']);
            if (isset($user['user_id']) && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role'] = $user['role'];
                unset($user['password']);
            }
        }
        return array();
    }

    public function logout()
    {
        session_unset();
        header('location: ' . URLROOT . '/auth/signin', true, 303);
    }
}