<?php
// On appelle le header situé dans header.php
require_once('templates/header.php');
// On appelle les recettes depuis recipe.php
require_once('lib/recipe.php');

//  On appelle la fonction getRecipeById
$recipes = getRecipes($pdo);
?>

<!-- Main content -->
<main>
    <!-- Section Bootstrappé de la listes des recettes -->
    <section class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <h1 class="text-center">Liste des recettes</h1>
    </section>
    <!-- Fin Section Bootstrappé de la listes des recettes -->
    <!-- Section 3 Cards Bootstrap -->
    <section class="row">
        <!-- Au début, nous avons trois cards inscrit en dur dans le code. Maintenant, on fait une boucle php pour introduire une card à chaque nouvelle recette. -->
        <?php foreach ($recipes as $key => $recipe) {
            // Card Bootstrap depuis recipe_partial.php
            include('templates/recipe_partial.php');
            // Fin Card Bootstrap depuis recipe_partial.php
        } ?>
    </section>
    <!-- Fin Section 3 Cards Bootstrap -->
</main>
<!-- Fin Main content -->
<!-- On appelle le footer situé dans footer.php -->
<?php
require_once('templates/footer.php');
?>