<div class="container mt-5">
    <h2 class="text-center my-4 form-title">Se connecter</h2>
    <div class="form-container">
        <form method="post" action="<?= URL ?>loginValidation" class="needs-validation" novalidate>
            <div class="form-floating mb-3">
                <input class="form-control" type="email" name="email" id="email" placeholder=" " required>
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" type="password" name="password_hash" placeholder=" " id="password_hash" required>
                <label for="password_hash">Mot de passe</label>
            </div>
            <button type="submit" class="btn btn-custom-primary w-100">Se connecter</button>
        </form>
    </div>
</div>
