<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-color: #f0f0f0;
            --text-color: #000;
            --btn-color: #6f42c1;
            --btn-hover-color: #563d7c;
            --navbar-bg: #6f42c1;
            --footer-bg: #f8f9fa;
            --footer-border: #ddd;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: background-color 0.3s, color 0.3s;
        }

        .dark-mode {
            --bg-color: #2c2c2c;
            --text-color: #e0e0e0;
            --btn-color: #bb86fc;
            --btn-hover-color: #3700b3;
            --navbar-bg: #3700b3;
            --nav-link-color: black;
            --footer-bg: #2a2a2a;
            --footer-border: #444;
        }

        .form-title {
            color: var(--btn-color);
            font-weight: 600;
        }

        .form-container {
            max-width: 800px;
            margin: auto;
            background: var(--bg-color);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .form-floating label {
            font-size: 1rem;
        }

        .form-floating .form-control {
            border-radius: 10px;
        }

        .btn-custom-primary, .btn-custom-secondary {
            background-color: var(--btn-color);
            border-color: var(--btn-color);
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-custom-primary:hover, .btn-custom-secondary:hover {
            background-color: var(--btn-hover-color);
            border-color: var(--btn-hover-color);
        }

        .navbar-custom {
            background-color: var(--navbar-bg);
            padding: 15px 20px;
        }

        .navbar-brand {
            color: white;
            font-size: 1.7rem;
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: white;
        }

        .navbar-nav .nav-link {
            color: var(--nav-link-color);
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: var(--btn-hover-color);
        }

        .footer {
            background-color: var(--footer-bg);
            padding: 20px 0;
            border-top: 1px solid var(--footer-border);
            text-align: center;
            margin-top: auto;
            width: 100%;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .footer a {
            color: var(--btn-color);
            text-decoration: none;
            font-weight: 500;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .form-check-label {
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            font-style: italic;
            display: none;
        }

        /* Custom scrollbar for better aesthetics */
        body::-webkit-scrollbar {
            width: 12px;
        }

        body::-webkit-scrollbar-track {
            background: var(--bg-color);
        }

        body::-webkit-scrollbar-thumb {
            background-color: var(--btn-color);
            border-radius: 20px;
            border: 3px solid var(--bg-color);
        }

        #form_PopUp {
            display: none;
            z-index: 9999;
            overflow: auto;
            margin-left: auto;
            margin-right: auto;
            width: 65%;
            min-width: 300px;
            background: var(--bg-color);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .modal-body {
            max-height: calc(100vh - 200px); /* Adjust the value as needed */
            overflow-y: auto;
        }

        
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= URL ?>home">Re:Zero</a>
            <div class="d-flex align-items-center ms-auto">
                <?php if (isset($_SESSION["user"])): ?>
                    <?php if ($_SESSION["user"]['role']=='user'): ?>
                    <a href="<?= URL ?>account" class="navbar-brand d-flex align-items-center">
                    <?php else: ?>
                        <a href="<?= URL ?>admin" class="navbar-brand d-flex align-items-center">
                        <?php endif; ?>
                    <i class="fa-solid fa-user"></i>
                    &nbsp; <?= $_SESSION["user"]["firstname"] ?>
                    </a>
                    <a class="btn btn-custom-secondary btn-sm ms-2" href="<?= URL ?>logout">Se Déconnecter</a>
                <?php else: ?>
                    <a class="btn btn-custom-primary btn-sm me-2" href="<?= URL ?>login">Se connecter</a>
                    <a class="btn btn-custom-secondary btn-sm me-2" href="<?= URL ?>register">S'inscrire</a>
                <?php endif; ?>
                <button class="btn btn-custom-secondary btn-sm ms-2" id="darkModeButton">Dark Mode</button>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #d1c4e9;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>classement">Classement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>event">Événements</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php if (isset($_SESSION["alert"])): ?>
        <div class="alert alert-<?= $_SESSION["alert"]["type"] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION["alert"]["message"] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION["alert"]); ?>
    <?php endif; ?>
</header>

<main>
    <div class="container mt-4">
        <?php var_dump($_SESSION['csrf_token'])?>
        <?= $content ?>

    </div>
</main>
</body>
<footer class="footer mt-5">
    <div class="container text-center">
        <p>&copy; 2024 Re:Zero. Tous droits réservés.</p>
        <p><a href="<?= URL ?>privacy">Politique de confidentialité</a> | <a href="<?= URL ?>terms">Conditions d'utilisation</a></p>
    </div>
</footer>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.getElementById('darkModeButton').addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });

    // Vérifier la préférence de l'utilisateur au chargement de la page
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
    }

</script>
</html>
