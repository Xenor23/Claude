<?php

namespace App\public;

use App\Controllers\SecurityController;
use Exception;

class Router
{
    private $routes = [];
    private $adminRoutes = [];

    public function addRoute($method, $path, $controller, $action, $isAdmin = false)
    {
        $route = compact('method', 'path', 'controller', 'action');
        if ($isAdmin) {
            $this->adminRoutes[] = $route;
        } else {
            $this->routes[] = $route;
        }
    }

    public function dispatch($url)
    {
        $parsedUrl = explode("/", filter_var($url, FILTER_SANITIZE_URL));
        $method = $_SERVER['REQUEST_METHOD'];

        $isAdmin = SecurityController::isAdminLoggedIn();

        // Merge des routes selon le rôle de l'utilisateur
        $routes = $isAdmin ? array_merge($this->routes, $this->adminRoutes) : $this->routes;

        foreach ($routes as $route) {
            // Vérifie si la méthode HTTP correspond et que l'URL de base correspond
            if ($method === $route['method'] && $parsedUrl[0] === $route['path']) {
                $controller = new $route['controller'];

                // Supprime le premier élément du tableau $parsedUrl (le chemin)
                array_shift($parsedUrl);

                // Appelle l'action du contrôleur avec les paramètres d'URL restants
                call_user_func_array([$controller, $route['action']], $parsedUrl);
                return;
            }
        }

        throw new Exception("La page n'existe pas");
    }

}
