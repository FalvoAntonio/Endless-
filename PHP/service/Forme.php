<?php
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



function cleanData(string $data): string
{
    // + Cette fonction permet de nettoyer les données saisies par l'utilisateur
    // + en retirant les espaces, les antislashs et en convertissant les caractères spéciaux.
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} // fin de la fonction cleanData

// + Fonction qui permet d’afficher un message d’erreur pour un champ spécifique d’un formulaire
// + si ce champ a généré une erreur (stockée dans le tableau $error).

function getError($clef)
{
    static $error = [];
    // Initialise un tableau vide local appelé $error, que je vais utiliser pour stocker les erreurs.
    if(isset($_SESSION["error"]))
    // Vérifie si des erreurs ont été stockées dans la session
    {
        $error = $_SESSION["error"];
        // Si c’est le cas, tu les récupères dans ta variable locale $error.
        unset($_SESSION["error"]);
        // Et je les supprimes de la session pour éviter de les réafficher à chaque rechargement de la page.

        // + Pourquoi faire ça ? : Pour transférer les erreurs d’une page de traitement vers une page d’affichage (comme un formulaire).
        // + On prend les erreurs de la page "Formulaire-creation-compte.php"
        
    }
  /* 
    ! Pourquoi utiliser "global" ? Parce que $error est une variable déclarée en dehors de la fonction.
    ! En PHP, pour accéder à une variable globale depuis l’intérieur d’une fonction, tu dois utiliser global.

  On vérifie si une erreur existe pour la clé donnée (par exemple : "email", "motdepasse", etc.)
  Si oui, on affiche un span HTML contenant le message d'erreur
  Sinon, on n'affiche rien (chaîne vide)
  */
  echo isset($error[$clef])?"<span class='error'>{$error[$clef]}</span>":"" ;
}