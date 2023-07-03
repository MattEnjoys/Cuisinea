# Création d’un mini site de recettes de cuisine :

Site déployé sur alwaysdata.net: [Cuisinea - recettes faciles](https://cuisinea.alwaysdata.net)

## Points théoriques abordés :

> Afficher et alterner php et html.

> Les types de variables.

> Les conditions.

> Les boucles.

> Les tableaux.

> include et require.

> Les fonctions.

> Caster et typer.

> Gérer les données GET et POST.

> CRUD avec une base de données mysql.

> Bonus : introduction à la POO.

## Environnement Technique :

> Langage descriptif: HTML et CSS avec utilisation de [Bootstrap](https://getbootstrap.com/).

> Langages de programmation[PHP](https://www.php.net/docs.php) et SQL -> [Mysql](https://dev.mysql.com/doc/) pour la BDD.

> Serveur Laragon.

> IDE: VSCode.

## CUISINEA :

> Mise en place de la structure du projet.

> Création des pages de navigation pour les visiteurs.

> Création des pages nécessaires à l’administration du site (CRUD).

        ■ Create (ajouter une recette)
        ■ Update (modifier une recette)
        ■ Read (afficher une recette)
        ■ Delete (supprimer une recette)

> La base de données sera mise à disposition. Si le temps le permet, nous verrons comment elle a été construite.

#### Bonus

> Filtrer les recettes par catégorie.

> Recherche.

> Inscription, Connexion.

> Création de classes (POO).

## \_ \_ \_ \_ \_ Live 1 :

> Préambule général.

> Théorie PHP.

## \_ \_ \_ \_ \_ Live 2 :

> Mise en place de la page index.php.

> Ajout du CDN via jsDelivr de Bootstrap.

> Mise en place de la structure.

> Théorie PHP.

## \_ \_ \_ \_ \_ Live 3 :

> Ajouts de cards de Bootstrap.

> Théorie PHP.

## \_ \_ \_ \_ \_ Live 4 :

> Initialement, nous avons trois cards de Bootstrap en dur. L'idée est donc de faire une boucle php qui introduira une card par recette, autant qu'il y en a.

> Et aussi remplacer les données marquées en brut et les afficher dynamiquement;

> Il faudra aussi rendre constant le chemin absolut ou sont stockés les images. _RECIPES_IMG_PATH_ est un nom pris au hasard, mais par convention, il lui faudra les "\_".

> On va maintenant séparer le header et le footer du contenu. Le principe est de mettre le code à un seul endroit et de l'appeller dans toutes les pages que l'on souhaite. Pour ce faire, on crée un dossier template, et deux fichiers, header.php et footer.php dans lesquels on va y couper respectivement, le header, et le footer de index.php.

> Il faudra les appeler aux endroits souhaités avec

        ■ require_once('templates/header.php');?>
        ■ require_once('templates/footer.php');?>

## \_ \_ \_ \_ \_ Live 5 :

> On va maintenant dynamiser la card en elle même. Pour ça, on doit créer un fichier recipe_partial.php. la denomination \_partial indique que l'on inscrit un bout de code html, et non pas une page entière, qu'on injectera à l'endroit souhaité.

> On crée la page qui affichera la recette => recettes.php et on y copie le code de index.php eb modifiant le contenu.

> On centralise le define et les recettes dans un fichier config.php lui même dans un dossier lib. On pourra l'appeller dans le header pour éviter le surplus de require dans les pages.

> Pour inscrire les recettes, on crée un fichier recipe.php dans le dossier lib. On appellera les recettes uniquement la ou on en as besoin par un require_once, dans index.php et recettes.php.

> Pour voir une recette en particulier, on crée la page recette.php. Qu'on va rendre dynamique. On va lier la des boutons de la page index (générés dans recipe_partial.php), vers les recettes correspondantes.

> Rentre la navbar dynamique avec une classe active.

## \_ \_ \_ \_ \_ Live 6 :

> Rendre dynamique la NavBar avec une boucle, et le $mainMenu que l'on place dans config.php.

On passera de ça:

`<li class="nav-item"><a href="index.php" class="nav-link <?php if ($currentPage === 'index.php') { echo 'active'; } ?>">Accueil</a>

</li>`
`<li class="nav-item"><a href="recettes.php" class="nav-link <?php if ($currentPage === 'recettes.php') { echo 'active'; } ?> ">Nos recettes</a></li>`
`<li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>`
`<li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>`
`<li class="nav-item"><a href="#" class="nav-link">About</a></li>`

à ça:

`<?php foreach ($mainMenu as $key => $value) { ?>`

`<li class="nav-item"><a href="<?= $key; ?>" class="nav-link <?php if ($currentPage === $key) { echo 'active'; } ?>">< = $value; ?></a></li><?php } ?>`

> Mise en place de la BDD: studi_live_cuisinea - latin1_swedish_ci.

> On récupère le fichier SQL depuis le [git](https://github.com/arirangz/cuisinea01/tree/master) et on l'injecte dans la BDD et on adapte le code en fonction de la requete SQL.

## \_ \_ \_ \_ \_ Live 7 :

> Dans un premier temps, on définis une image par defaut pour une recette.

> Ensuite, sur recette.php, on va faire en sorte de rajouter des ingrédients.

> Pour la fonction explode, on la mettra dans tools.php pour pouvoir la réutiliser.

> On rends le code plus propre en mettant la gestion de l'affichage dans un dossier a part dans recipe.php.

> On crée pdo.php ou on mettra l'instace d'appel de pdo.

> On générique la fonction getRecipeImage qu'on met dans recipe.php

> Réalisation de la page recettes.php et des requetes PDO.

## \_ \_ \_ \_ \_ Live 8 :

> On rends le code plus propre en mettant getRecipes dans le dossier recipe.php.

> On remet au propre la page d'accueil et on déporte la fonction d'ajout de recette dans le config.php.

> On continue le CRUD avec Ajout / Modification des recettes: on crée un fichier ajout_modification_recette.php qu'on va alimenter par un formulaire et réaliser l'insertion en BDD avec la fonction saveRecipe dans recipe.php.

## \_ \_ \_ \_ \_ Live 9 :

> Affichage message pour envoie d'une recette dans la BDD.

> On rends dynamique le select de ajout_modification_recette.php.

> On crée un fichier category.php pour y mettre les catégories qu'on appellera en dynamique dans la page d'ajout.

> Gérer la partie upload de fichier. dans la page d'ajout.

## \_ \_ \_ \_ \_ Live 10 :

> Mise en place d'un système de login fonctionnel.

> On crée une page login.php.

> On crée la page user.php pour y stocker la requete pour récupérer l'utilisateur et vérifier qu'il est bien en BDD.

> On crée le formulaire d'inscription et la fonction addUser associée.

> On crée la page session.php pour les sessions des utilisateurs, et le garder connecté au site. On l'inclut dans le header.php pour n'avoir a le faire qu'une fois.

> Enfin, on gère le logout sur logout.php.
