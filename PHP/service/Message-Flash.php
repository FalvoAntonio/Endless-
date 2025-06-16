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
/* 
! Création de la function "afficheMessageFlash" qui me permet d'afficher les messages flash lorsque je fais la demande pour 
! réinitialiser mon mot de passe.
*/
function afficheMessageFlash(string $titreMessage)
{
    $message = $_SESSION[$titreMessage] ?? "";
    // L’opérateur ?? (null coalescent) retourne une chaîne vide si la variable n’existe pas.
    if(!empty($message))
    // Si le message n'est pas vide, on l'affiche dans la div
    {
        echo "<div class='flash-message'>
        <span class='close-msg-flash'>X</span>$message</div>";
        // Ici avec l'unset on supprime le message de la session pour qu'il ne s'affiche qu'une seule fois, si on refresh il ne s'affichera plus 
        unset($_SESSION[$titreMessage]);
    }
}
?>
<style>
.flash-message {
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
  padding: 15px 20px;
  margin: 20px auto;
  max-width: 600px;
  position: relative;
  border-radius: 5px;
  font-family: Arial, sans-serif;
}

.close-msg-flash {
  position: absolute;
  top: 8px;
  right: 12px;
  font-weight: bold;
  cursor: pointer;
  color: #721c24;
  font-size: 18px;
}
</style>