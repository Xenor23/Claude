<?php

namespace App\Controllers\Admin;

use App\Controllers\AbstractController;
use App\Models\Manager\EventManager;
use App\Controllers\SecurityController;

class AdminController extends AbstractController
{
    private EventManager $eventManager;

    public function __construct()
    {
        SecurityController::requireAdmin(); // Sécurisation de l'accès à l'administration
        $this->eventManager = new EventManager();
    }

    public function dashboard(): void
    {
        $title = "Dashboard Admin";
        $list = ["Admin/dashboard.view"];

        $this->render($list, ["title" => $title], "admin");
    }

    public function eventform(): void
    {
        $title = "EventForm";
        $list = ["Admin/eventform.view"];

        $this->render($list, ["title" => $title], "admin");
    }

    public function manageUsers(): void
    {
        $title = "Gestion des Utilisateurs";
        $list = ["Admin/manageUsers.view"];

        $this->render($list, ["title" => $title], "admin");
    }

    public function manageEvents(): void
    {
        $events = $this->eventManager->getAllEvents();
        $formattedEvents = [];
        foreach ($events as $event) {
            $formattedEvents[] = $this->eventManager->formatEventData($event);
        }
        $title = "Gestion des Evenements";
        $list = ["Admin/manageEvents.view"];

        $this->render($list, [
            "title" => $title,
            'events' => $formattedEvents,
        ], "admin");
    }
}
