<?php
// Vérification du token pour réinitialisation de mot de passe
// ! Ce code vérifie si le lien cliqué dans l'email est valide pour réinitialiser un mot de passe.

// 1. Je démarre la session (comme toujours)
// ? ça me permet de garder des informations d'une page à l'autre
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// 2. Je me connecte à la base de données
// ? ça me permet d'ouvrir la connexion à ma base de données
require("../../service/PDO-Connexion-BDD.php");

// 3. Je récupère le token depuis l'URL
// ? Quand quelqu'un clique sur le lien dans l'email l'URL ressemble à ça: "monsite.com/reset.php?token=abc123xyz789"

$token = $_GET['token'] ?? '';
// ? Le  $_GET['token'] permet de récupérer la partie après le "token="
// ? -->  ?? "" : Cela signifie que si le token n'existe pas on met une chaine vide

$message = "";  // ? Permet de stocker le message à afficher à l'utilisateur
$success = false; // ? Pour savoir si tout s'est bien passé (true/false)

// 4. Je vérifie que le token n'est pas vide, c'est à dire qu'il existe
if(!empty($token)) {
    
    // 5. Je cherche ce token dans ma base de données PASSWORD_RESET 
    $sql = $pdo->prepare("
        SELECT * 
        FROM password_reset 
        WHERE reset_token = ? 
        AND used = FALSE 
        AND expiry_date > NOW()
    ");
    // used = FALSE : le token n'a pas encore été utilisé
    // expiry_date > NOW() : le token ne doit pas être expiré
    // reset_token = ? : Le token doit correspondre exactement
    // ? En gros ça veut dire "Trouve moi un token qui correspond à "Tkoa5984a2", qui n'a pas encore été utilisé et qui
    // ? n'est pas expiré
    
    $sql->execute([$token]);
    $confirmation = $sql->fetch();
    
    // 6. Si j'ai trouvé le token ET qu'il est valide
    if($confirmation) {
        
        // Token valide ! On peut afficher le formulaire de nouveau mot de passe
        $success = true; // ? Tout va bien
        $message = "Token valide. Vous pouvez maintenant changer votre mot de passe.";
        
        // Je stocke l'ID du token et l'ID utilisateur pour les utiliser dans le formulaire
        $_SESSION['reset_token_id'] = $confirmation['id']; // ? ['id'] de la table de BDD
        $_SESSION['reset_user_id'] = $confirmation['user_id']; // ? ['user_id'] de la table de BDD
        
        // ? On va sauvegarder 2 informations dans la session:
            //? - reset_token_id : Qui est l'id du token
            //? - reset_user_id : Qui est l'id de l'utilisateur
    } else {
        // Token invalide ou expiré
        $success = false;
        $message = "Ce lien de réinitialisation est invalide ou a expiré.";
    }
    
} else {
    $success = false;
    $message = "Aucun token de réinitialisation fourni.";
}

// 7. J'inclus la page qui va afficher soit le formulaire, soit le message d'erreur
require("../../../HTML/Compte/Mot-de-passe-oublie/Espace-réinitialiser-motdepasse.php");
?>

