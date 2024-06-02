<H1>Liste des événements</H1>

<div class="row">
<?php
$eventController = new \App\Controllers\Event\EventController();
$eventController->showEvents();
?>
</div>
