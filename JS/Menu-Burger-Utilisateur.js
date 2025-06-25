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
        // preventDefault() = Empêche le comportement normal, c'est à dire si mon icone est dans un lien <& href="...3 normalemnt à a changerait de page"
        // En gros cette ligne nous dit " Non ne change pas de page reste ici"

    
        // event = C'est un paramètre qui contient les infos sur ce qui s'est passé au clic et au survol, il fait donc
        // référence au addEventListener

    const MenuVisible = MenuUtilisateur.style.transform === "scale(1)";
    // Le "===" est une comparaison stricte : 'est ce que c'est exactement égal ?
    // En résumé MenuVisible vaut true si le menu est visible sinon il vaut false

    if(!MenuVisible)
    {
        // si le menu N'EST PAS visible alors :
            MenuUtilisateur.style.transform = "scale(1)";
            MenuUtilisateur.style.opacity = "1";
            MenuUtilisateur.style.visibility = "visible";
    }
    else
        // Sinon le menu est invisible
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
        // est-ce que l'élément a la classe 'connected' ?
        // on n'active le menu QUE si l'utilisateur est connecté

        // j'ajoute les évènements au survol et au clique
    {
        IconeUtilisateur.addEventListener("click", AfficherMenuUtilisateur)
        // Quand on clique sur l'icône, on exécute la fonction AfficherMenuUtilisateur"
        IconeUtilisateur.addEventListener("mouseenter", AfficherMenuUtilisateur)
        // "mouseenter" = quand la souris "entre" sur l'élément (survol)
        // Même fonction appelée = le menu va s'ouvrir/fermer au survol
        MenuUtilisateur.addEventListener("mouseleave", AfficherMenuUtilisateur)
        // "mouseleave" = quand la souris "quitte" l'élément
        // Même fonction = le menu va s'ouvrir/fermer quand on quitte le menu
    }
    // Quand je click sur le logo il se passe quelque chose
    // Ici ça sera le fait d'ouvrir et de fermer le menu

}
/* 
Pour conclure :
Mon script fait ceci :

Si l'utilisateur est connecté (classe "connected")
Au clic sur l'icône → ouvre/ferme le menu
Au survol de l'icône → ouvre/ferme le menu
Quand on quitte le menu → ouvre/ferme le menu

 */





