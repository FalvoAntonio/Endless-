<?php

// Introduction des fichiers nécessaires 
require '../../service/Forme.php';
// pour utiliser cleanData(), MessagesErrorsFormulaire(), creationCSRFToken(), verifierCSRFToken($token)
require '../../service/PDO-Connexion-BDD.php';
// pour la connexion à la base Docker


// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION["logged"]) || !isset($_SESSION["user_id"]))
        // Si l'utilisateur n'est pas connecté (pas de session "logged" ou "user_id")
    {
        header("Location: /"); 
        // On le redirige vers la page d'accueil
        exit;
        // On arrête l'exécution du script
    }

// Fonction pour générer un token CSRF
// ! VOIR dans le dossier Forme.php 
// ! Je vais devoir créer les tokens et les comparer


// ? Pourquoi utiliser un Token CSRF
// Pour Empêche qu'un autre site malveillant supprime ton compte à ton insu
// ? Comment 
// Par un code secret généré pour chaque session, vérifié à chaque action

$message = '';
// Variable pour stocker les messages de succès
$errors = [];
// Tableau pour stocker toutes les erreurs de validation


// Traitement du formulaire de suppression
if($_SERVER["REQUEST_METHOD"] === "POST") 
    // Si le formulaire est bien soumis
{
    $csrf_token = $_POST["csrf_token"]??"";

     //  Maintenant que j'ai récupéré le token en POST (du formulaire) j'appelle ma fonction pour comparer le token
    if (!verifierCSRFToken($csrf_token)) {
        // Si le token CSRF n'est pas valide
        $errors['csrf'] = "Token de sécurité invalide. Veuillez réessayer.";
        // On ajoute une erreur dans le tableau avec la clé 'csrf'
    }
    //  Si pas d'erreurs de validation, procéder à la suppression
    if(empty($errors))
        // Si le tableau $errors est vide (aucune erreur de validation)
    {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        // Maintenant qu'il n'y a plus de références, on peut supprimer l'utilisateur
        $stmt->execute([$_SESSION['user_id']]);

        // Si tout s'est bien passé, on valide définitivement toutes les suppressions
                    
        // Détruire la session
        session_destroy();
        // On détruit la session puisque l'utilisateur n'existe plus
        session_start();
        // J'ouvre la session pour le message de confirmation
        // Message de confirmation et redirection
        // Je sauvegarde en session ce message : et je l'appelle "suppression-compte" et je l'utilise ou je veux 
        $_SESSION["suppression-compte"] = "Votre compte a été supprimé avec succès.";
        // Message de succès
                    
    
        header("location: /");
       
    }
}



?>
