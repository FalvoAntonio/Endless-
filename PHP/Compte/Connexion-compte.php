<?php

// ? Vérification de la session: (!C'est la deuxième étape)
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

// ? Ajouter une redirection si l'utilisateur est déjà connecté
if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true)
// On vérifie si l'utilisateur est déjà connecté
// Si l'utilisateur est déjà connecté, on le redirige vers la page d'accueil
{
    header("Location: /");
    exit;
    // On utilise header() pour rediriger l'utilisateur vers la page d'accueil
    // On utilise exit pour arrêter l'exécution du script après la redirection
}



// ? Déclaration des variables: (!C'est la première étape que je fais toujours dans un script PHP)

$error = [];
$email = $pass = "";

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["boutonConnexion"]))
// On vérifie si la méthode de la requête est POST et si le bouton de connexion a été cliqué
// Si la méthode de la requête est POST, cela signifie que le formulaire a été soumis
if(empty($_POST["email"]))
// On vérifie si le champ email est vide
// Si le champ email est vide, on ajoute un message d'erreur dans le tableau $error
{
    $error["email"] = "Veuillez saisir votre email.";
    // On ajoute un message d'erreur dans le tableau $error
}
else
{
    $email = trim($_POST["email"]);
    // trim() permet de supprimer les espaces en début et fin de chaîne
    // Cela permet d'éviter les erreurs liées aux espaces inutiles
}
if(empty($_POST["mdp"]))
// On vérifie si le champ mot de passe est vide
// Si le champ mot de passe est vide, on ajoute un message d'erreur dans le tableau $error
// Si le champ mot de passe n'est pas vide, on continue le traitement
// "mdp" est le nom du champ mot de passe dans le formulaire

{
    $error["mdp"] = "Veuillez saisir votre mot de passe.";
    // On ajoute un message d'erreur dans le tableau $error 
}
else
{
    $pass = trim($_POST["mdp"]);
    // trim() permet de supprimer les espaces en début et fin de chaîne
    // Cela permet d'éviter les erreurs liées aux espaces inutiles
} // Fin de la vérification des champs

if(empty($error))
// On vérifie si le tableau $error est vide
// Si le tableau $error est vide, cela signifie que tous les champs sont valides

{

    // ? Connexion à la base de données:
    // ? Récupérer l'utilisateur dans la base de données:
    $utilisateur = ["password"=> '$2y$10$Hn7l4petJPiFnAIZlpO1jeJ3IPw2waquHWETyRwuPQ2.P16p9B1zG', "username" => "Maurice"];
    require("./service/PDO-Connexion-BDD.php"); // Connexion à la base de donner 
    
    if($utilisateur)
    {
        if(password_verify($pass, $utilisateur["password"]))
        // On utilise password_verify() pour vérifier si le mot de passe saisi correspond au mot de passe haché dans la base de données
        {
            // Authentifier l'utilisateur:
            $_SESSION["logged"] = true; // !
            // On crée une session pour l'utilisateur
            header("Location: /HTML/Page-mon-espace.html");
            exit;
            // On redirige l'utilisateur vers la page d'accueil
        }
        else
        {
            $error["mdp"] = "Mot de passe incorrect.";
            // Si le mot de passe est incorrect, on ajoute un message d'erreur dans le tableau $error
        }
    }
    else
    {
        $error["email"] = "Aucun utilisateur trouvé avec cet email.";
        // Si aucun utilisateur n'est trouvé avec l'email saisi, on ajoute un message d'erreur dans le tableau $error
    }
}


?>