<?php
namespace Controllers;

session_start();

use \Models\User;

class Auth
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->userModel->createUser($_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT)))
            header('location: ' . URLROOT . '/auth/signup', true, 303);
        else
            die(USER_NOT_CREATED);
    }

    public function login(): array
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->userModel->getByEmail($_POST['email']);
            if (isset($user['id']) && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['userId'] = $user['id'];
                unset($user['password']);
                return $user;
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