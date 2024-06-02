<?php
session_start();

// Inclusion des fichiers via VENDOR AUTOLOAD
use App\Controllers\User\UserController;
use App\Controllers\Admin\AdminController;
use App\Controllers\Event\EventController;
use App\Models\Manager\EventManager;
use App\Controllers\Visitor\VisitorController;
use App\public\Router;
use App\Controllers\SecurityController;

require_once __DIR__ . "/../vendor/autoload.php";

// Définition de la constante URL pour l'URL de base de l'application
define("URL", str_replace(
    "public/",
    "",
    str_replace(
        "index.php",
        "",
        (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . dirname($_SERVER['PHP_SELF'])
    ) . '/'
));

define("URL2", str_replace(
    "public/",
    "",
    str_replace(
        "index.php",
        "",
        (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . dirname($_SERVER['PHP_SELF'])
    ) . '/admin/dashboard/'
));

define('UPLOAD_PATH', __DIR__ . '/assets/img/uploads/');
define('VIEWS_PATH', __DIR__ . '/../App/Views/');
define('ASSETS', __DIR__ . '/../App/public/assets');

// Création d'instances des contrôleurs
$visitor = new VisitorController();
$user = new UserController();
$admin = new AdminController();
$event = new EventController();
$eventManager = new EventManager();

// Initialisation du routeur
$router = new Router();

// Ajout des routes
$router->addRoute('GET', 'home', VisitorController::class, 'home');
$router->addRoute('GET', 'login', VisitorController::class, 'login');
$router->addRoute('GET', 'account', VisitorController::class, 'account');
$router->addRoute('POST', 'loginValidation', UserController::class, 'loginValidation');
$router->addRoute('GET', 'register', VisitorController::class, 'register');
$router->addRoute('POST', 'registerValidation', UserController::class, 'registerValidation');
$router->addRoute('GET', 'logout', UserController::class, 'logout');
$router->addRoute('GET', 'event', VisitorController::class, 'event');
$router->addRoute('GET', 'classment', VisitorController::class, 'classment');
$router->addRoute('POST', 'createEvent', EventController::class, 'createEvent');
$router->addRoute('POST', 'deleteEvent', EventController::class, 'handleDeleteEvent');

// ADMIN routes
$router->addRoute('GET', 'admin', AdminController::class, 'dashboard', true);
$router->addRoute('GET', 'admin/dashboard', AdminController::class, 'dashboard', true);
$router->addRoute('GET', 'admin/dashboard/manageEvents', AdminController::class, 'manageEvents', true);
$router->addRoute('GET', 'admin/dashboard/manageUsers', AdminController::class, 'manageUsers', true);
$router->addRoute('GET', 'admin/dashboard/manageEvents/eventform', AdminController::class, 'eventform', true);

try {
    // Dispatching des routes
    $router->dispatch($_GET['page'] ?? 'home');
} catch (Exception $exception) {
    // En cas d'erreur, capture l'exception et affiche la vue d'erreur avec le message d'erreur
    $error = $exception->getMessage();
    include VIEWS_PATH . 'error.view.php';
}

// Supprime $_SESSION['admin'] après la gestion d'une exception ou après la déconnexion
unset($_SESSION['admin']);
?>
