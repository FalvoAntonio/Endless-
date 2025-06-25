"use strict";

/* 
Pour mon Menu Burger Utilisateur j'ai du switcher avec plusieurs dossiers:
-script.js pour faire l'import de la fonction et la déclarer 
-header.php  pour ajouter une class si je suis connécté pour l'utilisation du menu pour les utilisateurs connéctés:
-Menu-utilisateur.css Pour mettre le css qui permettra de faire la base de la fonction pour rendre visible ou non le menu
!<?php $isLogged = isset($_SESSION["logged"]); ?>
!<img
            class="icon icon-login <?= $isLogged ? 'connected' : ''; // Si je suis connécté j'aurais la class 'connected' 
            // si je suis pas connecté elle n'apparait pas?>"
            src="./Images/Login.png"
            alt="Identifiant"
! />
Faire les require sur toutes les pages pour faire apparaitre le menu (require "./HTML/module/Menu-burger-compte.html";)


*/




/* Je vais tout d'abord récupérer mon icone "utilisateur" de ma page "header.php"*/
const IconeUtilisateur = document.querySelector(".icon-login");
/* Je vais récupérer mon id "menu-utilisateur" dans mon fichier Menu-burger-compte.php */
const MenuUtilisateur = document.querySelector("#menu-utilisateur");



// ? Fonction pour la visibilité du menu :
/**
 * 
 * @param {Event} event 
 */
function AfficherMenuUtilisateur(event)
{
        event.preventDefault();
        // annule le click sur le lien (sinon je peux pas y accéder, ca change de page sinon)
        // Le paramètre (event) est envoyé directement par le addEventListener et contient l'évènement au clique ou au survol 
    const MenuVisible = MenuUtilisateur.style.transform === "scale(1)";
    // 

    if(!MenuVisible)
    {
        // Si le menu est fermé on va l'ouvrir
            MenuUtilisateur.style.transform = "scale(1)";
            MenuUtilisateur.style.opacity = "1";
            MenuUtilisateur.style.visibility = "visible";
    }
    else
        // Sinon le menu était déjà visible
    {
            MenuUtilisateur.style.transform = "scale(0)";
            MenuUtilisateur.style.opacity = "0";
            MenuUtilisateur.style.visibility = "hidden";
    }
}

// ? Fonction pour ouvrir le menu :

export function StartMenuUtilisateur()
{
    
    if(IconeUtilisateur.classList.contains("connected"))
        // vérifie si j'ai la class "connected"
        // j'ajoute les évènements au survol et au clique
    {
        IconeUtilisateur.addEventListener("click", AfficherMenuUtilisateur)
        IconeUtilisateur.addEventListener("mouseenter", AfficherMenuUtilisateur)
        MenuUtilisateur.addEventListener("mouseleave", AfficherMenuUtilisateur)
    }
    // Quand je click sur le logo il se passe quelque chose
    // Ici ça sera le fait d'ouvrir et de fermer le menu

}







