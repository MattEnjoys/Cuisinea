<?php
// Fonction d'insertion d'un nouvel utilisateur:

// Fais une insertion dans la BDD
function addUser(PDO $pdo, string $first_name, string $last_name, string $email, string $password)
{
    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `role`) VALUES (:first_name, :last_name, :email, :password, :role);";
    $query = $pdo->prepare($sql);
    // Modification du MDP pour hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    $role = 'subscriber';
    $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    return $query->execute();
}

// Vérification de saisie utilisateur
function verifyUserLoginPassword(PDO $pdo, string $email, string $password)
{
    // On récuper l'utilisateur en BDD
    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();
    // On vérifie si le MDP de l'utilisateur inscrit en BDD est égal au MDP saisis
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}