<?php

namespace App\Controllers;

class SecurityController
{
    public static function isUserLoggedIn()
    {
        return isset($_SESSION['user']);
    }

    public static function isAdminLoggedIn()
    {
        return isset($_SESSION['user']) && isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin';
    }

    public static function requireUser()
    {
        if (!self::isUserLoggedIn()) {
            header("Location: " . URL . "login");
            exit();
        }
    }

    public static function requireAdmin()
    {
        if (!self::isAdminLoggedIn()) {
            header("Location: " . URL . "login");
            exit();
        }
    }

    public static function cleanInput($data): string
    {
        if (!isset($data) || empty($data)) {
            return '';
        }
        return htmlspecialchars(trim($data));
    }

    public static function generateCsrfToken(): string
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function verifyCsrfToken(string $token): bool
    {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}
