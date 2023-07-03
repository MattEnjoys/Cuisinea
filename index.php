<?php
// On appelle le header situé dans header.php
require_once('templates/header.php');
// On appelle les recettes depuis recipe.php
require_once('lib/recipe.php');
// Pour avoir 6 recettes sur index.php
$recipes = getRecipes($pdo, _HOME_RECIPES_LIMIT_);

?>
<!-- Main content -->
<main>
    <!-- Section Bootstrappé présentation du site avec le logo -->
    <section class="row flex-lg-row-reverse justify-content-center align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="assets/images/logo-cuisinea.jpg"
                 class="d-block mx-lg-auto img-fluid"
                 alt="Logo Cuisinea"
                 width="350"
                 loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 text-center mb-3">Cuisinea - Recette de cuisines</h1>
            <p class="lead text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis
                maiores quasi
                commodi voluptatum ratione suscipit, nam sint deserunt vero quos nemo temporibus numquam at
                perspiciatis, eaque assumenda explicabo ullam quaerat quo aliquid aliquam reprehenderit ipsa
                eius.
                Minus, deleniti? Eveniet perspiciatis cupiditate porro beatae hic dolorum ipsum aliquam magni ad
                iusto.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="recettes.php"
                   class="btn btn-primary">Voir nos recettes</a>
            </div>
        </div>
    </section>
    <!-- Fin Section Bootstrappé présentation du site avec le logo -->
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