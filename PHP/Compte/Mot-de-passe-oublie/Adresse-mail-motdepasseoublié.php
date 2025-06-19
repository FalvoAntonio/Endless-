<?php
/* CE FICHIER PERMET DE VERIFIER LE CHAMP DE L'ADRESSE MAIL DE LA PAGE "MDP-oublie.php"
ON VERIFIE EGALEMENT SI L'ADRESSE MAIL SAISIE EXISTE BIEN DANS NOTRE TABLE DE DONNEES
NOUS PREPARONS L'ENVOIE DU MAIL QUI PERMETTRA DE MOFIDIER LE MDP AVEC LE LIEN URL CONTENANT LE TOKEN
ON ENVOIE DANS LE MAIL LA PAGE HTML : "réinitialiser-motdepasse.html"
*/

if(session_status() !== PHP_SESSION_ACTIVE)
// On vérifie si la session n'est pas déjà démarrée
// Si la session n'est pas démarrée, on la démarre
{
    session_start();
    // On utilise session_start() pour démarrer la session
    // Cela permet de pouvoir utiliser les variables de session
    // Si la session est déjà démarrée, on ne fait rien
    // Cela permet d'éviter les erreurs liées à la session
}
// On inclut le fichier Forme.php qui contient mes fonctions php, ainsi que PHP_Mailer pour me permettre d'envoyer un mail
require "../../service/Forme.php";
require "../../service/PHP_Mailer.php";

require("../../service/PDO-Connexion-BDD.php"); // On inclut le fichier qui contient la connexion à la base de données via PDO.

$error = [];

// Je vérifie si l'adresse mail est vide
if(empty($_POST["email"]))
{
// Si elle est vide alors j'envoie un message d'erreur
    $error["mail"] = "Veuillez entrer une adresse e-mail";
}
else
{
 $mail = trim($_POST["email"]);
        // retire les espaces au début et à la fin du string
        $mail = stripslashes($mail);
        // retire les \ présent dans le string.
        $mail = htmlspecialchars($mail);
        // Remplace tous les caractères spéciaux de html (<,>...) par leurs code HTML (&gt;...) afin d'empêcher toute injection de code.
        // Vérification de la validité de l'adresse e-mail
        if
        (!filter_var($mail, FILTER_VALIDATE_EMAIL))
        // On verifie si le string $mail est une adresse e-mail valide, si ça ressemble à une adresse e-mail
        // Cela nous renvoie false si l'adresse e-mail n'est pas valide
        // filter_var est une fonction PHP qui permet de filtrer une variable.
        // FILTER_VALIDATE_EMAIL est un filtre qui permet de valider une adresse e-mail.
    {
        $error["mail"] = "Votre adresse e-mail n'est pas valide";
        // On ajoute un message d'erreur dans le tableau $error
    }
    else
    {
    // Vérification si l'adresse e-mail existe déjà
            // Préparation de la requête SQL pour chercher un utilisateur avec cet e-mail
            $sql = $pdo->prepare("SELECT * FROM users WHERE email=?");
            // Exécution de la requête avec l'e-mail fourni par l'utilisateur
            $sql->execute([$mail]);
            // On récupère la première ligne (l'utilisateur correspondant à cet e-mail, s'il existe)
            $user = $sql->fetch();
            // Si un utilisateur a été trouvé avec cet e-mail
            if($user)
            {
                // Création d'un token pour mon envoie de mail
                // On génère un token (chaîne aléatoire sécurisée) pour la réinitialisation du mot de passe
                $token = bin2hex(random_bytes(50));
                $expiry_date = date('Y-m-d H:i:s', strtotime('+1 hours'));
                // A partir de maintenant le token expire dans une heure
                // Préparation d'une requête pour insérer le token dans la table "password_reset"
                $stmt_token = $pdo->prepare("INSERT INTO password_reset (user_id, reset_token, expiry_date) VALUES (?, ?, ?)");
                // Exécution de la requête avec l'ID de l'utilisateur, le token et la date d'expiration
                $stmt_token->execute([$user["id"], $token, $expiry_date]);
                // Je lie le token à l'utilisateur que je viens de crée

                /* 
                * À ce stade, on a stocké un token dans une table à part (password_reset)
                * Cela permet de sécuriser le système de réinitialisation.
                * Quand la personne cliquera sur le lien dans le mail, on vérifiera si ce token existe encore et n'est pas expiré.
                */
                
                $miseEnFormMail = file_get_contents("../../../HTML/module/Réinitialiser-motdepasse.html");
                // On récupère le contenu HTML du mail à envoyer (template prédéfini) depuis un fichier externe.

                $miseEnFormMail = str_replace('$token$', $token, $miseEnFormMail);
                // "str_replace" est une fonction PHP qui remplace du texte dans une chaine de caractères
                // * str_replace('QUOI_REMPLACER', 'PAR_QUOI', 'DANS_QUEL_TEXTE')

                // Envoi du mail de réinitialisation avec le sujet et le contenu personnalisé
                EnvoyerMail($mail, "Réinitialisation mot de passe", $miseEnFormMail);
                // ! Ici on utilisera la fonction "MessageèFlash.php"
                // ! A REVOIR !!!!
                $_SESSION["Message-confirmation-envoi-mail"] =  "Un e-mail de réinitialisation a été envoyé à votre adresse.";
            }else
            {
                $_SESSION["Message-confirmation-envoi-mail"] =  "Cette adresse e-mail n'existe pas dans notre base.";
            }
            
    }
    } // ? fin vérification mail

header("Location: /");

