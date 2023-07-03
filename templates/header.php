<?php
require_once('lib/session.php');
require_once('lib/config.php');
require_once('lib/pdo.php');

// Pour rendre la NavBar dynamique et récupérer la page active.
// Ce code teste quelle est la page courante avec $_SERVER (tableau PHP) qui contient le SCRIPT_NAME (Nom du fichier actuel avec tous les sous dossiers) basename retournera le nom du fichier
$currentPage = basename($_SERVER['SCRIPT_NAME']);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>CUISINEA | Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="assets/css/override-bootstrap.css">
    <link rel="stylesheet"
          href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
</head>

<body>

    <!-- Navbar Bootstrap -->
    <div class="container">
        <header
                class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="index.php"
                   class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="assets/images/logo-cuisinea-horizontal.jpg"
                         alt="Logo Cuisinea"
                         width="250">
                </a>
            </div>
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-m-0 nav nav-pills">
                <!-- On boucle pour avoir la NavBar dynamique -->
                <!--  Pour rendre la NavBar dynamique: Si la page courante est index.php alors tu met "active" -->
                <?php foreach ($mainMenu as $key => $value) { ?>
                    <li class="nav-item"><a href="<?= $key; ?>"
                           class="nav-link <?php if ($currentPage === $key) {
                               echo 'active';
                           } ?>"><?= $value; ?></a></li>
                <?php } ?>
            </ul>

            <div class="col-md-3 text-end">
                <?php if (!isset($_SESSION['user'])) { ?>
                    <a href="login.php"
                       class="btn btn-outline-primary me-2">Connexion</a>
                    <a href="inscription.php"
                       class="btn btn-outline-primary me-2">Inscription</a>
                <?php } else { ?>
                    <a href="logout.php"
                       class="btn btn-primary me-2">Déconnexion</a>
                <?php } ?>
            </div>
        </header>
        <!-- Fin Navbar Bootstrap -->