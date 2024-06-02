
<button id="openForm_PopUp" class="btn btn-custom-primary mt-4">Créer un événement</button>

<div id="form_PopUp" class="container mt-5">
    <h1 class="text-center my-4 form-title">Formulaire d'événements</h1>
    <div class="form-container">
        <form action="<?= URL ?>createEvent" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder=" " required>
                <label for="name">Nom de l'événement</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="description" name="description" placeholder=" " style="height: 100px;" required></textarea>
                <label for="description">Description de l'événement</label>
            </div>
            <div class="form-floating mb-3">
                <input type="datetime-local" class="form-control" id="start_datetime" name="start_datetime" required>
                <label for="start_datetime">Date et heure de début</label>
            </div>
            <div class="form-floating mb-3">
                <input type="datetime-local" class="form-control" id="end_datetime" name="end_datetime" required>
                <label for="end_datetime">Date et heure de fin</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="min_players" name="min_players" placeholder=" " min="1" required>
                <label for="min_players">Nombre minimum de joueurs</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="max_players" name="max_players" placeholder=" " min="1" required>
                <label for="max_players">Nombre maximum de joueurs</label>
            </div>
            <div class="form-group">
                <label for="requirements">Prérequis</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="2v2" name="requirements[]" value="2v2">
                    <label class="form-check-label" for="2v2">2v2</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="uhc" name="requirements[]" value="uhc">
                    <label class="form-check-label" for="uhc">UHC</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="bedwars" name="requirements[]" value="bedwars">
                    <label class="form-check-label" for="bedwars">BEDWARS</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="no_rod" name="requirements[]" value="no_rod">
                    <label class="form-check-label" for="no_rod">NO ROD</label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="type" name="type" required>
                    <option value="" disabled selected>-- Choisir un type --</option>
                    <option value="tournois">Tournois</option>
                    <option value="mini-tournois">Mini-tournois</option>
                </select>
                <label for="type">Type d'événement</label>
            </div>
            <div class="form-group">
                <label for="image">Image de l'événement</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <input type="hidden" name="created_by" value="<?= $_SESSION['user']['id'] ?? 0 ?>">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <button type="submit" class="btn btn-custom-primary w-100">Créer l'événement</button>
        </form>
    </div>
</div>
<script>
document.getElementById('openForm_PopUp').addEventListener('click', function(event) {
        event.stopPropagation(); // Arrêter la propagation de l'événement
        document.getElementById('form_PopUp').style.display = 'block';
    });

    // Fermeture du popup lorsqu'on clique en dehors de celui-ci
    window.addEventListener('click', function(event) {
        var popup = document.getElementById('form_PopUp');
        var popupButton = document.getElementById('openForm_PopUp');
        if (event.target !== popup && event.target !== popupButton) {
            popup.style.display = 'none';
        }
    });

    // Empêcher la propagation de l'événement de clic à l'intérieur du formulaire
    document.getElementById('form_PopUp').addEventListener('click', function(event) {
        event.stopPropagation(); // Arrêter la propagation de l'événement
    });
</script>
