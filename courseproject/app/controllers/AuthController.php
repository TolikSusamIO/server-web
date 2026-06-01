<?php

namespace App\controllers;

use App\core\Controller;
use App\models\User;

class AuthController extends Controller
{
    public function loginForm(): void
    {
        if ($this->isAdmin()) {
            $this->redirect('/articles');
        }
        $this->view('auth/login', ['title' => 'Вход']);
    }

    public function login(): void
    {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $userModel = new User($this->config);
        $user = $userModel->findByUsername($username);

        if ($user && hash('sha256', $password) === $user['password_hash']) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
            ];
            $this->redirect('/articles');
        } else {
            $this->view('auth/login', [
                'title' => 'Вход',
                'error' => 'Неверный логин или пароль',
            ]);
        }
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
        $this->redirect('/login');
    }
}
