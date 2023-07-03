<?php
// On appelle le header situé dans header.php
require_once('templates/header.php');
// On appelle la fonction de vérification de saisie utilisateur situé dans user.php
require_once('lib/user.php');

// Gestion des erreurs
$errors = [];
$messages = [];

// Ce code vérifie les informations de connexion soumises par un utilisateur.
if (isset($_POST['loginUser'])) {
    // S'il existe un utilisateur correspondant dans la base de données avec le nom d'utilisateur et le mot de passe fournis il ferra une redirection ou enverra un message d'erreur
    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
    if ($user) {
        $_SESSION['user'] = ['email' => $user['email']];
        header('location: index.php');
    } else {
        $errors[] = 'Email ou Mot de passe incorrect';
    }
}
?>

<!-- Main content -->
<main>
    <h1 class="text-center">Connexion</h1>
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
            <label for="email"
                   class="form-label">Email</label>
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
               value="Connexion"
               name="loginUser"
               class="btn btn-primary">
    </form>
    <!-- Fin Formulaire de login -->
</main>
<!-- Fin Main content -->
<?php
// On appelle le footer situé dans footer.php
require_once('templates/footer.php');
?>