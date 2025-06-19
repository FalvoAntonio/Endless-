<?php

// Vérification des champs du formulaire "Réinitialisation du mot de passe"

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("../service/PDO-Connexion-BDD.php");
require("../service/Forme.php");


$error = [];


// Vérifier que l'utilisateur vient bien de la page de vérification du token
if(!isset($_SESSION['reset_token_id']) || !isset($_SESSION['reset_user_id'])) {
    header("Location: /");
    exit;
}

// Vérifier que le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] === "POST") 
{
    // var_dump($_POST);
    // die("coucou");
    
// Vérification du nouveau mot de passe
if(empty($_POST["New-mdp"]))
{
$error["nouveau_mdp"] = "Veuillez entrer un nouveau mot de passe";
}
else
{
    $nouveau_mdp = trim($_POST["New-mdp"]);
    if(strlen($nouveau_mdp) < 8 || strlen($nouveau_mdp) > 40){
        $error["nouveau_mdp"] = "Votre mot de passe n'a pas une taille adaptée";
    } elseif(
        !preg_match('/[A-Z]/', $nouveau_mdp) ||
        !preg_match('/[a-z]/', $nouveau_mdp) ||
        !preg_match('/[0-9]/', $nouveau_mdp) ||
        !preg_match('/[!@#$%^&*(),.?":{}|<>+]/', $nouveau_mdp)
    ) {
        $error["nouveau_mdp"] = "Votre mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.";
    }
}

// Vérification de la confirmation du nouveau mot de passe (retaper)

 if(empty($_POST["Confirm-mdp"])) {
        $error["confirmer_nouveau_mdp"] = "Veuillez confirmer votre nouveau mot de passe";
    } else {
        $confirmer_nouveau_mdp = trim($_POST["Confirm-mdp"]);
        
        // Vérifier que les deux mots de passe sont identiques
        if(isset($nouveau_mdp) && $nouveau_mdp !== $confirmer_nouveau_mdp) {
            $error["confirmer_mdp"] = "Les mots de passe ne correspondent pas";
        }
    }

    // S'il n'y a aucune erreur alors on peut changer le mot de passe
    // Si l'utilisateur a bien rempli le formulaire (pas d'erreurs)
    if(empty($error))
    {
        // Il faut crypter le mot de passe
        $nouveau_mdp_hash = password_hash($nouveau_mdp, PASSWORD_DEFAULT);
        // Nous devons mettre le mot de passe à jour (crud)
        // Changer le mot de passe dans la base de données
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$nouveau_mdp_hash, $_SESSION['reset_user_id']]); // !
        // ! Je reprends l'id d'une autre page "Confirmer-votre-nouveau-mdp.php" avec $_SESSION 
        // ! Ce qu'il y avait dans la page "Confirmer-votre-nouveau-mdp.php" :
        
        // [ Je stocke l'ID du token et l'ID utilisateur pour les utiliser dans le formulaire
        // $_SESSION['reset_token_id'] = $confirmation['id'];
        //$_SESSION['reset_user_id'] = $confirmation['user_id']; ]
        
        // Avec $_SESSION['reset_user_id'] : Je vais récupérer l'information 
        //? reset_user_id = L'id de l'utilisateur
        //? restet_token_id = L'id du token

        // Marquons le token comme utilisé
        $stmt_token = $pdo->prepare("UPDATE password_reset SET used = TRUE WHERE id = ?"); // ! A REVOIR
        $stmt_token->execute([$_SESSION['reset_token_id']]);

        // Pour finir il ne faut pas oublier de nettoyer la session
        unset($_SESSION['reset_token_id']);
        unset($_SESSION['reset_user_id']);

        // Message de succès
        $_SESSION["Message-confirmation-envoi-mail"] = "Votre mot de passe a été changé avec succès ! Vous pouvez maintenant vous connecter.";
        // ! A REVOIR !!! DOIS JE UTILISER TOUJOURS LA MEME VARIABLE "Message-confirmation-envoi-mail"
        
        // Redirection vers la page de connexion
        header("Location: ../../HTML/Login.php");
        exit;
    }




}

header("/")


/* 

📊 DANS LA TABLE password_reset
Voici un exemple de ce qu'il y a dans votre table :
iduser_idreset_tokenexpiry_dateused512abc123xyz2025-06-18FALSE625def456uvw2025-06-18FALSE78ghi789rst2025-06-17TRUE

🎯 SCÉNARIO CONCRET
Imaginons que Marie (utilisateur ID 25) a oublié son mot de passe.
1. Marie clique sur son lien email
URL : monsite.com/reset.php?token=def456uvw
2. Le code récupère le token
php$token = $_GET['token']; // = "def456uvw"
3. Le code cherche dans la table
php$sql = $pdo->prepare("SELECT * FROM password_reset WHERE reset_token = ?");
$sql->execute(["def456uvw"]);
$confirmation = $sql->fetch();
4. Résultat récupéré
php$confirmation = [
    'id' => 6,              // ← L'ID de cette ligne dans password_reset
    'user_id' => 25,        // ← L'ID de Marie dans la table users
    'reset_token' => 'def456uvw',
    'expiry_date' => '2025-06-18',
    'used' => false
];
5. Stockage dans la session
php$_SESSION['reset_token_id'] = $confirmation['id'];       // = 6
$_SESSION['reset_user_id'] = $confirmation['user_id'];   // = 25

🔍 QUE SIGNIFIENT CES VARIABLES ?
reset_token_id = 6

Fait référence à : La ligne numéro 6 dans la table password_reset
Pourquoi on en a besoin : Pour marquer cette ligne comme "utilisée" plus tard

reset_user_id = 25

Fait référence à : L'utilisateur numéro 25 dans la table users (= Marie)
Pourquoi on en a besoin : Pour changer le mot de passe de Marie (pas de quelqu'un d'autre !)
*/


























?>