<div class="container mt-4">
    <h2 class="text-center form-title">Mon Compte</h2>
    <div class="form-container">
        <h3 class="form-title">Informations du Profil</h3>
        <form action="<?= URL ?>updateProfile" method="POST" class="needs-validation" novalidate>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder=" " value="<?= $_SESSION['user']['firstname'] ?>" required>
                <label for="firstname">Prénom</label>
            </div>
            <div class="form-floating mb-3">=
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder=" " value="<?= $_SESSION['user']['lastname'] ?>" required>
                <label for="lastname">Nom</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder=" " value="<?= $_SESSION['user']['email'] ?>" required>
                <label for="email">Email</label>
            </div>
            <button type="submit" class="btn btn-custom-primary w-100">Mettre à jour</button>
        </form>

        <h3 class="form-title mt-4">Changer le Mot de Passe</h3>
        <form action="<?= URL ?>updatePassword" method="POST" class="needs-validation" novalidate>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder=" " required>
                <label for="currentPassword">Mot de Passe Actuel</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder=" " required>
                <label for="newPassword">Nouveau Mot de Passe</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder=" " required>
                <label for="confirmPassword">Confirmer le Nouveau Mot de Passe</label>
            </div>
            <button type="submit" class="btn btn-custom-secondary w-100">Changer le Mot de Passe</button>
        </form>
    </div>
</div>