<?php

namespace App\Controllers\User;

use App\Controllers\AbstractController;
use App\Controllers\DisplayController;
use App\Controllers\SecurityController;
use App\Models\Entity\User;
use App\Models\Manager\UserManager;

class UserController extends AbstractController
{
    private SecurityController $security;
    private UserManager $userManager;

    public function __construct()
    {
        $this->security = new SecurityController();
        $this->userManager = new UserManager();
    }

    public function registerValidation(): void
    {
        $firstname = $this->security->cleanInput($_POST['firstname'] ?? '');
        $email = $this->security->cleanInput($_POST['email'] ?? '');
        $password = $this->security->cleanInput($_POST['password'] ?? '');
        $confirmPassword = $this->security->cleanInput($_POST['confirm_password'] ?? '');
        $lastname = $this->security->cleanInput($_POST['lastname'] ?? '');
        $age = (int) ($this->security->cleanInput($_POST['age'] ?? '') ?? 0);
        $country = $this->security->cleanInput($_POST['country'] ?? '');
        $username = $this->security->cleanInput($_POST['username'] ?? '');
        $csrfToken = $this->security->cleanInput($_POST['csrf_token'] ?? '');

        if (!$this->security->verifyCsrfToken($csrfToken)) {
            DisplayController::messageAlert("Veuillez réessayer plus tard", DisplayController::ROUGE);
            $this->redirectToRoute("register");
        }

        if (empty($firstname) || empty($email) || empty($password) || empty($confirmPassword)) {
            DisplayController::messageAlert("Tous les champs sont requis", DisplayController::ROUGE);
            $this->redirectToRoute("register");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            DisplayController::messageAlert("Email non valide", DisplayController::ROUGE);
            $this->redirectToRoute("register");
        }

        if ($password !== $confirmPassword) {
            DisplayController::messageAlert("Les mots de passe ne correspondent pas", DisplayController::ROUGE);
            $this->redirectToRoute("register");
        }

        $user = new User($firstname, $email, password_hash($password, PASSWORD_DEFAULT), 'user', $lastname, $age, $username, $country);
        $valid = $this->userManager->insertUser($user);
        if ($valid) {
            DisplayController::messageAlert("Inscription réussie", DisplayController::VERTE);
            $this->redirectToRoute("home");
        } else {
            DisplayController::messageAlert("Erreur lors de l'inscription", DisplayController::ROUGE);
            $this->redirectToRoute("register");
        }
    }

    public function loginValidation(): void
    {
        $email = $this->security->cleanInput($_POST['email'] ?? '');
        $password = $this->security->cleanInput($_POST['password'] ?? '');

        if (empty($email) || empty($password)) {
            DisplayController::messageAlert("Tous les champs sont requis", DisplayController::ROUGE);
            $this->redirectToRoute("login");
        }

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            DisplayController::messageAlert("Email non valide", DisplayController::ROUGE);
            $this->redirectToRoute("login");
        }

        $user = $this->userManager->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id();
            $_SESSION['user'] = $user;
            if ($user['role'] === 'admin') {
                $this->redirectToRoute('admin');
            }
            $this->redirectToRoute("home");
        } else {
            DisplayController::messageAlert("Identifiants incorrects", DisplayController::ROUGE);
            $this->redirectToRoute("login");
        }
    }

    public function logout(): void
    {
        $_SESSION = [];
        session_destroy();
        $this->redirectToRoute("home");
    }
}
