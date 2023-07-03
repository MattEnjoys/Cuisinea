<?php
// On appelle le header situé dans header.php
require_once('templates/header.php');
// On appelle le explode depuis tools.php
require_once('lib/tools.php');
// On appelle les recettes depuis recipe.php
require_once('lib/recipe.php');

// Récupère la valeur de l'ID de la recette à partir de la variable
$id = (int) $_GET['id'];
//  On appelle la fonction getRecipeById
$recipe = getRecipeById($pdo, $id);

// Si y a une recette on affiche le contenu, sinon, on affiche un message
if ($recipe) {
    $ingredients = linesToArray($recipe['ingredients']);
    $instructions = linesToArray($recipe['instructions']);
    ?>
    <!-- Main content -->
    <main>
        <!-- Heroes de Bootstrap -->
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="<?= getRecipeImage($recipe['image']); ?>"
                     class="d-block mx-lg-auto img-fluid"
                     alt="<?= $recipe['title']; ?>"
                     width="700"
                     height="500"
                     loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold   lh-1 mb-3">
                    <?= $recipe['title']; ?>
                </h1>
                <p class="lead">
                    <?= $recipe['description']; ?>
                </p>
            </div>
        </div>
        <!-- Fin Heroes de Bootstrap -->
        <!-- Ajout d'ingrédients -->
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <h2>Ingrédients</h2>
            <ul class="list-group">
                <?php foreach ($ingredients as $key => $ingredient) { ?>
                    <li class="list-group-item">
                        <?= $ingredient; ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- Fin d' Ajout d'ingrédients -->
        <!-- Ajout d'Instructions -->
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <h2>Instructions</h2>
            <ol class="list-group list-group-numbered">
                <?php foreach ($instructions as $key => $instruction) { ?>
                    <li class="list-group-item">
                        <?= $instruction; ?>
                    </li>
                <?php } ?>
            </ol>
        </div>
        <!-- Fin d' Ajout d'Instructions -->
    </main>
    <!-- Fin Main content -->
<?php } else { ?>
    <div class="row text-center">
        <h1>Recette introuvable</h1>
    </div>
<?php } ?>
<!-- On appelle le footer situé dans footer.php -->
<?php
require_once('templates/footer.php');
?>