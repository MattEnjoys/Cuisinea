<?php
// On appelle le header situé dans header.php
require_once('templates/header.php');
// On appelle l'utilisateursitué dans user.php
require_once('lib/user.php');

// Gestion des erreurs
$errors = [];
$messages = [];

// A la soumission, insertion en BDD
if (isset($_POST['addUser'])) {
    $res = addUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
    if ($res) {
        $messages[] = 'Merci pour votre inscription';
    } else {
        $errors[] = 'Une erreur s\'est produite lors de votre inscription';
    }
}
?>

<!-- Main content -->
<main class="">
    <h1>Inscription</h1>
    <!-- Message de confirmation -->
    <?php foreach ($messages as $message) { ?>
        <div class="alert alert-success">
            <?= $message; ?>
        </div>
    <?php } ?>
    <!-- Message d'erreur -->
    <?php foreach ($errors as $error) { ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php } ?>
    <!-- Formulaire de login -->
    <form method="POST"
          enctype="multipart/form-data">
        <div class="mb-3">
            <label for="first_name"
                   class="form-label"">Prénom</label>
        <input type="
                   first_name"
                   name="first_name"
                   id="first_name"
                   class="form-control">
        </div>
        <div class="mb-3">
            <label for="last_name"
                   class="form-label"">Nom</label>
        <input type="
                   last_name"
                   name="last_name"
                   id="last_name"
                   class="form-control">
        </div>
        <div class="mb-3">
            <label for="email"
                   class="form-label"">Email</label>
        <input type="
                   email"
                   name="email"
                   id="email"
                   class="form-control">
        </div>
        <div class="mb-3">
            <label for="password"
                   class="form-label">Mot de passe</label>
            <input type="password"
                   name="password"
                   id="password"
                   class="form-control">
        </div>
        <input type="submit"
               value="Inscription"
               name="addUser"
               class="btn btn-primary">
    </form>
    <!-- Fin Formulaire de login -->
</main>
<!-- Fin Main content -->
<?php
// On appelle le footer situé dans footer.php
require_once('templates/footer.php');
?>