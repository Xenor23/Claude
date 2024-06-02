<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les événements</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <a href="<?= URL2 ?>manageEvents/eventform">Formulaire Event</a>

    <h1>Gérer les événements</h1>
    <div class="container mt-5">
        <h2 class="text-center my-4">Gérer les Événements</h2>
        <div class="form-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date de début</th>
                        <th scope="col">Date de fin</th>
                        <th scope="col">Créé par</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($events) && is_array($events)): ?>
                        <?php foreach ($events as $event): ?>
                            <tr>
                                <td><?= $event['name'] ?></td>
                                <td style="max-width: 200px; max-height: 100px; overflow: hidden; overflow-y: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; word-wrap: break-word;"><?= $event['description'] ?></td>
                                <td><?= $event['startDateTime'] ?></td>
                                <td><?= $event['endDateTime'] ?></td>
                                <td><?= $event['createdByUsername'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-light">Détails</button>
                                    <form action="<?= URL ?>deleteEvent" method="POST" style="display:inline;">
                                    <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-light">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Aucun événement disponible.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
