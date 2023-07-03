<?php
// Pour récupérer les recettes depuis la BDD par son ID
function getRecipeById(PDO $pdo, int $id)
{
    $query = $pdo->prepare("SELECT * FROM recipes WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}

// Pour définir une image par défaut à la recette, si elle n'as pas d'image
function getRecipeImage(string|null $image)
{
    if ($image === null) {
        return _ASSETS_IMG_PATH_ . 'recipe_default.jpg ';
    } else {
        return _RECIPES_IMG_PATH_ . $image;
    }
}

// Récupère toute les recettes et les classent d'orde décroissant et en mettre 6 dans index.php
function getRecipes(PDO $pdo, int $limit = null)
{
    $sql = 'SELECT * FROM recipes ORDER BY RAND() DESC';

    if ($limit) {
        $sql .= ' LIMIT :limit';
    }

    $query = $pdo->prepare($sql);
    if ($limit) {
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }
    $query->execute();
    return $query->fetchAll();

}

// Fais une insertion de recette dans la BDD
function saveRecipe(PDO $pdo, int $category, string $title, string $description, string $ingredients, string $instructions, string|null $image)
{
    $sql = "INSERT INTO `recipes` (`id`, `category_id`, `title`, `description`, `ingredients`, `instructions`, `image`) VALUES (NULL, :category_id, :title, :description, :ingredients, :instructions, :image);";
    $query = $pdo->prepare($sql);
    $query->bindParam(':category_id', $category, PDO::PARAM_INT);
    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
    $query->bindParam(':instructions', $instructions, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    return $query->execute();
}