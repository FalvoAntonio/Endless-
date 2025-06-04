<?php
if(session_status() !== PHP_SESSION_ACTIVE)
//On vérifie si la session n'est pas déjà démarrée
// Si la session n'est pas démarrée, on la démarre
// Cela permet de pouvoir utiliser les variables de session
{
    session_start();
    // On utilise session_start() pour démarrer la session
}
if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true)
// On vérifie si l'utilisateur n'est pas connecté
// Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
{
    // On redirige l'utilisateur vers la page de connexion
    header("Location: ./04-connexion.php");
    exit; // On utilise exit pour arrêter l'exécution du script après la redirection
}

unset($_SESSION);	
session_destroy();
setcookie("PHPSESSID", "", time() - 3600);

header("Location: /");
// On redirige l'utilisateur vers la page d'accueil après la déconnexion
exit;

?>