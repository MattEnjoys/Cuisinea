<?php
// On appelle le header situé dans header.php
require_once('templates/header.php');

// Pour différencier si l'utilisateur est connecté ou non, et rediriger sur login.php
if (!isset($_SESSION['user'])) {
    header('location: login.php');
} else {
    echo ' ';
}
// On appelle la page tools depuis tools.php
require_once('lib/tools.php');
// On appelle les recettes depuis recipe.php
require_once('lib/recipe.php');
// On appelle les catégories depuis category.php
require_once('lib/category.php');

// Gestion des erreurs
$errors = [];
$messages = [];
// Stockera les info en cas de POST
$recipe = [
    'title' => '',
    'description' => '',
    'ingredients' => '',
    'instructions' => '',
    'category_id' => '',
];

//  Récupère les catégories
$categories = getCategories($pdo);

// Fais une insertion dans la BDD
if (isset($_POST['saveRecipe'])) {
    $fileName = null;
    // On teste si un fichier a été envoyé
    if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
        // La méthode getimagesize va retourner false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image, on traite
            // Ajoute un ID unique pour éviter les mêmes noms de fichier en BDD
            $fileName = uniqid() . '-' . slugify($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], _RECIPES_IMG_PATH_ . $fileName);
        } else {
            // Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }
    if (!$errors) {
        $res = saveRecipe($pdo, $_POST['category'], $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], $fileName);

        if ($res) {
            $messages[] = 'La recette a bien été sauvegardée';
        } else {
            $errors[] = 'La recette n\'as pas été sauvegardée';
        }
    }
    $recipe = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'ingredients' => $_POST['ingredients'],
        'instructions' => $_POST['instructions'],
        'category_id' => $_POST['category'],
    ];
}
?>

<!-- Main content -->
<main>
    <h1 class="text-center">Ajouter une recette</h1>
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
    <!-- Formulaire de soumission -->
    <form method="POST"
          enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title"
                   class="form-label">Titre</label>
            <input type="
                   text"
                   name="title"
                   id="title"
                   class="form-control"
                   value="<?= $recipe['title']; ?>">
        </div>
        <div class="mb-3">
            <label for="description"
                   class="form-label">Description</label>
            <textarea name="description"
                      id="description"
                      cols="30"
                      rows="5"
                      class="form-control"><?= $recipe['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="ingredients"
                   class="form-label">Ingredients</label>
            <textarea name="ingredients"
                      id="ingredients"
                      cols="30"
                      rows="5"
                      class="form-control"><?= $recipe['ingredients']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="instructions"
                   class="form-label">Instructions</label>
            <textarea name="instructions"
                      id="instructions"
                      cols="30"
                      rows="5"
                      class="form-control"><?= $recipe['instructions']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="category"
                   class="form-label">Catégorie</label>
            <select name="category"
                    id="category"
                    class="form-select">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category['id']; ?>"
                            <?php if ($recipe['category_id'] == $category['id']) {
                                echo 'selected="selected"';
                            } ?>><?= $category['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="file"
                   class="form-label">Image</label>
            <input type="file"
                   name="file"
                   id="file">
        </div>
        <input type="submit"
               value="Enregistrer"
               name="saveRecipe"
               class="btn btn-primary">
    </form>
    <!-- Fin Formulaire de soumission -->
</main>
<!-- Fin Main content -->
<!-- On appelle le footer situé dans footer.php -->
<?php
require_once('templates/footer.php');
?>