<?php

namespace App\Controllers\Event;

use App\Controllers\AbstractController;
use App\Controllers\SecurityController;
use App\Models\Entity\Event;
use App\Models\Entity\Image;
use App\Models\Manager\EventManager;
use App\Controllers\DisplayController;

class EventController extends AbstractController
{
    private SecurityController $security;
    private EventManager $eventManager;

    public function __construct()
    {
        $this->security = new SecurityController();
        $this->eventManager = new EventManager();
    }

    public function createEvent(): void
    {
        $csrfToken = $this->security->cleanInput($_POST['csrf_token'] ?? '');

        if (!$this->security->verifyCsrfToken($csrfToken)) {
            DisplayController::messageAlert("Veuillez réessayer plus tard", DisplayController::ROUGE);
            $this->redirectToRouteAdmin("manageEvents/eventform");
        }

        $name = $this->security->cleanInput($_POST['name'] ?? '');
        $description = $this->security->cleanInput($_POST['description'] ?? '');
        $startDateTime = $this->security->cleanInput($_POST['start_datetime'] ?? '');
        $endDateTime = $this->security->cleanInput($_POST['end_datetime'] ?? '');
        $minPlayers = (int) ($this->security->cleanInput($_POST['min_players'] ?? '') ?? 0);
        $maxPlayers = (int) ($this->security->cleanInput($_POST['max_players'] ?? '') ?? 0);
        $createdBy = (int) ($this->security->cleanInput($_POST['created_by'] ?? '') ?? 0);
        $type = $this->security->cleanInput($_POST['type'] ?? '');

        $requirements = [];
        if (isset($_POST['requirements']) && is_array($_POST['requirements'])) {
            $requirements = array_map([$this->security, 'cleanInput'], $_POST['requirements']);
        }

        if (empty($name) || empty($description) || empty($startDateTime) || empty($endDateTime) ||
            empty($minPlayers) || empty($maxPlayers) || empty($createdBy) || empty($requirements) || empty($type)) {
            DisplayController::messageAlert("Tous les champs sont requis", DisplayController::ROUGE);
            $this->redirectToRoute("manageEvents/eventform");
        }

        if (!is_int($minPlayers) || !is_int($maxPlayers) || $minPlayers < 1 || $maxPlayers < 1) {
            DisplayController::messageAlert("Nombre de joueurs invalide", DisplayController::ROUGE);
            $this->redirectToRoute("manageEvents/eventform");
        }

        if ($maxPlayers <= $minPlayers) {
            DisplayController::messageAlert("Le nombre maximum de joueurs doit être supérieur au nombre minimum de joueurs", DisplayController::ROUGE);
            $this->redirectToRoute("manageEvents/eventform");
        }

        try {
            $startDateTimeObj = new \DateTime($startDateTime);
            $endDateTimeObj = new \DateTime($endDateTime);
        } catch (\Exception $e) {
            DisplayController::messageAlert("Format de date ou heure invalide", DisplayController::ROUGE);
            $this->redirectToRoute("manageEvents/eventform");
        }

        if ($type !== 'tournois' && $type !== 'mini-tournois') {
            DisplayController::messageAlert("Type d'événement invalide", DisplayController::ROUGE);
            $this->redirectToRoute("manageEvents/eventform");
        }

        if ($type === 'tournois' && in_array('mini-tournois', $requirements)) {
            DisplayController::messageAlert("Un événement ne peut pas être à la fois tournois et mini-tournois", DisplayController::ROUGE);
            $this->redirectToRoute("manageEvents/eventform");
        } elseif ($type === 'mini-tournois' && in_array('tournois', $requirements)) {
            DisplayController::messageAlert("Un événement ne peut pas être à la fois tournois et mini-tournois", DisplayController::ROUGE);
            $this->redirectToRoute("manageEvents/eventform");
        }

        $image = $_FILES['image'] ?? null;
        $imagePath = null;
        $targetDir = UPLOAD_PATH;

        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $imagePath = $targetDir . uniqid() . '_' . basename($image['name']);

            if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
                DisplayController::messageAlert("Erreur lors de l'upload de l'image", DisplayController::ROUGE);
                $this->redirectToRoute("manageEvents/eventform");
            }
        }

        // Insert the image into the `images` table and get its ID
        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $imageId = $this->eventManager->insertImage(new Image(basename($image['name']), $imagePath, new \DateTime()));

            if ($imageId === -1) {
                DisplayController::messageAlert("Erreur lors de l'insertion de l'image dans la base de données", DisplayController::ROUGE);
                $this->redirectToRoute("manageEvents/eventform");
            }
        } else {
            $imageId = null;
        }

        // Retrieve the Image object corresponding to the image ID
        $imageObj = $imageId ? $this->eventManager->getImageById($imageId) : null;

        // Create the Event object with form data and Image object
        $event = new Event($name, $description, $startDateTimeObj, $endDateTimeObj, $minPlayers, $maxPlayers, "Prochainement", $createdBy, implode(', ', $requirements), $type, $imageObj, $imageId);

        // Insert the event into the `events` table with the image ID as foreign key
        $eventInserted = $this->eventManager->insertEvent($event, $imageId);

        if ($eventInserted) {
            DisplayController::messageAlert("L'événement a été créé avec succès", DisplayController::VERTE);
            $this->redirectToRoute("event");
        } else {
            DisplayController::messageAlert("Erreur lors de la création de l'événement", DisplayController::ROUGE);
            $this->redirectToRoute("manageEvents/eventform");
        }
    }

    public function showEvents()
    {
        $events = $this->eventManager->getAllEvents();

        $eventCards = '';
        foreach ($events as $event) {
            $eventCards .= $this->eventManager->generateEvent($event);
        }
        echo $eventCards;
    }

    public function handleDeleteEvent()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
            $eventId = (int) $_POST['event_id'];
            $this->eventManager->deleteEvent($eventId);
            $this->redirectToRouteAdmin('manageEvents');
        } else {
            // Gérer le cas où l'ID n'est pas défini ou la requête n'est pas une requête POST
            $this->redirectToRouteAdmin('manageEvents');
        }
    }
}
