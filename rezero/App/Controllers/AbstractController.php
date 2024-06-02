<?php

namespace App\Controllers;

abstract class AbstractController
{
    public function render(array $viewNames, array $data = [], string $template = 'user'): void
    {
        $content = '';

        // Capture le contenu de chaque vue
        foreach ($viewNames as $viewName) 
        {
            ob_start();
            extract($data);
            include VIEWS_PATH . $viewName . '.php';
            $content .= ob_get_clean();
        }

        // Choix du template en fonction du rôle
        $templateFile = ($template === 'admin') ? 'template.admin.php' : 'template.php';
        include VIEWS_PATH . $templateFile;
    }

    public function redirectToRoute(string $route): void
    {
        header("Location: " . URL . $route);
        exit();
    }
    public function redirectToRouteAdmin(string $route): void
    {
        header("Location: " . URL2 . $route);
        exit();
    }
}
