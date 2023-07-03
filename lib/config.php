<?php
// Constantes du chemin absolut ou sont stockés les images:

// On définie que la constante _RECIPES_IMG_PATH_ a pour valeur uploads\recipes\
define('_RECIPES_IMG_PATH_', 'uploads/recipes/');
// On définie que la constante _ASSETS_IMG_PATH_ a pour valeur assets\images\
define('_ASSETS_IMG_PATH_', 'assets/images/');
// Pour avoir 6 recettes sur index.php
define('_HOME_RECIPES_LIMIT_', 6);
// Rendre la navbar dynamique
$mainMenu = [
    'index.php' => 'Accueil',
    'recettes.php' => 'Nos recettes',
    'ajout_modification_recette.php' => 'Ajout/modif recette'
];